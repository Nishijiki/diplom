<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
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

        /* Кнопки и ссылки в блоке .buttons */
        .buttons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .buttons button,
        .buttons a {
            font-size: 16px;
            padding: 8px 15px;
            white-space: nowrap;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .buttons button i {
            margin-right: 8px;
        }

        /* По умолчанию ссылки без кнопок */
        .buttons a {
            color: white;
            text-decoration: none;
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

        .welcome-section {
            background-color: #eaeaea;
            padding: 20px;
            text-align: center;
        }

        .avatar-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .change-avatar-button {
            padding: 10px 20px;
            background-color: #ccc;
            color: #333;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            /* Выровнять по правому краю */
        }

        .admin-panel {
            background-color: #ffffff;
            padding: 25px 30px;
            margin-top: 25px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            width: 95%;
        }
        .admin-panel h2 {
            font-size: 24px;
            font-weight: 700;
            color: #e74c3c;
            margin-bottom: 20px;
            border-bottom: 2px solid #e74c3c;
            padding-bottom: 8px;
            text-align: center;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            background-color: transparent;
            padding: 0;
        }

        .section-title {
            grid-column: span 3;
            text-align: center;
            background-color: #fff;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        .toggle-button {
            grid-column: span 1;
            text-align: center;
            background-color: #f9f9f9;
            padding: 12px;
            cursor: pointer;
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .toggle-button:hover {
            background-color: #e74c3c;
            color: white;
        }

        .toggle-button i {
            font-size: 22px;
            transition: transform 0.3s ease;
        }

        /* При открытии секции можно добавить класс для поворота стрелки */
        .toggle-button.open i {
            transform: rotate(180deg);
        }

        .grid-item {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .grid-button {
            padding: 15px 25px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
        }

        .grid-button:hover {
            background-color: #c0392b;
            box-shadow: 0 6px 15px rgba(192, 57, 43, 0.5);
        }

        .table-content {
            max-width: 1100px;
            margin: 25px auto;
            padding: 25px 30px;
            background-color: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            width: 95%;
        }

        .table-content h3 {
            margin-bottom: 15px;
            color: #e74c3c;
            font-weight: 700;
        }

        .table-content ul {
            list-style: none;
            padding: 0;
            margin: 0 0 20px 0;
        }

        .table-content li {
            background-color: #f9f9f9;
            margin-bottom: 10px;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
        }

        .table-content button {
            padding: 10px 20px;
            margin-right: 15px;
            border: none;
            border-radius: 8px;
            background-color: #208f9e;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .table-content button:hover {
            background-color: #186d73;
        }

        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: 1fr;
            }

            #search {
                width: 100%;
                margin-right: 0;
            }

            .buttons {
                flex-wrap: wrap;
                gap: 15px;
            }

            .buttons button,
            .buttons a {
                margin-right: 0;
                flex: 1 1 100%;
                text-align: center;
            }

            .admin-panel,
            .table-content,
            .modal-content {
                width: 95%;
                padding: 15px;
            }

            .requests-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .requests-table th,
            .requests-table td {
                min-width: 120px;
            }
        }

        .table-menu {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            justify-content: center;
        }

        .menu-button {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .menu-button:hover {
            background-color: #c0392b;
        }

        .menu-button.active {
            background-color: #c0392b;
            box-shadow: 0 4px 8px rgba(192, 57, 43, 0.6);
        }


        /* Планшеты (ширина экрана до 1024px) */
        @media (max-width: 1024px) {
            body {
                font-size: 15px;
            }
            .logo img {
                max-width: 140px;
            }

            .buttons {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .buttons button,
            .buttons a {
                font-size: 14px;
                padding: 7px 12px;
            }

            header form {
                flex-grow: 1;
                margin: 10px 0;
            }

            #search {
                width: 100%;
                margin-right: 0;
            }

            .grid-container {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 12px;
            }
        }

        /* Мобильные устройства (ширина экрана до 600px) */
        @media (max-width: 600px) {
            body {
                font-size: 14px;
            }

            header {
                flex-direction: column;
                align-items: center;
                gap: 15px;
                padding: 15px 10px;
            }

            .logo img {
                max-width: 120px;
            }

            form {
                width: 100%;
            }

            .search-container {
                width: 100%;
            }

            #search {
                width: 100%;
                margin-right: 0;
                font-size: 14px;
                padding: 8px 10px;
            }

            .buttons {
                flex-direction: column;
                width: 100%;
                gap: 10px;
                align-items: stretch;
            }

            .buttons button,
            .buttons a {
                width: 100%;
                font-size: 16px;
                padding: 12px 0;
                text-align: center;
                white-space: normal;
            }


            nav ul {
                flex-direction: column;
                gap: 10px;
            }

            nav ul li {
                margin-right: 0;
            }

            .grid-container {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .avatar-container {
                flex-direction: column;
                gap: 15px;
            }

            .change-avatar-button {
                margin-left: 0;
                width: 100%;
            }
        }

        .crop-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            overflow: auto;
        }

        .crop-container {
            position: relative;
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }

        .crop-area {
            max-height: 70vh;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .crop-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .crop-button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .crop-save {
            background-color: #4CAF50;
            color: white;
        }

        .crop-cancel {
            background-color: #f44336;
            color: white;
        }

        .crop-button:hover {
            opacity: 0.9;
        }

        .requests-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }

        .requests-table th,
        .requests-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .requests-table th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .requests-table tr:hover {
            background-color: #f9f9f9;
        }

        .status-form select {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-info {
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
        }

        .btn-info:hover {
            background-color: #31b0d5;
            border-color: #269abc;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .modal {
    display: none; /* Скрыто по умолчанию */
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5); /* Темное затемнение */
}

.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 8px;
    width: 95%;
    max-width: 800px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.close-modal {
    color: #aaa;
    float: right;
    font-size: 24px;
    cursor: pointer;
}

.close-modal:hover,
.close-modal:focus {
    color: #000;
}

.form-group {
    margin-bottom: 15px;
    width: 100%;
}

.form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.menu-button');
    const tables = document.querySelectorAll('.table-content');

    // Показываем таблицу обращений по умолчанию
    const requestsTable = document.getElementById('requests-table');
    if (requestsTable) {
        requestsTable.style.display = 'block';
    }

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            // Убираем активный класс у всех кнопок
            buttons.forEach(btn => btn.classList.remove('active'));
            // Добавляем активный класс на текущую кнопку
            button.classList.add('active');

            // Скрываем все таблицы
            tables.forEach(table => table.style.display = 'none');

            // Показываем выбранную таблицу
            const tableId = button.getAttribute('data-table');
            const selectedTable = document.getElementById(tableId);
            if (selectedTable) {
                selectedTable.style.display = 'block';
            }
        });
    });

    // Устанавливаем активную кнопку "Обращения" по умолчанию
    const requestsButton = document.querySelector('[data-table="requests-table"]');
    if (requestsButton) {
        requestsButton.classList.add('active');
    }
});

// Функции для кнопок внутри таблиц
function editUser(userId) {
    // В будущем здесь можно добавить открытие модального окна для редактирования
    alert('Редактирование пользователя #' + userId);
}

function deleteUser(userId) {
    if (confirm('Вы уверены, что хотите удалить этого пользователя?')) {
        // Получаем CSRF токен
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch(`/admin/users/${userId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => Promise.reject(err));
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Находим строку таблицы с пользователем и удаляем её
                const userRow = document.querySelector(`tr[data-user-id="${userId}"]`);
                if (userRow) {
                    userRow.remove();
                }
                alert('Пользователь успешно удален');
            } else {
                throw new Error(data.message || 'Ошибка при удалении пользователя');
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
            alert(error.message || 'Произошла ошибка при удалении пользователя');
        });
    }
}

function viewRequestDetails() {
    alert("Функция просмотра деталей обращения активирована.");
}
function viewDocument() {
    alert("Функция просмотра документа активирована.");
}

function deleteDocument() {
    alert("Функция удаления документа активирована.");
}

function addCategory() {
    alert("Функция добавления категории активирована.");
}

function editPost(id) {
    // Здесь будет логика редактирования новости
    alert('Редактирование новости #' + id);
    // В будущем здесь можно добавить открытие модального окна с формой редактирования
}

function deletePost(id) {
    if (confirm('Вы уверены, что хотите удалить эту новость?')) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch(`/admin/news/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('Новость успешно удалена');
                window.location.reload();
            } else {
                throw new Error(result.message || 'Ошибка при удалении новости');
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
            alert(error.message);
        });
    }
}

function addPost() {
    // Здесь будет логика добавления новости
    alert('Добавление новой новости');
    // В будущем здесь можно добавить открытие модального окна с формой добавления
}

document.addEventListener("DOMContentLoaded", function () {
    const avatarPreview = document.getElementById("avatar-preview");
    const changeAvatarButton = document.getElementById("change-avatar-button");
    const cropModal = document.getElementById("crop-modal");
    const imageToCrop = document.getElementById("image-to-crop");
    const saveCroppedImageButton = document.getElementById("save-cropped-image");
    const cancelCropButton = document.getElementById("cancel-crop");

    let cropper;

    // Открытие модального окна для выбора изображения
    changeAvatarButton?.addEventListener("click", function () {
        const input = document.createElement("input");
        input.type = "file";
        input.accept = "image/*";

        input.onchange = function (event) {
            const file = event.target.files[0];
            if (file) {
                // Проверка размера файла (максимум 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert("Файл слишком большой. Максимальный размер 5MB");
                    return;
                }

                // Проверка типа файла
                if (!file.type.match('image.*')) {
                    alert("Пожалуйста, выберите изображение");
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    imageToCrop.src = e.target.result;
                    cropModal.style.display = "block";

                    if (cropper) {
                        cropper.destroy();
                    }

                    // Инициализация Cropper.js с улучшенными настройками
                    cropper = new Cropper(imageToCrop, {
                        aspectRatio: 1,
                        viewMode: 2,
                        dragMode: 'move',
                        autoCropArea: 1,
                        restore: false,
                        guides: true,
                        center: true,
                        highlight: false,
                        cropBoxMovable: true,
                        cropBoxResizable: true,
                        toggleDragModeOnDblclick: false,
                        background: true
                    });
                };
                reader.readAsDataURL(file);
            }
        };

        input.click();
    });

    // Сохранение кропнутого изображения
    saveCroppedImageButton?.addEventListener("click", function () {
        if (!cropper) return;

        const canvas = cropper.getCroppedCanvas({
            width: 300,
            height: 300,
            fillColor: '#fff',
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high'
        });

        canvas.toBlob(function (blob) {
            const formData = new FormData();
            formData.append("avatar", blob, "avatar.jpg");

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            if (!csrfToken) {
                console.error("CSRF token not found!");
                alert("Ошибка: CSRF токен не найден");
                return;
            }

            // Показываем индикатор загрузки
            changeAvatarButton.disabled = true;
            changeAvatarButton.textContent = 'Загрузка...';

            // Отправка аватара на сервер
            fetch("/update-avatar", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken
                },
                body: formData
            })
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    return response.text().then(text => {
                        console.error('Error response:', text);
                        throw new Error('Network response was not ok');
                    });
                }
                return response.json();
            })
            .then(data => {
                console.log('Success response:', data);
                if (data.success) {
                    // Обновляем превью аватара с временной меткой для избежания кэширования
                    const timestamp = new Date().getTime();
                    avatarPreview.src = `${data.avatarUrl}?t=${timestamp}`;
                    cropModal.style.display = "none";
                    
                    // Показываем сообщение об успехе
                    alert("Аватар успешно обновлен!");
                } else {
                    throw new Error(data.message || 'Ошибка при загрузке аватара');
                }
            })
            .catch(error => {
                console.error("Ошибка:", error);
                alert("Произошла ошибка при загрузке аватара. Пожалуйста, попробуйте снова.");
            })
            .finally(() => {
                // Восстанавливаем кнопку
                changeAvatarButton.disabled = false;
                changeAvatarButton.textContent = 'Сменить аватар';
                
                // Уничтожаем cropper
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
            });
        }, 'image/jpeg', 0.95);
    });

    // Отмена кропа
    cancelCropButton?.addEventListener("click", function () {
        cropModal.style.display = "none";
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    // Закрытие модального окна при клике вне его
    cropModal?.addEventListener("click", function (e) {
        if (e.target === cropModal) {
            cancelCropButton.click();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("document-modal");
    const closeModalButton = document.querySelector(".close-modal");
    const form = document.getElementById("document-form");

    // Функция для открытия модального окна для создания
    window.addDocument = function () {
        modal.style.display = "block";
        form.reset();
        form.action = "/admin/documents";
        document.getElementById("modal-title").textContent = "Добавить документ";
        document.getElementById("submit-document-btn").textContent = "Добавить";
        form.querySelector('input[name="_method"]').value = 'POST';
    };

    // Функция для редактирования документа
    window.editDocument = function (documentData) {
        modal.style.display = "block";
        form.reset();
        
        // Устанавливаем метод и путь
        form.action = `/admin/documents/${documentData.id}`;
        form.querySelector('input[name="_method"]').value = 'PUT';
        
        // Заполняем форму данными
        document.getElementById("type").value = documentData.type;
        document.getElementById("number").value = documentData.number;
        document.getElementById("date").value = documentData.date;
        document.getElementById("title").value = documentData.title;
        document.getElementById("description").value = documentData.description;

        document.getElementById("modal-title").textContent = "Редактировать документ";
        document.getElementById("submit-document-btn").textContent = "Сохранить изменения";
    };

    // Обработка отправки формы
    form.onsubmit = async function (e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const method = formData.get('_method');
        
        // Преобразуем FormData в обычный объект
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        
        try {
            const response = await fetch(this.action, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();
            console.log('Response:', result); // Для отладки

            if (result.success) {
                alert(result.message);
                window.location.reload();
            } else {
                alert(result.message || "Ошибка при сохранении документа");
            }
        } catch (error) {
            console.error("Ошибка:", error);
            alert("Произошла ошибка при сохранении документа");
        }
    };

    // Закрытие модального окна
    closeModalButton.onclick = function () {
        modal.style.display = "none";
        form.reset();
    };

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
            form.reset();
        }
    };
});
</script>
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

        <!-- Условное отображение кнопок -->
        @guest
            <!-- Для неавторизованных пользователей -->
            <a href="{{ url('/login') }}" style="color: white; text-decoration: none;">Вход</a>
            <a href="{{ url('/register') }}" style="color: white; text-decoration: none;">Регистрация</a>
        @endguest

        @auth
            <!-- Для авторизованных пользователей -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="color: white; background: none; border: none; cursor: pointer;">
                    Выйти
                </button>
            </form>
        @endauth
    </div>
</header>
<nav>
    <ul>
        <li><a href="{{ url('/') }}">Главная</a></li>
 
        <li><a href="{{ url('/search-document') }}">Поиск документа</a></li>

    </ul>
</nav>
  <!-- Приветствие -->
  <div class="welcome-section">
    <h1>Здравствуйте, {{ Auth::user()->name }}!</h1>

    <div class="avatar-container">
        <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('img/default-avatar.png') }}" 
             alt="Аватар пользователя" 
             class="avatar" 
             id="avatar-preview">
        <p>Аватар пользователя</p>
        <button class="change-avatar-button" id="change-avatar-button">Сменить аватар</button>
    </div>
<div id="crop-modal" class="crop-modal">
    <div class="crop-container">
        <div class="crop-area">
            <img id="image-to-crop" src="" alt="Изображение для кропа" style="max-width: 100%;">
        </div>
        <div class="crop-buttons">
            <button id="save-cropped-image" class="crop-button crop-save">Сохранить</button>
            <button id="cancel-crop" class="crop-button crop-cancel">Отмена</button>
        </div>
    </div>
</div>
<form id="avatar-form" action="/update-avatar" method="POST" enctype="multipart/form-data" style="display: none;">
    @csrf
    <input type="hidden" id="cropped-image-data" name="avatar">
</form>

<div class="admin-panel">
    <h2>Панель администратора</h2>
    
    <!-- Меню выбора таблиц -->
    <nav class="table-menu">
        <button class="menu-button active" data-table="users-table">Пользователи</button>
        <button class="menu-button" data-table="requests-table">Обращения</button>
        <button class="menu-button" data-table="documents-table">Документы</button>
        <button class="menu-button" data-table="investors-table">Инвесторы</button>
        <button class="menu-button" data-table="posts-table">Посты</button>
    </nav>
    
    <!-- Контент таблиц -->
    <div id="table-data">
        <div id="users-table" class="table-content">
            <h3>Пользователи</h3>
            @if(isset($users) && count($users) > 0)
                <table class="requests-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Роль</th>
                            <th>Дата регистрации</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr data-user-id="{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ?? 'Не указан' }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <button onclick="editUser({{ $user->id }})" class="btn btn-info">Редактировать</button>
                                    @if($user->role !== 'admin')
                                        <button onclick="deleteUser({{ $user->id }})" class="btn btn-danger">Удалить</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{ $users->links() }}
            @else
                <p>Пользователи не найдены</p>
            @endif
        </div>
    
        <div id="requests-table" class="table-content" style="display:none;">
            <h3>Обращения</h3>
            
            @if(isset($requests) && count($requests) > 0)
                <table class="requests-table">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>ФИО</th>
                            <th>Тема</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->created_at->format('d.m.Y H:i') }}</td>
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->subject }}</td>
                                <td>
                                    <form action="{{ route('requests.update-status', $request->id) }}" method="POST" class="status-form">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()">
                                            <option value="new" {{ $request->status == 'new' ? 'selected' : '' }}>Новое</option>
                                            <option value="in_progress" {{ $request->status == 'in_progress' ? 'selected' : '' }}>В работе</option>
                                            <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Завершено</option>
                                            <option value="rejected" {{ $request->status == 'rejected' ? 'selected' : '' }}>Отклонено</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                <a href="{{ route('admin.request.show', $request->id) }}" class="btn btn-info">Подробнее</a>                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if(method_exists($requests, 'links'))
                    {{ $requests->links() }}
                @endif
            @else
                <p>Нет новых обращений</p>
            @endif
        </div>
    
        <!-- Модальное окно -->
<div id="document-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h3 id="modal-title">Добавить документ</h3>
        <form id="document-form" method="POST">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" id="document-id" name="id">

            <div class="form-group">
                <label for="type">Тип документа:</label>
                <input type="text" id="type" name="type" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="number">Номер:</label>
                <input type="text" id="number" name="number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date">Дата:</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="title">Название:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Описание:</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <button type="submit" id="submit-document-btn" class="btn btn-primary">Сохранить</button>
                <button type="button" class="btn btn-secondary" onclick="document.querySelector('.close-modal').click()">Отмена</button>
            </div>
        </form>
    </div>
</div>
        <div id="documents-table" class="table-content" style="display:none;">
            <h3>Документы</h3>
            @if(isset($documents) && count($documents) > 0)
                <table class="requests-table">
                    <thead>
                        <tr>
                            <th>Тип</th>
                            <th>Номер</th>
                            <th>Дата</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($documents as $document)
<tr>
    <td>{{ ucfirst($document->type) }}</td>
    <td>{{ $document->number }}</td>
    <td>{{ \Carbon\Carbon::parse($document->date)->format('d.m.Y') }}</td>
    <td>{{ $document->title }}</td>
    <td>{{ Str::limit($document->description, 100) }}</td>
    <td>
        <button class="btn btn-success" onclick="addDocument()">Добавить документ</button>
        <button onclick="editDocument({{ json_encode($document) }})" class="btn btn-info">Редактировать</button>
        <form action="{{ route('admin.documents.destroy', $document->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
        </form>
    </td>
</tr>
@endforeach
                    </tbody>
                </table>

       {{ $documents->links() }}
            @else
                <p>Документы не найдены</p>
            @endif
        </div>
    
    
        <div id="posts-table" class="table-content" style="display:none;">
            <h3>Новости</h3>
            @if(isset($news) && count($news) > 0)
                <table class="requests-table">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Заголовок</th>
                            <th>Описание</th>
                            <th>Автор</th>
                            <th>Изображение</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $post)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($post->date)->format('d.m.Y') }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ Str::limit($post->description, 100) }}</td>
                                <td>{{ $post->author }}</td>
                                <td>
                                    @if($post->image)
                                        <img src="{{ asset($post->image) }}" alt="Новость" style="max-width: 100px; height: auto;">
                                    @else
                                        Нет изображения
                                    @endif
                                </td>
                                <td>
                                    <button onclick='editPost(@json($post))' class="btn btn-info">Редактировать</button>
                                    <button onclick="deletePost({{ $post->id }})" class="btn btn-danger">Удалить</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{ $news->links() }}
            @else
                <p>Новости не найдены</p>
            @endif

            <div style="margin-top: 20px;">
                <button onclick="addPost()" class="btn btn-success">Добавить новость</button>
            </div>
        </div>

        <div id="investors-table" class="table-content" style="display:none;">
            <h3>Заявки инвесторов</h3>
            
            @if(isset($investorRequests) && count($investorRequests) > 0)
                <table class="requests-table">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Статус</th>
                            <th>Сообщение</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($investorRequests as $request)
                            <tr>
                                <td>{{ $request->created_at->format('d.m.Y H:i') }}</td>
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->email }}</td>
                                <td>{{ $request->phone }}</td>
                                <td>
                                    <form action="{{ route('investor.update-status', $request->id) }}" 
                                          method="POST" 
                                          class="status-form">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()">
                                            <option value="new" {{ $request->status == 'new' ? 'selected' : '' }}>Новая</option>
                                            <option value="in_progress" {{ $request->status == 'in_progress' ? 'selected' : '' }}>В работе</option>
                                            <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Завершена</option>
                                            <option value="rejected" {{ $request->status == 'rejected' ? 'selected' : '' }}>Отклонена</option>
                                        </select>
                                    </form>
                                </td>
                                <td>{{ $request->message }}</td>
                                <td>
                                    <button onclick="showInvestorDetails({{ json_encode($request) }})" class="btn btn-info">Подробнее</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if(method_exists($investorRequests, 'links'))
                    {{ $investorRequests->links() }}
                @endif
            @else
                <p>Нет новых заявок от инвесторов</p>
            @endif
        </div>
    </div>
</div>

<div id="user-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeUserModal()">&times;</span>
        <h3 id="user-modal-title">Редактировать пользователя</h3>
        <form id="user-form" method="POST">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" id="user-id" name="id">

            <div class="form-group">
                <label for="user-name">Имя:</label>
                <input type="text" id="user-name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="user-email">Email:</label>
                <input type="email" id="user-email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="user-phone">Телефон:</label>
                <input type="tel" id="user-phone" name="phone" class="form-control">
            </div>

            <div class="form-group">
                <label for="user-role">Роль:</label>
                <select id="user-role" name="role" class="form-control" required>
                    <option value="user">Пользователь</option>
                    <option value="admin">Администратор</option>
                </select>
            </div>

            <div class="form-group">
                <label for="user-password">Новый пароль (оставьте пустым, если не хотите менять):</label>
                <input type="password" id="user-password" name="password" class="form-control">
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <button type="submit" id="submit-user-btn" class="btn btn-primary">Сохранить</button>
                <button type="button" class="btn btn-secondary" onclick="closeUserModal()">Отмена</button>
            </div>
        </form>
    </div>
</div>

<script>
// Функции для работы с пользователями
document.addEventListener("DOMContentLoaded", function() {
    const userModal = document.getElementById("user-modal");
    const userForm = document.getElementById("user-form");
    const closeModalButton = userModal.querySelector(".close-modal");

    window.editUser = function(userId) {
        // Получаем данные пользователя
        fetch(`/admin/users/${userId}`)
            .then(response => response.json())
            .then(userData => {
                console.log('Данные пользователя:', userData);
                userModal.style.display = "block";
                userForm.reset();

                // Устанавливаем путь для формы
                userForm.action = `/admin/users/${userId}`;
                
                // Заполняем форму данными
                document.getElementById("user-id").value = userData.id;
                document.getElementById("user-name").value = userData.name;
                document.getElementById("user-email").value = userData.email;
                document.getElementById("user-phone").value = userData.phone || '';
                document.getElementById("user-role").value = userData.role;
                
                // Очищаем поле пароля
                document.getElementById("user-password").value = '';
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert('Ошибка при получении данных пользователя');
            });
    };

    window.closeUserModal = function() {
        userModal.style.display = "none";
        userForm.reset();
    };

    // Закрытие по клику на крестик
    closeModalButton.onclick = closeUserModal;

    // Закрытие по клику вне модального окна
    window.onclick = function(event) {
        if (event.target === userModal) {
            closeUserModal();
        }
    };

    // Обработка отправки формы
    userForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const userId = document.getElementById("user-id").value;
        
        try {
            const response = await fetch(`/admin/users/${userId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: formData
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const result = await response.json();

            if (result.success) {
                alert(result.message);
                window.location.reload();
            } else {
                throw new Error(result.message || 'Ошибка при сохранении данных пользователя');
            }
        } catch (error) {
            console.error('Ошибка:', error);
            alert(error.message);
        }
    });
});
</script>

<!-- Модальное окно для инвесторских заявок -->
<div id="investor-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeInvestorModal()">&times;</span>
        <h3 id="investor-modal-title">Детали заявки инвестора</h3>
        <form id="investor-form" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" id="investor-id" name="id">

            <div class="form-group">
                <label for="investor-name">Имя:</label>
                <input type="text" id="investor-name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="investor-email">Email:</label>
                <input type="email" id="investor-email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="investor-phone">Телефон:</label>
                <input type="tel" id="investor-phone" name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="investor-message">Сообщение:</label>
                <textarea id="investor-message" name="message" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="investor-status">Статус:</label>
                <select id="investor-status" name="status" class="form-control" required>
                    <option value="new">Новая</option>
                    <option value="in_progress">В работе</option>
                    <option value="completed">Завершена</option>
                    <option value="rejected">Отклонена</option>
                </select>
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <button type="submit" id="submit-investor-btn" class="btn btn-primary">Сохранить</button>
                <button type="button" class="btn btn-danger" onclick="deleteInvestorRequest()">Удалить</button>
                <button type="button" class="btn btn-secondary" onclick="closeInvestorModal()">Отмена</button>
            </div>
        </form>
    </div>
</div>

<script>
// Функции для работы с заявками инвесторов
document.addEventListener("DOMContentLoaded", function() {
    const investorModal = document.getElementById("investor-modal");
    const investorForm = document.getElementById("investor-form");
    let currentInvestorId = null;

    window.showInvestorDetails = function(investorData) {
        console.log('Данные заявки:', investorData);
        investorModal.style.display = "block";
        investorForm.reset();
        currentInvestorId = investorData.id;

        // Устанавливаем путь для формы
        investorForm.action = `/admin/investor-requests/${investorData.id}`;
        
        // Заполняем форму данными
        document.getElementById("investor-id").value = investorData.id;
        document.getElementById("investor-name").value = investorData.name;
        document.getElementById("investor-email").value = investorData.email;
        document.getElementById("investor-phone").value = investorData.phone;
        document.getElementById("investor-message").value = investorData.message;
        document.getElementById("investor-status").value = investorData.status;
    };

    window.closeInvestorModal = function() {
        investorModal.style.display = "none";
        investorForm.reset();
        currentInvestorId = null;
    };

    window.deleteInvestorRequest = function() {
        if (!currentInvestorId) return;
        
        if (confirm('Вы уверены, что хотите удалить эту заявку?')) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            fetch(`/admin/investor-requests/${currentInvestorId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert('Заявка успешно удалена');
                    window.location.reload();
                } else {
                    throw new Error(result.message || 'Ошибка при удалении заявки');
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert(error.message);
            });
        }
    };

    // Обработка отправки формы
    investorForm.onsubmit = async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const response = await fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                alert(result.message);
                window.location.reload();
            } else {
                throw new Error(result.message || 'Ошибка при сохранении заявки');
            }
        } catch (error) {
            console.error('Ошибка:', error);
            alert(error.message);
        }
    };

    // Закрытие модального окна при клике вне его
    window.onclick = function(event) {
        if (event.target === investorModal) {
            closeInvestorModal();
        }
    };
});
</script>

<!-- Модальное окно для новостей -->
<div id="post-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closePostModal()">&times;</span>
        <h3 id="post-modal-title">Добавить новость</h3>
        <form id="post-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" id="post-id" name="id">

            <div class="form-group">
                <label for="post-title">Заголовок:</label>
                <input type="text" id="post-title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="post-description">Описание:</label>
                <textarea id="post-description" name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="post-author">Автор:</label>
                <input type="text" id="post-author" name="author" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="post-date">Дата:</label>
                <input type="date" id="post-date" name="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="post-image">Изображение:</label>
                <input type="file" id="post-image" name="image" class="form-control" accept="image/*">
                <div id="current-image-container" style="margin-top: 10px; display: none;">
                    <img id="current-image-preview" src="" alt="Текущее изображение" style="max-width: 200px;">
                    <p>Текущее изображение</p>
                </div>
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <button type="submit" id="submit-post-btn" class="btn btn-primary">Сохранить</button>
                <button type="button" class="btn btn-secondary" onclick="closePostModal()">Отмена</button>
            </div>
        </form>
    </div>
</div>

<script>
// Функции для работы с новостями
document.addEventListener("DOMContentLoaded", function () {
    const postModal = document.getElementById("post-modal");
    const postForm = document.getElementById("post-form");

    // Функция для открытия модального окна создания новости
    window.addPost = function () {
        postModal.style.display = "block";
        postForm.reset();
        document.getElementById("current-image-container").style.display = "none";
        postForm.action = "/admin/news";
        document.getElementById("post-modal-title").textContent = "Добавить новость";
        document.getElementById("submit-post-btn").textContent = "Добавить";
        postForm.querySelector('input[name="_method"]').value = 'POST';
    };

    // Функция для редактирования новости
    window.editPost = function (postData) {
        console.log('Данные для редактирования:', postData);
        postModal.style.display = "block";
        postForm.reset();
        
        // Устанавливаем метод и путь
        postForm.action = `/admin/news/${postData.id}`;
        const methodInput = postForm.querySelector('input[name="_method"]');
        if (methodInput) {
            methodInput.value = 'PUT';
        } else {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = '_method';
            input.value = 'PUT';
            postForm.appendChild(input);
        }
        
        // Добавляем или обновляем CSRF токен
        const csrfInput = postForm.querySelector('input[name="_token"]');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        if (csrfInput) {
            csrfInput.value = csrfToken;
        } else {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = '_token';
            input.value = csrfToken;
            postForm.appendChild(input);
        }
        
        // Заполняем форму данными
        document.getElementById("post-id").value = postData.id;
        document.getElementById("post-title").value = postData.title || '';
        document.getElementById("post-description").value = postData.description || '';
        document.getElementById("post-author").value = postData.author || '';
        
        // Форматируем дату для input type="date"
        const dateObj = postData.date ? new Date(postData.date) : new Date();
        const formattedDate = dateObj.toISOString().split('T')[0];
        document.getElementById("post-date").value = formattedDate;

        // Показываем текущее изображение, если оно есть
        const imageContainer = document.getElementById("current-image-container");
        const imagePreview = document.getElementById("current-image-preview");
        if (postData.image) {
            imageContainer.style.display = "block";
            imagePreview.src = postData.image.startsWith('http') ? postData.image : '/' + postData.image;
        } else {
            imageContainer.style.display = "none";
        }

        document.getElementById("post-modal-title").textContent = "Редактировать новость";
        document.getElementById("submit-post-btn").textContent = "Сохранить изменения";
    };

    // Функция закрытия модального окна
    window.closePostModal = function () {
        postModal.style.display = "none";
        postForm.reset();
    };

    // Обработка отправки формы
    postForm.onsubmit = async function (e) {
        e.preventDefault();
        
        // Проверяем заполнение обязательных полей
        const title = document.getElementById("post-title").value.trim();
        const description = document.getElementById("post-description").value.trim();
        const author = document.getElementById("post-author").value.trim();
        const date = document.getElementById("post-date").value.trim();

        if (!title || !description || !author || !date) {
            alert("Пожалуйста, заполните все обязательные поля");
            return;
        }

        const formData = new FormData(this);
        const method = formData.get('_method');
        
        // Для PUT-запросов добавляем специальное поле
        if (method === 'PUT') {
            formData.append('_method', 'PUT');
        }
        
        try {
            const response = await fetch(this.action, {
                method: 'POST', // Всегда используем POST для отправки файлов
                body: formData
            });

            if (!response.ok) {
                if (response.status === 419) {
                    alert('Сессия истекла. Пожалуйста, обновите страницу и попробуйте снова.');
                    window.location.reload();
                    return;
                }
                throw new Error('Ошибка сервера: ' + response.status);
            }

            const result = await response.json();
            console.log('Ответ сервера:', result);

            if (result.success) {
                alert(result.message);
                window.location.reload();
            } else {
                throw new Error(result.message || "Ошибка при сохранении новости");
            }
        } catch (error) {
            console.error("Ошибка:", error);
            if (error.message.includes('not valid JSON')) {
                alert('Ошибка сервера. Пожалуйста, обновите страницу и попробуйте снова.');
            } else {
                alert(error.message);
            }
        }
    };

    // Закрытие модального окна при клике вне его
    window.onclick = function (event) {
        if (event.target === postModal) {
            closePostModal();
        }
    };
});
</script>

</body>
</html>