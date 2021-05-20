@extends('PimpinanLayout.layout')
@section('content')
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name">{{$data->name}}</h5>
                                <h6 class="user-email">{{$data->email}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <form method="POST" action="{{route('editProfilePimpinan')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}"
                                               placeholder="Enter full name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}"
                                               placeholder="Enter email ID" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Nomor Handphone</label>
                                        <input type="text" class="form-control" id="nohp" name="no_hp"
                                               value="{{$data->no_hp}}"
                                               placeholder="Enter phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="Street">Alamat</label>
                                        <textarea style="max-width: 100%; min-height:150px; max-height: 200px;"
                                                  type="name"
                                                  name="alamat"
                                                  class="form-control" id="Street">{{$data->alamat}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                    <div class="input-group">
                                        <label for="Street">Password &nbsp;&nbsp;</label>
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

@section('css')
    <style>
        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }
    </style>
@endsection
