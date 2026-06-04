@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<main class="main">
    <div class="main__inner">
        <h1 class="main__title">confirm</h1>
        <form action="/store" method="post">
            @csrf
            <table class="confirm_table">

                <tr class="confirm_row">
                    <th class="confirm_header">お名前</th>
                    <td class="confirm_data">大石 大樹</td>
                </tr>

                <tr class="confirm_row">
                    <th class="confirm_header">性別</th>
                    <td class="confirm_data">男</td>
                </tr>

                <tr class="confirm_row">
                    <th class="confirm_header">メールアドレス</th>
                    <td class="confirm_data">abc</td>
                </tr>

                <tr class="confirm_row">
                    <th class="confirm_header">電話番号</th>
                    <td class="confirm_data">00000000000</td>
                </tr>

                <tr class="confirm_row">
                    <th class="confirm_header">住所</th>
                    <td class="confirm_data">地球</td>
                </tr>

                <tr class="confirm_row">
                    <th class="confirm_header">建物名</th>
                    <td class="confirm_data">箱の中</td>
                </tr>

                <tr class="confirm_row">
                    <th class="confirm_header">お問い合わせの種類</th>
                    <td class="confirm_data">なんだろうね</td>
                </tr>

                <tr class="confirm_row">
                    <th class="confirm_header">お問い合わせ内容</th>
                    <td class="confirm_data">特に無し</td>
                </tr>

            </table>


                <div class="confirm_buttons">
                    <button class="confirm_submit" type="submit">送信</button>
                    <a href="/" class="confirm_back">修正</a>
                </div>
        </form>
                @endsection