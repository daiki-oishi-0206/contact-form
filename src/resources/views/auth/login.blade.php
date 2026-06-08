@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login-field">
    <div class="login-heading">
        <h2>Login</h2>
    </div>

    <form class="login" action="/login" method="post" novalidate>
        @csrf
        <div class="login-inner">


            <div class="login-group">
                <div class="login-title">
                    <span class="login-label">メールアドレス</span>
                </div>
                <div class="login-content">
                    <div class="login-input">
                        <input type="email" name="email" placeholder="例:test@example.com " value="{{ old('email') }}" />
                    </div>
                    <div class="login-error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>


            <div class="login-group">
                <div class="login-title">
                    <span class="login-label">パスワード</span>
                </div>
                <div class="login-content">
                    <div class="login-input">
                        <input type="password" name="password" placeholder="例: coachtech1106" />
                    </div>
                    <div class="login-error">
                        @error('password')
                        {{ $message }}
                        @enderror
                        @if ($errors->has('login'))
                        <p class="error">
                            {{ $errors->first('login') }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="login-button">
                <button class="login-submit" type="submit">ログイン</button>
            </div>
        </div>

    </form>

</div>
@endsection