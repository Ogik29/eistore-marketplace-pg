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
                    <a href="/index.html" class="">Home</a>
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
      <section class="store-gallery" id="gallery">
        <div class="container">
          <div class="row">
            <!-- main image -->
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <!-- untuk membery transisi setiap gambar dipilih, dan transition ini termasuk part dalam vue js -->
                <img v-bind:src="photos[activePhoto].url" v-bind:key="photos[activePhoto].id" class="w-100 main-image" />
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
                <h1>Sofa Teracumalaka</h1>
                <div class="owner">By Daemon Targaryen</div>
                <div class="price">$1,500</div>
              </div>
              <!-- tombol -->
              <div class="col-lg-2" data-aos="zoom-in">
                <a href="cart.html" class="btn btn-success px-4 text-white btn-block mb-3">Add To Cart </a>
              </div>
            </div>
          </div>
        </section>

        <!-- deskripsi produk -->
        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut porro blanditiis qui, magni sed expedita voluptatem sunt, similique at reiciendis, possimus perferendis nesciunt eveniet animi. Labore deserunt fugiat numquam
                  eaque! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem, quam. Dolorum aspernatur dolorem pariatur natus voluptate alias nobis, porro delectus. Provident praesentium vitae dolore veniam nam aut magnam totam
                  aliquam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem quis totam tempora sed architecto, quia consectetur voluptatibus ducimus nihil enim officia debitis maxime dolorem placeat laudantium amet nesciunt
                  obcaecati! Dicta.
                </p>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga quia vel minus laboriosam delectus illum nisi at, dolorum ullam reprehenderit, exercitationem eum cumque voluptates voluptate ea quasi iusto ex dignissimos?
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus assumenda dignissimos deserunt natus! Nostrum fugiat saepe veritatis obcaecati deleniti, inventore, reprehenderit suscipit rem tempora, labore sunt id neque
                  aliquam voluptatem! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam maxime vel explicabo necessitatibus fuga, deleniti tempore consectetur eius sed? Odio, maiores dolore ex ipsa iusto architecto magni
                  obcaecati necessitatibus vel.
                </p>
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
            {
              id: 1,
              url: '/images/product-details-1.jpg',
            },
            {
              id: 2,
              url: '/images/product-details-2.jpg',
            },
            {
              id: 3,
              url: '/images/product-details-3.jpg',
            },
            {
              id: 4,
              url: '/images/product-details-4.jpg',
            },
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