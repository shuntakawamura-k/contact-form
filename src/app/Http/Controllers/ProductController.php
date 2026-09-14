<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season; // Seasonモデルを追加
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // キーワード検索（商品名）
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        // 季節の絞り込み（seasonカラムがある場合）
        if ($request->filled('season')) {
            $query->where('season', $request->season);
        }

        // 検索結果を取得
        $products = $query->get();

        return view('index', compact('products'));
    }

    // --- ここから追加 ---
    /**
     * 商品詳細画面の表示
     */
    public function show($productId)
    {
        // 該当するIDの商品と、関連する季節（seasons）を取得
        $product = Product::with('seasons')->findOrFail($productId);

        // チェックボックス選択肢用にすべての季節を取得
        $seasons = Season::all();

        return view('show', compact('product', 'seasons'));
    }
}
