@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Test
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                           #ID
                        </th>
                        <td>
                            {{ $exam->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            User
                        </th>
                        <td>
                            {{ $exam->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Marks
                        </th>
                        <td>
                            {{ $exam->marks }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection