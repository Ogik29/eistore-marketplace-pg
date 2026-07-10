<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

// import Str untuk membuat sebuah slug
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = User::query();

            // memakai datatables dari yajra
            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('user.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('user.destroy', $item->id) . '" method="POST">
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

        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'roles' => 'nullable|string|in:ADMIN,USER' // validate "in:ADMIN,USER" berfungsi agar inputan yg dikirim ke data hanya ADMIN atau USER
        ]);

        $validateData['password'] = bcrypt($request->password); // enkripsi password agar password tidak raw

        User::create($validateData);

        return redirect()->route('user.index');
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
        $user = User::findOrFail($id); // memakai findOrFail agar jika data tidak ketemu maka akan mengembalikan 404

        return view('pages.admin.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:50',
            // 'email' => 'required|email|unique:users',
            'roles' => 'nullable|string|in:ADMIN,USER' // validate "in:ADMIN,USER" berfungsi agar inputan yg dikirim ke data hanya ADMIN atau USER
        ]);

        $user = User::findOrFail($id);

        if ($request->password) {
            $validateData['password'] = bcrypt($request->password);
        } else { // jika tidak ada request password dari user (atmint) atau user tidak mengganti password, maka 
            unset($validateData['password']); // diberikan fungsi unset() agar field password di database tidak terisi dengan nilai kosong / null 
        }

        $user->update($validateData);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Storage::disk('public')->delete($user->photo); (penghapusan file photo ini saya nonaktifkan karena saya memakai softDeletes() pada table categories yang dimana ketika di delete, data masih tersimpan di dalam database agar memudahkan saat proses backup jika diperlukan)

        $user->delete();

        return redirect()->route('user.index');
    }
}
