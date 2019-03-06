@extends('shared.layout')
@section('title', 'Alternatif')
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
                    {{ App\Enums\RespondentType::NAMES[$sub_criterion->criterion->type->respondent_type] }}
                </a>
            </li>

            <li>
                <a href="{{ route('master.type.index', ['respondent_type' => $sub_criterion->criterion->type->respondent_type]) }}">
                    Tipe {{ $sub_criterion->criterion->type->name }} </a>
            </li>
            <li>
                <a href="{{ route('master.criterion.index', $sub_criterion->criterion->type_id) }}" aria-current="page">
                    Kriteria {{ $sub_criterion->criterion->name }}
                </a>
            </li>
            <li>
                <a href="{{ route('master.sub-criterion.index', $sub_criterion->criterion) }}">
                    Sub Kriteria {{ $sub_criterion->name }}
                </a>
            </li>
            <li>
                <a href="{{ route('master.alternative.index', $sub_criterion) }}">
                    Alternatif
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="title">
        Alternatif
    </h1>

    <div class="t-a:r m-y:3">
        <a href="{{ route('master.alternative.create', $sub_criterion) }}" class="button is-small is-dark">
            <span>
                Tambah Alternatif
            </span>
            <span class="icon is-small">
                <i class="fa fa-plus"></i>
            </span>
        </a>
    </div>

    <table class="table is-bordered is-fullwidth">
        <thead>
            <tr>
                <th> No. </th>
                <th> Nama </th>
                <th> Kendali </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sub_criterion->alternatives as $alternative)
            <tr>
                <td> {{ $loop->iteration }}. </td>
                <td> {{ $alternative->name }} </td>
                <td>
                    <a href="{{ route("master.alternative.edit", $alternative) }}" class="button is-dark is-small">
                        <span>
                            Edit
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-pencil"></i>
                        </span>
                    </a>

                    @if($alternative->is_deletable)
                    <form method='POST' action='{{ route('master.alternative.delete', $alternative) }}'>
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
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection