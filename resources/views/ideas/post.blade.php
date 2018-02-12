@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-list"></i> Ideas
        </div>

        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('post/idea') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Category</label>
                                    <select name="category" class="form-control">
                                        <option value="">--Select Category--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Idea</label>
                                    <textarea class="form-control" name="post" id="exampleInputEmail1"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="document">Document</label>
                                    <input type="file" name="document" id="document"/>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Anonymous</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Agree to Terms and Condition</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Idea</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="qa-message-list" id="wallmessages">
                        @if (count($ideas))
                            @foreach($ideas as $idea)

                            <div class="message-item" id="m2" style="width: 66%;">
                            <div class="message-inner">
                                <div class="message-head clearfix">
                                    <div class="avatar pull-left"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko"><img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a></div>
                                    <div class="user-detail">
                                        <h5 class="handle">Oleg Kolesnichenko</h5>
                                        <div class="post-meta">
                                            <div class="asker-meta">
                                                <span class="qa-message-what"></span>
                                                <span class="qa-message-when">
												<span class="qa-message-when-data">{{ date('F d, Y', strtotime($idea->created_at)) }}</span>
											</span>
                                                <span class="qa-message-who">
												<span class="qa-message-who-pad">by </span>
												<span class="qa-message-who-data"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko">Oleg Kolesnichenko</a></span>
											</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="qa-message-content">
                                    {{ $idea->idea }}
                                </div>
                            </div>
                        </div>

                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
