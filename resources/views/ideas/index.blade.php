@extends('layouts.app')
@section('title', 'Dashboard')

@push('css')
    <style>
        .message-item {
            margin-bottom: 25px;
            margin-left: 40px;
            position: relative;
        }
        .message-item .message-inner {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 10px;
            position: relative;
        }
        .message-item .message-inner:before {
            border-right: 10px solid #ddd;
            border-style: solid;
            border-width: 10px;
            color: rgba(0,0,0,0);
            content: "";
            display: block;
            height: 0;
            position: absolute;
            left: -20px;
            top: 6px;
            width: 0;
        }
        .message-item .message-inner:after {
            border-right: 10px solid #fff;
            border-style: solid;
            border-width: 10px;
            color: rgba(0,0,0,0);
            content: "";
            display: block;
            height: 0;
            position: absolute;
            left: -18px;
            top: 6px;
            width: 0;
        }
        .message-item:before {
            background: #fff;
            border-radius: 2px;
            bottom: -30px;
            box-shadow: 0 0 3px rgba(0,0,0,0.2);
            content: "";
            height: 100%;
            left: -30px;
            position: absolute;
            width: 3px;
        }
        .message-item:after {
            background: #fff;
            border: 2px solid #ccc;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            content: "";
            height: 15px;
            left: -36px;
            position: absolute;
            top: 10px;
            width: 15px;
        }
        .clearfix:before, .clearfix:after {
            content: " ";
            display: table;
        }
        .message-item .message-head {
            border-bottom: 1px solid #eee;
            margin-bottom: 8px;
            padding-bottom: 8px;
        }
        .message-item .message-head .avatar {
            margin-right: 20px;
        }
        .message-item .message-head .user-detail {
            overflow: hidden;
        }
        .message-item .message-head .user-detail h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }
        .message-item .message-head .post-meta {
            float: left;
            padding: 0 15px 0 0;
        }
        .message-item .message-head .post-meta >div {
            color: #333;
            font-weight: bold;
            text-align: right;
        }
        .post-meta > div {
            color: #777;
            font-size: 12px;
            line-height: 22px;
        }
        .message-item .message-head .post-meta >div {
            color: #333;
            font-weight: bold;
            text-align: right;
        }
        .post-meta > div {
            color: #777;
            font-size: 12px;
            line-height: 22px;
        }
        img {
            min-height: 40px;
            max-height: 40px;
        }
    </style>
@endpush
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-list"></i> Ideas Timeline
        </div>

        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <div class="qa-message-list" id="wallmessages">
                        @if (count($ideas))
                            @foreach($ideas as $idea)

                                <div class="message-item" id="m2" style="width: 66%;">
                                    @include('common.success')
                                    @include('common.error')
                                    <div class="message-inner">
                                        <div class="message-head clearfix">
                                            <div class="avatar pull-left"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko"><img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a></div>
                                            <div class="user-detail">
                                                @if(!$idea->anonymous)
                                                    <h5 class="handle">{{ $idea->user->name }}</h5>
                                                @else
                                                    <h5 class="handle">Anonymous</h5>
                                                @endif
                                                <div class="post-meta">
                                                    <div class="asker-meta">
                                                        <span class="qa-message-what"></span>
                                                        <span class="qa-message-when">
                                                            <span class="qa-message-when-data">{{ date('F d, Y', strtotime($idea->created_at)) }}</span>
                                                        </span>

                                                        @if(!empty($idea->document_file))
                                                            <span class="qa-message-who">
                                                                <span class="qa-message-who-data">
                                                                    <a href="{{ url('download/doc/' . $idea->id) }}" class="btn btn-info btn-xs" data-toggle="tooltip" title="Download Attached Document">
                                                                        <i class="fa fa-download"></i></a>
                                                                </span>
                                                            </span>
                                                        @endif

                                                    </div>
                                                    <p></p>
                                                    <div class="pull-left">
                                                        @php
                                                            if ($likes = \App\IdeaReaction::reactionExists(true, $idea->id, auth()->user()->id))
                                                                $liked = 'btn-danger';
                                                            else
                                                                $liked = 'btn-default';

                                                            if ($dislikes = \App\IdeaReaction::reactionExists(false, $idea->id, auth()->user()->id))
                                                                $disliked = 'btn-danger';
                                                            else
                                                                $disliked = 'btn-default';
                                                        @endphp
                                                        <a href="{{ url('idea/thumbs/'. $idea->id .'/1') }}" class="btn btn-xs {{ $liked }}">
                                                            <i class="fa fa-thumbs-up fa-2x"></i> {{ $likes }}
                                                        </a>
                                                        <a href="{{ url('idea/thumbs/'. $idea->id .'/0') }}" class="btn btn-xs {{ $disliked }}">
                                                            <i class="fa fa-thumbs-down fa-2x"></i> {{ $dislikes }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qa-message-content">
                                            {{ $idea->idea }}
                                        </div>
                                        <hr/>Comments
                                        @if(count($idea->comments))
                                            @foreach($idea->comments as $comment)
                                                <blockquote>
                                                    {{ $comment->comment }}
                                                    <b style="font-size: small">by {{ (!$comment->anonymous) ? $comment->user->name : 'Anonymous' }}</b>
                                                </blockquote>
                                            @endforeach
                                        @endif
                                        <form action="{{ url('comment/'. $idea->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <textarea class="form-control" name="comment" placeholder="Add Comment"></textarea>
                                            <input type="checkbox" name="anonymous"/> Anonymous
                                            <p></p>
                                            <button class="btn btn-primary">Comment</button>
                                        </form>
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