@extends('master/all')
@section('master-konten')

<form action="{{ route('master-barang-simpan') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="html_kode" class="form-label">Kode</label>
        <input type="text" class="form-control w-50" id="html_kode" name="html_kode" placeholder="Kode Barang" autofocus>
        @if ($errors->has('html_kode'))
            <div class="badge text-bg-danger">{{ $errors->first('html_kode') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="html_nama" class="form-label">Nama</label>
        <input type="text" class="form-control w-50" id="html_nama" name="html_nama" placeholder="Nama Barang">
        @if ($errors->has('html_nama'))
            <div class="badge text-bg-danger">{{ $errors->first('html_nama') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="html_deskripsi" class="form-label">Deskipsi</label>
        <textarea class="form-control" id="html_deskripsi" name="html_deskripsi" rows="3"></textarea>
        @if ($errors->has('html_deskripsi'))
            <div class="badge text-bg-danger">{{ $errors->first('html_deskripsi') }}</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-solid fa-save me-2"></i>Simpan
    </button>
</form>

@endsection
