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

        {{-- Counter for row number --}}
        @php $counter = 0; @endphp

        @foreach ($types as $type)
        <div class="m-b:8">
            <h2 class="title is-2">
                Survey {{ $type->name }}
            </h2>
        
            @foreach ($type->criteria as $criterion)
            <h3 class="title is-4">
                {{ $loop->iteration }}.
                Kriteria {{ $criterion->name }}
            </h3>

            <table class="table is-narrow is-striped is-bordered">
                <thead>
                    <tr>
                        <th> No. </th>
                        <th> Kriteria </th>
                        <th> Alternatif </th>
                        <th> Bobot / Tingkat Kepentingan </th>
                        <th> Keterangan </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($criterion->sub_criteria as $sub_criterion)
                    <tr>
                        <td rowspan="{{ $sub_criterion->alternatives->count() }}"> {{ $loop->iteration }}. </td>
                        <td rowspan="{{ $sub_criterion->alternatives->count() }}"> {{ $sub_criterion->name }}. </td>
                        <td rowspan="1"> {{ $sub_criterion->alternatives->first()->name }} </td>
                        <td rowspan="1">
                            <div class="select">
                                <select name="survey_data[{{ $counter }}][rating]">
                                    @foreach (ResponseLevel::toArray() as $key => $level)
                                    <option {{ old("survey_data.$counter.rating") === $key ? 'selected' : '' }} value="{{ $key }}">
                                        {{ $level }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td rowspan="1">
                            <textarea name="survey_data[{{ $counter }}][note]" cols="15" rows="2" class="textarea">{{ old("survey_data.$counter.note") }}</textarea>
                        </td>

                        <input type="hidden" name="survey_data[{{ $counter }}][type_id]" value="{{ $type->id }}">
                        <input type="hidden" name="survey_data[{{ $counter }}][criterion_id]" value="{{ $criterion->id }}">
                        <input type="hidden" name="survey_data[{{ $counter }}][sub_criterion_id]" value="{{ $sub_criterion->id }}">
                        <input type="hidden" name="survey_data[{{ $counter }}][alternative_id]" value="{{ $sub_criterion->alternatives->first()->id }}">

                        @php ++$counter @endphp
                    </tr>

                    @for ($i = 1; $i < $sub_criterion->alternatives->count(); ++$i)
                    <tr>
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        <td> {{ $sub_criterion->alternatives[$i]->name }} </td>
                        <td>
                            <div class="select">
                                <select name="survey_data[{{ $counter }}][rating]">
                                    @foreach (ResponseLevel::toArray() as $key => $level)
                                    <option value="{{ $key }}">
                                        {{ $level }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td>
                            <textarea name="survey_data[{{ $counter }}][note]" cols="15" rows="2" class="textarea">{{ old("survey_data.$counter.note") }}</textarea>
                        </td>

                        <input type="hidden" name="survey_data[{{ $counter }}][type_id]" value="{{ $type->id }}">
                        <input type="hidden" name="survey_data[{{ $counter }}][criterion_id]" value="{{ $criterion->id }}">
                        <input type="hidden" name="survey_data[{{ $counter }}][sub_criterion_id]" value="{{ $sub_criterion->id }}">
                        <input type="hidden" name="survey_data[{{ $counter }}][alternative_id]" value="{{ $sub_criterion->alternatives[$i]->id }}">

                        @php ++$counter @endphp
                    </tr>
                    @endfor

                    @endforeach
                </tbody>
            </table>

            @endforeach
        </div>
        @endforeach

        <div class="t-a:r">
            <button class="button is-large is-primary">
                Kirim Data
                <i class="fa fa-check"></i>
            </button>
        </div>
    </form>
</div>
@endsection