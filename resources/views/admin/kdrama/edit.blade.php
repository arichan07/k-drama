@extends('layouts.admin')
@section('title', '投稿ドラマ編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>投稿ドラマ編集</h2>
                <form action="{{ action('Admin\KdramaController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                                        <div class="form-group row">
                        <label class="col-md-2">ドラマ名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $kdrama_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ドラマ画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $kdrama_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $kdrama_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">評価</label>
                        <div class="col-md-10">
                            <select name="val">
                                <option value="">選択してください</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection