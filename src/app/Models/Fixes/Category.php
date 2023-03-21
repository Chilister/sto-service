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
        'description'
    ];
}
