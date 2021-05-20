@extends('UserPage.layoutUser')

@section('content')
    <div class="container shadow-lg my-lg-5">
        <div class="row">
            <div class="card col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ">
                <div class="card h-100 no-gutters">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name">Dewa</h5>
                                <h6 class="user-email">Dewa@gmail.com</h6>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-outline-light text-dark shadow-lg mx-auto my-auto">Pilih Foto</button>
                        </div>
                        <div class="col-xl-12 col-sm-12 col-md-12 py-5">
                            <p class="text-muted">Besar file: maksimum 10.000.000 bytes (10 Megabytes). Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG</p>
                        </div>
                        <div class="col-xl-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-outline-light text-dark shadow-lg mx-auto my-auto">Ubah Kata sandi</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card no-gutters col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card shadow-lg h-100">
                    <div class="card-body">
                        <form method="POST" action="#"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Biodata Diri</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" value=""
                                               placeholder="Enter full name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value=""
                                               placeholder="Enter email ID" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Nomor Handphone</label>
                                        <input type="text" class="form-control" id="nohp" name="no_hp"
                                               value=""
                                               placeholder="Enter phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Alamat</h6>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="Street">Alamat</label>
                                        <textarea style="max-width: 100%; min-height:150px; max-height: 200px;"
                                                  type="name"
                                                  name="alamat"
                                                  class="form-control" id="Street"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                    <div class="input-group">
                                        <label for="Street">Konfirmasi Password </label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               value=""
                                               placeholder="Masukan password anda!!">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="text-right text-wrap">
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
