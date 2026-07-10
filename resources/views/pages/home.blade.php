@extends('layouts.app')

@section('title')
    Ei Store Homepage
@endsection

@section('content')
    <div class="page-content page-home">
        <section class="store-carousel">
        <div class="container">
            <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
                <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                <!-- data-ride="carousel" dibutuhkan oleh bootstrap untuk menjalankan carouselnya -->
                <ol class="carousel-indicators">
                    <!-- data dummy li -->
                    <li class="active" data-target="#storeCarousel" data-slide-to="0"></li>
                    <li data-target="#storeCarousel" data-slide-to="1"></li>
                    <li data-target="#storeCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="/images/banner.jpg" alt="carousel image" class="d-block w-100" />
                    </div>
                    <div class="carousel-item">
                    <img src="/images/banner.jpg" alt="carousel image" class="d-block w-100" />
                    </div>
                    <div class="carousel-item">
                    <img src="/images/banner.jpg" alt="carousel image" class="d-block w-100" />
                    </div>
                </div>
                <a class="carousel-control-prev" href="#storeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#storeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
            </div>
        </div>
        </section>

        <section class="store-trend-categories">
        <div class="container">
            <!-- row untuk h5 Trend Categories -->
            <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>Trend Categories</h5>
            </div>
            </div>
            <!-- row untuk masing-masing icon category -->
            <div class="row">
                @php $incrementCategory = 0 @endphp
                @forelse ($categories as $category)    
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory += 100 }}">
                        <!-- memberi delay pada data aos dengan jumlah ms yang berbeda-beda tiap markup agar animasi munculnya bertahap -->
                        <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">{{ $category->name }}</p>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                        No Categories Found
                    </div>
                @endforelse
            </div>
        </div>
        </section>

        <section class="store-new-product">
        <div class="container">
            <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>New Products</h5>
            </div>
            </div>

            <!-- daftar barangnya -->
            <div class="row">
                <!-- coloumn masi belum bisa tampil jika belum styling pada file cssnya (_products.scss) -->
                <!-- col-6 untuk tampilan mobile agar perbaris hanya ada 2 kolom -->
                @php $incrementProduct = 0 @endphp
                @forelse ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct += 100 }}">
                        <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image mt-2" 
                                style="@if($product->galleries)
                                        background-image: url('{{ Storage::url  ($product->galleries->first()->photos) }}');
                                    @else
                                        backgorund-color: #eee;
                                    @endif">
                            </div>
                        </div>
                        <div class="products-text">{{ $product->name }}</div>
                        <div class="products-price">Rp. {{ number_format($product->price) }}</div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                        No Products Found
                    </div>
                @endforelse
            
            </div>
        </div>
        </section>
    </div>
@endsection