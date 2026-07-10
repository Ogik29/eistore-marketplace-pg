<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

// import Str untuk membuat sebuah slug
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Category::query()->latest();

            // memakai datatables dari yajra
            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('category.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('category.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm(\'Yakin Wak?\')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->editColumn('photo', function ($item) { // untuk edit photo pada category
                return $item->photo ? '<img src="' . Storage::url($item->photo) . '" style="max-height: 40px;" />' : '<span class="text-muted">No Image</span>';
            })->rawColumns(['action', 'photo'])->make(); // berfungsi agar style bisa terender dan tidak muncul tag htmlnya pada table
        }

        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'photo' => 'required|image'
        ]);

        $validateData['slug'] = Str::slug($request->name);
        $validateData['photo'] = $request->file('photo')->store('assets/category', 'public'); // file photo diassign ke folder storage/assets/category dan dijadikan public

        Category::create($validateData);

        return redirect()->route('category.index');
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
        $category = Category::findOrFail($id); // memakai findOrFail agar jika data tidak ketemu maka akan mengembalikan 404

        return view('pages.admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'photo' => 'image'
        ]);

        $validateData['slug'] = Str::slug($request->name);

        $category = Category::findOrFail($id);

        if ($request->file('photo')) {
            if ($category->photo) { // jika file photo ada dan bukan NULL (sebenarnya tidak perlu ditambahkan karena sudah ada value photo lama dari view edit)
                Storage::disk('public')->delete($category->photo);
            }
            $validateData['photo'] = $request->file('photo')->store('assets/category', 'public');
        }
        $category->update($validateData);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // Storage::disk('public')->delete($category->photo); (penghapusan file photo ini saya nonaktifkan karena saya memakai softDeletes() pada table categories yang dimana ketika di delete, data masih tersimpan di dalam database agar memudahkan saat proses backup jika diperlukan)

        $category->delete();

        return redirect()->route('category.index');
    }
}
