@extends('layouts.dashboard')

@section('title')
    Ei Store Dashboard Product Details
@endsection

@section('content')
    <!-- section content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">#STORE10</h2>
            <p class="dashboard-subtitle">Transaction / Details</p>
            </div>
            <div class="dashboard-content" id="transactionDetails">
            <!-- diberikan id="transactionDetails" pada dashboard-content karena ingin memakai vue js -->
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                        <img src="/images/product-details-dashboard.png" class="w-100 mb-3" alt="" />
                        </div>
                        <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12 col-md-6">
                            <div class="product-title">Customer Name</div>
                            <div class="product-subtitle">Viparias</div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="product-title">Product Name</div>
                            <div class="product-subtitle">Sempak Kuning Mas Rusdi</div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="product-title">Date of Transaction</div>
                            <div class="product-subtitle">18 Desember, 2022</div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="product-title">Payment Status</div>
                            <div class="product-subtitle text-danger">Pending</div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="product-title">Total Amount</div>
                            <div class="product-subtitle">$280,410</div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="product-title">Mobile</div>
                            <div class="product-subtitle">+628 2020 11111</div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- bagian shipping information -->
                    <div class="row">
                        <div class="col-12 mt-4">
                        <h5>Shipping Information</h5>
                        </div>
                        <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-6">
                            <div class="product-title">Address I</div>
                            <div class="product-subtitle">The Gate</div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="product-title">Address II</div>
                            <div class="product-subtitle">Blok A</div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="product-title">Province</div>
                            <div class="product-subtitle">The North</div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="product-title">City</div>
                            <div class="product-subtitle">Winterfell</div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="product-title">Postal Code</div>
                            <div class="product-subtitle">12345</div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="product-title">Country</div>
                            <div class="product-subtitle">Westeros</div>
                            </div>
                            <div class="col-12 col-md-3">
                            <div class="product-title">Shipping Status</div>
                            <select name="status" id="status" class="form-control" v-model="status">
                                {{-- <option value="UNPAID">Unpaid</option> --}}
                                <option value="PENDING">Pending</option>
                                <option value="SHIPPING">Shipping</option>
                                <option value="SUCCESS">Success</option>
                            </select>
                            </div>
                            <template v-if="status == 'SHIPPING'">
                            <!-- jika statusnya adalah shipping, maka akan memunculkan resinya -->
                            <div class="col-md-3">
                                <div class="product-title">Input Resi</div>
                                <input type="text" class="form-control" name="resi" v-model="resi" />
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success btn-block mt-4">Update Resi</button>
                            </div>
                            </template>
                        </div>
                        </div>
                    </div>
                    <!-- tombol save -->
                    <div class="row mt-4">
                        <div class="col-12 text-right">
                        <button type="submit" class="btn btn-success btn-lg mt-4">Save Now</button>
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
        <!-- vue js -->
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var transactionDetails = new Vue({
        el: '#transactionDetails', // target
        data: {
          status: 'SHIPPING',
          resi: 'BD12345667123123',
        },
      });
    </script>
@endpush
