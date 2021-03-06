<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if(Auth::user()->usertype == 'admin')
            {
                return redirect('admin.admin-dashboard');
            }

            else  if(Auth::user()->usertype == 'teacher')
            {
                return redirect('teacher.teacher-dashboard');
            }

            else if(Auth::user()->usertype == 'student')
            {
                return redirect('student.student-dashboard');
            }

        }

        return $next($request);
    }
}
