@extends('shared.layout')
@section('title', 'Formulir Survey')
@section('content')

<div class="container p-x:5 m-y:5">
    @include('shared.message')
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li> <a href="#"> {{ config('app.name') }} </a> </li>
            <li class="is-active"><a href="{{ route('survey-form.show') }}" aria-current="page"> Formulir Survey </a></li>
        </ul>
    </nav>

    <h1 class="title is-1">
        FORMULIR SURVEY
    </h1>
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
                            <select name="" id="" class="select">
                                <option value=""> 1 </option>
                                <option value=""> 2 </option>
                                <option value=""> 3 </option>
                                <option value=""> 4 </option>
                                <option value=""> 5 </option>
                            </select>
                        </div>
                    </td>
                    <td rowspan="1">  </td>
                </tr>

                @for ($i = 0; $i < $sub_criterion->alternatives->count() - 1; ++$i)
                <tr>
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    <td> {{ $sub_criterion->alternatives[$i + 1]->name }} </td>
                    <td>
                        <select name="" id="" class="select">
                            <option value=""> 1 </option>
                            <option value=""> 1 </option>
                            <option value=""> 1 </option>
                            <option value=""> 1 </option>
                            <option value=""> 1 </option>
                        </select>
                    </td>
                    <td>  </td>
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