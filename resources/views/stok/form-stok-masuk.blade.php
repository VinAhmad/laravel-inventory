@extends('template.index')
@section('konten')

<h1>Form Stok Masuk</h1>
<hr>
<form action="#" method="post">
    <div class="row mb-4">
        <div class="col-lg-6">
            <label class="form-label h5">Barang</label>
            <select class="form-select" name="form_barang">
                <option selected>Pilih Barang</option>
                @foreach ($barang as $b)
                    <option value={{ $b->kode }}">{{ $b->kode}} | {{ $b->nama }}</option>
                @endforeach
              </select>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-2">
            <label class="form-label h5">Jumlah</label>
            <input type="number" name="form_jumlah_masuk" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-solid fa-save me-1"></i> Simpan
            </button>
        </div>
    </div>
</form>

@endsection
