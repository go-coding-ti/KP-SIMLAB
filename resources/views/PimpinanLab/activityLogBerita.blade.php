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
                            <th style="text-align:center; width:15%">Log Type</th>
                            <th style="text-align:center; width:5%">ID</th>
                            <th style="text-align:center;">Judul</th>
                            <th style="text-align:center; width:20%">User</th>
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
                                <label class="font-weight-bold text-dark">Judul</label>
                                <input type="text" class="form-control" id="judul" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Id Berita</label>
                                <input type="text" class="form-control" id="id_berita" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">User</label>
                                <input type="text" class="form-control" id="user" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Isi</label>
                                <textarea class="form-control" id="isi" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Tanggal</label>
                                <input type="text" class="form-control" id="tanggal" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Log Type</label>
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
                url: '/log/berita',
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
                            values.id_berita,
                            values.judul,
                            values.relasi_user.name,
                            jQuery.format.date(values.tanggal, "dd MMMM yyyy"),
                            '<button type="button" name="view" id="' + values.id + '" class="btn btn-warning btn_view"><i class="fa fa-eye"></i></button>'
                        ]).order([ 0, 'asc' ]).draw(false);
                    });
                }
            });

            $('.btn-sync').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '/log/berita',
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
                                values.id_berita,
                                values.judul,
                                values.relasi_user.name,
                                jQuery.format.date(values.tanggal, "dd MMMM yyyy"),
                                '<button type="button" name="view" id="' + values.id + '" class="btn btn-warning btn_view"><i class="fa fa-eye"></i></button>'
                            ]).order([ 0, 'asc' ]).draw(false);
                        });
                    }
                });
            });

            $(document).on('click', '.btn_view', function () {
                var button_id = $(this).attr("id");
                $.ajax({
                    url: '/log/view/berita',
                    method: "POST",
                    data: {
                        id: button_id,
                    },
                    success: function (data) {
                        var string = JSON.stringify(data[0]);
                        var object = jQuery.parseJSON(string);
                        document.getElementById("judul").value = object.judul;
                        document.getElementById("id_berita").value = object.id_berita;
                        document.getElementById("user").value = object.relasi_user.name;
                        document.getElementById("isi").value = object.isi;
                        document.getElementById("tanggal").value = jQuery.format.date(object.tanggal, "dd MMMM yyyy");
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
