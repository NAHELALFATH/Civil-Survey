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

    <div class="box">
        <form action="{{ route('master.sub-criterion.update', $sub_criterion) }}" method="POST">
            @csrf

            <div class="field">
                <label for="name" class="label"> Nama Sub Kriteria: </label>
                <div class="control">
                    <input placeholder="Nama Sub Kriteria" value="{{ old('name', $sub_criterion->name) }}" type="text" name="name" class="input {{ $errors->first("name", "is-danger") }}">
                </div>
                @if($errors->has("name"))
                <p class="help is-danger"> {{ $errors->first("name") }} </p>
                @endif
            </div>

            <div class="t-a:r">
                <button class="button is-primary is-small">
                    <span>
                        Ubah Sub Kriteria
                    </span>
                    <span class="icon is-small">
                        <i class="fa fa-pencil"></i>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection