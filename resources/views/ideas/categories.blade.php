@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-list"></i> Idea Categories</div>

        <div class="panel-body">
            @include('common.success')
            @include('common.error')
            <form class="form-horizontal" method="POST" action="{{ url('qa-manager/idea/category') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                    <label for="category_name" class="col-md-4 control-label">Category Name</label>

                    <div class="col-md-6">
                        <input id="category_name" type="text" class="form-control" name="category_name" value="{{ old('category_name') }}" required autofocus/>

                        @if ($errors->has('category_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_name') }}</strong>
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
                <th>Category#</th>
                <th>Category Name</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @if(count($categories))

                    @foreach($categories as $category)

                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <a href="{{ url('qa-manager/idea/category/' . $category->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete Category">
                                    <i class="fa fa-trash"></i>
                                </a></td>
                        </tr>

                @endforeach

                @else
                    <tfoot>
                    <tr>
                        <th colspan="3" class="text-center">No Idea Categories found!</th>
                    </tr>
                    </tfoot>
                    @endif
                    </tbody>
            </table>
        </div>
    </div>
@endsection
