<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as UserRequest;
use App\Models\Request as RequestModel;


class RequestController extends Controller
{
    public function store(HttpRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $userRequest = new Request();
        $userRequest->name = $validated['name'];
        $userRequest->email = $validated['email'];
        $userRequest->phone = $validated['phone'];
        $userRequest->subject = $validated['subject'];
        $userRequest->message = $validated['message'];
        $userRequest->status = 'new';
        $userRequest->user_id = Auth::check() ? Auth::id() : null;
        $userRequest->save();

        return redirect()->back()->with('success', 'Ваше обращение успешно отправлено!');
    }

    public function index()
    {
        $requests = Request::orderBy('created_at', 'desc')->paginate(10);
        return view('admin', compact('requests'));
    }

    public function show($id)
    {
        $request = UserRequest::findOrFail($id);
        return view('admin.request.show', compact('request'));
    }

    public function updateStatus($id, HttpRequest $request)
    {
        $userRequest = Request::findOrFail($id);
        $userRequest->status = $request->status;
        $userRequest->save();

        return redirect()->back()->with('success', 'Статус обращения обновлен');
    }

    public function edit($id)
    {
        $request = UserRequest::findOrFail($id);
        return view('admin.request.edit', compact('request'));
    }
    
    public function update(HttpRequest $request, $id)
    {
        $userRequest = UserRequest::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        try {
            $userRequest->name = $validated['name'];
            $userRequest->email = $validated['email'];
            $userRequest->phone = $validated['phone'];
            $userRequest->subject = $validated['subject'];
            $userRequest->message = $validated['message'];
            $userRequest->save();
    
            return redirect()->route('requests.edit', $id)
                ->with('success', 'Обращение успешно обновлено!');
        } catch (\Exception $e) {
            return redirect()->route('requests.edit', $id)
                ->with('error', 'Произошла ошибка при обновлении обращения.');
        }
    }
    
    public function destroy($id)
    {
        $userRequest = UserRequest::findOrFail($id);
        $userRequest->delete();
    
        return redirect()->route('admin.dashboard')->with('success', 'Обращение успешно удалено!');
    }
}
