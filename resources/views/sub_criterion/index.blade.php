@extends('shared.layout')
@section('title', 'Sub Kriteria')
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

            <li>
                <a href="{{ route("master.type.index", compact("respondent_type")) }}">
                    {{ App\Enums\RespondentType::NAMES[$respondent_type] }}
                </a>
            </li>

            <li>
                <a href="{{ route('master.criterion.index', $criterion->type) }}">
                    Tipe {{ $criterion->type->name }}
                </a>
            </li>

            <li class="is-active">
                <a href="#">
                    Sub Kriteria
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="title">
        Sub Kriteria
    </h1>

    <div class="t-a:r m-y:3">
        <a href="{{ route('master.sub-criterion.create', $criterion) }}" class="button is-small is-dark">
            <span>
                Tambah Sub Kriteria
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
            @foreach ($criterion->sub_criteria as $sub_criterion)
            <tr>
                <td> {{ $loop->iteration }}. </td>
                <td> {{ $sub_criterion->name }} </td>
                <td>
                    <a href="{{ route("master.alternative.index", $sub_criterion) }}" class="button is-dark is-small">
                        <span>
                            Alternatif
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-list"></i>
                        </span>
                    </a>

                    <a href="{{ route("master.sub-criterion.edit", $sub_criterion) }}" class="button is-dark is-small">
                        <span>
                            Edit
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-pencil"></i>
                        </span>
                    </a>

                    @if($sub_criterion->is_deletable)
                    <form method='POST' class="d:i-b m-l:3" action='{{ route('master.sub-criterion.delete', $sub_criterion) }}'>
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