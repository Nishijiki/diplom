<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1); // Номер страницы
        $perPage = 6; // Количество новостей на странице

        $news = News::orderBy('created_at', 'desc')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        return response()->json($news);
    }
    public function show($id)
    {
        // Получаем текущую новость
        $news = News::findOrFail($id);
    
        // Получаем рекомендуемые новости (например, последние 3 новости, исключая текущую)
        $recommendedNews = News::where('id', '!=', $id)
            ->orderBy('date', 'desc')
            ->take(3)
            ->get();
    
        return view('news', compact('news', 'recommendedNews'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Точное совпадение (title полностью содержит query)
        $exactMatch = News::where('title', 'like', "%$query%")->first();

        // Частичные совпадения (title частично содержит query), исключая точное совпадение
        $partialMatches = News::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->where('id', '!=', $exactMatch ? $exactMatch->id : 0)
            ->limit(5) // Можно увеличить или уменьшить
            ->get();

        return response()->json([
            'exactMatch' => $exactMatch,
            'partialMatches' => $partialMatches,
        ]);
    }
}