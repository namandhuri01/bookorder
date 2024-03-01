<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->is('admin/*')) {
                return route('admin.login');
            }
            return route('login');
        }
    }
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);
     
        $is_admin_url = $request->is('admin/*');

        // url is for admin but user is not admin then redirect to user dashboard
        if($is_admin_url && !in_array(Auth::user()->role_id, [1]) ) {
            return redirect(RouteServiceProvider::HOME);
        }

        // url is for student, but a logged in user is admin then redirect admin to his dashboard
        if(!$is_admin_url && in_array(Auth::user()->role_id, [1])) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }
        // redirectig user to intended url
        return $next($request);
    }
}
