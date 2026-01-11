<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
        'price',
        'mileage',
        'color',
        'type',
        'transmission',
        'fuel_type',
        'description',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'mileage' => 'integer',
        'year' => 'integer',
    ];

    /**
     * Customers interested in this car
     */
    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
