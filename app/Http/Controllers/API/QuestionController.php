<?php

namespace App\Http\Controllers\API;

use App\Exam;
use App\ExamQuestion;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index()
    {

        $ques = Question::all();
        
        $questions  = Question::inRandomOrder()->limit(5)->get();
        // dd($question);
        $exam = Exam::create([
            'user_id' => 2,
            'date' => date('Y-m-d'),
        ]);
        foreach ($questions as $question) {
            $examQuestion  = ExamQuestion::create([
                'exam_id' => $exam->id,
                'question_id' => $question->id
            ]);
        }
        return response()->json([
            'data' => ['questions' => $questions, 'exam' => $exam]
        ]);
    }

    public function saveExam(Request $request, $exam)
    {

        $validator = Validator::make($request->all(), [
            'question_ids' => 'required|array|min:5|max:5',
           
        ]);
        if ($validator->fails()) {
            return response()->json(['msg' => 'You have a validation error', 'data' => $validator->errors(), 'error' => true], 400);
        }
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
        $exam = Exam::findOrFail($exam);
        return response()->json([
            'data'=> ['exam'=>$exam],
            'code' => 200
        ]);
    }

    public function questionStore(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'answer' => 'required',
        ]);
        $question = Question::create(request()->all());
        $questions = Question::all();
        return response()->json([
            'data'=> ['questions'=>$questions],
            'code' => 200
        ]);
        
   
    }

    public function allQuestions()
    {
        $questions = Question::all();
        return response()->json([
            'data'=> ['questions'=>$questions],
            'code' => 200
        ]);  
    }

    public function updateQuestion(Request $request,$id)
    {
        $validated = $request->validate([
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'answer' => 'required',
        ]);
        $question = Question::findOrFail($id);
        $question = $question->update(request()->all()); 
        $questions = Question::all();
        return response()->json([
            'data'=> ['questions'=>$questions],
            'code' => 200
        ]);
    }
}
