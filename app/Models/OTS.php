<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTS extends Model
{
    use HasFactory;

    protected $table = 'ots';
    protected $fillable = [
        'name', 'jumlah_tiket', 'jumlah_harga', 'users_id', 'sex', 'via'
    ];

    public function admin(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
