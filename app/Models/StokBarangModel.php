<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarangModel extends Model
{
    use HasFactory;
    protected $table = 'stok_barang';
    public $timestamps = false;
    protected $guarded = ['id'];
}
