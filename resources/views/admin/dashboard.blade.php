@extends('layouts.adminLayout.admin_design')
@section('content')
    <div class="container-fluid">
         <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 text-center bg-dark" style="margin-bottom: 20px">
                <img class="img-fluid" style="max-width: 100%; max-height: 400px" src="{{ asset('assets/images/logo_big.png') }}" >
                    {{-- <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Site Analysis</h4>
                                <h5 class="card-subtitle">Overview of Latest Month</h5>
                            </div>
                        </div>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-line-chart"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">2540</h5>
                                            <small class="font-light">Total Users</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-plus fs-3 font-16"></i>
                                            <h5 class="mb-0 mt-1">120</h5>
                                            <small class="font-light">New Users</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-cart fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">656</h5>
                                            <small class="font-light">Total Shop</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-tag fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">9540</h5>
                                            <small class="font-light">Total Orders</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">100</h5>
                                            <small class="font-light">Pending Orders</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-web fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">8540</h5>
                                            <small class="font-light">Online Orders</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                        </div>
                    </div> --}}
                </img>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column dashboard -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card card-hover">
                    <a href="{{ url('admin/dashboard') }}">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-view-dashboard"></i>
                        </h1>
                        <h6 class="text-white">Dashboard</h6>
                    </div>
                </a>
                </div>
            </div>
            <!-- Column tables -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card card-hover">
                    <a href="{{ url('admin/tables') }}">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-border-outside"></i>
                        </h1>
                        <h6 class="text-white">Tables</h6>
                    </div>
                </a>
                </div>
            </div>


            <!-- Column settings -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card card-hover">
                    <a href="{{ url('admin/settings') }}">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-pencil"></i>
                        </h1>
                        <h6 class="text-white">Settings</h6>
                    </div>
                </a>
                </div>
            </div>


        </div>
@endsection
