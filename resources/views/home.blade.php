@extends('layouts.app')

@php
$fieldReports = $allFieldReports;
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">

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

        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">My Field Reports</div>

                @php

                $fieldReports = $fieldReports->sortByDesc('created_at');


                @endphp

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($fieldReports as $fieldReport)
                        <li class="list-group-flush">{{$fieldReport->created_at}} - <a href="/field-report/{{$fieldReport->id}}">{{$fieldReport->title}}</a></li>
                        @endforeach
                        <ul>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection