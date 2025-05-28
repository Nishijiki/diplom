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
            
            $user->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Пользователь успешно удален'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при удалении пользователя'
            ], 500);
        }
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'type' => 'required|string|max:255',
        'number' => 'required|string|unique:documents,number',
        'date' => 'required|date',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    Document::create($validated);

    return response()->json(['success' => true, 'message' => 'Документ успешно создан']);
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'type' => 'required|string|max:255',
        'number' => 'required|string|unique:documents,number,' . $id,
        'date' => 'required|date',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $document = Document::findOrFail($id);
    $document->update($validated);

    return response()->json(['success' => true, 'message' => 'Документ успешно обновлён']);
}
public function destroy($id)
{
    $document = Document::findOrFail($id);
    $document->delete();

    return back()->with('success', 'Документ удален.');
}
}
