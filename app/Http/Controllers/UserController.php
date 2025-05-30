<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function updateAvatar(Request $request)
    {
        try {
            if (!$request->hasFile('avatar')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Изображение не найдено'
                ], 400);
            }

            $user = auth()->user();
            $file = $request->file('avatar');
            
            // Проверяем тип файла
            if (!in_array($file->getClientMimeType(), ['image/jpeg', 'image/png', 'image/gif'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Недопустимый формат файла'
                ], 400);
            }

            // Создаем уникальное имя файла
            $filename = 'avatar_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            
            // Удаляем старый аватар, если он существует
            if ($user->avatar && Storage::exists('public/avatars/' . basename($user->avatar))) {
                Storage::delete('public/avatars/' . basename($user->avatar));
            }

            // Сохраняем новый файл
            $path = $file->storeAs('public/avatars', $filename);

            // Обновляем путь к аватару в базе данных (сохраняем только относительный путь)
            $user->avatar = 'avatars/' . $filename;
            $user->save();

            return response()->json([
                'success' => true,
                'avatarUrl' => Storage::url($user->avatar),
                'message' => 'Аватар успешно обновлен'
            ]);

        } catch (\Exception $e) {
            \Log::error('Ошибка при обновлении аватара: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при загрузке аватара: ' . $e->getMessage()
            ], 500);
        }
    }
    public function updateProfile(Request $request)
{
    $user = Auth::user();

    // Валидация данных
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
    ]);

    // Обновление данных пользователя
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
    ]);

    // Перенаправление обратно в личный кабинет
    return redirect()->route('personal.account')->with('success', 'Профиль успешно обновлен!');
}
}

