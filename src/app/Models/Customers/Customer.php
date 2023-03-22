<?php

namespace App\Models\Customers;

use App\Models\Fixes\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Customer extends Model
{
    use HasFactory;
    use AsSource;

    protected $table = 'customers';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number'
    ];

    public function getSelectTitleAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name']. ' ' . $this->attributes['phone_number'];
    }
    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }
}
