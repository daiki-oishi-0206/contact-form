@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<main class="main">
    <div class="main__inner">
        <h1 class="main__title">お問い合わせ</h1>
        <form action="/confirm" class="contacts__form" method="post">
            @csrf

            <div class="contact__form">
                <div class="contact__label">
                    <p>お名前<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="例: 山田" name="last_name" value="{{ old('last_name') }}">
                    <div class="form_error">
                        @error('last_name')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="例: 太郎" name="first_name" value="{{ old('first_name') }}">
                    <div class=" form_error">
                        @error('first_name')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>性別<span> ※</span></p>
                </div>
                <label>
                    <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                    男性
                </label>
                <label>
                    <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                    女性
                </label>
                <label>
                    <input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                    その他
                </label>
                <div class="form_error">
                    @error('gender')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>メールアドレス<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="例:test@example.com" name="email" value="{{ old('email') }}">
                </div>
                <div class=" form_error">
                    @error('email')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>電話番号<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="090" name="tel1" value="{{ old('tel1') }}">
                </div>
                <div class=" contact__item">
                    <input class="contact__input" type="text" placeholder="1234" name="tel2" value="{{ old('tel2') }}">
                </div>
                <div class=" contact__item">
                    <input class="contact__input" type="text" placeholder="5678" name="tel3" value="{{ old('tel3') }}">
                </div>
                @if(
                $errors->has('tel1') ||
                $errors->has('tel2') ||
                $errors->has('tel3')
                )
                <div class=" form_error">
                    <p> {{ $errors->first('tel1') ?: $errors->first('tel2') ?: $errors->first('tel3') }}</p>
                </div>
                @endif
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>住所<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" name="address" value="{{ old('address') }}">
                    <div class=" form_error">
                        @error('address')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>建物名</p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="例:千駄ヶ谷マンション101" name="building" value="{{ old('building') }}">
                </div>
            </div>

            <div class=" contact__form">
                <div class="contact__label">
                    <p>お問い合わせの種類<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <select name="content" class="contact_input">
                        <option value="">選択してください</option>
                        <option value="delivery" {{ old('content') == 'delivery' ? 'selected' : '' }}>商品のお届けについて</option>
                        <option value="exchange" {{ old('content') == 'exchange' ? 'selected' : '' }}>商品の交換について</option>
                        <option value="trouble" {{ old('content') == 'trouble' ? 'selected' : '' }}>商品トラブル</option>
                        <option value="shop" {{ old('content') == 'shop' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                        <option value="other" {{ old('content') == 'other' ? 'selected' : '' }}>その他</option>
                    </select>
                    <div class="form_error">
                        @error('content')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>お問い合わせ内容<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <textarea class="contact__input" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    <div class="form_error">
                        @error('detail')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="contact__submit">
                <input type="submit" value="確認画面">
            </div>

        </form>
    </div>
</main>


@endsection