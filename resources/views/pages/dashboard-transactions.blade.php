@extends('layouts.dashboard')

@section('title')
    Ei Store Dashboard Product Details
@endsection

@section('content')
    <!-- section content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions</h2>
            <p class="dashboard-subtitle">Big result start from the small one</p>
            </div>
            <div class="dashboard-content">
            <div class="row mt-3">
                <div class="col-12 mt-2">
                <!-- tab pills -->
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-sell-tab" data-toggle="pill" href="#pills-sell" role="tab" aria-controls="pills-sell" aria-selected="true">Sell Product</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-buy-tab" data-toggle="pill" href="#pills-buy" role="tab" aria-controls="pills-buy" aria-selected="false">Buy Product</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-sell" role="tabpanel" aria-labelledby="pills-sell-tab">
                    <!-- list sell transactions -->
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
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
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
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
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
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
                    <div class="tab-pane fade" id="pills-buy" role="tabpanel" aria-labelledby="pills-buy-tab">
                        
                    <!-- list buy transactions -->
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
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
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
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
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
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
        </div>
    </div>
@endsection
