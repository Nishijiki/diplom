<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Инвесторам - Администрация Сергиево-Посадского городского округа</title>
    <!-- Импорт шрифта Overpass -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/invest.css">
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
        main {
            max-width: 1200px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .investor-section {
            margin-top: 20px;
        }
        
        .investor-section h2 {
            margin-bottom: 20px;
        }
        
        .investor-section p {
            margin: 10px 0;
        }
        
        .investor-section ul {
            list-style: disc;
            padding-left: 20px;
            margin: 10px 0;
        }
        
        .contact-form {
            margin-top: 20px;
        }
        
        .contact-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .contact-form textarea {
            resize: vertical;
        }
        
        .contact-form button {
            padding: 10px 20px;
            background-color: #339966;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .contact-form button:hover {
            background-color: #2e8857;
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
</head>
<body>

    <!-- Шапка сайта -->
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

    <!-- Основное содержание -->
    <main>
        <section class="investor-section">
            <h2>Инвесторам</h2>
            <p>Администрация Сергиево-Посадского городского округа приветствует вас на странице, посвященной инвестиционным возможностям.</p>
            <p>Мы предлагаем широкий спектр возможностей для бизнеса и инвестиций:</p>
            <ul>
                <li>Промышленные зоны и технопарки.</li>
                <li>Сельскохозяйственные угодья.</li>
                <li>Торговые и офисные помещения.</li>
                <li>Земельные участки под строительство.</li>
            </ul>
            <p>Для получения подробной информации и консультаций по вопросам инвестирования, пожалуйста, заполните форму ниже:</p>
            <form action="{{ route('investor.store') }}" method="POST" class="contact-form">
                @csrf
                <label for="name">ФИО:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Электронная почта:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Телефон:</label>
                <input type="tel" id="phone" name="phone">

                <label for="message">Сообщение:</label>
                <textarea id="message" name="message" rows="5" placeholder="Опишите ваш интерес или вопросы..."></textarea>

                <button type="submit">Отправить запрос</button>
            </form>
        </section>
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(form);
            const submitButton = form.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.textContent;
            
            // Disable the submit button and show loading state
            submitButton.disabled = true;
            submitButton.textContent = 'Отправка...';
            
            fetch('{{ route("investor.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    form.reset();
                } else {
                    throw new Error(data.message || 'Произошла ошибка при отправке формы');
                }
            })
            .catch(error => {
                alert(error.message || 'Произошла ошибка при отправке формы');
            })
            .finally(() => {
                // Re-enable the submit button and restore original text
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
            });
        });
    });
    </script>

</body>
</html>