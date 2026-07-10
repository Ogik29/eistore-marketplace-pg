@extends('layouts.dashboard')

@section('title')
  Account Setting
@endsection

@section('content')
  <!-- section content -->
  <div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">My Account</h2>
        <p class="dashboard-subtitle">Update your current profile</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <form action="">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <!-- diberikan col-md-6 agar form-groupnya bisa 2 form karena 1 halaman maksimal 12 col -->
                      <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="Rusdimus Prime" />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="ambaleon@gmail.com" />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <!-- diberikan col-md-6 agar form-groupnya bisa 2 form karena 1 halaman maksimal 12 col -->
                      <div class="form-group">
                        <label for="addressOne">Address 1</label>
                        <input type="text" class="form-control" id="addressOne" name="addressOne" value="Yungawi" />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="addressTwo">Address 2</label>
                        <input type="text" class="form-control" id="addressTwo" name="addressTwo" value="Rongawi 1" />
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="province">Province</label>
                        <select name="province" id="province" class="form-control">
                          <option value="East Java">Jawir Timur</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="city">City</label>
                        <select name="city" id="city" class="form-control">
                          <option value="Rongawi">Rongawi</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode" value="1010" />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="Indonesia loh yaa" />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="+6282 8888 9910" />
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