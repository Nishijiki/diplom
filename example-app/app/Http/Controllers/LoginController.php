<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // Валидация данных
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Проверка учетных данных
        if (Auth::attempt($credentials)) {
            // Аутентификация успешна
            $request->session()->regenerate();

            // Перенаправление на личный кабинет
            return redirect()->intended('/personal-account');
        }

        // Если аутентификация не удалась
        return back()->withErrors([
            'email' => 'Неверные учетные данные.',
        ]);
    }
}