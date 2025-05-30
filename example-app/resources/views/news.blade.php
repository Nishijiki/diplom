<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости - Администрация Сергиево-Посадского городского округа</title>
    <!-- Импорт шрифта Overpass -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/news.css">
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
            background: linear-gradient(90deg, #1c7e8b, #1a3481); 
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
        .news-article {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .article-header {
            margin-bottom: 20px;
        }

        .article-title {
            font-size: 24px;
            color: #333;
            margin: 0 0 10px;
        }

        .article-meta {
            font-size: 14px;
            color: #666;
        }

        .publish-date,
        .author {
            margin-right: 10px;
        }

        .article-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .article-content p {
            line-height: 1.6;
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
        }
        .recommended-news {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .recommended-news h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #333;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .news-item {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .news-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .news-item h4 {
            font-size: 18px;
            margin: 0 0 5px;
            color: #333;
        }

        .news-item p {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }
        footer {
            background-color: #eaeaea;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .footer-columns {
            display: flex;
            justify-content: space-between;
        }

        .footer-column {
            flex: 1;
            padding: 0 20px;
        }
        @media (max-width: 768px) {
            /* Шапка */
            header {
                flex-direction: column;
                align-items: stretch;
            }

            header form {
                margin-top: 10px;
            }

            /* Кнопки в шапке */
            .buttons {
                flex-direction: column;
                gap: 10px;
            }

            .buttons button,
            .buttons a {
                margin-right: 0;
                width: 100%;
                text-align: center;
            }

            /* Меню навигации */
            nav ul {
                flex-direction: column;
            }

            nav ul li {
                margin-right: 0;
                margin-bottom: 10px;
            }

            /* Поле поиска */
            #search {
                width: 100%; /* Поле занимает всю ширину */
            }

            /* Основное содержание */
            main {
                padding: 15px;
            }

            .contact-form input,
            .contact-form textarea {
                padding: 8px;
            }
        }

        /* Адаптация для телефонов */
        @media (max-width: 480px) {
            /* Шапка */
            header h1 {
                font-size: 16px;
            }

            /* Меню навигации */
            nav ul li a {
                font-size: 14px;
            }

            /* Поле поиска */
            #search {
                padding: 8px;
            }

            /* Основное содержание */
            .investor-section h2 {
                font-size: 20px;
            }

            .investor-section p {
                font-size: 14px;
            }

            .contact-form label {
                font-size: 14px;
            }

            .contact-form button {
                font-size: 14px;
            }

            /* Подвал */
            footer {
                padding: 10px;
            }

            .footer-columns {
                flex-direction: column;
            }

            .footer-column {
                padding: 10px 0;
                text-align: center;
            }
        }

        /* Адаптация для планшетов */
        @media (max-width: 768px) {
            .logo img {
                max-height: 40px; /* Уменьшаем высоту логотипа */
            }
        }

        /* Адаптация для телефонов */
        @media (max-width: 480px) {
            .logo img {
                max-height: 30px; /* Еще больше уменьшаем высоту */
            }
        }
    </style>
    <title>{{ $news->title }}</title>
</head>
<body>
<header>
    <div class="logo">
    <img src="{{asset('img/logo.png')}}" alt="Логотип">
    </div>
    <form>
        <div class="search-container">
            <input type="text" placeholder="Что то..." id="search" class="search-input">
            <button type="button" class="clear-button">X</button>
            <button type="submit" class="search-button">
                <img src="{{ asset('img/search.png') }}" width="10px" height="10px">
            </button>
        </div>
    </form>
    <div class="buttons">
        <a href="{{ url('/submit-request') }}">
            <button><i class="fas fa-bullhorn"></i> Подать обращение</button>
        </a>
        <a href="{{ url('/investors') }}" style="color: white; text-decoration: none;">Инвесторам</a>
        <a href="{{ url('/login') }}" style="color: white; text-decoration: none;">Вход</a>
        <a href="{{ url('/register') }}" style="color: white; text-decoration: none;">Регистрация</a>
    </div>
</header>
<nav>
    <ul>
        <li><a href="{{ url('/') }}">Главная</a></li>
        <li><a href="{{ url('/search-document') }}">Поиск документа</a></li>
        <li><a href="{{ url('/personal-account') }}">Личный кабинет</a></li>
    </ul>
</nav>
     
<div class="news-article">
    <div class="article-header">
        <!-- Динамический заголовок -->
        <h2 class="article-title">{{ $news->title }}</h2>
        <p class="article-meta">
            <!-- Динамическая дата публикации -->
            <span class="publish-date">Опубликовано: {{ \Carbon\Carbon::parse($news->date)->format('d.m.Y, H:i') }}</span>
            <!-- Автор (если есть в базе данных) -->
            <span class="author">Автор: {{ $news->author ?? 'Неизвестный автор' }}</span>
        </p>
    </div>
    <div class="article-image">
        <!-- Динамическое изображение -->
        <img src="{{ $news->image ? asset($news->image) : asset('img/placeholder.jpg') }}" alt="{{ $news->title }}">
    </div>
    <div class="article-content">
        <!-- Динамическое содержимое новости -->
        <p>{{ $news->description }}</p>
       
</div>
</div>

<div class="recommended-news">
    <h3>Рекомендуемые новости</h3>
    <div class="news-grid">
        @foreach ($recommendedNews as $item)
        <div class="news-item">
            <!-- Динамическое изображение рекомендуемой новости -->
            <img src="{{ $item->image ? asset($item->image) : asset('img/placeholder.jpg') }}" alt="{{ $item->title }}">
            <!-- Динамический заголовок -->
            <a href="/news/{{ $item->id }}"><h4>{{ $item->title }}</h4></a>
            <!-- Краткое описание -->
            <p>{{ Str::limit($item->description, 100) }}</p>
        </div>
        @endforeach
    </div>
</div>
    <footer>
        <div class="footer-columns">
            <div class="footer-column">
                <p>Администрация Сергиево-Посадского городского округа<br>
                   © 2023 Все права защищены<br>
                   4А улица Георгиевская, г. Сергиев Посад, Московская область, 141300<br>
                   Телефон: +7 (496) 540-XX-XX | Факс: +7 (496) 540-XX-XX<br>
                   Электронная почта: info@sergievposad.ru
                </p>
            </div>
            <div class="footer-column">
                <p>Часы работы:<br>
                   Пн-Чт: 9:00–18:00 | Пт: 9:00–17:00<br>
                   Сб, Вс: выходной
                </p>
                <p><a href="#">Политика конфиденциальности</a> | <a href="#">Карта сайта</a></p>
            </div>
            <div class="footer-column">
                <p>Мы в социальных сетях:<br>
                   <a href="#">ВКонтакте</a> | 
                   <a href="#">Одноклассники</a> | 
                   <a href="#">Telegram</a> | 
                   <a href="#">YouTube</a>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>