<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <h2>商品一覧</h2>
    <a href="{{ route('products.create') }}">＋商品を出品</a>

    <!-- 検索フォーム -->
    <form action="{{ route('products.index') }}" method="GET">
        <input type="text" name="keyword" placeholder="商品名で検索" value="{{ request('keyword') }}">
        <select name="season">
            <option value="">季節を選択</option>
            <option value="春">春</option>
            <option value="夏">夏</option>
            <option value="秋">秋</option>
            <option value="冬">冬</option>
        </select>
        <button type="submit">検索</button>
    </form>

    <!-- 商品一覧 -->
    <div class="product-list">
        @foreach($products as $product)
        <div class="product-card">
            <a href="{{ route('products.show', $product->id) }}">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <p>{{ $product->name }}</p>
                <p>¥{{ number_format($product->price) }}</p>
            </a>
        </div>
        @endforeach
    </div>

    <!-- ページネーション -->
    {{ $products->links() }}
</body>

</html>