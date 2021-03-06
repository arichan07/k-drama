@extends('layouts.app.admin')
<div class="card-header">
    @guest
        Laravel
    @else
        Hello, {{ Auth::user()->name }} !!
    @endguest
</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="links">
        @guest
            <a href="{{ route('login') }}">ログイン</a>
            <a href="{{ route('register') }}">登録</a>
            <a href="">検索</a>
        @else
            <a href="home/edit">ユーザー情報編集</a>
            <a href="">ユーザー検索</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
</div>