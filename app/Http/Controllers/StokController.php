<?php

namespace App\Http\Controllers;

use App\Models\MasterBarangModel;
use App\Models\StokBarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StokController extends Controller
{
    public function form_stok_masuk()
    {
        $barang = MasterBarangModel::where('status', 1)->get();
        return view('stok.form-stok-masuk', compact('barang'));
    }

    function proses_stok_masuk(Request $request)
    {
        //buat peraturan validasi form
        $aturan = [
            'form_barang' => 'required',
            'form_jumlah_masuk' => 'required',
        ];
        $pesan_indo = [
            'required' => 'Wajib diisi bos!!',
            'min' => 'Minimal :min karakter!!',
        ];
        $validator = Validator::make($request->all(), $aturan, $pesan_indo);

        try {
            //jika inputan user tidak sesuai dengan aturan validasi
            if ($validator->fails()) {
                return redirect()
                ->route('stok-masuk')
                ->withErrors($validator)->withInput();
            } else {
                //jika inputan user sesuai
                //simpan ke database

                //mengambil data sisa stok terakhir di database
                //berdasarkan kode barang yang dipilih di form
                $cek_sisa = StokBarangModel::where('kode', $request->form_barang)
                    ->orderBy('id', 'DESC')
                    ->first();
                $stok_sisa = $cek_sisa['stok_sisa'];

                //jika ada sisa yang ditemukan
                if (isset($stok_sisa)) {
                    //stok sisa + stok masuk baru
                    $isi = $stok_sisa + $request->form_jumlah_masuk;
                } else {
                    //jika tidak ada sisa
                    //stok sisa mengambil dari data jumlah barang yg masuk
                    $isi = $request->form_jumlah_masuk;
                }

                $insert = StokBarangModel::create([
                    'kode'              => strtoupper($request->form_barang),
                    'stok_masuk'        => $request->form_jumlah_masuk,
                    'stok_keluar'       => 0,
                    'stok_sisa'         => $isi,
                    'dibuat_kapan'      => date('Y-m-d H:i:s'),
                    'dibuat_oleh'       => Auth::user()->id,
                    'diperbarui_kapan'  => null,
                    'diperbarui_oleh'   => null,
                ]);
                //jika proses insert ke db berhasil
                if ($insert) {
                    return redirect()
                    ->route('stok-masuk')
                    ->with('success', 'Berhasil memasukkan stok!');
                }
            }
        }
        catch (\Throwable $th) {
            return redirect()
            ->route('stok-masuk')
            ->with('danger', $th->getMessage());
        }
    }

    public function form_stok_keluar()
    {
        $barang = MasterBarangModel::where('status', 1)->get();
        return view('stok.form-stok-keluar', compact('barang'));
    }

    public function proses_stok_keluar(Request $request)
    {
        //buat peraturan validasi form
        $aturan = [
            'form_barang' => 'required',
            'form_jumlah_keluar' => 'required',
        ];
        $pesan_indo = [
            'required' => 'Wajib diisi bos!!',
            'min' => 'Minimal :min karakter!!',
        ];
        $validator = Validator::make($request->all(), $aturan, $pesan_indo);

        try {
            //jika inputan user tidak sesuai dengan aturan validasi
            if ($validator->fails()) {
                return redirect()
                ->route('stok-keluar')
                ->withErrors($validator)->withInput();
            } else {
                //jika inputan user sesuai
                //simpan ke database

                //mengambil data sisa stok terakhir di database
                //berdasarkan kode barang yang dipilih di form
                $cek_sisa = StokBarangModel::where('kode', $request->form_barang)
                    ->orderBy('id', 'DESC')
                    ->first();
                $stok_sisa = $cek_sisa['stok_sisa'];

                //jika ada sisa yang ditemukan
                if (isset($stok_sisa)) {
                    //stok sisa + stok masuk baru
                    //jika yang dikeluarkan lebih besar dari stok yg ada
                    if ($request->form_jumlah_keluar > $stok_sisa) {
                        return redirect()
                        ->route('stok-keluar')
                        ->with('danger', 'Jumlah yang dikeluarkan melebihi stok yang ada');
                        die;
                    }
                    //jika yg dikeluarkan lebih kecil atau sama
                    else {
                        //cek jika jumlah yg dikeluarkan adalah 0 dan minus
                        if ($request->form_jumlah_keluar <= 0) {
                            return redirect()
                            ->route('stok-keluar')
                            ->with('danger', 'Jumlah minimal barang yg bisa keluar adalah 1');
                            die;
                        }
                        //jumlah yg keluar 1 dst...
                        else {
                            $keluar = $stok_sisa - $request->form_jumlah_keluar;
                            $insert = StokBarangModel::create([
                                'kode'              => strtoupper($request->form_barang),
                                'stok_masuk'        => 0,
                                'stok_keluar'       => $request->form_jumlah_keluar,
                                'stok_sisa'         => $keluar,
                                'dibuat_kapan'      => date('Y-m-d H:i:s'),
                                'dibuat_oleh'       => Auth::user()->id,
                                'diperbarui_kapan'  => null,
                                'diperbarui_oleh'   => null,
                            ]);
                            //jika proses insert ke db berhasil
                            if ($insert) {
                                return redirect()
                                ->route('stok-keluar')
                                ->with('success', 'Berhasil mengeluarkan barang!');
                            }
                        }
                    }
                }
                else {
                    //jika tidak ada sisa
                    return redirect()
                    ->route('stok-keluar')
                    ->with('danger', 'Barang belum ada stok sama sekali');
                    die;
                }
            }
        }
        catch (\Throwable $th) {
            return redirect()
            ->route('stok-keluar')
            ->with('danger', $th->getMessage());
        }
    }
}
