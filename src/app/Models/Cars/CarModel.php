<?php

namespace App\Models\Cars;

use App\Models\Fixes\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class CarModel extends Model
{
    use HasFactory;
    use AsSource;

    protected $table = 'models';

    protected $fillable = [
        'brand_id',
        'slug',
        'title',
        'priority'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
