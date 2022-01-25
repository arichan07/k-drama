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
                        <label class="col-md-2" for="imsge">ドラマ画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ basename($kdrama_form->image_path) }}
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
                                <option value="1" @if(($kdrama_form->val)=='1') selected @endif)>1</option>
                                <option value="2" @if(($kdrama_form->val)=='2') selected @endif)>2</option>
                                <option value="3" @if(($kdrama_form->val)=='3') selected @endif)>3</option>
                                <option value="4" @if(($kdrama_form->val)=='4') selected @endif)>4</option>
                                <option value="5" @if(($kdrama_form->val)=='5') selected @endif)>5</option>
                                <option value="6" @if(($kdrama_form->val)=='6') selected @endif)>6</option>
                                <option value="7" @if(($kdrama_form->val)=='7') selected @endif)>7</option>
                                <option value="8" @if(($kdrama_form->val)=='8') selected @endif)>8</option>
                                <option value="9" @if(($kdrama_form->val)=='9') selected @endif)>9</option>
                                <option value="10" @if(($kdrama_form->val)=='10') selected @endif)>10</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $kdrama_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection