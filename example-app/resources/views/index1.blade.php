<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подать обращение - Администрация Сергиево-Посадского городского округа</title>
    <link rel="stylesheet" href="/index1.css">
    <!-- Добавляем Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Импорт шрифта Overpass -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        main {
            max-width: 1200px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            min-height: calc(100vh - 400px); /* Минимальная высота для контента */
        }
        .form-container {
            margin-bottom: 50px; /* Добавляем отступ снизу формы */
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-container input[type="text"],
        .form-container textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container input[type="tel"]{
            margin-bottom: 15px;
        }
        .form-container input[type="email"]{
            margin-bottom: 15px;
        }
        .form-container textarea {
            height: 150px;
        }
        .form-container button {
            padding: 10px 20px;
            background-color: #336699;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #2a5270;
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
                min-height: calc(100vh - 300px);
            }

            .contact-form input,
            .contact-form textarea {
                padding: 8px;
            }

            footer {
                margin-top: 30px;
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
                margin-top: 20px;
            }

            .footer-columns {
                flex-direction: column;
            }

            .footer-column {
                padding: 10px 0;
                text-align: center;
            }

            main {
                min-height: calc(100vh - 250px);
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

        /* Стили для уведомлений */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            animation: slideIn 0.5s ease-out forwards;
            max-width: 400px;
        }

        .notification-success {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border-left: 5px solid #1e7e34;
        }

        .notification-success::before {
            content: '✓';
            display: inline-block;
            margin-right: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        .fade-out {
            animation: fadeOut 0.5s ease-out forwards;
        }

    </style>
</head>
<body>

    <!-- Шапка сайта -->
    <header>
    <div class="logo">
    <img src="{{asset('img/logo.png')}}" alt="Логотип">
    <script src="{{ asset('js/navigation.js') }}"></script>
    <script>
    // Автоматическое скрытие уведомления
    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.getElementById('success-notification');
        if (notification) {
            setTimeout(() => {
                notification.classList.add('fade-out');
                setTimeout(() => {
                    notification.remove();
                }, 500);
            }, 5000);
        }
    });
    </script>
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
 
    <!-- Основное содержание -->
    <main>
        <h2>Подать обращение</h2>
        <p>Заполните форму ниже, чтобы отправить свое обращение в администрацию Сергиево-Посадского городского округа.</p>

        <div class="form-container">
            <form action="{{ route('requests.store') }}" method="POST">
                @csrf
                
                @if(session('success'))
                <div class="notification notification-success" id="success-notification">

                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                <div class="notification notification-error">

                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <label for="name">ФИО:</label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}">

                <label for="email">Электронная почта:</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}">

                <label for="phone">Телефон:</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">

                <label for="subject">Тема обращения:</label>
                <input type="text" id="subject" name="subject" required value="{{ old('subject') }}">

                <label for="message">Текст обращения:</label>
                <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>

                <button type="submit">Отправить</button>
            </form>
        </div>
    </main>

    <!-- Подвал сайта -->
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

    <!-- Подключаем скрипты -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/navigation.js') }}"></script>
</body>
</html>