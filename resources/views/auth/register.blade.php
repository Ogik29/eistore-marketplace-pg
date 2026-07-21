@extends('layouts.auth')

@section('title')
    Register Wak
@endsection

@section('content')
<!-- page content untuk halaman login -->
    <!-- id="register" akan bekerja untuk vue js -->
    <div class="page-content page-auth" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-4">
              <h2>
                Start for buy and sell, <br />
                with the easier way.
              </h2>
              <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                  <label for="">Full Name</label>
                  <input id="name" v-model="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="">Email</label>
                  <input id="email" v-model="email" @change="checkEmail()" type="email" class="form-control @error('email') is-invalid @enderror" :class="{ 'is-invalid' : this.email_unavailable}" name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="">Password Confirmation</label>
                  <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

                  @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <!-- form radio button -->
                <div class="form-group">
                  <label for="">Store</label>
                  <p class="text-muted">Do you also want to open a shop?</p>
                  <!-- radio button boleh -->
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreTrue" v-model="is_store_open" :value="true" />
                    <label for="openStoreTrue" class="custom-control-label">Yes, U Can</label>
                  </div>
                  <!-- radio button tidak boleh -->
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreFalse" v-model="is_store_open" :value="false" />
                    <label for="openStoreFalse" class="custom-control-label">No, Thank U</label>
                  </div>
                </div>
                <!-- jika vue value dari input name is_store_open adalah "true" (disetting pada bagian vue jsnya) maka akan memunculkan form-group store name dan category -->
                <div class="form-group" v-if="is_store_open">
                  <label for="">Store Name</label>
                  <input type="text" v-model="store_name" id="store_name" class="form-control @error('store_name') is-invalid @enderror" name="store_name" required autocomplete autofocus />

                  @error('store_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label for="">Category</label>
                  <select name="categories_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                          {{ $category->name }}
                        </option>
                    @endforeach
                  </select>
                </div>
                
                <button class="btn btn-success btn-block mt-4" type="submit" :disabled="this.email_unavailable">Sign Up Now</button>
                <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">Back to Sign In</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


    @push('addon-script') {{-- menaruh script vue ini (tergantung pada page/file ini butuh atau tidak) setelah include script (blade) yang pada layouts.auth --}}
        <script src="/vendor/vue/vue.js"></script>
        <!-- vue toasted digunakan untuk menampilkan notif pesan mengambang pada halaman browser -->
        <script src="https://unpkg.com/vue-toasted"></script>
        <!--axios untuk mengambil data dari backend-->
        <script src="https://unpkg.com/axios@1.13.2/dist/axios.min.js"></script>
        <script>
        Vue.use(Toasted);

        var register = new Vue({
            el: '#register',
            mounted() {
            AOS.init();
            // this.$toasted.error(
            //     // jika ada error
            //     'Sorry, The Email Already Exists.',
            //     {
            //     position: 'top-center',
            //     className: 'rounded',
            //     duration: 1000,
            //     }
            // );
            },

            methods: {
              // fungsi untuk menampilkan pesan jika email sudah terdaftar
              checkEmail() {
                var self = this;
                axios.get('{{ route("api-register-check") }}', {
                  params: {
                    email: self.email
                  }
                })
                .then(response => {
                  if(response.data === 'Unavailable') {
                    self.$toasted.error(
                      'Sorry, The Email Already Exists.',
                      {
                        position: 'top-center',
                        className: 'rounded',
                        duration: 1000,
                      }
                    );
                    self.email_unavailable = true;
                  } else {
                    self.$toasted.success(
                      'Email Available',
                      {
                        position: 'top-center',
                        className: 'rounded',
                        duration: 1000,
                      }
                    );
                    self.email_unavailable = false;
                  }
                })
                .catch(error => {
                  console.log(error);
                });
              }
            },

            data() {
            // bisa ter connect satu sama lain karena adanya v-model
              return {
                name: 'daemon Targaryen',
                email: 'daemontargaryen@gmail.com',
                is_store_open: true,
                store_name: '',
                email_unavailable: false
              }
            
            },
        });
    </script>

    @endpush
@endsection
