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

        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">Field Reports</div>

                <div class="card-body">
                    @foreach($fieldReports as $fieldReport)
                    <div class="row">
                        <div class="col-9">{{$fieldReport->id}} - {{$fieldReport->created_at}} - {{$fieldReport->title}}</div>
                        <div class="col-3">
                            <form action="/field-report/approve/{{$fieldReport->id}}" method="POST"><input type="button" class="btn btn-primary" value="Approve"></form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

@endsection