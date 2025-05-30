<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Request as UserRequest;
use App\Models\RegistrationNotification;
use App\Models\Document;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use App\Models\InvestorRequest;

class AdminController extends Controller
{
    public function index()
    {
        $requests = UserRequest::latest()->paginate(10);
        $investorRequests = InvestorRequest::latest()->paginate(10);
        $documents = Document::latest()->paginate(10);
        $news = News::latest()->paginate(10);
        $users = User::latest()->paginate(10);

        return view('admin', compact('requests', 'investorRequests', 'documents', 'news', 'users'));
    }

    public function showRequest($id)
    {
        $requests = \App\Models\Request::all(); // Получаем все обращения
        return view('admin', compact('requests')); // admin.blade.php
    }

    public function deleteUser($id)
    {
        try {
            $user = User::findOrFail($id);
            
            // Проверяем, не пытаемся ли мы удалить администратора
            if ($user->role === 'admin') {
                return response()->json([
                    'success' => false,
                    'message' => 'Невозможно удалить администратора'
                ], 403);
            }

            // Проверяем, не пытаемся ли мы удалить последнего пользователя
            if (User::count() <= 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Невозможно удалить последнего пользователя системы'
                ], 403);
            }
            
            // Удаляем пользователя
            $user->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Пользователь успешно удален'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Пользователь не найден'
            ], 404);
        } catch (\Exception $e) {
            \Log::error('Ошибка при удалении пользователя: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при удалении пользователя: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            Document::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Документ успешно создан'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при создании документа: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $document = Document::findOrFail($id);
            
            // Получаем только нужные поля из запроса
            $data = [
                'type' => $request->type,
                'number' => $request->number,
                'date' => $request->date,
                'title' => $request->title,
                'description' => $request->description
            ];
            
            $document->update($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Документ успешно обновлён'
            ]);
        } catch (\Exception $e) {
            \Log::error('Ошибка при обновлении документа: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при обновлении документа: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return back()->with('success', 'Документ удален.');
    }

    public function updateNews(Request $request, $id)
    {
        try {
            $news = News::findOrFail($id);
            
            // Подготавливаем данные для обновления
            $data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'author' => $request->input('author'),
                'date' => $request->input('date')
            ];

            // Обработка изображения, если оно было загружено
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                // Создаем директорию, если она не существует
                $imagePath = public_path('images/news');
                if (!file_exists($imagePath)) {
                    mkdir($imagePath, 0777, true);
                }

                // Перемещаем новое изображение
                $image->move($imagePath, $imageName);
                $data['image'] = 'images/news/' . $imageName; // Сохраняем относительный путь

                // Удаляем старое изображение, если оно существует
                if ($news->image && file_exists(public_path($news->image))) {
                    unlink(public_path($news->image));
                }
            }
            
            // Обновляем новость
            $news->update($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Новость успешно обновлена',
                'data' => $news
            ]);

        } catch (\Exception $e) {
            \Log::error('Ошибка при обновлении новости: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при обновлении новости: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeNews(Request $request)
    {
        try {
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'author' => $request->author,
                'date' => $request->date
            ];

            // Обработка изображения
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                // Создаем директорию, если она не существует
                $imagePath = public_path('images/news');
                if (!file_exists($imagePath)) {
                    mkdir($imagePath, 0777, true);
                }

                $image->move($imagePath, $imageName);
                $data['image'] = 'images/news/' . $imageName; // Сохраняем относительный путь
            }

            News::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Новость успешно создана'
            ]);
        } catch (\Exception $e) {
            \Log::error('Ошибка при создании новости: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при создании новости: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteNews($id)
    {
        try {
            $news = News::findOrFail($id);
            
            // Удаляем изображение, если оно существует
            if ($news->image && file_exists(public_path($news->image))) {
                unlink(public_path($news->image));
            }
            
            $news->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Новость успешно удалена'
            ]);
        } catch (\Exception $e) {
            \Log::error('Ошибка при удалении новости: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при удалении новости: ' . $e->getMessage()
            ], 500);
        }
        
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('web');
    }

    public function getUser($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Пользователь не найден'
            ], 404);
        }
    }

    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            
            // Валидация данных
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $id,
                'phone' => 'nullable|string|max:20',
                'role' => 'required|in:user,admin',
                'password' => 'nullable|min:6',
            ]);
            
            // Проверяем, не пытаемся ли мы изменить роль последнего администратора
            if ($user->role === 'admin' && $request->role === 'user') {
                $adminCount = User::where('role', 'admin')->count();
                if ($adminCount <= 1) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Невозможно изменить роль последнего администратора'
                    ], 422);
                }
            }

            // Подготавливаем данные для обновления
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
            ];
            
            // Если указан новый пароль, хешируем его
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Данные пользователя успешно обновлены',
                'data' => $user
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка валидации',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Ошибка при обновлении пользователя: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при обновлении пользователя: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateInvestorRequest(Request $request, $id)
    {
        try {
            $investorRequest = InvestorRequest::findOrFail($id);
            
            // Подготавливаем данные для обновления
            $data = $request->only(['name', 'email', 'phone', 'company', 'message', 'status']);
            
            $investorRequest->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Заявка инвестора успешно обновлена',
                'data' => $investorRequest
            ]);

        } catch (\Exception $e) {
            \Log::error('Ошибка при обновлении заявки инвестора: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при обновлении заявки'
            ], 500);
        }
    }

    public function deleteInvestorRequest($id)
    {
        try {
            $investorRequest = InvestorRequest::findOrFail($id);
            $investorRequest->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Заявка инвестора успешно удалена'
            ]);
        } catch (\Exception $e) {
            \Log::error('Ошибка при удалении заявки инвестора: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при удалении заявки'
            ], 500);
        }
    }
}
