@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Overpass', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .buttons {
            display: flex;
            align-items: center;
        }

        .buttons button,
        .buttons a {
            margin-right: 35px;
            color: white;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .buttons button:last-child,
        .buttons a:last-child {
            margin-right: 0;
        }
        header {
            background: linear-gradient(90deg, #208F9E, #203F9E);
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 18px;
        }

        header form {
            display: flex;
            align-items: center;
        }

        header input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        header button {
            padding: 5px 10px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        header button:hover {
            background-color: #cc2c2c;
        }

        nav {
            background: linear-gradient(90deg, #19717c, #1a337e);
            color: white;
            padding: 10px 20px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 4px;
            transition: all 0.3s ease;
            position: relative;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        nav ul li a.active {
            background-color: #2d7bf0;
            font-weight: 500;
        }

        /* Добавляем индикатор активного пункта */
        nav ul li a.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 5px;
            height: 5px;
            background-color: white;
            border-radius: 50%;
        }
        #search {
            width: 755px; /* Фиксированная ширина */
            padding: 5px; /* Внутренний отступ */
            border: 1px solid #ccc; /* Граница */
            border-radius: 5px; /* Скругление углов */
            margin-right: 20px; /* Отступ справа от поля ввода */
        }

        /* Общий контейнер для поиска */
        .search-container {
            position: relative;
            display: flex;
            align-items: center;
            background-color: #f0f0f0; /* Цвет фона контейнера */
            border: 1px solid #ccc; /* Граница */
            border-radius: 5px; /* Скругление углов */
            overflow: hidden; /* Убирает лишние отступы */
        }

        /* Поле ввода */
        .search-input {
            flex-grow: 1; /* Занимает всю доступную ширину */
            padding: 10px 40px 10px 10px; /* Отступы внутри поля */
            border: none; /* Убираем границу */
            outline: none; /* Убираем выделение при фокусе */
            font-size: 16px; /* Размер шрифта */
        }

        /* Кнопка "Удалить" */
        .clear-button {
            position: absolute;
            top: 50%;
            right: 40px; /* Расположение слева от кнопки поиска */
            transform: translateY(-50%); /* Выравнивание по вертикали */
            background: none; /* Прозрачный фон */
            border: none; /* Убираем границу */
            color: #333; /* Цвет текста */
            cursor: pointer; /* Курсор указывает на интерактивность */
            font-size: 18px; /* Размер символа "X" */
        }

        /* Кнопка "Поиск" */
        .search-button {
            position: absolute;
            top: 50%;
            right: -4px; /* Расположение справа */
            transform: translateY(-50%); /* Выравнивание по вертикали */
           background: none; /* Прозрачный фон */
            border: none; /* Убираем границу */
            color: #ffffff; /* Цвет иконки */
            cursor: pointer; /* Курсор указывает на интерактивность */
            font-size: 18px; /* Размер иконки */

        }
        .back-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #0056b3;
    }

    .edit-button, .delete-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        margin-right: 10px;
        background-color: #28a745;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .edit-button:hover, .delete-button:hover {
        background-color: #218838;
    }
    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .container h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .container p {
        font-size: 16px;
        margin-bottom: 10px;
        color: #555;
    }

    .container strong {
        font-weight: bold;
        color: #333;
    }

    .status-form {
        margin-top: 20px;
    }

    .status-form label {
        font-weight: bold;
        margin-right: 10px;
        color: #333;
    }

    .status-form select {
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .status-form select:focus {
        outline: none;
        border-color: #007bff;
    }
    footer {
            background-color: #eaeaea;
            padding: 20px;
            text-align: center;
            margin-top: 50px; /* Уменьшаем отступ сверху */
            width: 100%;
            position: relative; /* Добавляем позиционирование */
        }

        .footer-columns {
            display: flex;
            justify-content: space-between;
        }

        .footer-column {
            flex: 1;
            padding: 0 20px;
        }

        .delete-button {
    background-color: #dc3545;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.delete-button:hover {
    background-color: #c82333;
}
</style>

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

    <a href="{{ route('admin.dashboard') }}" class="back-button">Назад в админку</a>

    <!-- Добавляем кнопку "Редактировать" -->
    <a href="{{ route('requests.edit', $request->id) }}" class="edit-button">Редактировать</a>
</div>
@endsection