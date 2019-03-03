@extends('shared.layout')
@section('title', 'Manajemen Kriteria')
@section('content')

<div class="container p-x:5 m-y:5">
    @include('shared.message')
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li> <a href="#"> {{ config('app.name') }} </a> </li>
            <li> <a href="{{ route('type.index') }}"> Manajemen Tipe </a> </li>
            <li class="is-active">
                <a href="{{ route('criterion.index', $type) }}" aria-current="page">
                    Manajemen Kriteria
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="title">
        Manajemen Kriteria
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
            @foreach ($type->criteria as $criterion)
            <tr>
                <td> {{ $loop->iteration }}. </td>
                <td> {{ $criterion->name }} </td>
                <td>
                    <a href="{{ route('sub-criterion.index', $criterion) }}" class="button is-dark is-small">
                        <span>
                            Sub Kriteria
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-list"></i>
                        </span>
                    </a>

                    <form class="d:i-b" method="POST" action="{{ route('criterion.delete', $criterion) }}">
                        @csrf
                        <button class="button is-danger is-small">
                            <span>
                                Hapus
                            </span>
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection