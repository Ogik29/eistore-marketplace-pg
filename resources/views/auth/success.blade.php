@extends('layouts.success')

@section('title')
    Register Success Wak
@endsection

@section('content')
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <!-- "align-items-center" adalah class custom untuk membuat semua kontent berada di tengah halaman (sama halnya dengan justify-content-center) -->
            <div class="col-lg-6 text-center">
              <img src="/images/success.svg" alt="" class="mb-4" />
              <h2>Welcome to Our Store</h2>
              <p>
                You have successfully registered with us. <br />
                Let's grow up now.
              </p>
              <div class="">
                <a href="/dashboard.html" class="btn btn-success w-50 mt-4">My Dashboard</a>
                <a href="/index.html" class="btn btn-signup w-50 mt-2">Go to Shopping</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection