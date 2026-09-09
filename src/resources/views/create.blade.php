<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品登録</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>

<body>
    <h2>商品登録</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>商品名 <span style="color:red;">必須</span></label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')<p style="color:red;">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>値段 <span style="color:red;">必須</span></label>
            <input type="number" name="price" value="{{ old('price') }}">
            @error('price')<p style="color:red;">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>商品画像 <span style="color:red;">必須</span></label>
            <input type="file" name="image">
            @error('image')<p style="color:red;">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>季節 <span style="color:red;">必須</span></label>
            <label><input type="radio" name="season" value="春"> 春</label>
            <label><input type="radio" name="season" value="夏"> 夏</label>
            <label><input type="radio" name="season" value="秋"> 秋</label>
            <label><input type="radio" name="season" value="冬"> 冬</label>
            @error('season')<p style="color:red;">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>商品説明 <span style="color:red;">必須</span></label>
            <textarea name="description">{{ old('description') }}</textarea>
            @error('description')<p style="color:red;">{{ $message }}</p>@enderror
        </div>

        <button type="submit">登録</button>
        <a href="{{ route('products.index') }}">戻る</a>
    </form>
</body>

</html>