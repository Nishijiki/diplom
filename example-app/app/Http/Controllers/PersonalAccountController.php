<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Request as UserRequest;

class PersonalAccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Получаем все обращения пользователя
        $userRequests = \App\Models\Request::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Считаем статистику
        $totalRequests = $userRequests->count();
        $processedRequests = $userRequests->whereIn('status', ['resolved', 'rejected'])->count();
        $pendingRequests = $userRequests->whereIn('status', ['new', 'in_progress'])->count();

        return view('index5', compact(
            'user',
            'userRequests',
            'totalRequests',
            'processedRequests',
            'pendingRequests'
        ));
    }
}