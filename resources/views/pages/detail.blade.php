@extends('layouts.app')

@section('title')
    Store Detail Page
@endsection

@section('content')
    <!-- page content -->
    <div class="page-content page-details">
      <!-- breadcrumb -->
      <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="">Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                    Product Details
                    <div class="bc ml-2 mt-1">(this is breadcrumb)</div>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <!-- gallery product (vue js) -->
      <section class="store-gallery mb-3" id="gallery">
        <div class="container">
          <div class="row">
            <!-- main image -->
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <!-- untuk membery transisi setiap gambar dipilih, dan transition ini termasuk part dalam vue js -->
                <img v-if="photos.length" v-bind:src="photos[activePhoto].url" v-bind:key="photos[activePhoto].id" class="w-100 main-image" />
                <!-- kegunaan v-bind: adalah untuk mengambil variabel yang sudah dibuat di vuenya, dan ini termasuk salah satu fungsi dari vue js -->
                <!-- fungsi dari photos[activePhoto].url adalah mengambil data dari field url dari objek/variabel "photos" yg dimana indeksnya adalah array ke 2 (1) -->
              </transition>
            </div>

            <!-- thumbnail image (penjelasan untuk v-for bisa diliat di kelas 3 5 5 slicing product details page section gallery markup) -->
            <div class="col-lg-2">
              <div class="row">
                <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" v-bind:key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                  <!-- maksut dari v-for jika dalam bahasa php itu seperti looping atau perulangan yg terdapat pada vue js, maksud dari index adalah
                 index akan menunjukkan posisi objek tersebut dalam array (dimulai dari 0). -->
                  <a href="#" v-on:click="changeActive(index)">
                    <!-- tag a ini hanya akan berjalan jika tag a nya di klik -->
                    <img v-bind:src="photo.url" class="w-100 thumbnail-image" v-bind:class="{ active: index == activePhoto }" alt="" />
                    <!-- v-bind:class="{ active: index == activePhoto }" berfungsi untuk saat dipilih gambarnya akan ada efek aktifnya,
                   cara bacanya adalah apakah index sama dengan activePhoto, jika true maka akan menambahkan "active" pada class di tag img -->
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- deskripsi product -->
      <div class="store-details-container mt-4" data-aos="fade-up">
        <!-- judul -->
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1>{{ $product->name }}</h1>
                <div class="owner">By {{ $product->user->store_name }}</div>
                <div class="price">Rp. {{ number_format($product->price) }}</div>
              </div>
              <!-- tombol -->
              <div class="col-lg-2" data-aos="zoom-in">
                @auth
                    <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <!-- jika user sudah login maka akan muncul tombol add to cart -->
                      <button class="btn btn-success px-4 text-white btn-block mb-3" type="submit">Add To Cart </button>
                    </form>
                @else
                    <!-- jika user belum login maka akan muncul tombol sign up atau sign in -->
                    <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">Sign In to Add </a>
                @endauth
              </div>
            </div>
          </div>
        </section>

        <!-- deskripsi produk -->
        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                {!! $product->description !!}
              </div>
            </div>
          </div>
        </section>

        <!-- review customer -->
        <section class="store-review">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Customer Review (3)</h5>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                  <li class="media">
                    <img src="/images/icons-testimonial-1.jpg" alt="" class="mr-3 rounded-circle" />
                    <!-- styling pada tag img untuk customer review ada di _details.scss -->
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">The Rogue Prince</h5>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta placeat fuga ratione, consequuntur assumenda id laborum amet, deserunt porro odio cumque praesentium saepe perspiciatis similique non
                    </div>
                  </li>
                  <li class="media">
                    <img src="/images/icons-testimonial-2.jpg" alt="" class="mr-3 rounded-circle" />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">The Dragonknight</h5>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta placeat fuga ratione, consequuntur assumenda id laborum amet, deserunt porro odio cumque praesentium saepe perspiciatis similique non
                    </div>
                  </li>
                  <li class="media">
                    <img src="/images/icons-testimonial-3.jpg" alt="" class="mr-3 rounded-circle" />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Naerys Targaryen</h5>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta placeat fuga ratione, consequuntur assumenda id laborum amet, deserunt porro odio cumque praesentium saepe perspiciatis similique non
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
@endsection

@push('addon-script') {{-- menaruh script vue ini (tergantung pada page/file ini butuh atau tidak) setelah include script (blade) yang pada layouts.app --}}
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        // elemen yang ada didalam sini akan di handle oleh vue js
        el: '#gallery',
        mounted() {
          // mounted adalah script yang akan dijalankan saat vue jsnya muncul (saat membuka website)
          AOS.init();
          // AOS harus di inisialisasikan dalam vue agar animasinya tidak hilang
        },

        data: {
          activePhoto: 0, // sebuah variabel biasa
          photos: [
            @foreach ($product->galleries as $gallery)
              {
                id: {{ $gallery->id }},
                url: "{{ Storage::url($gallery->photos) }}",
              },
            @endforeach
          ],
        },

        // fungsi methods adalah untuk menyimpan fungsi2 vue js yang nantinya akan dijalankan
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush