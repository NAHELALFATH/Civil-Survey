<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ config('app.name') }} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('shared.navbar')
    
    <aside class="menu p:4" 
        style="height: 100%; width: 300px; position: fixed"
        >
        
        <p class="menu-label">
          Master Data
        </p>
        <ul class="menu-list">
          <li>
            @foreach (App\Enums\RespondentType::toArray() as $res_type)
            <a
              class="{{
                Route::is('type.index') && ($res_type == $respondent_type) ?
                'is-active' : ''
              }}"
              href="{{ route('type.index', ['respondent_type' => $res_type]) }}">
              {{ App\Enums\RespondentType::NAMES[$res_type] }}
            </a>
            @endforeach
          </li>
        </ul>

        <p class="menu-label">
          Survey
        </p>

        <ul class="menu-list">
          <li>
            @foreach (App\Enums\RespondentType::toArray() as $res_type)
            <a
              class="{{
                Route::is('survey-form.show') && ($res_type == $respondent_type) ?
                'is-active' : ''
              }}"
              href="{{ route('survey-form.show', ['respondent_type' => $res_type]) }}"
              >
              {{ App\Enums\RespondentType::NAMES[$res_type] }}
            </a>
            @endforeach
          </li>
        </ul>

    </aside>

    <div style="margin-left: 300px">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>