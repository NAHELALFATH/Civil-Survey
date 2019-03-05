@extends('shared.layout')
@section('title', 'Edit Kriteria')
@section('content')

<div class="m-b:5">
    @include('shared.message')
    <nav class="breadcrumb box" aria-label="breadcrumbs">
        <ul>
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
                    Tipe {{ $criterion->type->name }}
                </a>
            </li>
            
            <li>
                <a href="{{ route('master.criterion.index', $criterion->type) }}" aria-current="page">
                    Kriteria
                </a>
            </li>

            <li class="is-active">
                <a href="{{ route('master.criterion.edit', $criterion->type) }}" aria-current="page">
                    Edit Kriteria
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="title">
        Edit Kriteria
    </h1>

    <div class="box">
        <form action="{{ route('master.criterion.update', $criterion->type) }}" method="POST">
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