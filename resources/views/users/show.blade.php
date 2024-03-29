@php
    $title = __('User') . ': ' . $user->name;
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    {{-- 編集・削除ボタン --}}
    {{-- 管理者のページを表示中の場合は、編集・削除ボタンを表示させない --}}
    @if (Auth::check() && !Auth::user()->isAdmin($user->id))
    @can('edit', $user)
    <div>
        <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
        {{-- 削除ボタンは後で正式なものに置き換えます --}}
        @component('components.btn-del')
            @slot('controller', 'users')
            @slot('id', $user->id)
            @slot('name', $user->title)
        @endcomponent
    </div>
    @endcan
    @endif

    {{-- ユーザー1件の情報 --}}
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $user->id }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $user->name }}</dd>
        <dt class="col-md-2">{{ __('E-Mail Address') }}</dt>
        <dd class="col-md-10">{{ $user->email }}</dd>
    </dl>


{{-- ユーザーの記事一覧 --}}
    <h2>{{ __('Posts') }}</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Body') }}</th>
                    <th>{{ __('Created') }}</th>
                    <th>{{ __('Updated') }}</th>

                    {{-- 記事の編集・削除ボタンのカラム --}}
                    <th></th>
                    @auth
                        @can('edit', $user)
                            <th></th>
                        @endcan
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($user->posts as $post)
                    <tr>
                        <td>
                            <a href="{{ url('posts/' . $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        @auth
                            @can('edit', $user)
                            <td nowrap>
                                <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </a>
                                @component('components.btn-del')
                                    @slot('controller', 'posts')
                                    @slot('id', $post->id)
                                    @slot('name', $post->title)
                                @endcomponent
                            </td>
                            @endcan
                        @endauth
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $user->posts->links() }}
</div>
@endsection