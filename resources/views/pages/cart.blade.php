@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <!-- page content -->
    <div class="page-content page-cart">
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
                    Cart
                    <div class="bc ml-2 mt-1">(this is breadcrumb)</div>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <!-- daftar item yang masuk cart -->
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <!-- table -->
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
                <!-- table head -->
                <th>
                  <tr>
                    <td>Image</td>
                    <td>Product &amp; Seller</td>
                    <td>Price</td>
                    <td>Menu</td>
                  </tr>
                </th>
                <tbody>
                  <tr>
                    <td style="width: 20%">
                      <img src="/images/product-cart-1.jpg" class="cart-image" alt="" />
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">Sofa Acumalaka</div>
                      <div class="product-subtitle">Daemon Targaryen</div>
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">$1,500</div>
                      <div class="product-subtitle">USD</div>
                    </td>
                    <td style="width: 20%">
                      <a href="#" class="btn btn-remove-cart">Remove</a>
                    </td>
                  </tr>

                  <tr>
                    <td style="width: 20%">
                      <img src="/images/product-cart-2.jpg" class="cart-image" alt="" />
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">Orange Bogotta</div>
                      <div class="product-subtitle">Daemon I Blackfyre</div>
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">$1,500</div>
                      <div class="product-subtitle">USD</div>
                    </td>
                    <td style="width: 20%">
                      <a href="#" class="btn btn-remove-cart">Remove</a>
                    </td>
                  </tr>

                  <tr>
                    <td style="width: 20%">
                      <img src="/images/product-cart-3.jpg" class="cart-image" alt="" />
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">Kopi Kapal Karam</div>
                      <div class="product-subtitle">Aemon The Dragonknight</div>
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">$1,500</div>
                      <div class="product-subtitle">USD</div>
                    </td>
                    <td style="width: 20%">
                      <a href="#" class="btn btn-remove-cart">Remove</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- endtable -->
          </div>

          <!-- menambahkan garis (tag hr) untuk memisahkan tiap-tiap div -->
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Shipping Details</h2>
            </div>
          </div>
          <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

          <!-- menambahkan form untuk menghitung barang di cart -->
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6">
              <!-- diberikan col-md-6 agar form-groupnya bisa 2 form karena 1 halaman maksimal 12 col -->
              <div class="form-group">
                <label for="addressOne">Address 1</label>
                <input type="text" class="form-control" id="addressOne" name="addressOne" value="Rusdimus Prime" />
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

          <!-- menambahkan garis (tag hr) untuk memisahkan tiap-tiap div -->
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-1">Payment Information</h2>
            </div>
          </div>
          <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-2">
              <div class="product-title">$10</div>
              <div class="product-subtitle">Country Tax</div>
            </div>
            <div class="col-4 col-md-3">
              <div class="product-title">$280</div>
              <div class="product-subtitle">Product Insurance</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">$580</div>
              <div class="product-subtitle">Ship to Jakarta</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title text-success">$400,000</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-3">
              <a href="/success.html" class="btn btn-success mt-4 px-4 btn-block">Checkout Now</a>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection