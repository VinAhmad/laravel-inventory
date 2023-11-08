<?php

namespace App\Http\Controllers;

use App\Models\MasterBarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function form_stok_masuk()
    {
        $barang = MasterBarangModel::where('status', 1)->get();
        return view('stok.form-stok-masuk', compact('barang'));
    }
}
