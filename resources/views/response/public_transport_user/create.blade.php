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
                <label for="respondent_occupation" class="label"> Pekerjaan: </label>
                <div class="control">
                    <input placeholder="Pekerjaan" value="{{ old('respondent_occupation') }}" type="text" name="respondent_occupation" class="input {{ $errors->first("respondent_occupation", "is-danger") }}">
                </div>
                @if($errors->has("respondent_occupation"))
                <p class="help is-danger"> {{ $errors->first("respondent_occupation") }} </p>
                @endif
            </div>

            <div class="field">
                <label for="respondent_monthly_revenue" class="label"> Tingkat penghasilan rata – rata per bulan: </label>
                <div class="control">
                    <input placeholder="Tingkat penghasilan rata – rata per bulan" value="{{ old('respondent_monthly_revenue') }}" type="text" name="respondent_monthly_revenue" class="input {{ $errors->first("respondent_monthly_revenue", "is-danger") }}">
                </div>
                @if($errors->has("respondent_monthly_revenue"))
                <p class="help is-danger"> {{ $errors->first("respondent_monthly_revenue") }} </p>
                @endif
            </div>

            <hr/>

            <div class="field">
                <label for="is_public_transport_user" class="label"> Pengguna Angkutan Umum: </label>
                <div class="select">
                    <select name="is_public_transport_user" id="is_public_transport_user">
                        <option {{ old('is_public_transport_user') === '1' ? 'selected' : '' }} value="1"> Ya </option>
                        <option {{ old('is_public_transport_user') === '0' ? 'selected' : '' }} value="0"> Tidak </option>
                    </select>
                </div>
            </div>

            <div class="field">
                <label for="public_transport_usage_duration" class="label"> Sudah berapa lama menggunakan angkutan umum: </label>
                <div class="control">
                    <input placeholder="Sudah berapa lama menggunakan angkutan umum" value="{{ old('public_transport_usage_duration') }}" type="text" name="public_transport_usage_duration" class="input {{ $errors->first("public_transport_usage_duration", "is-danger") }}">
                </div>
                @if($errors->has("public_transport_usage_duration"))
                <p class="help is-danger"> {{ $errors->first("public_transport_usage_duration") }} </p>
                @endif
            </div>

           <div class="field">
               <label for="public_transport_usage_purpose" class="label"> Untuk Keperluan apa menggunakan angkutan umum: </label>
               <div class="control">
                   <textarea placeholder="Untuk Keperluan apa menggunakan angkutan umum" type="text" name="public_transport_usage_purpose" class="textarea {{ $errors->first("public_transport_usage_purpose", "is-danger") }}">{{ old('public_transport_usage_purpose') }}</textarea>
               </div>
               @if($errors->has("public_transport_usage_purpose"))
               <p class="help is-danger"> {{ $errors->first("public_transport_usage_purpose") }} </p>
               @endif
           </div>

           <div class="field">
               <label for="desired_public_transport_type" class="label"> Kriteria jenis angkutan umum bagaimana yang anda harapkan: </label>
               <div class="control">
                   <textarea placeholder="Kriteria jenis angkutan umum bagaimana yang anda harapkan" type="text" name="desired_public_transport_type" class="textarea {{ $errors->first("desired_public_transport_type", "is-danger") }}">{{ old('desired_public_transport_type') }}</textarea>
               </div>
               @if($errors->has("desired_public_transport_type"))
               <p class="help is-danger"> {{ $errors->first("desired_public_transport_type") }} </p>
               @endif
           </div>
           
           <div class="field">
               <label for="public_transport_disuse_reason" class="label"> Jika “Tidak”, apa alasan Bapak/Ibu tidak/belum menggunakan moda angkutan umum: </label>
               <div class="control">
                   <textarea placeholder="Jika “Tidak”, apa alasan Bapak/Ibu tidak/belum menggunakan moda angkutan umum" type="text" name="public_transport_disuse_reason" class="textarea {{ $errors->first("public_transport_disuse_reason", "is-danger") }}">{{ old('public_transport_disuse_reason') }}</textarea>
               </div>
               @if($errors->has("public_transport_disuse_reason"))
               <p class="help is-danger"> {{ $errors->first("public_transport_disuse_reason") }} </p>
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