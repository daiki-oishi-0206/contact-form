@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contacts.css') }}">
@endsection

@section('content')
<div class="contacts-field">
    <div class="contacts-heading">
        <h2>Admin</h2>
    </div>

    <div class="contacts-items">
        <form action="/admin/contacts" method="get">
            @csrf
            <div class="contacts-item">
                <input class="contacts-keyword" type="text" name="keyword">
            </div>

            <div class="contacts-item">
                <select class="contacts-gender" name="gender" required>
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>

            <div class="contacts-item">
                <select class="contacts-content" name="category_id" required>
                    <option value="">選択してください</option>
                    <option value="1">商品のお届けについて</option>
                    <option value="2">商品の交換について</option>
                    <option value="3">商品トラブル</option>
                    <option value="4">ショップへのお問い合わせ</option>
                    <option value="5">その他</option>
                </select>
            </div>

            <div class="contacts-item">
                <select class="contacts-date" name="date" required>
                    <option value="">年/月/日</option>
                    <option value="2026-06-06">2026-06-06</option>
                </select>
            </div>

            <div class="contacts-item">
                <button class="contacts-search">検索</button>
            </div>

            <div class="contacts-item">
                <a href="/admin/contacts" class="contacts-reset">リセット</a>
            </div>
    </div>

    <div class="contacts-toolbar">
        <div class="contacts-toolbar-left">
            <button>エクスポート</button>
        </div>
        <div class="contacts-toolbar-right">
            <button>
                << /button>
                    <button>1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>></button>
        </div>
    </div>

    <div class="contacts-table">
            <table>
                <colgroup>
                    <col class="col-name">
                    <col class="col-gender">
                    <col class="col-email">
                    <col class="col-content">
                    <col class="col-detail">
                </colgroup>
                <thead>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{'$contact->last_name'}} {{$contact->first_name}}</td>
                        <td>{{$contact->gender}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->category_id}}</td>
                        <td>
                            <a href="/admin/contacts/{{$contact->id}}">詳細</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        </form>












    </div>












</div>
@endsection