@extends('shared.layout')
@section('title', 'Formulir Survey')
@section('content')

@php
    use App\Enums\ResponseLevel;
@endphp

<div class="m-b:5">
    @include('shared.message')
    
    <div class="box">
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
                <li class="is-active">
                    <a href="#"> Formulir Survey </a>
                </li>
                <li class="is-active">
                    <a href="{{ route('survey-form.show', ['respondent_type' => $respondent_type]) }}" aria-current="page">
                        {{ App\Enums\RespondentType::NAMES[$respondent_type] }}
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <h1 class="title is-1">
        FORMULIR SURVEY
    </h1>
    <h2 class="subtitle">
        {{ App\Enums\RespondentType::NAMES[$respondent_type] }}
    </h2>
    <hr>

    <form method="POST" action="{{ route('response.store', ['respondent_type' => $respondent_type]) }}">
        @csrf

        <div class="box">
            <div class="field">
                <label for="respondent_name" class="label"> Nama: </label>
                <div class="control">
                    <input placeholder="Nama" value="{{ old('respondent_name') }}" type="text" name="respondent_name"class="input {{ $errors->first("respondent_name", "is-danger") }}">
                </div>
                @if($errors->has("respondent_name"))
                <p class="help is-danger"> {{ $errors->first("respondent_name") }} </p>
                @endif
            </div>

            <div class="field">
                <label for="respondent_sex" class="label"> Jenis Kelamin: </label>
                <div class="select">
                    <select name="respondent_sex" id="respondent_sex">
                        <option {{ old('respondent_sex') === 'male' ? 'selected' : '' }} value="male"> Laki-Laki </option>
                        <option {{ old('respondent_sex') === 'female' ? 'selected' : '' }} value="female"> Perempuan </option>
                    </select>
                </div>
            </div>

            <div class="field">
                <label for="respondent_age" class="label"> Usia: </label>
                <div class="control">
                    <input placeholder="Usia" value="{{ old('respondent_age') }}" type="text" name="respondent_age" class="input {{ $errors->first("respondent_age", "is-danger") }}">
                </div>
                @if($errors->has("respondent_age"))
                <p class="help is-danger"> {{ $errors->first("respondent_age") }} </p>
                @endif
            </div>

            <div class="field">
                <label for="respondent_address" class="label"> Alamat: </label>
                <div class="control">
                    <textarea placeholder="Alamat" type="text" name="respondent_address" class="textarea {{ $errors->first("respondent_address", "is-danger") }}">{{ old('respondent_address') }}</textarea>
                </div>
                @if($errors->has("respondent_address"))
                <p class="help is-danger"> {{ $errors->first("respondent_address") }} </p>
                @endif
            </div>

            <div class="field">
                <label for="department" class="label"> Instansi: </label>
                <div class="control">
                    <input placeholder="Instansi" value="{{ old('department') }}" type="text" name="department" class="input {{ $errors->first("department", "is-danger") }}">
                </div>
                @if($errors->has("department"))
                <p class="help is-danger"> {{ $errors->first("department") }} </p>
                @endif
            </div>

            <div class="field">
                <label for="position" class="label"> Jabatan: </label>
                <div class="control">
                    <input placeholder="Jabatan" value="{{ old('position') }}" type="text" name="position" class="input {{ $errors->first("position", "is-danger") }}">
                </div>
                @if($errors->has("position"))
                <p class="help is-danger"> {{ $errors->first("position") }} </p>
                @endif
            </div>

            <div class="field">
                <label for="department_authority_level" class="label"> Tingkat kewenangan instansi: </label>
                <div class="select">
                    <select name="department_authority_level" id="field">
                        <option {{ old('department_authority_level') == 'kabupaten' ? '' : ''  }} value="kabupaten"> Kabupaten/Kota </option>
                        <option {{ old('department_authority_level') == 'provinsi' ? '' : ''  }} value="provinsi"> Provinsi </option>
                        <option {{ old('department_authority_level') == 'pusat' ? '' : ''  }} value="pusat"> Pusat </option>
                    </select>
                </div>
            </div>

            <label class="label is-medium m-t:6 m-b:4">
                Menurut Bapak/Ibu selaku pengambil kebijakan:
            </label>

            <div class="field">
                <label for="difficulties_in_public_trans_impl" class="label"> Kesulitan apa saja yang dihadapi dalam penyelenggaraan angkutan umum? </label>
                <div class="control">
                    <textarea placeholder="Kesulitan apa saja yang dihadapi dalam penyelenggaraan angkutan umum?" type="text" name="difficulties_in_public_trans_impl" class="textarea {{ $errors->first("difficulties_in_public_trans_impl", "is-danger") }}">{{ old('difficulties_in_public_trans_impl') }}</textarea>
                </div>
                @if($errors->has("difficulties_in_public_trans_impl"))
                <p class="help is-danger"> {{ $errors->first("difficulties_in_public_trans_impl") }} </p>
                @endif
            </div>

            <div class="field">
                <label for="wishes_recommendations_for_impl" class="label"> Apa harapan, saran dan usul dalam penyelenggaraan angkutan umum? </label>
                <div class="control">
                    <textarea placeholder="Apa harapan, saran dan usul dalam penyelenggaraan angkutan umum" type="text" name="wishes_recommendations_for_impl" class="textarea {{ $errors->first("wishes_recommendations_for_impl", "is-danger") }}">{{ old('wishes_recommendations_for_impl') }}</textarea>
                </div>
                @if($errors->has("wishes_recommendations_for_impl"))
                <p class="help is-danger"> {{ $errors->first("wishes_recommendations_for_impl") }} </p>
                @endif
            </div>

            <div class="field">
                <label for="recommended_public_trans_type" class="label"> Jenis angkutan umum yang bagaimana yang harusnya dibangun dari sudut pandang pemerintah / pengambil kebijakan? </label>
                <div class="control">
                    <textarea placeholder="Jenis angkutan umum yang bagaimana yang harusnya dibangun dari sudut pandang pemerintah / pengambil kebijakan?" type="text" name="recommended_public_trans_type" class="textarea {{ $errors->first("recommended_public_trans_type", "is-danger") }}">{{ old('recommended_public_trans_type') }}</textarea>
                </div>
                @if($errors->has("recommended_public_trans_type"))
                <p class="help is-danger"> {{ $errors->first("recommended_public_trans_type") }} </p>
                @endif
            </div>

        </div>

        @include('response.shared.survey_form_create')

        <div class="t-a:r">
            <button class="button is-large is-primary">
                Kirim Data
                <i class="fa fa-check"></i>
            </button>
        </div>
    </form>
</div>
@endsection