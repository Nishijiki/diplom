<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    public function handle($request, Closure $next)
    {
        // Если пользователь не авторизован
        if (!Auth::check()) {
            // Перенаправляем на страницу регистрации
            return redirect('/register');
        }

        // Если пользователь авторизован, продолжаем выполнение запроса
        return $next($request);
    }
}
