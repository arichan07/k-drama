@extends('layouts.admin')
@section('title', '投稿済みドラマ一覧')

@section('content')
    <div class="container">
    　　<div class="row">
            <div class="col-md-3">
                <a href="{{ action('Admin\KdramaController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\KdramaController@index') }}" method="get">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="cond_title" value={{ $cond_title }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">ドラマタイトル</th>
                                <th width="40%">レビュー</th>
                                <th width="10%">評価</th>
                                <th width="10%">画像</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $kdrama)
                                <tr>
                                    <th>{{ $kdrama->id }}</th>
                                    <td>{{ str_limit($kdrama->title, 100) }}</td>
                                    <td>{{ str_limit($kdrama->body, 250) }}</td>
                                    <td>{{ str_limit($kdrama->val, 2) }}</td>
                                    
                                    <td><img class="product_image" src="{{ Storage::url($kdrama->image_path) }}" alt="" width="200px" height="300px"></td>
                                    <td>
                                    @if($kdrama->user_id==Auth::id())
                                        <div>
                                            <a href="{{ action('Admin\KdramaController@edit', ['id' => $kdrama->id]) }}">編集</a>
                                        </div>
                                            <a href="{{ action('Admin\KdramaController@delete', ['id' => $kdrama->id]) }}" onclick="return confirm('削除しますか？');">削除</a>
                                        </div>
                                    @endif    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection