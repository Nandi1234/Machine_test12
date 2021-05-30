@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('questions.create') }}">
            Add Question
        </a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Questions List
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-User">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Question
                    </th>
                    <th>
                        Answer
                    </th>

                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                <tr>
                    <td>{{$question->id}}</td>
                    <td>{{$question->question}}</td>
                    <td>Option {{$question->answer}}</td>
                    <td>
                       
                        
                        <a class="btn btn-xs btn-info" href="{{ route( 'questions.edit', $question->id) }}">
                            Edit
                        </a>
                        <a class="btn btn-xs btn-primary" href="{{ route( 'questions.show', $question->id) }}">
                            View
                        </a>
                      
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Are You Sure');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                        </form>
                       
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
@endsection