@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<main class="main">
    <div class="main-inner">
        <h1 class="main-title">confirm</h1>

        @php
        $categories = [
        1 => '商品のお届けについて',
        2 => '商品の交換について',
        3 => '商品トラブル',
        4 => 'ショップへのお問い合わせ',
        5 => 'その他',
        ];
        @endphp

        @php
        $genders = [
        1 => '男性',
        2 => '女性',
        3 => 'その他',
        ];
        @endphp

        <table class="confirm-table">

            <tr class="confirm-row">
                <th class="confirm-header">お名前</th>
                <td class="confirm-data">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
            </tr>

            <tr class="confirm-row">
                <th class="confirm-header">性別</th>
                <td class="confirm-data">{{ $genders[$contact['gender']] }}</td>
            </tr>

            <tr class="confirm-row">
                <th class="confirm-header">メールアドレス</th>
                <td class="confirm-data">{{ $contact['email'] }}</td>
            </tr>

            <tr class="confirm-row">
                <th class="confirm-header">電話番号</th>
                <td class="confirm-data">{{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact
                        ['tel3'] }}</td>
            </tr>

            <tr class="confirm-row">
                <th class="confirm-header">住所</th>
                <td class="confirm-data">{{ $contact['address'] }}</td>
            </tr>

            <tr class="confirm-row">
                <th class="confirm-header">建物名</th>
                <td class="confirm-data">{{ $contact['building'] }}</td>
            </tr>

            <tr class="confirm-row">
                <th class="confirm-header">お問い合わせの種類</th>
                <td class="confirm-data">{{ $categories[$contact['category_id']] }}</td>
            </tr>

            <tr class="confirm-row">
                <th class="confirm-header">お問い合わせ内容</th>
                <td class="confirm-data">{{ $contact['detail'] }}</td>
            </tr>
        </table>

        <div class="confirm-buttons">
            <form action="/store" method="post">
                @csrf
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
                <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
                <input type="hidden" name="address" value="{{ $contact['address'] }}">
                <input type="hidden" name="building" value="{{ $contact['building'] ?? '' }}">
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                <button class="confirm-submit" type="submit">送信</button>
            </form>
            <form action="/back" method="post">
                @csrf
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
                <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
                <input type="hidden" name="address" value="{{ $contact['address'] }}">
                <input type="hidden" name="building" value="{{ $contact['building'] ?? '' }}">
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                <button type="submit" class="confirm-back">修正</button>
            </form>
        </div>

    </div>
</main>
@endsection