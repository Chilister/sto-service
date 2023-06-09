<?php

namespace App\Models\Fixes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Price extends Model
{
    use HasFactory;
    use AsSource;

    protected $table = 'fix_prices';

    protected $fillable = [
        'category_id',
        'slug',
        'title',
        'description',
        'price',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getSelectTitleAttribute()
    {
        return $this->attributes['title'] . ' ' . $this->attributes['price'];
    }
}
