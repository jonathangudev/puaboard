@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">Comments</div>

                <div class="card-body">
                    @foreach($comments as $comment)
                    <li>{{$comment->id}} - {{$comment->created_at}} - {{$comment->content}}</li>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
</div>

@endsection