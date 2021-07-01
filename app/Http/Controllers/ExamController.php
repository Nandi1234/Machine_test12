<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamQuestion;
use App\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function createExam()
    {
        $ques = Question::all();
        if(count($ques) < 5){
            return redirect()->back()->withErrors('Minimun Question Should Be More Than 5');
        }
        $questions  = Question::inRandomOrder()->limit(5)->get();
        // dd($question);
        $exam = Exam::create([
            'user_id' => auth()->user()->id,
            'date' => date('Y-m-d'),
        ]);
        foreach ($questions as $question) {
            $examQuestion  = ExamQuestion::create([
                'exam_id' => $exam->id,
                'question_id' => $question->id
            ]);
        }

        return view('exam.create', compact('questions', 'exam'));
    }

    public function saveExam(Request $request, $exam)
    {
        
        $exams = Exam::findOrFail($exam);
        foreach ($request->question_ids as $question) {
            $examQuestion = ExamQuestion::where('exam_id', $exam)
                ->where('question_id', $question)
                ->update([
                    'option_no' => $request[$question]
                ]);
        }

        $eheckOptions = ExamQuestion::where('exam_id', $exam)->get();
        // dd($eheckOptions);
        $marks = 0;

        foreach($eheckOptions as $option){
                $ques = Question::findOrFail($option->question_id);
                // $ques->answer == $option->option_no
                if($ques->answer == $option->option_no ){
                    $marks = $marks+1;
                }
        }
        $exams->marks = $marks;
        $exams->save();
        // dd($exams);
        return redirect()->route('indexexam');
    }

    public function indexExam()
    {
       $exams = Exam::with('user')->get();
       return view('exam.index',compact('exams'));
    }
    public function showExam($id)
    {
        $exam = Exam::findOrFail($id);
        return view('exam.show',compact('exam'));
    }
}
