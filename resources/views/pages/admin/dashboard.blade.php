@extends('layouts.admin')

@section('title')
    Ei Store Atmint Dashboard
@endsection

@section('content')
    <!-- section content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Atmint Dashboard</h2>
            <p class="dashboard-subtitle">Ei Store Administrator</p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                    <div class="dashboard-card-title">Customer</div>
                    <div class="dashboard-card-subtitle">{{ $customer }}</div>
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                    <div class="dashboard-card-title">Revenue</div>
                    <div class="dashboard-card-subtitle">Rp.{{ $revenue }}</div>
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                    <div class="dashboard-card-title">Transaction</div>
                    <div class="dashboard-card-subtitle">{{ $transactionCount }}</div>
                    </div>
                </div>
                </div>
            </div>

            <!-- recent transaction -->
            <div class="row mt-3">
                <div class="col-12 mt-2">
                <h5 class="mb-3">Recent Transactions</h5>
                <a href="/dashboard-transaction-details.html" class="card card-list d-block">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                        <img src="/images/dashboard-icon-product-1.png" alt="" />
                        </div>
                        <div class="col-md-4">Shirup Tememvig</div>
                        <div class="col-md-3">Aemon Targaryen</div>
                        <div class="col-md-3">15 Januari, 2024</div>
                        <div class="col-md-1 d-none d-md-block">
                        <img src="/images/dashboard-arrow-right.svg" alt="" />
                        </div>
                    </div>
                    </div>
                </a>
                <a href="/dashboard-transaction-details.html" class="card card-list d-block">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                        <img src="/images/dashboard-icon-product-2.png" alt="" />
                        </div>
                        <div class="col-md-4">Shirup Tememvig</div>
                        <div class="col-md-3">Aemon Targaryen</div>
                        <div class="col-md-3">15 Januari, 2024</div>
                        <div class="col-md-1 d-none d-md-block">
                        <img src="/images/dashboard-arrow-right.svg" alt="" />
                        </div>
                    </div>
                    </div>
                </a>
                <a href="/dashboard-transaction-details.html" class="card card-list d-block">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                        <img src="/images/dashboard-icon-product-3.png" alt="" />
                        </div>
                        <div class="col-md-4">Shirup Tememvig</div>
                        <div class="col-md-3">Aemon Targaryen</div>
                        <div class="col-md-3">15 Januari, 2024</div>
                        <div class="col-md-1 d-none d-md-block">
                        <img src="/images/dashboard-arrow-right.svg" alt="" />
                        </div>
                    </div>
                    </div>
                </a>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection