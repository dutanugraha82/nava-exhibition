<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'id',
        'schedule_id',
        'time',
        'code',
        'name',
        'email',
        'sex',
        'shoes',
        'amount',
        'total_price',
        'invoice',
        'status',
        'created_at',
        'updated_at'
    ];
}
