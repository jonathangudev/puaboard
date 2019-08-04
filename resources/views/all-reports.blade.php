@extends('layouts.app')


@section('styles')
#overflow {
height: 200px;
overflow: hidden;
}
@endsection

@section('content')

@php
$fieldReports = $allFieldReports;
@endphp

<div class="container">

    @foreach($fieldReports as $fieldReport)

    <div class="row justify-content-center">


        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">{{$fieldReport->title}}</div>

                <div class="card-body overflow">
                    {{$fieldReport->created_at}}

                    <p />
                    <p />

                    {!! $fieldReport->content !!}
                </div>
                <a href="/field-report/{{$fieldReport->id}}">Continue Reading...</a>
            </div>
        </div>

    </div>
    @endforeach

</div>
@endsection