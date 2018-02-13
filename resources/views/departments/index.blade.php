@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-building"></i> Departments</div>

        <div class="panel-body">
            @include('common.success')
            @include('common.error')
            <form class="form-horizontal" method="POST" action="{{ url('admin/department') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('department_name') ? ' has-error' : '' }}">
                    <label for="department_name" class="col-md-4 control-label">Department Name</label>

                    <div class="col-md-6">
                        <input id="department_name" type="text" class="form-control" name="department_name" value="{{ old('department_name') }}" required autofocus/>

                        @if ($errors->has('department_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('department_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('qa_cordinator') ? ' has-error' : '' }}">
                    <label for="qa-cordinator" class="col-md-4 control-label">QA Cordinator</label>

                    <div class="col-md-6">
                        <select name="qa_cordinator" class="form-control" required>
                            <option value="">--Select--</option>
                            @if(count($cordinators))
                                @foreach($cordinators as $cordinator)
                                    <option value="{{ $cordinator->id }}">{{ $cordinator->name }}</option>
                                @endforeach
                            @endif
                        </select>

                        @if ($errors->has('department_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('department_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Add
                        </button>

                        {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                        {{--Forgot Your Password?--}}
                        {{--</a>--}}
                    </div>
                </div>
            </form>
        </div>
    </div>

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
                    <th>Actions</th>
                </thead>
                <tbody>
                    @if(count($departments))

                        @foreach($departments as $department)

                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->department_name }}</td>
                                <td>{{ $department->user->name }}</td>
                                <td><a href="{{ url('admin/department/' . $department->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete Department">
                                        <i class="fa fa-trash"></i>
                                    </a></td>
                            </tr>

                        @endforeach

                    @else
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-center">No Departments found!</th>
                            </tr>
                        </tfoot>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
