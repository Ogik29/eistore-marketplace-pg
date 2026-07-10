<?php
// file middleware untuk pengecekan atmint ini harus di daftarkan dulu di file Kernel.php agar bisa digunakan di file yg lain

namespace App\Http\Middleware;

use Closure;
use illuminate\Support\Facades\Auth; // perlu dipanggil untuk mengecek authentikasi yang sedang berjalan
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->roles == 'ADMIN') { // jika role dari user adalah ADMIN
            return $next($request);
        }

        return redirect('/'); // jika roles bukan ATMINT
    }
}
