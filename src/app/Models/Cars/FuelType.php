<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class FuelType extends Model
{
    use HasFactory;
    use AsSource;

    protected $table = 'fuel_types';

    protected $fillable = [
        'slug',
        'title'
    ];
}
