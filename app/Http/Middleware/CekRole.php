<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Jika user belum login, redirect ke login
        if (!auth()->check()) {
            return redirect('/login');
        }
        
        // Jika role user tidak sesuai dengan yang dibutuhkan
        if (auth()->user()->role !== $role) {
            abort(403, 'Unauthorized action.');
        }
        
        return $next($request);
    }
    

}
