@extends('shared.layout')
@section('title', 'Edit Kriteria')
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
                    Edit Kriteria
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="title">
        Edit Kriteria
    </h1>

    <div class="box">
        <form action="{{ route('master.criterion.update', $criterion) }}" method="POST">
            @csrf

            <div class="field">
                <label for="name" class="label"> Nama Kriteria: </label>
                <div class="control">
                    <input placeholder="Nama Kriteria" value="{{ old('name', $criterion->name) }}" type="text" name="name" class="input {{ $errors->first("name", "is-danger") }}">
                </div>
                @if($errors->has("name"))
                <p class="help is-danger"> {{ $errors->first("name") }} </p>
                @endif
            </div>

            <div class="t-a:r">
                <button class="button is-primary is-small">
                    <span>
                        Ubah Kriteria
                    </span>
                    <span class="icon is-small">
                        <i class="fa fa-check"></i>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection