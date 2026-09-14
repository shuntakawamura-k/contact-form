@extends('layouts.app')

@section('title', '商品詳細・編集')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="edit-content">
    <!-- 編集フォームの内容 -->
</div>
@endsection
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品変更</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>

<body>
    <h2>商品変更</h2>

    <!-- 更新フォーム -->
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>商品名</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
            @error('name')<p style="color:red;">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>値段</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}">
            @error('price')<p style="color:red;">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>現在の画像</label><br>
            <img src="{{ asset('storage/' . $product->image) }}" width="150"><br>
            <input type="file" name="image">
            @error('image')<p style="color:red;">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>季節</label>
            @foreach(['春', '夏', '秋', '冬'] as $season)
            <label>
                <input type="radio" name="season" value="{{ $season }}" {{ old('season', $product->season) == $season ? 'checked' : '' }}>
                {{ $season }}
            </label>
            @endforeach
            @error('season')<p style="color:red;">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>商品説明</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
            @error('description')<p style="color:red;">{{ $message }}</p>@enderror
        </div>

        <button type="submit">変更を保存</button>
        <a href="{{ route('products.index') }}">戻る</a>
    </form>

    <!-- 削除フォーム -->
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="margin-top:20px;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('本当に削除しますか？')">商品を削除</button>
    </form>
</body>

</html>