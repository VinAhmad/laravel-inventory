@extends('master.all')
@section('master-konten')

<div class="row">
    <div class="col-12 text-end">
        <a href="{{ route('master-barang-tambah') }}" class="btn btn-primary rounded-circle">
            <i class="fa fa-solid fa-plus"></i>
        </a>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Pilihan</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($barang as $b)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $b->kode }}</td>
                <td>{{ $b->nama }}</td>
                <td>{{ $b->deskripsi }}</td>
                <td>
                    <a href="{{ route('master-barang-hapus', ['id' => $b->id]) }}" class="btn btn-danger rounded-circle" onclick="return confirm('Apakah anda yakin ingin hapus {{ $b->kode }} ?')">
                        <i class="fa fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
