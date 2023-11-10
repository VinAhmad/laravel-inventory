@extends('template.index')
@section('konten')

<h3>Riwayat Barang Terhapus</h3>

<table class="table table-hover mt-4">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Action</th>
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
                    <a href="{{ route('restore-barang', ['id' => $b->id]) }}"
                        class="btn btn-sm btn-success rounded-circle" onclick="return confirm('Apakah anda yakin ingin mengembalikan {{ $b->kode }} ?')">
                        <i class="fa fa-solid fa-rotate-left"></i>
                    </a>
                    <a href="{{ route('delete-barang', ['id' => $b->id]) }}"
                        class="btn btn-sm btn-danger rounded-circle" onclick="return confirm('Apakah anda yakin ingin delete {{ $b->kode }} secara permanen ?')">
                        <i class="fa fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
