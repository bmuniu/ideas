@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-list"></i> Departments

        </div>

        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <th>Department#</th>
                    <th>Department Name</th>
                    <th><i class="fa fa-user"></i> QA Cordinator</th>
                </thead>
                <tbody>
                    @if(count($departments))

                        @foreach($departments as $department)

                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->department_name }}</td>
                                <td>{{ $department->user->name }}</td>
                            </tr>

                        @endforeach

                    @else
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-center">No Departments found!</th>
                            </tr>
                        </tfoot>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
