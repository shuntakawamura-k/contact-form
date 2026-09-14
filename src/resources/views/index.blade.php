@extends('layouts.app')

@section('title', '商品一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="index-container">
    <!-- 左側：検索・絞り込みサイドバー -->
    <aside class="sidebar">
        <h2 class="page-title">商品一覧</h2>

        <form action="/" method="GET" class="search-form">
            <!-- 1. キーワード検索 -->
            <input type="text" name="keyword" class="search-input" placeholder="商品名で検索" value="{{ request('keyword') }}">

            <button type="submit" class="btn-search">検索</button>

            <!-- 2. 価格順並び替え -->
            <label style="margin-top: 15px; font-weight: bold; display: block;">価格順で表示</label>
            <select name="sort" class="search-select" onchange="this.form.submit()">
                <option value="">価格順で並び替え</option>
                <option value="high" {{ request('sort') == 'high' ? 'selected' : '' }}>高い順に表示</option>
                <option value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>低い順に表示</option>
            </select>

            <!-- 3. 季節絞り込み (追加) -->
            <label style="margin-top: 15px; font-weight: bold; display: block;">季節で絞り込み</label>

            <!-- 単一選択（ドロップダウン）の場合 -->
            <select name="season" class="search-select">
                <option value="">季節を選択</option>
                <option value="1" {{ request('season') == '1' ? 'selected' : '' }}>春</option>
                <option value="2" {{ request('season') == '2' ? 'selected' : '' }}>夏</option>
                <option value="3" {{ request('season') == '3' ? 'selected' : '' }}>秋</option>
                <option value="4" {{ request('season') == '4' ? 'selected' : '' }}>冬</option>
            </select>

            <!-- リセットボタン -->
            <a href="/" style="display: block; margin-top: 10px; color: #888; text-decoration: none; font-size: 14px;">リセット</a>
        </form>
    </aside>

    <!-- 右側：メインコンテンツエリア -->
    <div class="content-area">
        <div class="content-header">
            <a href="/products/register" class="btn-add">+ 商品を追加</a>
        </div>

        <div class="product-grid">
            @foreach($products as $product)
            <a href="/products/{{ $product->id }}" class="product-card">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-card__img">
                @else
                <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image" class="product-card__img">
                @endif

                <div class="product-card__body">
                    <p class="product-card__name">{{ $product->name }}</p>
                    <p class="product-card__price">¥{{ number_format($product->price) }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection