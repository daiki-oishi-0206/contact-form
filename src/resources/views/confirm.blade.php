@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<main class="main">
    <div class="main-inner">
        <h1 class="main-title">confirm</h1>
        <form action="/store" method="post">
            @csrf
            <table class="confirm-table">

                <tr class="confirm-row">
                    <th class="confirm-header">お名前</th>
                    <td class="confirm-data">大石 大樹</td>
                </tr>

                <tr class="confirm-row">
                    <th class="confirm-header">性別</th>
                    <td class="confirm-data">男</td>
                </tr>

                <tr class="confirm-row">
                    <th class="confirm-header">メールアドレス</th>
                    <td class="confirm-data">abc</td>
                </tr>

                <tr class="confirm-row">
                    <th class="confirm-header">電話番号</th>
                    <td class="confirm-data">00000000000</td>
                </tr>

                <tr class="confirm-row">
                    <th class="confirm-header">住所</th>
                    <td class="confirm-data">地球</td>
                </tr>

                <tr class="confirm-row">
                    <th class="confirm-header">建物名</th>
                    <td class="confirm-data">箱の中</td>
                </tr>

                <tr class="confirm-row">
                    <th class="confirm-header">お問い合わせの種類</th>
                    <td class="confirm-data">なんだろうね</td>
                </tr>

                <tr class="confirm-row">
                    <th class="confirm-header">お問い合わせ内容</th>
                    <td class="confirm-data">特に無し</td>
                </tr>

            </table>


                <div class="confirm-buttons">
                    <button class="confirm-submit" type="submit">送信</button>
                    <a href="/" class="confirm-back">修正</a>
                </div>
        </form>
                @endsection