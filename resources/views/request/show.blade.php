@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Детали обращения #{{ $request->id }}</h2>

    <p><strong>ФИО:</strong> {{ $request->name }}</p>
    <p><strong>Email:</strong> {{ $request->email }}</p>
    <p><strong>Телефон:</strong> {{ $request->phone ?? 'Не указан' }}</p>
    <p><strong>Тема:</strong> {{ $request->subject }}</p>
    <p><strong>Дата:</strong> {{ $request->created_at->format('d.m.Y H:i') }}</p>
    <p><strong>Текст обращения:</strong></p>
    <p>{{ $request->message }}</p>

    <form action="{{ route('requests.update-status', $request->id) }}" method="POST" class="status-form">
        @csrf
        @method('PATCH')
        <label for="status">Статус:</label>
        <select name="status" onchange="this.form.submit()">
            <option value="new" {{ $request->status == 'new' ? 'selected' : '' }}>Новое</option>
            <option value="in_progress" {{ $request->status == 'in_progress' ? 'selected' : '' }}>В работе</option>
            <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Завершено</option>
            <option value="rejected" {{ $request->status == 'rejected' ? 'selected' : '' }}>Отклонено</option>
        </select>
    </form>
</div>
@endsection