@extends('layouts.app')

@section('content')
<div class="content container text-center form-signin">

    <form method="POST" action="{{ route('login') }}" class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        @csrf

        <label for="inputEmail" class="sr-only">Email address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <label for="inputPassword" class="sr-only">Password</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
            </label>
        </div>

        <button type="submit" class="btn btn-lg btn-primary btn-block">
            {{ __('Login') }}
        </button>
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>

    </form>
</div>
@endsection
