<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// import Str untuk membuat sebuah slug
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ProductGallery::with(['product'])->latest();

            // memakai datatables dari yajra
            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <form action="' . route('product-gallery.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm(\'Yakin Wak?\')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->editColumn('photos', function ($item) {
                return $item->photos ? '<img src="' . Storage::url($item->photos) . '" style="max-height: 80px;" />' : '';
            })->rawColumns(['action', 'photos'])->make(); // berfungsi agar style bisa terender dan tidak muncul tag htmlnya pada table
        }

        return view('pages.admin.product-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return view('pages.admin.product-gallery.create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'photos' => 'required|image',
            'products_id' => 'required|exists:products,id' // untuk validation exists cara membacanya berarti nilai yang dikirmkan untuk field products_id pada table product-galleries harus ada terlebih dahulu pada field id pada table products di database
        ]);

        $validateData['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($validateData);

        return redirect()->route('product-gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = ProductGallery::findOrFail($id);
        Storage::disk('public')->delete($product->photos);

        $product->delete();

        return redirect()->route('product-gallery.index');
    }
}
