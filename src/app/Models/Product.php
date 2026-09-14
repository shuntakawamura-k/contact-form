<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'season',
        'description',
    ];

    /**
     * Seasonモデルとの多対多のリレーションを定義
     */
    public function seasons()
    {
        // 第2引数に中間テーブル名 'season_product' を明示的に指定します
        return $this->belongsToMany(Season::class, 'season_product');
    }
}
