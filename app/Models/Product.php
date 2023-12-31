<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, Favoriteable, Sortable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
        'recommend_flag',
        'carriage_flag',
        'reviews_avg_score',
    ];

    public $sortable = ['id', 'price', 'created_at', 'reviews_avg_score'];

    public function reviewSortable($query, $direction)
    {
        return $query->withAvg('reviews', 'score')->orderBy('reviews_avg_score', $direction );
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}