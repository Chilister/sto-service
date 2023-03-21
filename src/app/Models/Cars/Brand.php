<?php

namespace App\Models\Cars;

use App\Models\Fixes\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Brand extends Model
{
    use HasFactory;
    use AsSource;

    protected $table = 'brands';

    protected $fillable = [
        'slug',
        'title',
        'priority'
    ];
}
