@extends('PimpinanLayout.layout')
@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row justify-content-between p-3">
                <h5 class="font-weight-bold text-primary m-0 mt-2">Activity Log</h5>
                <button class="btn btn-sync btn-primary m-0"><i class="fa fa-sync"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                        <thead class="text-primary">
                        <tr>
                            <th style="text-align:center; width: 7%">No.</th>
                            <th style="text-align:center; width: 15%">Log Type</th>
                            <th style="text-align:center; width: 5%">ID</th>
                            <th style="text-align:center;">Nama Layanan</th>
                            <th style="text-align:center; width: 10%">Satuan</th>
                            <th style="text-align:center; width: 10%">Harga</th>
                            <th style="text-align:center; width: 10%">Keterangan</th>
                            <th style="text-align:center; width: 15%">Tanggal</th>
                            <th style="text-align:center; width: 5%"> Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Placeholder</td>
                            <td>Placeholder</td>
                            <td>Placeholder</td>
                            <td>Placeholder</td>
                            <td>Placeholder</td>
                            <td>Placeholder</td>
                            <td>Placeholder</td>
                            <td>Placeholder</td>
                            <td>Placeholder</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="lihat" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Lihat</h5>
                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-group">
                            <div class="form-group">
                                <label for="nama_layanan" class="font-weight-bold text-dark">Nama Layanan</label>
                                <input type="text" class="form-control" id="nama_layanan" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="id_layanan" class="font-weight-bold text-dark">Id Layanan</label>
                                <input type="text" class="form-control" id="id_layanan" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="user" class="font-weight-bold text-dark">User</label>
                                <input type="text" class="form-control" id="user" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="satuan" class="font-weight-bold text-dark">Satuan</label>
                                <input type="text" class="form-control" id="satuan" readonly>
                            </div>
                            <div class="form-group">
                                <label for="harga" class="font-weight-bold text-dark">Harga</label>
                                <input type="text" class="form-control" id="harga" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="font-weight-bold text-dark">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="font-weight-bold text-dark">Tanggal</label>
                                <textarea class="form-control" name="tanggal" id="tanggal" value="" readonly style="min-height: 75px;max-height: 75px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="log_type" class="font-weight-bold text-dark">Log Type</label>
                                <input type="text" class="form-control" id="log_type" value="" readonly>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_javascript')
    <script>
        $(document).ready(function (e) {
            var t = $('#dataTables').DataTable();
            var table_items;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/log/layanan',
                method: "POST",
                data: {
                    id: {{\Illuminate\Support\Facades\Auth::user()->id}}
                },
                success: function (data) {
                    t.clear();
                    t.draw();
                    jQuery.each(data, function (index, values) {
                        var ind = index + 1;
                        t.row.add([
                            ind,
                            values.log_type,
                            values.id_layanan,
                            values.nama_layanan,
                            values.satuan,
                            values.harga,
                            values.keterangan,
                            jQuery.format.date(values.created_at, "dd MMMM yyyy"),
                            '<button type="button" name="view" id="' + values.id + '" class="btn btn-warning btn_view"><i class="fa fa-eye"></i></button>'
                        ]).order([ 0, 'asc' ]).draw(false);
                    });
                }
            });

            $('.btn-sync').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '/log/layanan',
                    method: "POST",
                    data: {
                        id: {{\Illuminate\Support\Facades\Auth::user()->id}}
                    },
                    success: function (data) {
                        t.clear();
                        t.draw();
                        jQuery.each(data, function (index, values) {
                            var ind = index + 1;
                            t.row.add([
                                ind,
                                values.log_type,
                                values.id_layanan,
                                values.nama_layanan,
                                values.satuan,
                                values.harga,
                                values.keterangan,
                                jQuery.format.date(values.created_at, "dd MMMM yyyy"),
                                '<button type="button" name="view" id="' + values.id + '" class="btn btn-warning btn_view"><i class="fa fa-eye"></i></button>'
                            ]).order([ 0, 'asc' ]).draw(false);
                        });
                    }
                });
            });

            $(document).on('click', '.btn_view', function () {
                var button_id = $(this).attr("id");
                $.ajax({
                    url: '/log/view/layanan',
                    method: "POST",
                    data: {
                        id: button_id,
                    },
                    success: function (data) {
                        var string = JSON.stringify(data[0]);
                        var object = jQuery.parseJSON(string);
                        document.getElementById("nama_layanan").value = object.nama_layanan;
                        document.getElementById("id_layanan").value = object.id_layanan;
                        document.getElementById("user").value = object.relasi_user.name;
                        document.getElementById("satuan").value = object.satuan;
                        document.getElementById("harga").value = object.harga;
                        document.getElementById("keterangan").value = object.keterangan;
                        document.getElementById("tanggal").value = jQuery.format.date(object.created_at, "dd MMMM yyyy");
                        document.getElementById("log_type").value = object.log_type;
                        $('#lihat').modal('show');
                    }
                });
            });

            $("#close").click(function () {
                $('#lihat').modal('hide');
            });
        });
    </script>
@endsection
