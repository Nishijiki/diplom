<?php

namespace App\Http\Controllers;

use App\Models\InvestorRequest;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string'
        ]);

        try {
            InvestorRequest::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Ваша заявка успешно отправлена!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.'
            ], 500);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,completed,rejected'
        ]);

        try {
            $investorRequest = InvestorRequest::findOrFail($id);
            $investorRequest->update(['status' => $request->status]);

            return response()->json([
                'success' => true,
                'message' => 'Статус успешно обновлен'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при обновлении статуса'
            ], 500);
        }
    }

    public function index()
{
    $investorRequests = InvestorRequest::all(); // или используйте paginate()

    return view('admin.investors', compact('investorRequests'));
}
} 