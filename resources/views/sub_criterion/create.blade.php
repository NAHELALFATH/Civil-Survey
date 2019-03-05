@extends('shared.layout')
@section('title', 'Tambah Sub Kriteria')
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
                    Sub Kriteria
                </a>
            </li>

            <li class="is-active">
                <a href="{{ route('master.criterion.create', $criterion->type) }}" aria-current="page">
                    Tambah Sub Kriteria
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="title">
        Tambah Sub Kriteria
    </h1>

    <div class="box">
        <form action="{{ route('master.sub-criterion.store', $criterion) }}" method="POST">
            @csrf

            <div class="field">
                <label for="name" class="label"> Nama Sub Kriteria: </label>
                <div class="control">
                    <input placeholder="Nama Sub Kriteria" value="{{ old('name') }}" type="text" name="name" class="input {{ $errors->first("name", "is-danger") }}">
                </div>
                @if($errors->has("name"))
                <p class="help is-danger"> {{ $errors->first("name") }} </p>
                @endif
            </div>

            <div class="t-a:r">
                <button class="button is-primary is-small">
                    <span>
                        Tambah Sub Kriteria
                    </span>
                    <span class="icon is-small">
                        <i class="fa fa-plus"></i>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection