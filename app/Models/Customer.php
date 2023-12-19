<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'id',
        'kode_registrasi',
        'nohp',
        'kode_tiket',
        'name',
        'email',
        'sex',
        'jumlah_tiket',
        'total_harga',
        'invoice',
        'status_validasi',
        'status_tiket',
        'users_id',
        'ticket_id',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at','created_at'];

    public function ticket(){
        return $this->belongsTo(Tickets::class, 'tickets_id', 'id');
    }

    public function admin(){
        return $this->belongsTo(User::class, 'users_id','id');
    }
}
