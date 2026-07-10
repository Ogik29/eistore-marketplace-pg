@extends('layouts.admin')

@section('title')
    Product
@endsection

@section('content')
    <!-- section content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Product</h2>
            <p class="dashboard-subtitle">Edit Product</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('product.update', $product->id) }}" method="POST", enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Product Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Product Owner</label>
                                                <select name="users_id" id="" class="form-control">
                                                    @foreach ($users as $user)
                                                        <option 
                                                            @if ($product->users_id == $user->id) 
                                                                value="{{ $user->id }}" selected 
                                                            @else 
                                                                value="{{ $user->id }}" 
                                                            @endif>{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Category Product</label>
                                                <select name="categories_id" id="" class="form-control">
                                                    @foreach ($categories as $category)
                                                        <option 
                                                            @if ($product->categories_id == $category->id) 
                                                                value="{{ $category->id }}" selected 
                                                            @else 
                                                                value="{{ $category->id }}" 
                                                            @endif>{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <input id="x" type="hidden" name="description" value="{!! $product->description !!}">
                                                <trix-editor input="x"></trix-editor>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">Save Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
