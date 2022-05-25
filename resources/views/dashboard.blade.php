@extends('layouts.main')

@section('title', 'Admin Dashboard')
 
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">Rp. 100</span></div>
                                    <div class="stat-heading">Penghasilan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">100</span></div>
                                    <div class="stat-heading">Penjualan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Pembelian Terbaru </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>ID</th>
                                            <th>Travel</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>11</td>
                                            <td>tes</td>
                                            <td>total</td>
                                            <td>date</td>
                                            <td>status</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11</td>
                                            <td>tes</td>
                                            <td>total</td>
                                            <td>date</td>
                                            <td>status</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11</td>
                                            <td>tes</td>
                                            <td>total</td>
                                            <td>date</td>
                                            <td>status</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11</td>
                                            <td>tes</td>
                                            <td>total</td>
                                            <td>date</td>
                                            <td>status</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11</td>
                                            <td>tes</td>
                                            <td>total</td>
                                            <td>date</td>
                                            <td>status</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11</td>
                                            <td>tes</td>
                                            <td>total</td>
                                            <td>date</td>
                                            <td>status</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11</td>
                                            <td>tes</td>
                                            <td>total</td>
                                            <td>date</td>
                                            <td>status</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11</td>
                                            <td>tes</td>
                                            <td>total</td>
                                            <td>date</td>
                                            <td>status</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11</td>
                                            <td>tes</td>
                                            <td>total</td>
                                            <td>date</td>
                                            <td>status</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>  

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Statistik</strong>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><i class="fa fa-times-circle text-danger mr-3"></i>Transaction Failed <span class="text-dark text-bold">1</span></p>
                            <p class="card-text"><i class="fa fa-check-circle text-danger mr-3"></i>Transaction Success <span class="text-dark text-bold">2</span></p>
                            <p class="card-text"><i class="fa fa-spinner text-danger mr-3"></i>Transaction Pending <span class="text-dark text-bold">2</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection