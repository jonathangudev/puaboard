@extends('layouts.app')


@section
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

                <div class="card-body">
                    {{$fieldReport->created_at}}

                    <p />
                    <p />

                    {!! $fieldReport->content !!}
                </div>
            </div>
        </div>

    </div>
    @endforeach

</div>
@endsection