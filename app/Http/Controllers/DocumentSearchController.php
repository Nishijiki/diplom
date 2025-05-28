<?php

namespace App\Http\Controllers;

use App\Models\DocumentSearch;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewDocumentSearchRequest;

class DocumentSearchController extends Controller
{
    public function search(Request $request)
    {
        $validated = $request->validate([
            'document-type' => 'required|string',
            'document-number' => 'nullable|string',
            'document-date' => 'nullable|date',
            'document-keywords' => 'nullable|string',
        ]);

        // Search for similar documents
        $query = Document::query();

        if ($validated['document-type']) {
            $query->where('type', $validated['document-type']);
        }

        if ($validated['document-number']) {
            $query->where('number', 'LIKE', '%' . $validated['document-number'] . '%');
        }

        if ($validated['document-date']) {
            $query->whereDate('date', $validated['document-date']);
        }

        if ($validated['document-keywords']) {
            $query->where(function($q) use ($validated) {
                $q->where('title', 'LIKE', '%' . $validated['document-keywords'] . '%')
                  ->orWhere('description', 'LIKE', '%' . $validated['document-keywords'] . '%');
            });
        }

        $similarDocuments = $query->get();

        // Create a new document search record
        $documentSearch = DocumentSearch::create([
            'document_type' => $validated['document-type'],
            'document_number' => $validated['document-number'],
            'document_date' => $validated['document-date'],
            'keywords' => $validated['document-keywords'],
            'user_ip' => $request->ip(),
            'status' => 'pending',
        ]);

        // Notify admin users
        // Notification::route('mail', 'admin@example.com')
        //     ->notify(new NewDocumentSearchRequest($documentSearch));

        return response()->json([
            'message' => 'Ваш запрос на поиск документа был отправлен. Администратор рассмотрит его в ближайшее время.',
            'similarDocuments' => $similarDocuments
        ]);
    }

    public function getSuggestions(Request $request)
    {
        $query = $request->get('query');
        $type = $request->get('type');

        $documentsQuery = Document::query();

        if ($type) {
            $documentsQuery->where('type', $type);
        }

        if ($query) {
            $documentsQuery->where(function($q) use ($query) {
                $q->where('number', 'LIKE', "%{$query}%")
                  ->orWhere('title', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            });
        }

        $suggestions = $documentsQuery
            ->orderBy('date', 'desc')
            ->limit(15)
            ->get();

        return response()->json($suggestions);
    }

    public function getRelatedDocuments($id)
    {
        $document = Document::find($id);
        if (!$document) {
            return response()->json([]);
        }

        // Получаем документы того же типа
        $sameTypeDocuments = Document::where('id', '!=', $id)
            ->where('type', $document->type)
            ->limit(4)
            ->get();

        // Получаем документы с похожей датой, но другого типа
        $relatedByDateDocuments = Document::where('id', '!=', $id)
            ->where('type', '!=', $document->type)
            ->whereBetween('date', [
                $document->date->subDays(30),
                $document->date->addDays(30)
            ])
            ->limit(2)
            ->get();

        // Объединяем результаты
        $relatedDocs = $sameTypeDocuments->concat($relatedByDateDocuments)
            ->unique('id')
            ->take(6);

        return response()->json($relatedDocs);
    }
} 