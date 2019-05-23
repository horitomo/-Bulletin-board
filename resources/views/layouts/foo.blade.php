<!DOCTYPE html>
<html lang="ja">
<head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>@yield('title')</title>
</head>
<body>
                    <h1>練習用レイアウト</h1>
                    {{--  個別ページのないようはここに挿入される --}}
                    @yield('content')
</body>
</html>