@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('users.create') }}">
            Add Student
        </a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Student List
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-User">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>

                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                       
                        
                        <a class="btn btn-xs btn-info" href="{{ route( 'users.edit', $user->id) }}">
                            Edit
                        </a>
                      
                      
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are You Sure');" style="display: inline-block;">
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