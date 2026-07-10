<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    use SoftDeletes; // berfungsi jika kita menghapus suatu data (category) datanya masih tersimpan di database, hanya saja database tsb ditandai sebagai data yang terhapus, maka dari itu ada field deleted_at dalam table categories

    protected $fillable = [
        'name',
        'photo',
        'slug'
    ];

    protected $hidden = [];
}
