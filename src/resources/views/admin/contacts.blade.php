@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contacts.css') }}">
@endsection

@section('content')
<div class="contacts-field">
    <div class="contacts-heading">
        <h2>Admin</h2>
    </div>

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

    <form class="search-form" action="/admin/contacts" method="get">
        @csrf
        <div class="contacts-item">
            <input class="contacts-keyword" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
        </div>

        <div class="contacts-item">
            <select class="contacts-gender" name="gender">
                <option value="">性別</option>
                <option value="all">全て</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
        </div>

        <div class="contacts-item">
            <select class="contacts-content" name="category_id">
                <option value="">お問い合わせの種類</option>
                <option value="1">商品のお届けについて</option>
                <option value="2">商品の交換について</option>
                <option value="3">商品トラブル</option>
                <option value="4">ショップへのお問い合わせ</option>
                <option value="5">その他</option>
            </select>
        </div>

        <div class="contacts-item">
            <input type="date" name="date" class="contacts-date">
        </div>

        <div class="contacts-item">
            <button class="contacts-search">検索</button>
        </div>

        <div class="contacts-item">
            <a href="/admin/contacts" class="contacts-reset">リセット</a>
        </div>
    </form>


    <div class="contacts-toolbar">
        <div class="contacts-toolbar-left">
            <form action="/admin/contacts/export" method="get">
                <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                <input type="hidden" name="gender" value="{{ request('gender') }}">
                <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                <input type="hidden" name="date" value="{{ request('date') }}">

                <button type="submit">エクスポート</button>
            </form>
        </div>
        <div class="contacts-toolbar-right">
            {{ $contacts->onEachSide(1)->links() }}
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
                    <td>{{$contact->last_name}} {{$contact->first_name}}</td>
                    <td>{{$genders[$contact->gender]}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$categories[$contact->category_id]}}</td>
                    <td>
                        <button
                            type="button"
                            class="detail-button"
                            data-id="{{$contact->id}}"
                            data-last-name="{{$contact->last_name}}"
                            data-first-name="{{$contact->first_name}}"
                            data-gender="{{$genders[$contact->gender]}}"
                            data-email="{{$contact->email}}"
                            data-tel="{{$contact->tel}}"
                            data-address="{{$contact->address}}"
                            data-building="{{$contact->building}}"
                            data-category="{{$categories[$contact->category_id]}}"
                            data-detail="{{$contact->detail}}">
                            詳細
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>
</div>




<div class="modal">
    <div class="modal-content">

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
        <div class="modal-close">
            <button>✖️</button>
        </div>


        <table class="modal-table">

            <tr class="modal-row">
                <th class="modal-header">お名前</th>
                <td class="modal-data" id="modal-name"></td>
            </tr>

            <tr class="modal-row">
                <th class="modal-header">性別</th>
                <td class="modal-data" id="modal-gender"></td>
            </tr>

            <tr class="modal-row">
                <th class="modal-header">メールアドレス</th>
                <td class="modal-data" id="modal-email"></td>
            </tr>

            <tr class="modal-row">
                <th class="modal-header">電話番号</th>
                <td class="modal-data" id="modal-tel"></td>
            </tr>

            <tr class="modal-row">
                <th class="modal-header">住所</th>
                <td class="modal-data" id="modal-address"></td>
            </tr>

            <tr class="modal-row">
                <th class="modal-header">建物名</th>
                <td class="modal-data" id="modal-building"></td>
            </tr>

            <tr class="modal-row">
                <th class="modal-header">お問い合わせの種類</th>
                <td class="modal-data" id="modal-category"></td>
            </tr>

            <tr class="modal-row">
                <th class="modal-header">お問い合わせ内容</th>
                <td class="modal-data" id="modal-detail"></td>
            </tr>

        </table>
        <form id="delete-form" method="post">
            @csrf
            @method('DELETE')

            <button class="modal-delete" type="submit">
                削除
            </button>
        </form>

    </div>

</div>

<script>
    const detailButtons = document.querySelectorAll('.detail-button');
    const modal = document.querySelector('.modal');
    const closeButton = document.querySelector('.modal-close');

    detailButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            document.getElementById('modal-name').textContent =
                this.dataset.lastName + ' ' + this.dataset.firstName;

            document.getElementById('modal-gender').textContent =
                this.dataset.gender;

            document.getElementById('modal-email').textContent =
                this.dataset.email;

            document.getElementById('modal-tel').textContent =
                this.dataset.tel;

            document.getElementById('modal-address').textContent =
                this.dataset.address;

            document.getElementById('modal-building').textContent =
                this.dataset.building;

            document.getElementById('modal-category').textContent =
                this.dataset.category;

            document.getElementById('modal-detail').innerHTML =
                this.dataset.detail.replace(/\n/g, '<br>');

            document.getElementById('delete-form').action =
                '/admin/contacts/' + this.dataset.id;

            modal.style.display = 'flex';
        });
    });

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });
</script>


@endsection