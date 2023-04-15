<?php

namespace App\Models\Fixes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Category extends Model
{
    use HasFactory;
    use AsSource;

    protected $table = 'fix_categories';

    protected $fillable = [
        'parent_id',
        'slug',
        'title',
        'is_published',
        'description'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function categories()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function prices()
    {
        return $this->hasMany(Price::class, 'category_id');
    }
}
