@extends('shared.layout')
@section('title', 'Kriteria')
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
                    {{ App\Enums\RespondentType::NAMES[$type->respondent_type] }}
                </a>
            </li>
            
            <li>
                <a href="{{ route('master.type.index', ['respondent_type' => $type->respondent_type]) }}">
                    Tipe {{ $type->name }}
                </a>
            </li>

            <li class="is-active">
                <a href="{{ route('master.criterion.index', $type) }}" aria-current="page">
                    Kriteria
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="title">
        Kriteria
    </h1>

    <div class="t-a:r m-y:3">
        <a href="{{ route('master.criterion.create', $type) }}" class="button is-small is-dark">
            <span>
                Tambah Kriteria
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
            @foreach ($type->criteria as $criterion)
            <tr>
                <td> {{ $loop->iteration }}. </td>
                <td> {{ $criterion->name }} </td>
                <td>
                    <a href="{{ route('master.sub-criterion.index', $criterion) }}" class="button is-dark is-small">
                        <span>
                            Sub Kriteria
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-list"></i>
                        </span>
                    </a>

                    <a href="{{ route("master.criterion.edit", $criterion) }}" class="button is-small is-dark">
                        <span>
                            Edit
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-pencil"></i>
                        </span>
                    </a>

                    @if($criterion->is_deletable)
                    <form class="d:i-b" method="POST" action="{{ route('master.criterion.delete', $criterion) }}">
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

    @if($type->criteria->count() == 0)
    <article class="message is-warning">
        <div class="message-body">
            <i class="fa fa-warning"></i>
            @lang("messages.no_data")
        </div>
    </article>
    @endif
</div>
@endsection