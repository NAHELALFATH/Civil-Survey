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
                    <a href="{{ route('master.sub-criterion.index', $criterion) }}" class="button is-dark is-small">
                        <span>
                            Sub Kriteria
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-list"></i>
                        </span>
                    </a>

                    <form class="d:i-b" method="POST" action="{{ route('master.sub-criterion.delete', $criterion) }}">
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