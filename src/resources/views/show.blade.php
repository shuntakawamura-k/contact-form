<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品詳細</title>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>

<body>
    <h2>商品詳細</h2>
    <div>
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
        <h3>{{ $product->name }}</h3>
        <p>価格: ¥{{ number_format($product->price) }}</p>
        <p>季節: {{ $product->season }}</p>
        <p>商品説明: {{ $product->description }}</p>

        <a href="{{ route('products.edit', $product->id) }}">編集する</a>
        <a href="{{ route('products.index') }}">一覧へ戻る</a>
    </div>
</body>

</html>
