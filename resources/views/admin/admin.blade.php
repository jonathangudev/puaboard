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
                    <div class="row my-2">
                        <div class="col-9">{{$fieldReport->id}} - {{$fieldReport->created_at}} - {{$fieldReport->title}}</div>

                        <div class="col-3">
                            @if($fieldReport->approved)
                            <button disabled class="btn btn-secondary btn-sm" style="width: 66px" value="">Posted</button>

                            @else
                            <form action="/field-report/approve/{{$fieldReport->id}}" method="POST"> @csrf <input type="submit" class="btn btn-primary btn-sm" value="Approve"></form>
                            @endif
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

@endsection