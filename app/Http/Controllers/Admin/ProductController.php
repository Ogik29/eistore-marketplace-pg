<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// import Str untuk membuat sebuah slug
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Product::with(['user', 'category'])->latest();

            // memakai datatables dari yajra
            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('product.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('product.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm(\'Yakin Wak?\')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->rawColumns(['action'])->make(); // berfungsi agar bisa terender dan tidak muncul tag htmlnya pada table
        }

        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.product.create', [
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'users_id' => 'required|exists:users,id', // untuk validation exists cara membacanya berarti nilai yang dikirmkan untuk field users_id pada table products harus ada terlebih dahulu pada field id pada table users di database
            'categories_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        $validateData['slug'] = Str::slug($request->name);

        Product::create($validateData);

        return redirect()->route('product.index');
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
        $product = Product::findOrFail($id); // memakai findOrFail agar jika data tidak ketemu maka akan mengembalikan 404
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.product.edit', [
            'product' => $product,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'users_id' => 'required|exists:users,id', // untuk validation exists cara membacanya berarti nilai yang dikirmkan untuk field users_id pada table product harus ada pada field id pada table users di database
            'categories_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        $validateData['slug'] = Str::slug($request->name);

        $product = Product::findOrFail($id);

        $product->update($validateData);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // Storage::disk('public')->delete($product->photo); (penghapusan file photo ini saya nonaktifkan karena saya memakai softDeletes() pada table categories yang dimana ketika di delete, data masih tersimpan di dalam database agar memudahkan saat proses backup jika diperlukan)

        $product->delete();

        return redirect()->route('product.index');
    }
}
