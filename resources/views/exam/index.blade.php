@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        @if(auth()->user()->role->title != 'Admin')
        <a class="btn btn-success" href="{{ route('exam') }}">
           Give Test
        </a>
        @endif
    </div>
</div>
<div class="card">
    <div class="card-header">
        Exam List
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-User">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                       User
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                       Marks
                    </th>

                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($exams as $exam)
                <tr>
                    <td>{{$exam->id}}</td>
                    <td>{{$exam->user->name}}</td>
                    <td>{{$exam->date}}</td>
                    <td>{{$exam->marks}}</td>
                    <td>
                       
                        
                        <a class="btn btn-xs btn-primary" href="{{ route( 'showexam', $exam->id) }}">
                            View
                        </a>
                      
                       
                       
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