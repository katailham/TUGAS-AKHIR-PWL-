<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model; 
class Transaksi extends Model 
{ 
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'name',
        'alamat',
        'no_telp',
        'product_id',
        'jumlah',
    ]; 

    public function products(){
        return $this->belongsTo(Products::class);
    }
} 