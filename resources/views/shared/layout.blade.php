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
        style="height: 100%; width: 200px; position: fixed"
        >
        
        <p class="menu-label">
          Master Data
        </p>
        <ul class="menu-list">
          <li>
            <a href="{{ route('type.index') }}">
              Manajemen
            </a>
          </li>
        </ul>

        <p class="menu-label">
          Survey
        </p>

        <ul class="menu-list">
          <li>
            <a href="{{ route('survey-form.show') }}">
              Formulir
            </a>
          </li>
        </ul>

    </aside>

    <div style="margin-left: 200px">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>