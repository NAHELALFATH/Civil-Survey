@extends('shared.layout')
@section('title', 'Login')
@section('content')

<div class="container p-x:5 m-y:5" style="max-width: 40%">
    <div class="card">
        <div class="card-header">
            <h1 class="card-header-title">
                <span class="icon">
                    <i class="fa fa-sign-in"></i>
                </span>
                Login
            </h1>
        </div>
        <div class="card-content">
            <form method='POST' action='{{ route('login') }}'>
                @csrf
            
                <div class="field">
                    <label for="username" class="label"> Username: </label>
                    <div class="control">
                        <input placeholder="Username" value="{{ old('username') }}" type="text" name="username" class="input {{ $errors->first("username", "is-danger") }}">
                    </div>
                    @if($errors->has("username"))
                    <p class="help is-danger"> {{ $errors->first("username") }} </p>
                    @endif
                </div>

                <div class="field">
                    <label for="password" class="label"> Password: </label>
                    <div class="control">
                        <input placeholder="Password" value="{{ old('password') }}" type="password" name="password" class="input {{ $errors->first("password", "is-danger") }}">
                    </div>
                    @if($errors->has("password"))
                    <p class="help is-danger"> {{ $errors->first("password") }} </p>
                    @endif
                </div>

                <div class="t-a:r m-t:5">
                    <button class="button is-primary">
                        <span>
                            Log In
                        </span>
                        <span class="icon is-small">
                            <i class="fa fa-sign-in"></i>
                        </span>
                    </button>
                </div>
            
            </form>
        </div>
    </div>
</div>
@endsection