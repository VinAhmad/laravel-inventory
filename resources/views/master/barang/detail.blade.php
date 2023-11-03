@extends('master/all')
@section('master-konten')

<h1 class="pb-2">Detail barang</h1>

@if (isset($barang[0]))
    @php
    //konversi tanggal format sql menjadi gampang dibaca oleh manusia
    $tanggal_dibuat = new DateTime($barang[0]->dibuat_kapan);
    $dibuat = $tanggal_dibuat->format('D, d M Y');
    //konversi tanggal format sql menjadi gampang dibaca oleh manusia
    $tanggal_diperbarui = new DateTime($barang[0]->diperbarui_kapan);
    $diperbarui = $tanggal_diperbarui->format('D, d M Y');
    @endphp

    <div class="card w-50 shadow">
        <div class="card-body">
            <h5 class="card-title">{{ $barang[0]->kode }}</h5>
            <h6 class="card-title">{{ $barang[0]->nama }}</h6>
            <p class="card-text">{{ $barang[0]->deskripsi }}</p>
            <span class="card-text">Dibuat: {{ $dibuat }} | {{ $barang[0]->dibuat_nama }}</span><br>
            <span class="card-text">Terakhir Diperbarui: {{ $diperbarui }} | {{ $barang[0]->diperbarui_nama }}</span>
        </div>
    </div>
@else
    <h2>Tidak ada data!</h2>
@endif

@endsection
