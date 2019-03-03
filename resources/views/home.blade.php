@extends('shared.layout')
@section('title', 'Home')
@section('content')

<div class="container p-x:5 m-y:5">
    @include('shared.message')
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li> <a href="#"> {{ config('app.name') }} </a> </li>
            <li class="is-active"><a href="" aria-current="page"> Whatever </a></li>
        </ul>
    </nav>

    <h1 class="title">
        Lorem Ipsum
    </h1>
</div>
@endsection