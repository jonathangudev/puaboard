@extends('layouts.app')

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

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Write a new Field Report</div>

                <div class="card-body">
                    <form action="/field-report/create" method="POST">
                        @csrf

                        <label for="title">Title</label>
                        <input type="text" name="title">
                        <label for="content">Content</label>
                        <input type="text" name="content" rows="10">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection