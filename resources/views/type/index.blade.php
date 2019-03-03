@extends('shared.layout')
@section('title', 'Manajemen Tipe')
@section('content')

<div class="m-b:5">
    @include('shared.message')
    <nav class="breadcrumb box" aria-label="breadcrumbs">
        <ul>
            <li class="is-active">
                <a href="#">
                    Master Data
                </a>
            </li>

            <li class="is-active">
                <a href="">
                    {{ App\Enums\RespondentType::NAMES[$respondent_type] }}
                </a>
            </li>

            <li class="is-active"><a href="{{ route('type.index') }}" aria-current="page"> Manajemen Tipe </a></li>
        </ul>
    </nav>

    <h1 class="title">
        Manajemen Tipe
    </h1>

    <table class="table is-bordered">
        <thead>
            <tr>
                <th> No. </th>
                <th> Nama Tipe </th>
                <th> Kendali </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($types as $type)
            <tr>
                <td> {{ $loop->iteration }}. </td>
                <td> {{ $type->name }} </td>
                <td>
                    <a href="{{ route('criterion.index', $type) }}" class="button is-dark is-small">
                        <span>
                            Kriteria
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-list"></i>
                        </span>
                    </a>

                    <form
                        class="d:i-b"
                        action="{{ route('type.delete', $type) }}"
                        method="POST"
                    >
                        @csrf
                        <button class="button is-small is-danger">
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