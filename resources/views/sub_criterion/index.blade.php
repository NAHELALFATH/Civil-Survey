@extends('shared.layout')
@section('title', 'Manajemen Sub Kriteria')
@section('content')

<div class="container p-x:5 m-y:5">
    @include('shared.message')
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li> <a href="#"> {{ config('app.name') }} </a> </li>
            <li> <a href="{{ route('type.index') }}"> Manajemen Tipe </a> </li>
            <li>
                <a href="{{ route('criterion.index', $criterion->type_id) }}" aria-current="page">
                    Manajemen Kriteria
                </a>
            </li>
            <li class="is-active">
                <a href="{{ route('sub-criterion.index', $criterion) }}">
                    Manajemen Sub Kriteria
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="title">
        Manajemen Sub Kriteria
    </h1>

    <table class="table is-bordered">
        <thead>
            <tr>
                <th> No. </th>
                <th> Nama </th>
                <th> Kendali </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($criterion->sub_criteria as $sub_criterion)
            <tr>
                <td> {{ $loop->iteration }}. </td>
                <td> {{ $sub_criterion->name }} </td>
                <td>  </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection