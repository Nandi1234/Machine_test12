@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Exam
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('examSave',$exam->id)}}" enctype="multipart/form-data">
            @csrf
            @php
            $ques=[];
            @endphp
            @foreach($questions as $ind => $question)
            @php
            array_push($ques,$question->id);
            @endphp
            <input type="hidden" name="question_ids[]" value="{{$question->id}}">
            
            <div class="row">
                <div class="col-md-1">
                    {{$ind+1}} )
                </div>
                <div class="col-md-7">
                    <p>{{$question->question}}</p>
                </div>
            </div>
            @for ($i = 1; $i <= 4; $i++) <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        @php
                        $index = 'option'.$i;
                        $opt = $question[$index];
                        @endphp
                        <p>{{$i}} :{{$opt}}</p>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check pt-3">
                            <input class="form-check-input" type="radio" name="{{$question->id}}" value="{{$i}}" required>

                        </div>
                    </div>
                </div>
    </div>
    @endfor
    @endforeach
    <div class="form-group">
        <button class="btn btn-danger" type="submit">
            Save
        </button>
    </div>
    </form>
</div>
</div>



@endsection