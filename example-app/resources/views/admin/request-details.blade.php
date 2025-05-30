<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Детали обращения - Администрация Сергиево-Посадского городского округа</title>
    <!-- Импорт шрифта Overpass -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Overpass', sans-serif;
            margin: 0;
            padding: 0;
        }
        // ... остальные стили ...
    </style>
</head>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Детали обращения #{{ $request->id }}</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h4>Информация об обращении</h4>
                            <p><strong>Тема:</strong> {{ $request->subject }}</p>
                            <p><strong>Статус:</strong> {{ $request->status }}</p>
                            <p><strong>Дата создания:</strong> {{ $request->created_at->format('d.m.Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Информация о заявителе</h4>
                            <p><strong>Имя:</strong> {{ $request->user->name }}</p>
                            <p><strong>Email:</strong> {{ $request->user->email }}</p>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h4>Текст обращения</h4>
                        <div class="p-3 bg-light">
                            {{ $request->message }}
                        </div>
                    </div>

                    @if($request->file_path)
                    <div class="mb-4">
                        <h4>Прикрепленные файлы</h4>
                        <a href="{{ asset($request->file_path) }}" class="btn btn-primary" target="_blank">
                            Просмотреть файл
                        </a>
                    </div>
                    @endif

                    <div class="mt-4">
                        <form action="{{ route('requests.update-status', $request->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="status">Изменить статус:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="new" {{ $request->status === 'new' ? 'selected' : '' }}>Новое</option>
                                    <option value="in_progress" {{ $request->status === 'in_progress' ? 'selected' : '' }}>В обработке</option>
                                    <option value="completed" {{ $request->status === 'completed' ? 'selected' : '' }}>Завершено</option>
                                    <option value="rejected" {{ $request->status === 'rejected' ? 'selected' : '' }}>Отклонено</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Обновить статус</button>
                        </form>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                            Вернуться к списку обращений
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 