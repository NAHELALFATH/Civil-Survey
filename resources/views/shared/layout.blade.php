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

      <div class="container m-t:10">
        <div class="columns">
          <div class="column is-3 p-r:7" style="position: sticky; top: 0rem">
          <aside class="menu" id="sidebar" style="position: sticky; top: 6rem">
            
            @auth
            <p class="menu-label">
              Master Data
            </p>
            <ul class="menu-list">
              <li>
                @foreach (App\Enums\RespondentType::toArray() as $res_type)
                <a
                  class="{{
                    Route::is('master.*') && ($res_type == $respondent_type) ?
                    'is-active' : ''
                  }}"
                  href="{{ route('master.type.index', ['respondent_type' => $res_type]) }}">
                  {{ App\Enums\RespondentType::NAMES[$res_type] }}
                </a>
                @endforeach
              </li>
            </ul>
            @endauth

            <p class="menu-label">
              Formulir Survey
            </p>

            <ul class="menu-list">
              <li>
                @foreach (App\Enums\RespondentType::toArray() as $res_type)
                <a
                  class="{{
                    Route::is('response.create') && ($res_type == $respondent_type) ?
                    'is-active' : ''
                  }}"
                  href="{{ route('response.create', ['respondent_type' => $res_type]) }}"
                  >
                  {{ App\Enums\RespondentType::NAMES[$res_type] }}
                </a>
                @endforeach
              </li>
            </ul>
          </aside>
          
          </div>
          

          <div class="column is-9">
            @yield('content')
        </div>
      </div>
      
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>