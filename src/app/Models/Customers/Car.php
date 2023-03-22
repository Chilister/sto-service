<?php

namespace App\Models\Customers;

use App\Models\Fixes\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Car extends Model
{
    use HasFactory;
    use AsSource;

    protected $table = 'customer_cars';

    protected $fillable = [
        'customer_id',
        'brand_id',
        'model_id',
        'fuel_type_id',
        'drive_type_id',
        'gearbox_type_id',
        'engine_capacity',
        'year',
        'vin_number'
    ];
}
