@extends('KetuaLabLayout.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xl-3 col-sm-12">
                <div class="card">
                    <div class="card-header" style="background-color: white">
                        <h3 class="card-title text-primary text-center font-weight-bold">Keterangan</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li style="list-style-type: none"><p class="btn ket-1 col-9">Menunggu Konfirmasi</p></li>
                            <li style="list-style-type: none"><p class="btn ket-2 col-9">Diterima</p></li>
                            <li style="list-style-type: none"><p class="btn ket-3 col-9">Ditolak</p></li>
                            <li style="list-style-type: none"><p class="btn ket-4 col-9">Menunggu Pembayaran</p></li>
                            <li style="list-style-type: none"><p class="btn ket-5 col-9">Pengerjaan</p></li>
                            <li style="list-style-type: none"><p class="btn ket-6 col-9">Selesai</p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xl-9 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
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
                            <label class="font-weight-bold text-dark">Peminjam</label>
                            <input type="text" class="form-control" id="peminjam" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Laboratorium</label>
                            <input type="text" class="form-control" id="laboratorium" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Layanan</label>
                            <input type="text" class="form-control" id="layanan" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Tanggal order</label>
                            <input type="text" class="form-control" id="tanggal_order" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Tanggal pinjam</label>
                            <input type="text" class="form-control" id="tanggal_pinjam" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Tanggal selesai</label>
                            <input type="text" class="form-control" id="tanggal_selesai" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Satuan</label>
                            <input type="text" class="form-control" id="satuan" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Harga Total</label>
                            <input type="text" class="form-control" id="harga" value="" readonly>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,timeGridDay'
                },
                events: {!!json_encode($eventoo)!!},
                eventClick: function (info) {
                    $.ajax({
                        url:"/kepala/calendar/view",
                        type:"POST",
                        data:{
                            id:info.event.id
                        },
                        success:function (data) {
                            var string = JSON.stringify(data[0]);
                            var object = jQuery.parseJSON(string);
                            document.getElementById("peminjam").value = object.peminjam;
                            document.getElementById("laboratorium").value = object.laboratorium;
                            document.getElementById("layanan").value = object.nama_layanan;
                            document.getElementById("tanggal_order").value = object.tanggal_order;
                            document.getElementById("tanggal_pinjam").value = object.start;
                            document.getElementById("tanggal_selesai").value = object.end;
                            document.getElementById("jumlah").value = object.jumlah;
                            document.getElementById("satuan").value = object.satuan;
                            document.getElementById("harga").value = object.harga;
                            $('#lihat').modal('show');
                        }
                    })
                },
            });

            calendar.render();

            $( "#close" ).click(function() {
                $('#lihat').modal('hide');
            });
        });
    </script>
@endsection
