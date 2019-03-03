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

            <li class="is-active">
                <a href="">
                    {{ App\Enums\RespondentType::NAMES[$criterion->type->respondent_type] }}
                </a>
            </li>

            <li>
                <a href="{{ route('master.type.index', ['respondent_type' => $criterion->type->respondent_type]) }}">
                    Tipe {{ $criterion->type->name }} </a>
            </li>
            <li>
                <a href="{{ route('master.criterion.index', $criterion->type_id) }}" aria-current="page">
                    Kriteria {{ $criterion->name }}
                </a>
            </li>
            <li class="is-active">
                <a href="{{ route('master.criterion.index', $criterion) }}">
                    Sub Kriteria
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="title">
        Sub Kriteria
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