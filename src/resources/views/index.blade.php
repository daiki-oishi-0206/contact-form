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
                    <p>お名前</p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="テスト太郎" name="name">
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>メールアドレス</p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="test@example.com" name="email">
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>電話番号</p>
                </div>
                <div class="contact__item">
                    <input class="contact__input" type="text" placeholder="09012345678" name="tel">
                </div>
            </div>

            <div class="contact__form">
                <div class="contact__label">
                    <p>お問い合わせ内容</p>
                </div>
                <div class="contact__item">
                    <textarea class="contact__input" name="contact" placeholder="資料をいただきたいです"></textarea>
                </div>
            </div>

            <div class="contact__submit">
                <input type="submit" value="送信">
            </div>
            
        </form>
    </div>
</main>


@endsection