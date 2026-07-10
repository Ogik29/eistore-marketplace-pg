@extends('layouts.app')

@section('title')
    Categories page
@endsection

@section('content')
    <!-- page content (gambar utama) -->
    <div class="page-content page-home">
      <section class="store-trend-categories">
        <div class="container">
          <!-- row untuk h5 Trend Categories -->
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Categories</h5>
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
              <h5>All Products</h5>
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
          <div class="row">
            <div class="col-12 mt-4">
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection