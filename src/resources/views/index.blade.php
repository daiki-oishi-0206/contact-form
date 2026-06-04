@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<main class="main">
    <div class="main-inner">
        <h1 class="main-title">Contact</h1>
        <form action="/confirm" class="contacts-form" method="post">
            @csrf


            <div class="contact-form">
                <div class="contact-label">
                    <p>お名前<span> ※</span></p>
                </div>
                <div class="contact-item contact-name">
                    <div class="contact-group">
                        <input class="name-input" type="text" placeholder="例: 山田" name="last_name" value="{{ old('last_name') }}">
                        <div class="form-error">
                            @error('last_name')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="contact-group">
                        <input class="name-input" type="text" placeholder="例: 太郎" name="first_name" value="{{ old('first_name') }}">
                        <div class="form-error">
                            @error('first_name')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="contact-form">
                <div class="contact-label">
                    <p>性別<span> ※</span></p>
                </div>
                <div class="contact-item">
                    <div class="contact-group">
                        <div class="gender-group">
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
                        </div>
                        <div class="form-error">
                            @error('gender')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="contact-form">
                <div class="contact-label">
                    <p>メールアドレス<span> ※</span></p>
                </div>
                <div class="contact-item">
                    <div class="contact-group">
                        <input class="email-input" type="email" placeholder="例:test@example.com" name="email" value="{{ old('email') }}">
                        <div class="form-error">
                            @error('email')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="contact-form">
                <div class="contact-label">
                    <p>電話番号<span> ※</span></p>
                </div>
                <div class="contact-item">
                    <div class="contact-group">
                        <div class="tel-group">
                            <input class="tel-input" type="tel" placeholder="090" name="tel1" value="{{ old('tel1') }}">
                            <p>-</p>
                            <input class="tel-input" type="tel" placeholder="1234" name="tel2" value="{{ old('tel2') }}">
                            <p>-</p>
                            <input class="tel-input" type="tel" placeholder="5678" name="tel3" value="{{ old('tel3') }}">
                        </div>
                        @if(
                        $errors->has('tel1') ||
                        $errors->has('tel2') ||
                        $errors->has('tel3')
                        )
                        <div class="form-error">
                            <p> {{ $errors->first('tel1') ?: $errors->first('tel2') ?: $errors->first('tel3') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="contact-form">
                <div class="contact-label">
                    <p>住所<span> ※</span></p>
                </div>
                <div class="contact-item">
                    <div class="contact-group">
                        <input class="address-input" type="text" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" name="address" value="{{ old('address') }}">
                        <div class="form-error">
                            @error('address')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="contact-form">
                <div class="contact-label">
                    <p>建物名</p>
                </div>
                <div class="contact-item">
                    <div class="contact-group">
                        <input class="building-input" type="text" placeholder="例:千駄ヶ谷マンション101" name="building" value="{{ old('building') }}">
                    </div>

                </div>
            </div>


            <div class="contact-form">
                <div class="contact-label">
                    <p>お問い合わせの種類<span> ※</span></p>
                </div>
                <div class="contact-item">
                    <div class="content-group">
                        <select name="content" class="content-input" required>
                            <option value="">選択してください</option>
                            <option value="delivery" {{ old('content') == 'delivery' ? 'selected' : '' }}>商品のお届けについて</option>
                            <option value="exchange" {{ old('content') == 'exchange' ? 'selected' : '' }}>商品の交換について</option>
                            <option value="trouble" {{ old('content') == 'trouble' ? 'selected' : '' }}>商品トラブル</option>
                            <option value="shop" {{ old('content') == 'shop' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                            <option value="other" {{ old('content') == 'other' ? 'selected' : '' }}>その他</option>
                        </select>
                        <div class="form-error">
                            @error('content')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="contact-form">
                <div class="contact-label">
                    <p>お問い合わせ内容<span> ※</span></p>
                </div>
                <div class="contact-item">
                    <div class="contact-group">
                        <textarea class="detail-input" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                        <div class="form-error">
                            @error('detail')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>


            <div class="contact-submit">
                <input type="submit" value="確認画面">
            </div>

        </form>
    </div>
</main>


@endsection