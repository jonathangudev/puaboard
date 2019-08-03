@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">{{$fieldReport->title}}</div>

                <div class="card-body">
                    {{$fieldReport->created_at}}

                    <p>

                        {{$fieldReport->content}}
                </div>

            </div>

        </div>

    </div>
</div>
@endsection