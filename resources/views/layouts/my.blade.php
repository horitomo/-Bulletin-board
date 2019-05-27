<!DOCTYPE html>
<html lang=" {{ app()->getLocale() }} ">
<head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    
                    <meta name="csrf-token" content=" {{csrf_token() }} ">
                    
                    <title> @if(!Request::is('/')){{ $title }} | @endif{{ env('APP_NAME') }} </title>

                    {{--- CSS --}}
                    <link rel="stylesheet" href=" {{ asset('css/app.css') }} ">

</head>
                    <body>
                                        
                                        <div id="app">
                                                            <nav class="navbar navbar-expand-lg navber-dark bg-dark">
                                                                                <div class="container">
                                                                                                    <a href="  {{ url('/') }} " class="navbar-brand">
                                                                                                                        {{ config('app.name') }}
                                                                                                    </a>
                                                                                                    <button class="navbar-toggler" type="button" data-toggle="collapse" 
                                                                                                                        data-target="#navbarSupportedContent" 
                                                                                                                        aria-controls="navbarSupportedContent" 
                                                                                                                        aria-expanded="false" aria-label="Toggle navigation">
                                                                                                    
                                                                                                                        <span class="navbar-toggler-icon"></span>
                                                                                                    </button>

                                                                                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                                                                                        {{-- Navbarの左側 --}}

                                                                                                                        <ul class="navbar-nav mr-auto">
                                                                                                                        {{-- 「記事」と「ユーザー」へのリンク --}}
                                                                                                                                            <li class="nav-item">
                                                                                                                                                                <a class="nav-link" href="{{ url('posts') }}">{{ __('Posts') }}</a>
                                                                                                                                            </li>
                                                                                                                                            <li class="nav-item">
                                                                                                                                            <a class="nav-link" href="{{ url('users') }}">{{ __('Users') }}</a>
                                                                                                                                            </li>
                                                                                                                        </ul>

                                                                                                                        {{-- Navbarの右側--}}
                                                                                                                        <ul class="navbar-nav ml-auto">
                                                                                                                                            {{-- 投稿ボタン --}}
                                                                                                                                            <li class="nav-item">
                                                                                                                                                                <a href="{{ url('posts/create') }}" id="new-post" class="btn btn-success">
                                                                                                                                                                                    {{__('New Post') }}
                                                                                                                                                                </a>
                                                                                                                                            </li>

                                                                                                                                            {{-- 認証関連のリンク --}}
                                                                                                                                            @guest
                                                                                                                                            {{-- [ログイン]と[ユーザー登録]へのリンク --}}
                                                                                                                                            <li class="nav-item">
                                                                                                                                                                <a href=" {{route('login')}} " class="nav-link">{{__('Login')}}</a>
                                                                                                                                            </li>
                                                                                                                                            <li class="nav-item">
                                                                                                                                                                <a href="{{ route('register') }}" class="nav-link">{{__('Register')}}</a>
                                                                                                                                            </li>

                                                                                                                                            @else
                                                                                                                                            {{-- [プロフィール]と[ログアウト]のドロップダウンメニュー--}}
                                                                                                                                            <li class="nav-item dropdown">
                                                                                                                                                                <a href="#" id="dropdown-user" class="nav-link dropdown-toggle" 
                                                                                                                                                                                    data-toggle="dropdown" aria-haspopup="true" 
                                                                                                                                                                                    aria-expanded="false">
                                                                                                                                                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                                                                                                                                </a>

                                                                                                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                                                                                                                                                                                    <a href="{{ url('users/' .auth()->user()->id) }}" class="dropdown-item">
                                                                                                                                                                                                        {{ __('Profile') }}
                                                                                                                                                                                    </a>
                                                                                                                                                                                    <form action=" {{ route('logout') }} " id="logout-form" method="post" style="display:none;">
                                                                                                                                                                                                        @csrf
                                                                                                                                                                                    </form>                                                                                                         
                                                                                                                                                                </div>
                                                                                                                                            </li>
                                                                                                                                            @endguest
                                                                                                                        </ul>
                                                                                                    </div>
                                                                                </div>
                                                            </nav>


                                                            <main class="py-4">
                                                                                @yield('content')
                                                            </main>
                                        </div>

                                        {{-- JavaScript --}}
                                        <script src=" {{ asset('js/app.jp') }} "></script>
                    </body>
</html>