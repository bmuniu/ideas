@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-dashboard"></i> Dashboard</div>

        <div class="panel-body">
            @if (auth()->user()->role->role_name == 'Staff')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Ideas Per Department</th>
                    </tr>
                    <tr>
                        <th>Deparment</th>
                        <th>No of Ideas</th>
                    </tr>
                </thead>
                <thead>
                    @if((count($departments)))
                        @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->department_name }}</td>
                                <td>{{ $department->no }}</td>
                            </tr>
                        @endforeach
                    @endif
                </thead>
            </table>
            @else
            <h3>Welcome</h3>
            @endif
        </div>
    </div>
@endsection
