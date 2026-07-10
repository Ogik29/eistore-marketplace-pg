@extends('layouts.dashboard')

@section('title')
  Store Settings
@endsection

@section('content')
  <!-- section content -->
  <div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Store Settings</h2>
        <p class="dashboard-subtitle">Make store that profitable</p>
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
                        <label for="">Store Name</label>
                        <input type="text" name="" id="" class="form-control" v-model="name" autofocus />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Category</label>
                        <select name="category" id="" class="form-control">
                          <option value="" disabled>Select Category</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <!-- form radio button -->
                      <div class="form-group">
                        <label for="">Store Status</label>
                        <p class="text-muted">Do you also want to open a shop?</p>
                        <!-- radio button boleh -->
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreTrue" value="true" />
                          <label for="openStoreTrue" class="custom-control-label">Open</label>
                        </div>
                        <!-- radio button tidak boleh -->
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreFalse" value="false" />
                          <label for="openStoreFalse" class="custom-control-label">Temporarily Closed</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- save button -->
                  <div class="row">
                    <div class="col text-right">
                      <button type="submit" class="btn btn-success px-5">Save Now</button>
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