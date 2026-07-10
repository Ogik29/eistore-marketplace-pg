@extends('layouts.dashboard')

@section('title')
    Ei Store Dashboard Product Details
@endsection

@push('addon-style')
    <!-- trix editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css" />
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <!-- ~~~~~~~~~~~~~~~ -->

    <style>
      /* Menyembunyikan tombol Sisipkan File trix editor */
      trix-toolbar [data-trix-action='attachFiles'] {
        display: none;
      }
    </style>
@endpush

@section('content')
    <!-- section content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Sirup Putih Jomokerto</h2>
                <p class="dashboard-subtitle">Product Details</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" name="" id="" class="form-control" v-model="name" value="Sirup Putih Jomokerto" autofocus />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="" id="" class="form-control" value="200" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Category</label>
                                <select name="category" id="" class="form-control">
                                  <option value="" disabled>Select Category</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Description</label>
                                <input id="description" type="hidden" name="description" value="" />
                                <trix-editor input="description"></trix-editor>
                              </div>
                            </div>
                          </div>

                          <!-- save button -->
                          <div class="row">
                            <div class="col text-right">
                              <button type="submit" class="btn btn-success px-5 btn-block">Save Now</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- untuk edit dan add photo -->
                <div class="row mt-2">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="gallery-container">
                              <img src="/images/product-card-1.png" alt="" class="w-100" />
                              <a href="" class="delete-gallery">
                                <img src="/images/icon-delete.svg" alt="" />
                              </a>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="gallery-container">
                              <img src="/images/product-card-2.png" alt="" class="w-100" />
                              <a href="" class="delete-gallery">
                                <img src="/images/icon-delete.svg" alt="" />
                              </a>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="gallery-container">
                              <img src="/images/product-card-3.png" alt="" class="w-100" />
                              <!-- tombol delete image (style berada pada file _dashboard.scss) -->
                              <a href="" class="delete-gallery">
                                <img src="/images/icon-delete.svg" alt="" />
                              </a>
                            </div>
                          </div>
                          <!-- tombol add photo -->
                          <div class="col-12">
                            <input type="file" name="" id="file" style="display: none" multiple />
                            <button type="submit" class="btn btn-secondary btn-block mt-3" onclick="thisFileUpload()">Add Photo</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('addon-script')
    <!-- trix editor -->
    <script>
      // untuk menonaktifkan fitur upload file pada trix editor
      document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
      });
    </script>

    <!-- script yg berfungsi untuk mewakilkan tombol input file yg di hidden menjadi tombol Add Photo sesuai idnya yaitu "file" ketika tombol diklik -->
    <script>
      function thisFileUpload() {
        document.getElementById('file').click();
      }
    </script>
@endpush