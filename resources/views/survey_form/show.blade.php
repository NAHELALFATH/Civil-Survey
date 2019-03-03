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

    @foreach ($types as $type)
    <div class="m-b:8">
        <h2 class="title is-2">
            Survey {{ $type->name }}
        </h2>
    
        @foreach ($type->criteria as $criteria)
        <h3 class="title is-4">
            {{ $loop->iteration }}.
            Kriteria {{ $criteria->name }}
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
                @foreach ($criteria->sub_criteria as $sub_criterion)
                <tr>
                    <td rowspan="{{ $sub_criterion->alternatives->count() }}"> {{ $loop->iteration }}. </td>
                    <td rowspan="{{ $sub_criterion->alternatives->count() }}"> {{ $sub_criterion->name }}. </td>
                    <td rowspan="1"> {{ $sub_criterion->alternatives->first()->name }} </td>
                    <td rowspan="1">
                        <div class="select">
                            <select name="" id="">
                                @foreach (ResponseLevel::toArray() as $key => $level)
                                <option value="{{ $key }}">
                                    {{ $level }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td rowspan="1">
                        <textarea name="" id="" cols="15" rows="2" class="textarea"></textarea>
                    </td>
                </tr>

                @for ($i = 0; $i < $sub_criterion->alternatives->count() - 1; ++$i)
                <tr>
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    <td> {{ $sub_criterion->alternatives[$i + 1]->name }} </td>
                    <td>
                        <div class="select">
                            <select name="" id="">
                                @foreach (ResponseLevel::toArray() as $key => $level)
                                <option value="{{ $key }}">
                                    {{ $level }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <textarea name="" id="" cols="15" rows="2" class="textarea"></textarea>
                    </td>
                </tr>
                @endfor

                @endforeach
            </tbody>
        </table>

        @endforeach
    </div>
    @endforeach


</div>
@endsection