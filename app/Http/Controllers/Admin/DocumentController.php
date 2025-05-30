<?php

namespace App\Http\Controllers\Admin;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $documents = Document::all(); // Получаем все документы
        return view('admin.documents', compact('documents'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'number' => 'required|string|unique:documents,number',
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ])->validate();

        Document::create($validated);

        return redirect()->back()->with('success', 'Документ успешно создан.');
    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        $validated = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'number' => 'required|string|unique:documents,number,' . $id,
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ])->validate();

        $document->update($validated);

        return redirect()->back()->with('success', 'Документ обновлён.');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return redirect()->back()->with('success', 'Документ удалён.');
    }
}