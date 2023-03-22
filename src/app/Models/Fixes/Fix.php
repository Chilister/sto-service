<?php

namespace App\Models\Fixes;

use App\Models\Customers\Car;
use App\Models\Customers\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Fix extends Model
{
    use HasFactory;
    use AsSource;

    protected $table = 'fixes';

    protected $fillable = [
        'customer_id',
        'car_id',
        'total',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function prices()
    {
        return $this->belongsToMany(
            Price::class,
            'fix_fix_price',
            'fix_id',
            'fix_price_id'
        );
    }
}
