<?php

namespace App\Models\Customers;

use App\Models\Cars\Brand;
use App\Models\Cars\CarModel;
use App\Models\Cars\DriveType;
use App\Models\Cars\FuelType;
use App\Models\Cars\GearboxType;
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

    public function setEngineCapacityAttribute($value)
    {
        $this->attributes['engine_capacity'] = $value * 100;
    }
    public function getEngineCapacityAttribute()
    {
        return isset($this->attributes['engine_capacity']) ?$this->attributes['engine_capacity'] / 100 : null;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function fuelType()
    {
        return $this->belongsTo(FuelType::class, 'fuel_type_id');
    }

    public function driveType()
    {
        return $this->belongsTo(DriveType::class, 'drive_type_id');
    }

    public function gearboxType()
    {
        return $this->belongsTo(GearboxType::class, 'gearbox_type_id');
    }


}
