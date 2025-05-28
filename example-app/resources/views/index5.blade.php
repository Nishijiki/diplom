<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет - Администрация Сергиево-Посадского городского округа</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="5.js" defer></script>
    <link rel="stylesheet" href="/index5.css">
    <style>
        body {
    font-family: Arial, sans-serif;
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
    z-index: 1000;
    position: relative;
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
        }
        .profile-container {
            margin-top: 20px;
        }
        .profile-container h2 {
            margin-bottom: 20px;
        }
        .profile-info {
            display: flex;
            gap: 20px;
        }
        .profile-info div {
            flex: 1;
        }
        .profile-actions {
            margin-top: 20px;
        }
        .profile-actions button {
            padding: 10px 20px;
            background-color: #336699;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        .profile-actions button:hover {
            background-color: #2a5270;
        }
        footer {
    background-color: #eaeaea;
    padding: 20px;
    text-align: center;
    margin-top: 20px;
    margin-top: 275px;
}

.footer-columns {
    display: flex;
    justify-content: space-between;
}

.footer-column {
    flex: 1;
    padding: 0 20px;
}

@media (max-width: 480px) {
    /* Адаптивность для телефона */
    header {
        flex-direction: column;
        align-items: stretch;
    }

    header form {
        margin-top: 10px;
    }

    nav {
        flex-direction: column;
    }

    nav ul {
        flex-direction: column;
    }

    nav ul li {
        margin-right: 0;
        margin-bottom: 10px;
    }

    .news-grid {
        grid-template-columns: repeat(auto-fit, minmax(100%, 1fr));
    }

    .popular-grid {
        grid-template-columns: repeat(auto-fit, minmax(100%, 1fr));
    }
}

.profile-section {
    display: flex;
    gap: 20px; /* Установите нужный отступ между секциями */
    padding: 20px;
}

.user-info {
    flex: 1;
}

.requests-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px; /* Отступ между аватаром и статистикой */
    margin-top: 0; /* Убедитесь, что у .requests-section нет лишнего отступа сверху */
}

.avatar-container {
    position: relative;
    width: 150px;
    height: 150px;
    border: 2px dashed #ccc;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    margin-right: auto; /* Выровняет аватар по правому краю */
    margin-top: 10px;
}

.avatar {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

.change-avatar-button {
    position: absolute;
    top: 0;
    right: 0;
    background-color: #2ecc71;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 0 0 0 8px;
    cursor: pointer;
    font-size: 14px;
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
.modal {
    display: none;
}

.modal.show {
    display: block;
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    width: 100%;
    max-width: 500px;
    position: relative;
}

.close-modal {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
}

.close-modal:hover {
    color: #ff4d4d;
}

#edit-profile-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

#edit-profile-form label {
    font-weight: bold;
}

#edit-profile-form input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#edit-profile-form button {
    padding: 10px;
    background-color: #209E83;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#edit-profile-form button:hover {
    background-color: #1a7e6b;
}

.modal-header {
    background: linear-gradient(135deg, #208F9E, #203F9E);
    color: white;
}
.btn-close {
    filter: brightness(0) invert(1);
}
.table {
    margin-bottom: 0;
}
.badge {
    font-size: 0.9em;
    padding: 0.5em 1em;
}
.modal-body {
    padding: 20px;
}
.btn-link {
    text-decoration: none;
    color: #208F9E;
}
.btn-link:hover {
    color: #203F9E;
}
.table-responsive {
    max-height: 70vh;
    overflow-y: auto;
}

/* Стили для кнопки выхода */
.logout-btn {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    text-decoration: none;
    padding: 5px 10px;
}

.logout-btn:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 5px;
}

/* Добавляем стили для корректной работы модальных окон */
.modal-open {
    overflow: hidden;
}

.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1040;
}

.modal {
    z-index: 1050;
}

/* Убираем двойной скролл */
body.modal-open {
    padding-right: 0 !important;
}

/* Обновленные стили для модальных окон */
.modal-header {
    background: linear-gradient(135deg, #208F9E, #203F9E);
    color: white;
}

.modal-content {
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.btn-close {
    filter: brightness(0) invert(1);
}

.form-control:focus {
    border-color: #208F9E;
    box-shadow: 0 0 0 0.2rem rgba(32, 143, 158, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, #208F9E, #203F9E);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1a7e8b, #1a337e);
}
    </style>
</head>
<body>
    <script src ="{{asset('js/avatarchange.js')}}" defer></script>

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
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">Выйти</button>
        </form>
    </div>
</header>
  <!-- Подключаем скрипт навигации перед закрывающим тегом body -->
  <script src="{{ asset('js/navigation.js') }}"></script>
<nav>
    <ul>
        <li><a href="{{ url('/') }}">Главная</a></li>
        <li><a href="{{ url('/search-document') }}">Поиск документа</a></li>
        <li><a href="{{ url('/personal-account') }}">Личный кабинет</a></li>
    </ul>
</nav>
<main>
    <h2>Личный кабинет</h2>
    <h4>Здравствуйте, {{ Auth::user()->name }}!</h4>
    <div class="profile-container">
        <!-- Левая колонка: Персональная информация -->
        <div class="profile-info">
            <div>
                <h3>Персональная информация</h3>
                <p><strong>ФИО:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Электронная почта:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Телефон:</strong> {{ Auth::user()->phone ?? 'Не указан' }}</p>
            </div>
            <div>
                <h3>Обращения</h3>
                <p><strong>Всего обращений:</strong> {{ $totalRequests ?? 0 }}</p>
                <p><strong>Обработано:</strong> {{ $processedRequests ?? 0 }}</p>
                <p><strong>В обработке:</strong> {{ $pendingRequests ?? 0 }}</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestsModal">
                    Просмотреть все обращения
                </button>
            </div>
        </div>

        <!-- Модальное окно с обращениями -->
        <div class="modal fade" id="requestsModal" tabindex="-1" aria-labelledby="requestsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="requestsModalLabel">Мои обращения</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Дата</th>
                                        <th>Тема</th>
                                        <th>Сообщение</th>
                                        <th>Статус</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userRequests ?? [] as $request)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($request->created_at)->format('d.m.Y H:i') }}</td>
                                        <td>{{ $request->subject }}</td>
                                        <td>
                                            @if(strlen($request->message) > 100)
                                                {{ substr($request->message, 0, 100) }}...
                                                <button type="button" class="btn btn-link p-0" 
                                                        onclick="showFullMessage('{{ addslashes($request->message) }}')">
                                                    Читать полностью
                                                </button>
                                            @else
                                                {{ $request->message }}
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill 
                                                @if($request->status == 'new') bg-primary
                                                @elseif($request->status == 'in_progress') bg-warning
                                                @elseif($request->status == 'resolved') bg-success
                                                @else bg-secondary
                                                @endif">
                                                @switch($request->status)
                                                    @case('new')
                                                        Новое
                                                        @break
                                                    @case('in_progress')
                                                        В обработке
                                                        @break
                                                    @case('resolved')
                                                        Решено
                                                        @break
                                                    @default
                                                        {{ $request->status }}
                                                @endswitch
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Модальное окно для полного текста сообщения -->
        <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="messageModalLabel">Текст обращения</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="fullMessage"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Правая колонка: Действия -->
        <div class="profile-actions">
            <button id="edit-profile-button">Редактировать профиль</button>
            <button onclick="location.href='{{ url('/submit-request') }}'">Создать новое обращение</button>
        </div>
    </div>

    <!-- Раздел для аватара -->
    <div class="requests-section">
        <div class="avatar-container">
            <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/default-avatar.png') }}" 
                 alt="Аватар пользователя" 
                 class="avatar" 
                 id="avatar-preview">
            <label for="avatar-input" class="change-avatar-button">Изменить аватар</label>
            <input type="file" accept="image/*" id="avatar-input" style="display: none;" />
        </div>
    </div>
    

    <!-- Модальное окно для редактирования профиля -->
    <div class="modal fade" id="edit-profile-modal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Редактирование профиля</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-profile-form" action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">ФИО:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Электронная почта:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Телефон:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                        </div>

                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

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

    <!-- Добавляем Bootstrap JS перед закрывающим тегом body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Обработчик для всех модальных окон
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            modal.addEventListener('hidden.bs.modal', function () {
                // Удаляем backdrop при закрытии модального окна
                const backdrops = document.querySelectorAll('.modal-backdrop');
                backdrops.forEach(backdrop => backdrop.remove());
                
                // Убираем класс modal-open с body
                document.body.classList.remove('modal-open');
                // Убираем стили overflow
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';
            });
        });

        // Обработчик для кнопки "Просмотреть все обращения"
        document.querySelector('[data-bs-toggle="modal"]').addEventListener('click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('requestsModal'));
            myModal.show();
        });

        // Обработчик для кнопки редактирования профиля
        document.getElementById('edit-profile-button').addEventListener('click', function() {
            var editModal = new bootstrap.Modal(document.getElementById('edit-profile-modal'));
            editModal.show();
        });

        // Закрытие модального окна по клику на крестик или кнопку "Отмена"
        document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(button => {
            button.addEventListener('click', function() {
                const modal = this.closest('.modal');
                const modalInstance = bootstrap.Modal.getInstance(modal);
                if (modalInstance) {
                    modalInstance.hide();
                }
            });
        });
    });

    function showFullMessage(message) {
        document.getElementById('fullMessage').textContent = message;
        var messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
        messageModal.show();
    }
    </script>

    <!-- Подключаем скрипт навигации перед закрывающим тегом body -->
    <script src="{{ asset('js/navigation.js') }}"></script>
</body>
</html>