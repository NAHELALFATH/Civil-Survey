@extends('shared.layout')
@section('title', 'Tipe')
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

            <li class="is-active"><a href="{{ route('master.type.index') }}" aria-current="page"> Tipe </a></li>
        </ul>
    </nav>

    <h1 class="title">
        Tipe
    </h1>

    <div class="t-a:r m-y:3">
        <a href="{{ route('master.type.create') }}" class="button is-small is-dark">
            <span>
                Tambah Tipe
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
                    <a href="{{ route('master.criterion.index', $type) }}" class="button is-dark is-small">
                        <span>
                            Kriteria
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-list"></i>
                        </span>
                    </a>

                    <a href="{{ route('master.type.edit', $type) }}" class="button is-dark is-small">
                        <span>
                            Edit
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-pencil"></i>
                        </span>
                    </a>

                    @if($type->is_deletable)
                    <form
                        class="m-l:3 d:i-b"
                        action="{{ route('master.type.delete', $type) }}"
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
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($types->count() == 0)
    <article class="message is-warning">
        <div class="message-body">
            <i class="fa fa-warning"></i>
            @lang("messages.no_data")
        </div>
    </article>
    @endif


</div>
@endsection