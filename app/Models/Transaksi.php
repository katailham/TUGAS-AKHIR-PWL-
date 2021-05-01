<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model; 
class transaksi extends Model 
{ 
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'id',
        'product_id',
        'jumlah',
    ]; 

    public function products(){
        return $this->belongsTo(Products::class);
    }
} 