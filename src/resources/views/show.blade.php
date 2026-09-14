@extends('layouts.app')

@section('title', $product->name)

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<div class="show-container">
    <!-- パンくずリスト（商品一覧 > 商品名） -->
    <div class="breadcrumb">
        <a href="/">商品一覧</a> &gt; <span>{{ $product->name }}</span>
    </div>

    <!-- 商品更新フォーム -->
    <form action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf
        @method('PUT')

        <div class="product-detail">
            <!-- 左側：画像プレビュー & ファイル選択 -->
            <div class="product-detail__left">
                <div class="image-preview">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" id="preview">
                    @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image" id="preview">
                    @endif
                </div>
                <input type="file" name="image" id="image" accept="image/*">
                @error('image')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- 右側：入力項目（商品名・値段・季節） -->
            <div class="product-detail__right">
                <!-- 商品名 -->
                <div class="form-group">
                    <label for="name">商品名</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" placeholder="商品名を入力">
                    @error('name')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 値段 -->
                <div class="form-group">
                    <label for="price">値段</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" placeholder="値段を入力">
                    @error('price')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 季節 (複数選択チェックボックス / ラジオボタン) -->
                <div class="form-group">
                    <label>季節</label>
                    <div class="checkbox-group">
                        @foreach($seasons as $season)
                        <label class="checkbox-label">
                            <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                                {{ in_array($season->id, old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                            {{ $season->name }}
                        </label>
                        @endforeach
                    </div>
                    @error('seasons')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- 商品説明 -->
        <div class="form-group description-group">
            <label for="description">商品説明</label>
            <textarea name="description" id="description" rows="5" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
            @error('description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- ボタンエリア（戻る・変更を保存） -->
        <div class="form-actions">
            <a href="/" class="btn-back">戻る</a>
            <button type="submit" class="btn-save">変更を保存</button>
        </div>
    </form>

    <!-- 削除ボタン（ゴミ箱アイコン） -->
    <form action="/products/{{ $product->id }}/delete" method="POST" class="delete-form" onsubmit="return confirm('本当に削除しますか？')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete" title="削除">
            🗑️
        </button>
    </form>
</div>
@endsection