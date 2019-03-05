@extends('shared.layout')
@section('title', 'Respon Survey')
@section('content')

<div class="m-b:5">
    @include('shared.message')
    <nav class="breadcrumb box" aria-label="breadcrumbs">
        <ul>
            <li class="is-active">
                <a href="{{ route('response.index') }}">
                    Respon Survey
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="title">
        Respon Survey
    </h1>

    <table class="table is-bordered">
        <thead>
            <tr>
                <th> No. </th>
                <th> Nama </th>
                <th> Jenis Kelamin </th>
                <th> Usia </th>
                <th> Alamat </th>
                <th> Kategori </th>
                <th> Kendali </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($responses as $response)
            <tr>
                <td> {{ $loop->iteration }}. </td>
                <td> {{ $response->respondent_name }} </td>
                <td> {{ App\Enums\Sex::NAMES[$response->respondent_sex] }} </td>
                <td> {{ $response->respondent_age }} </td>
                <td> {{ $response->respondent_address }} </td>
                <td> {{ App\Enums\RespondentType::NAMES[$response->extra_data_type] }} </td>
                <td>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $responses->links() }}

</div>
@endsection