@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-field">
    <div class="register-heading">
        <h2>Register</h2>
    </div>
    <form class="register" action="/register" method="post" novalidate>
        @csrf
        <div class="register-inner">
            <div class="register-group">
                <div class="register-title">
                    <span class="register-label">お名前</span>
                </div>
                <div class="register-content">
                    <div class="register-input">
                        <input type="text" name="name" placeholder="例:山田  太郎" value="{{ old('name') }}" />
                    </div>
                    <div class="register-error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="register-group">
                <div class="register-title">
                    <span class="register-label">メールアドレス</span>
                </div>
                <div class="register-content">
                    <div class="register-input">
                        <input type="email" name="email" placeholder="例:test@example.com " value="{{ old('email') }}" />
                    </div>
                    <div class="register-error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="register-group">
                <div class="register-title">
                    <span class="register-label">パスワード</span>
                </div>
                <div class="register-content">
                    <div class="register-input">
                        <input type="password" name="password" placeholder="例: coachtech1106" />
                    </div>
                    <div class="register-error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="register-button">
                <button class="register-submit" type="submit">登録</button>
            </div>
        </div>

    </form>

</div>
@endsection