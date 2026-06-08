<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header-inner">
            <div class="header-utilities">
                <a class="header-logo" href="/">
                    FashionablyLate
                </a>
            </div>
            <div class="header-group">
                @if(request()->is('register'))
                <a class="header-link" href="/login">login</a>
                @endif

                @if(request()->is('login'))
                <a class="header-link" href="/register">register</a>
                @endif

                @if(request()->is('admin/*'))
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="header-link" type="submit">logout</button>
                </form>
                @endif
            </div>

        </div>
    </header>


    <main>
        @yield('content')
    </main>
</body>

</html>