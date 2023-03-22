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
}
