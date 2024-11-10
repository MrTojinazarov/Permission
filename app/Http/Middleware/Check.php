<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Check
{
 
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName(); 
    
        if (Auth::check()) { 
    
            $permission = Permission::where('key', $routeName)->first(); 
    
            if ($permission) { 
    
                $roles = Auth::user()->roles;
    
                foreach ($roles as $role) {
                    if ($role->permissions()->where('key', $routeName)->exists()) {
                        return $next($request);
                    }
                }
    
                abort(403, 'Sizda bu sahifaga kirish huquqi yo\'q.'); 
            } else {
                abort(404, 'Bunday sahifa mavjud emas.');
            }
    
        } else {
            return redirect('/login');
        }
    }
    
}
