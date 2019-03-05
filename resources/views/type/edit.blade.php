@extends('shared.layout')
@section('title', 'Tambah Tipe')
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

            <li><a href="{{ route('master.type.index') }}" aria-current="page"> Tipe </a></li>
            <li class="is-active"><a href="{{ route('master.type.index') }}" aria-current="page"> Edit Tipe </a></li>

        </ul>
    </nav>

    <h1 class="title">
        Tambah Tipe
    </h1>

    <div class="box">
        <form action="{{ route('master.type.update', ["type" => $type, "respondent_type" => $respondent_type]) }}" method="POST">
            @csrf

            <div class="field">
                <label for="name" class="label"> Nama Tipe: </label>
                <div class="control">
                    <input placeholder="Nama Tipe" value="{{ old('name', $type->name) }}" type="text" name="name" class="input {{ $errors->first("name", "is-danger") }}">
                </div>
                @if($errors->has("name"))
                <p class="help is-danger"> {{ $errors->first("name") }} </p>
                @endif
            </div>

            <div class="t-a:r">
                <button class="button is-primary is-small">
                    <span>
                        Ubah Tipe
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