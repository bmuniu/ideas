@extends('layouts.app')
@section('title', 'Register Staff/Students')

@push('js')
    <script>
        $(function () {
            $('#role').on('change', function () {
                var role = $(this).val();
                var role_name = $(':selected').attr('role');

                if (role != '') {
                    $('#position').removeAttr('disabled');

                    if (role_name == 'Student')
                        $('#position').attr('disabled', 'disabled');
                } else {
                    $('#position').attr('disabled', 'disabled');
                }
            });
        });
    </script>
@endpush

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ url('admin/register/user') }}"><i class="fa fa-users"></i> User Registration</a> <i class="fa fa-angle-right"></i>
            <i class="fa fa-edit"></i> Edit User Details
        </div>

        <div class="panel-body">
            @include('common.success')
            <form class="form-horizontal" method="POST" action="{{ url('admin/user') }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Full Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus/>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required/>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    <label for="role" class="col-md-4 control-label">Role</label>

                    <div class="col-md-6">
                        <select name="role_id" id="role" class="form-control" required>
                            <option value="">--Select--</option>
                            @if(count($roles))
                                @foreach($roles as $role)

                                    <option value="{{ $role->id }}" role="{{ $role->role_name }}" {{ ($role->id == $user->role_id) ? 'selected' : '' }}>
                                        {{ $role->role_name }}</option>

                                @endforeach
                            @endif
                        </select>

                        @if ($errors->has('role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                    <label for="position" class="col-md-4 control-label">Position</label>

                    <div class="col-md-6">
                        <select name="position" id="position" class="form-control" {{ ($user->role->role_name != 'Staff') ? 'disabled' : '' }}>
                            <option value="">--Select--</option>
                            <option value="{{ $cordinator }}" {{ ($cordinator == $user->position) ? 'selected' : '' }}>{{ $cordinator }}</option>
                            <option value="{{ $qa_am }}" {{ ($qa_am == $user->position) ? 'selected' : '' }}>{{ $qa_am }}</option>
                        </select>

                        @if ($errors->has('position'))
                            <span class="help-block">
                                <strong>{{ $errors->first('position') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{--hidden fields--}}
                <input type="hidden" name="id" value="{{ $user->id }}"/>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Save Changes
                        </button>

                        {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                        {{--Forgot Your Password?--}}
                        {{--</a>--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection