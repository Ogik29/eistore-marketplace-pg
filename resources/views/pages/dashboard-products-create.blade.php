@extends('layouts.dashboard')

@section('title')
    Ei Store Dashboard Product Create
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
            <h2 class="dashboard-title">Create Product</h2>
            <p class="dashboard-subtitle">Create Ur Own Product</p>
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
                            <input type="text" name="" id="" class="form-control" v-model="name" autofocus />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="" id="" class="form-control" />
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
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="">Thumbnails</label>
                            <input type="file" class="form-control" />
                            <p class="text-muted">You can include more than one file</p>
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