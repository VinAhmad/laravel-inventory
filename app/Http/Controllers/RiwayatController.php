<?php

namespace App\Http\Controllers;

use App\Models\MasterBarangModel;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class RiwayatController extends Controller
{
    public function index()
    {
        $barang = MasterBarangModel::where('status', 0)->get();
        return view('riwayat.riwayat-barang', compact('barang'));
    }

    public function restore_barang(string $id_barang)
    {
        try {
            //Ubah status barang berdasarkan index yang di ambil dari 0 menjadi 1
            $update = MasterBarangModel::where(['id' => $id_barang])->update([
                'status' => 1,
            ]);
            // Jika proses update berhasil
            if ($update) {
                return redirect()->route('riwayat-barang')->with('success', 'Berhasil mengembalikan barang!');
            }

        } catch (\Throwable $th) {
            return redirect()->route('riwayat-barang')->with('danger', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        MasterBarangModel::where(['id' => $id])->delete();
        return redirect()->route('riwayat-barang')->with('success', 'Berhasil menghapus permanen barang!');
    }
}
