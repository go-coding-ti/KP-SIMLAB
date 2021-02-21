@extends('adminlayout.layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Layanan</h6>
    </div>

    <div class="card shadow">
        <form method="POST" enctype="multipart/form-data" action="">
            <div class="row card-header">
                <div class="col">
                    <label for="nidn" class="font-weight-bold text-dark">Nama Layanan</label>
                    <input type="text" class="form-control" id="NamaLayanan" placeholder="">
                </div>
                <div class="col">
                    <label for="nip" class="font-weight-bold text-dark">Satuan</label>
                    <input type="text" class="form-control" id="Satuan" placeholder="">
                </div>
            </div>
            <div class="form-group card-header">
                <label for="InputName" class="font-weight-bold text-dark">Harga</label>
                <input type="text" class="form-control" id="Harga"  placeholder="">
            </div>
            <div class="row card-header">
                <div class="col">
                    <label for="gelardepan" class="font-weight-bold text-dark">Bidang</label>
                    <input type="text" class="form-control" id="Bidang" placeholder="">
                </div>
                <div class="col">
                    <label for="gelarbelakang" class="font-weight-bold text-dark">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" placeholder="">
                </div>
            </div>
            <div class="form-group card-header">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection