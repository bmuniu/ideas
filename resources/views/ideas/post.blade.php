@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-comment"></i> Post Idea
        </div>

        <div class="panel-body">
            @include('common.error')
            <form action="{{ url('post/idea') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                    <label for="department_id" class="col-md-4 control-label">Department</label>

                    <div class="col-md-6">
                        <select name="department_id" class="form-control" required>
                            <option value="">--Select--</option>
                            @if(count($departments))
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            @endif
                        </select>

                        @if ($errors->has('department_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('department_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('idea_category_id') ? ' has-error' : '' }}">
                    <label for="category" class="col-md-4 control-label">Category</label>

                    <div class="col-md-6">
                        <select name="idea_category_id" id="category" class="form-control" required>
                            <option value="">--Select Category--</option>
                            @if(count($categories))
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            @endif
                        </select>

                        @if ($errors->has('idea_category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idea_category_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('idea') ? ' has-error' : '' }}">
                    <label for="idea" class="col-md-4 control-label">Idea</label>

                    <div class="col-md-6">
                        <textarea name="idea" id="idea" rows="5" class="form-control" required></textarea>

                        @if ($errors->has('idea'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idea') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                    <label for="document" class="col-md-4 control-label">Upload Document</label>

                    <div class="col-md-6">
                        <input type="file" name="document" id="document" class="form-control"/>

                        @if ($errors->has('document'))
                            <span class="help-block">
                                <strong>{{ $errors->first('document') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="anonymous" {{ old('remember') ? 'checked' : '' }}> Post Anonymously
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="agree" {{ old('remember') ? 'checked' : '' }}> Agree to Terms and Conditions
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                             Post Idea
                        </button>
                    </div>
                </div>
                </form>

        </div>
    </div>
@endsection
