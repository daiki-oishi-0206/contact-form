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
                    <input class="contact__input" type="text" placeholder="例: 山田" name="last_name">
                    @error('last_name')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="例: 太郎" name="first_name">
                    @error('first_name')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>性別<span> ※</span></p>
                </div>
                <label>
                    <input type="radio" name="gender" value="male">
                    男性
                </label>
                <label>
                    <input type="radio" name="gender" value="female">
                    女性
                </label>
                <label>
                    <input type="radio" name="gender" value="other">
                    その他
                </label>
                @error('gender')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>メールアドレス<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="例:test@example.com" name="email">
                </div>
                @error('email')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>電話番号<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="090" name="tel1">
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="1234" name="tel2">
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="5678" name="tel3">
                </div>
                @if(
                    $errors->has('tel1') ||
                    $errors->has('tel2') ||
                    $errors->has('tel3')
                )
                    <p class="error">
                        {{ $errors->first('tel1') ?: $errors->first('tel2') ?: $errors->first('tel3') }}
                    </p>
                @endif
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>住所<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" name="address">
                    @error('address')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>建物名</p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="例:千駄ヶ谷マンション101" name="building">
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>お問い合わせの種類<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <select name="category" class="contact_input">
                        <option value="">選択してください</option>
                        <option value="delivery">商品のお届けについて</option>
                        <option value="exchange">商品の交換について</option>
                        <option value="trouble">商品トラブル</option>
                        <option value="shop">ショップへのお問い合わせ</option>
                        <option value="other">その他</option>
                    </select>
                    @error('content')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>お問い合わせ内容<span> ※</span></p>
                </div>
                <div class="contact__item">
                    <textarea class="contact__input" name="detail" placeholder="お問い合わせ内容をご記載ください"></textarea>
                    @error('detail')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="contact__submit">
                <input type="submit" value="確認画面">
            </div>

        </form>
    </div>
</main>


@endsection