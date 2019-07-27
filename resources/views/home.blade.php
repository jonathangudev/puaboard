@extends('layouts.app')

@php
$fieldReports = $allFieldReports;
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">Write a new Field Report</div>

                <div class="card-body">
                    <form action="/field-report/create" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" type="text" name="title">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" type="text" name="content" rows="10"></textarea>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>


        @foreach($fieldReports as $fieldReport)
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">{{$fieldReport->title}}</div>

                <div class="card-body">
                    {{$fieldReport->content}}
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection