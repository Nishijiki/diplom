<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск документа - Администрация Сергиево-Посадского городского округа</title>
    <!-- Импорт шрифта Overpass -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/index2.css">
   <style>
            /* Общие стили */
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
                }
                .registration-container {
                    margin-top: 20px;
                }
                .registration-container label {
                    display: block;
                    margin-bottom: 5px;
                    font-weight: bold;
                }
                .registration-container input[type="text"],
                .registration-container input[type="email"],
                .registration-container input[type="password"] {
                    width: 95%;
                    padding: 10px;
                    margin-bottom: 15px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }
                .registration-container button {
                    padding: 10px 20px;
                    background-color: #336699;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
                .registration-container button:hover {
                    background-color: #2a5270;
                }
                .registration-container input[type="tel"]{
                    margin-bottom: 10px;
                }
        
                footer {
            background-color: #eaeaea;
            padding: 20px;
            text-align: center;
            margin-top: 333px;
        }
        
        .footer-columns {
            display: flex;
            justify-content: space-between;
        }
        
        .footer-column {
            flex: 1;
            padding: 0 20px;
        }  @media (max-width: 768px) {
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

        /* Add these styles to your existing CSS */
        .dialog-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .dialog {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            z-index: 1001;
        }

        .suggestions {
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 50%;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }

        .suggestion-item {
            padding: 8px 12px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .suggestion-item:hover {
            background: #f5f5f5;
        }

        .suggestion-item strong {
            color: #2a5270;
        }

        .suggestion-item span {
            display: block;
            margin-top: 3px;
        }

        .document-card {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .document-card h4 {
            margin: 0 0 10px 0;
        }

        .close-dialog {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
        }

        /* Стили для детального модального окна */
        .document-modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            backdrop-filter: blur(3px);
        }

        .document-modal {
            position: fixed;
            top: 10%;
            left: 27%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 800px;
            max-height: 85vh;
            overflow-y: auto;
            z-index: 1001;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .document-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }

        .document-modal-title {
            margin: 0;
            color: #2a5270;
            font-size: 1.5em;
        }

        .document-modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
            padding: 5px;
        }

        .document-modal-close:hover {
            color: #333;
        }

        .document-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .info-group {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .info-group h4 {
            margin: 0 0 10px 0;
            color: #2a5270;
        }

        .info-group p {
            margin: 0;
            color: #444;
        }

        .document-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .document-content h3 {
            color: #2a5270;
            margin-top: 0;
        }

        .related-documents {
            margin-top: 25px;
        }

        .related-documents h3 {
            color: #2a5270;
            margin-bottom: 15px;
        }

        .related-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }

        .related-item {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .related-item:hover {
            background: #e9ecef;
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
        <h2>Поиск документа</h2>
        <p>Заполните форму ниже, чтобы найти нужный документ в базе данных администрации.</p>

        <div class="registration-container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <form id="searchForm" action="{{ route('document.search') }}" method="POST">
                @csrf
                <!-- Поле "Тип документа" -->
                <label for="document-type">Тип документа:</label>
                <select id="document-type" name="document-type" required>
                    <option value="">Выберите тип документа</option>
                    <option value="распоряжение">Распоряжение</option>
                    <option value="постановление">Постановление</option>
                    <option value="протокол">Протокол</option>
                    <option value="отчет">Отчет</option>
                </select>
        
                <!-- Поле "Номер документа" -->
                <label for="document-number">Номер документа (если известен):</label>
                <input type="text" id="document-number" name="document-number">
                <div id="number-suggestions" class="suggestions"></div>
        
                <!-- Поле "Дата документа" -->
                <label for="document-date">Дата документа (если известна):</label>
                <input type="date" id="document-date" name="document-date">
        
                <!-- Поле "Ключевые слова" -->
                <label for="document-keywords">Ключевые слова:</label>
                <input type="text" id="document-keywords" name="document-keywords" placeholder="Введите ключевые слова...">
                <div id="keyword-suggestions" class="suggestions"></div>
        
                <!-- Кнопка "Найти" -->
                <button type="submit">Найти</button>
            </form>
        </div>

        <!-- Dialog Window for Similar Documents -->
        <div id="similarDocumentsDialog" class="dialog-overlay">
            <div class="dialog">
                <span class="close-dialog">&times;</span>
                <h3>Похожие документы</h3>
                <div id="similarDocumentsList"></div>
            </div>
        </div>

        <!-- Добавляем модальное окно для детальной информации -->
        <div id="documentDetailModal" class="document-modal-overlay">
            <div class="document-modal">
                <div class="document-modal-header">
                    <h2 class="document-modal-title"></h2>
                    <button class="document-modal-close">&times;</button>
                </div>
                <div class="document-info">
                    <div class="info-group">
                        <h4>Основная информация</h4>
                        <p><strong>Тип документа:</strong> <span id="modal-doc-type"></span></p>
                        <p><strong>Номер:</strong> <span id="modal-doc-number"></span></p>
                        <p><strong>Дата:</strong> <span id="modal-doc-date"></span></p>
                    </div>
                    <div class="info-group">
                        <h4>Статус обработки</h4>
                        <p><strong>Статус:</strong> <span id="modal-doc-status">Активный</span></p>
                        <p><strong>Последнее обновление:</strong> <span id="modal-doc-updated"></span></p>
                    </div>
                </div>
                <div class="document-content">
                    <h3>Описание документа</h3>
                    <p id="modal-doc-description"></p>
                </div>
                <div class="related-documents">
                    <h3>Связанные документы</h3>
                    <div class="related-list" id="modal-related-docs">
                        <!-- Здесь будут связанные документы -->
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('searchForm');
                const numberInput = document.getElementById('document-number');
                const keywordsInput = document.getElementById('document-keywords');
                const typeSelect = document.getElementById('document-type');
                const numberSuggestions = document.getElementById('number-suggestions');
                const keywordSuggestions = document.getElementById('keyword-suggestions');
                const dialog = document.getElementById('similarDocumentsDialog');
                const closeDialog = document.querySelector('.close-dialog');

                let debounceTimer;

                // Функция для показа всех документов выбранного типа
                function showDocumentsByType(type) {
                    if (!type) {
                        numberSuggestions.style.display = 'none';
                        return;
                    }

                    fetch(`/document-suggestions?type=${type}`)
                        .then(response => response.json())
                        .then(data => {
                            numberSuggestions.innerHTML = '';
                            if (data.length > 0) {
                                data.forEach(doc => {
                                    const div = document.createElement('div');
                                    div.className = 'suggestion-item';
                                    const date = new Date(doc.date).toLocaleDateString('ru-RU');
                                    div.innerHTML = `
                                        <strong>${doc.type}</strong> | 
                                        №${doc.number} от ${date}<br>
                                        <span style="color: #666; font-size: 0.9em;">${doc.title}</span>
                                    `;
                                    updateSuggestionClickHandler(div, doc);
                                    numberSuggestions.appendChild(div);
                                });
                                numberSuggestions.style.display = 'block';
                            }
                        });
                }

                // Слушатель изменения типа документа
                typeSelect.addEventListener('change', function() {
                    showDocumentsByType(this.value);
                });

                // Обновленная функция getSuggestions
                function getSuggestions(input, suggestionsDiv) {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        const searchValue = input.value;
                        const selectedType = typeSelect.value;

                        // Если поле пустое и есть выбранный тип, показываем все документы этого типа
                        if (!searchValue && selectedType) {
                            showDocumentsByType(selectedType);
                            return;
                        }

                        // Если меньше 2 символов и нет выбранного типа, скрываем подсказки
                        if (searchValue.length < 2 && !selectedType) {
                            suggestionsDiv.style.display = 'none';
                            return;
                        }

                        fetch(`/document-suggestions?query=${searchValue}&type=${selectedType}`)
                            .then(response => response.json())
                            .then(data => {
                                suggestionsDiv.innerHTML = '';
                                if (data.length > 0) {
                                    data.forEach(doc => {
                                        const div = document.createElement('div');
                                        div.className = 'suggestion-item';
                                        const date = new Date(doc.date).toLocaleDateString('ru-RU');
                                        div.innerHTML = `
                                            <strong>${doc.type}</strong> | 
                                            №${doc.number} от ${date}<br>
                                            <span style="color: #666; font-size: 0.9em;">${doc.title}</span>
                                        `;
                                        updateSuggestionClickHandler(div, doc);
                                        suggestionsDiv.appendChild(div);
                                    });
                                    suggestionsDiv.style.display = 'block';
                                } else {
                                    suggestionsDiv.style.display = 'none';
                                }
                            });
                    }, 300);
                }

                // Обновляем стили для контейнера подсказок
                const suggestionContainers = document.querySelectorAll('.suggestions');
                suggestionContainers.forEach(container => {
                    container.style.maxHeight = '400px'; // Увеличиваем максимальную высоту
                    container.style.overflowY = 'auto';
                    container.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
                    container.style.border = '1px solid #ddd';
                    container.style.borderRadius = '4px';
                    container.style.backgroundColor = '#fff';
                    container.style.zIndex = '1000';
                });

                // Handle form submission
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(form);

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.similarDocuments && data.similarDocuments.length > 0) {
                            const documentsList = document.getElementById('similarDocumentsList');
                            documentsList.innerHTML = '';
                            
                            data.similarDocuments.forEach(doc => {
                                const docElement = document.createElement('div');
                                docElement.className = 'document-card';
                                docElement.innerHTML = `
                                    <h4>${doc.title}</h4>
                                    <p><strong>Тип:</strong> ${doc.type}</p>
                                    <p><strong>Номер:</strong> ${doc.number}</p>
                                    <p><strong>Дата:</strong> ${new Date(doc.date).toLocaleDateString()}</p>
                                    <p>${doc.description}</p>
                                `;
                                documentsList.appendChild(docElement);
                            });

                            dialog.style.display = 'block';
                        }
                    });
                });

                // Close dialog
                closeDialog.onclick = function() {
                    dialog.style.display = 'none';
                };

                // Close dialog when clicking outside
                window.onclick = function(event) {
                    if (event.target == dialog) {
                        dialog.style.display = 'none';
                    }
                };

                const documentDetailModal = document.getElementById('documentDetailModal');
                const modalClose = document.querySelector('.document-modal-close');

                // Обновляем обработчики закрытия модального окна
                function closeModal() {
                    documentDetailModal.style.display = 'none';
                }

                // Закрытие по клику на крестик
                modalClose.addEventListener('click', closeModal);

                // Закрытие по клику вне модального окна
                documentDetailModal.addEventListener('click', function(event) {
                    if (event.target === documentDetailModal) {
                        closeModal();
                    }
                });

                // Закрытие по нажатию Escape
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape' && documentDetailModal.style.display === 'block') {
                        closeModal();
                    }
                });

                // Предотвращаем закрытие при клике на содержимое модального окна
                document.querySelector('.document-modal').addEventListener('click', function(event) {
                    event.stopPropagation();
                });

                // Обновляем стили для кнопки закрытия
                const closeButton = document.querySelector('.document-modal-close');
                closeButton.style.position = 'absolute';
                closeButton.style.right = '15px';
                closeButton.style.top = '15px';
                closeButton.style.fontSize = '24px';
                closeButton.style.cursor = 'pointer';
                closeButton.style.background = 'none';
                closeButton.style.border = 'none';
                closeButton.style.padding = '5px';
                closeButton.style.color = '#666';
                closeButton.style.transition = 'color 0.3s ease';
                closeButton.style.zIndex = '1002';

                // Добавляем эффект при наведении на кнопку закрытия
                closeButton.addEventListener('mouseover', function() {
                    this.style.color = '#ff4444';
                });

                closeButton.addEventListener('mouseout', function() {
                    this.style.color = '#666';
                });

                // Обновляем стили модального окна для лучшей видимости
                const modalContent = document.querySelector('.document-modal');
                modalContent.style.position = 'relative';
                modalContent.style.backgroundColor = '#fff';
                modalContent.style.padding = '30px';
                modalContent.style.borderRadius = '8px';
                modalContent.style.maxWidth = '800px';
                modalContent.style.width = '90%';
                modalContent.style.maxHeight = '85vh';
                modalContent.style.overflowY = 'auto';
                modalContent.style.boxShadow = '0 5px 15px rgba(0,0,0,0.3)';

                // Добавляем анимацию появления/исчезновения
                documentDetailModal.style.transition = 'opacity 0.3s ease';
                modalContent.style.transition = 'transform 0.3s ease';

                function showModal() {
                    documentDetailModal.style.opacity = '0';
                    documentDetailModal.style.display = 'block';
                    modalContent.style.transform = 'scale(0.7)';
                    
                    // Запускаем анимацию появления
                    setTimeout(() => {
                        documentDetailModal.style.opacity = '1';
                        modalContent.style.transform = 'scale(1)';
                    }, 10);
                }

                // Обновляем функцию showDocumentDetails
                function showDocumentDetails(doc) {
                    // Форматируем дату
                    const date = new Date(doc.date).toLocaleDateString('ru-RU', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    // Заполняем информацию в модальном окне
                    document.querySelector('.document-modal-title').textContent = doc.title;
                    document.getElementById('modal-doc-type').textContent = doc.type;
                    document.getElementById('modal-doc-number').textContent = doc.number;
                    document.getElementById('modal-doc-date').textContent = date;
                    document.getElementById('modal-doc-description').textContent = doc.description;
                    document.getElementById('modal-doc-updated').textContent = new Date(doc.updated_at).toLocaleDateString('ru-RU');

                    // Получаем связанные документы
                    fetch(`/api/documents/related/${doc.id}?limit=6`)
                        .then(response => response.json())
                        .then(relatedDocs => {
                            const relatedList = document.getElementById('modal-related-docs');
                            relatedList.innerHTML = '';
                            
                            // Ограничиваем количество отображаемых документов до 6
                            const limitedDocs = relatedDocs.slice(0, 6);
                            
                            limitedDocs.forEach(relatedDoc => {
                                const div = document.createElement('div');
                                div.className = 'related-item';
                                div.innerHTML = `
                                    <strong>${relatedDoc.type}</strong><br>
                                    №${relatedDoc.number} от ${new Date(relatedDoc.date).toLocaleDateString('ru-RU')}<br>
                                    <span style="font-size: 0.9em;">${relatedDoc.title}</span>
                                `;
                                div.onclick = () => showDocumentDetails(relatedDoc);
                                relatedList.appendChild(div);
                            });

                            // Добавляем стили для сетки связанных документов
                            const relatedDocsContainer = document.querySelector('.related-list');
                            relatedDocsContainer.style.display = 'grid';
                            relatedDocsContainer.style.gridTemplateColumns = 'repeat(3, 1fr)';
                            relatedDocsContainer.style.gap = '15px';
                            relatedDocsContainer.style.marginTop = '15px';
                        });

                    // Используем новую функцию показа модального окна
                    showModal();
                }

                // Обновляем обработчик клика на подсказку
                function updateSuggestionClickHandler(div, doc) {
                    div.onclick = () => {
                        // Заполняем форму
                        document.getElementById('document-type').value = doc.type;
                        document.getElementById('document-number').value = doc.number;
                        document.getElementById('document-date').value = doc.date;
                        document.getElementById('document-keywords').value = doc.title;
                        
                        // Скрываем подсказки
                        numberSuggestions.style.display = 'none';
                        keywordSuggestions.style.display = 'none';

                        // Показываем модальное окно с деталями
                        showDocumentDetails(doc);
                    };
                }
            });
        </script>
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

    <!-- Подключаем скрипт навигации -->
    <script src="{{ asset('js/navigation.js') }}"></script>
</body>
</html>