<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администрация Сергиево-Посадского городского округа</title>
    <!-- Импорт шрифта Overpass -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
    background: linear-gradient(90deg, #208F9E, #203F9E); /* Линейный градиент */
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
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
    width: 755px;
    margin-right: 20px;
}

/* Поле ввода */
.search-input {
    flex-grow: 1;
    padding: 10px 40px 10px 15px;
    border: none;
    outline: none;
    font-size: 16px;
    width: 100%;
    background: white;
}

/* Кнопка "Удалить" */
.clear-button {
    position: absolute;
    top: 50%;
    right: 40px;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #666;
    cursor: pointer;
    font-size: 16px;
    padding: 5px 10px;
    display: none;
    z-index: 10;
}

.clear-button:hover {
    color: #ff4444;
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

.news-section {
    margin-top: 20px;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}
.date {
    font-size: 0.9em;
    color: #666;
    margin-bottom: 5px;
}

h3 {
    margin: 0;
    font-size: 1.2em;
    color: #333;
}

/* Стили для таблицы */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table th,
table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
}

table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}
.news-item {
    background-color: #f9f9f9;
    padding: 10px;
    border: 1px solid #ddd;
    max-height: 500px; /* Максимальная высота блока новости */
}

.news-item img {
    width: 100%; /* Занимает всю ширину контейнера */
    height: 200px; /* Фиксированная высота */
    object-fit: cover; /* Обрезка изображения */
    border-radius: 5px; /* Скругление углов */
}

.news-item p.date {
    font-size: 0.9em;
    color: #666;
    margin-bottom: 5px;
}

.news-item h3 {
    margin: 0;
    font-size: 1.2em;
    color: #333;
}

.events-sidebar {
    background-color: #3E97B2;
    padding: 10px;
    margin-top: 20px;
}

.events-sidebar ul {
    list-style: none;
    padding: 0;
}

.events-sidebar li {
    margin-bottom: 10px;
}

.popular-section {
    background-color: #f9f9f9;
    padding: 20px;
    margin-top: 20px;
}

.popular-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.popular-item {
    background-color: #209E83;
    padding: 10px;
    border: 1px solid #ccc;
}

.popular-item h4 {
    margin: 0;
}

.popular-item .date {
    margin-top: 5px;
    font-size: 0.8em;
}

.load-more {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #ddd;
    border: none;
    border-radius: 5px;
    cursor: pointer;
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
   
    .news-grid {
        grid-template-columns: repeat(auto-fit, minmax(100%, 1fr));
    }

    .popular-grid {
        grid-template-columns: repeat(auto-fit, minmax(100%, 1fr));
    }
}


@media (max-width: 480px) {
    
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
@media (max-width: 768px) {

    header {
        flex-direction: column;
        align-items: stretch;
    }

    header form {
        margin-top: 10px;
    }


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


    nav ul {
        flex-direction: column;
    }

    nav ul li {
        margin-right: 0;
        margin-bottom: 10px;
    }


    #search {
        width: 100%; 
    }


    main {
        padding: 15px;
    }

    .contact-form input,
    .contact-form textarea {
        padding: 8px;
    }
}

@media (max-width: 480px) {

    header h1 {
        font-size: 16px;
    }


    nav ul li a {
        font-size: 14px;
    }


    #search {
        padding: 8px;
    }

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


@media (max-width: 768px) {
    .logo img {
        max-height: 40px; 
    }
}

@media (max-width: 480px) {
    .logo img {
        max-height: 30px; 
    }
}

/* Стили для результатов поиска */
.no-results {
    text-align: center;
    padding: 20px;
    color: #666;
    font-style: italic;
    background-color: #f9f9f9;
    border-radius: 5px;
    margin: 20px 0;
}

.news-item {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    cursor: pointer;
}

.news-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Анимация для новых элементов */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.news-item {
    animation: fadeIn 0.3s ease forwards;
}

/* Стили для выделения совпадений в результатах поиска */
.highlight {
    background-color: #fff3cd;
    padding: 0 2px;
    border-radius: 2px;
}

   </style>
</head>
<body>
    <script>
        
        document.addEventListener("DOMContentLoaded", function () {
    const newsGrid = document.getElementById("news-grid");
    const searchInput = document.querySelector('.search-input');
    const clearButton = document.querySelector('.clear-button');
    let isLoading = false;
    let page = 1;
    let debounceTimer;
    let isSearchMode = false;

    // Функция для загрузки новостей
    async function loadNews(resetPage = false) {
        if (isLoading || isSearchMode) return;
        if (resetPage) page = 1;
        
        isLoading = true;

        try {
            const response = await fetch(`/news/load-more?page=${page}`);
            const news = await response.json();

            if (news.length === 0) {
                if (page === 1) {
                    newsGrid.innerHTML = '<div class="no-results">Новости не найдены</div>';
                }
                return;
            }

            if (resetPage) {
                newsGrid.innerHTML = '';
            }

            news.forEach(item => {
                const newsItem = document.createElement("div");
                newsItem.classList.add("news-item");
                
                const date = new Date(item.date).toLocaleDateString('ru-RU', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                newsItem.innerHTML = `
                    <img src="${item.image ? (item.image.startsWith('img/') ? '/' + item.image : '/storage/' + item.image) : '/img/placeholder.jpg'}" alt="${item.title}">
                    <p class="date">${date}</p>
                    <a href="/news/${item.id}" class="news-title"><h3>${item.title}</h3></a>
                `;

                newsGrid.appendChild(newsItem);
            });

            page++;
        } catch (error) {
            console.error("Ошибка при загрузке новостей:", error);
            newsGrid.innerHTML = '<div class="no-results">Ошибка при загрузке новостей</div>';
        } finally {
            isLoading = false;
        }
    }

    // Обновляем функцию поиска новостей
    async function searchNews(query) {
        if (!query.trim()) {
            isSearchMode = false;
            loadNews(true);
            return;
        }

        isSearchMode = true;
        isLoading = true;

        try {
            const response = await fetch(`/api/news/search?query=${encodeURIComponent(query)}`);
            const data = await response.json();

            newsGrid.innerHTML = '';

            if (data.exactMatch || (data.partialMatches && data.partialMatches.length > 0)) {
                const allNews = [];
                
                // Сначала добавляем точные совпадения
                if (data.exactMatch) {
                    allNews.push(data.exactMatch);
                }

                // Затем добавляем частичные совпадения, сортируя их по релевантности
                if (data.partialMatches) {
                    const partialMatches = data.partialMatches
                        .filter(item => !data.exactMatch || item.id !== data.exactMatch.id)
                        .sort((a, b) => {
                            // Приоритет по точности совпадения в заголовке
                            const aTitle = a.title.toLowerCase();
                            const bTitle = b.title.toLowerCase();
                            const searchQuery = query.toLowerCase();
                            
                            const aExactIndex = aTitle.indexOf(searchQuery);
                            const bExactIndex = bTitle.indexOf(searchQuery);
                            
                            // Если одно из совпадений точное, оно получает приоритет
                            if (aExactIndex !== -1 && bExactIndex === -1) return -1;
                            if (bExactIndex !== -1 && aExactIndex === -1) return 1;
                            
                            // Если оба совпадения частичные, сравниваем по дате
                            return new Date(b.date) - new Date(a.date);
                        });
                    
                    allNews.push(...partialMatches);
                }

                allNews.forEach(item => {
                    const newsItem = document.createElement('div');
                    newsItem.className = 'news-item';
                    
                    const date = new Date(item.date).toLocaleDateString('ru-RU', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    // Подсвечиваем совпадения в заголовке
                    const title = item.title.replace(
                        new RegExp(query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), 'gi'),
                        match => `<span class="highlight">${match}</span>`
                    );

                    newsItem.innerHTML = `
                        <img src="${item.image || '/img/placeholder.jpg'}" alt="${item.title}">
                        <p class="date">${date}</p>
                        <a href="/news/${item.id}" class="news-title"><h3>${title}</h3></a>
                    `;

                    newsGrid.appendChild(newsItem);
                });
            } else {
                newsGrid.innerHTML = '<div class="no-results">Новости не найдены</div>';
            }
        } catch (error) {
            console.error('Ошибка при поиске:', error);
            newsGrid.innerHTML = '<div class="no-results">Ошибка при поиске новостей</div>';
        } finally {
            isLoading = false;
        }
    }

    // Обработчик прокрутки для бесконечной загрузки
    function checkScroll() {
        if (isSearchMode) return;
        
        const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
        if (scrollTop + clientHeight >= scrollHeight - 10) {
            loadNews();
        }
    }

    // Обновляем обработчик ввода
    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        const query = this.value.trim();

        // Показываем/скрываем крестик
        clearButton.style.display = query.length > 0 ? 'block' : 'none';

        if (query.length > 0) {
            debounceTimer = setTimeout(() => {
                searchNews(query);
            }, 300);
        } else {
            isSearchMode = false;
            loadNews(true);
        }
    });

    // Обработчик клика по кнопке очистки
    clearButton.addEventListener('click', function() {
        searchInput.value = '';
        clearButton.style.display = 'none';
        isSearchMode = false;
        loadNews(true);
    });

    // Обработчик отправки формы
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        searchNews(searchInput.value.trim());
    });

    // Добавляем слушатель прокрутки
    window.addEventListener("scroll", checkScroll);

    // Инициализация первой загрузки
    loadNews(true);
});
    </script>

    <!-- Шапка сайта -->
    <header>
    <div class="logo">
    <img src="{{asset('img/logo.png')}}" alt="Логотип">

    </div>

    <form id="search-form">
    <div class="search-container">
        <input type="text" placeholder="Что то..." id="search-input" class="search-input">
        <button type="button" id="clear-button" class="clear-button">X</button>
        <button type="submit" class="search-button">
            <img src="{{ asset('img/search.png') }}" width="10px" height="10px">
        </button>
    </div>
</form>
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
    <section class="news-section" id="news-container">
        <h2>Главные новости</h2>
        <div class="news-grid" id="news-grid">
    

        </section>

        <aside class="events-sidebar">
            <h3>Последние события</h3>
            <ul>
                <li><span>20:39</span> Замглавы аппарата Белого дома Стивен Миллер считается основным кандидатом на смену Уолтцу, сообщил Axios.</li>
                <li><span>20:39</span> Замглавы аппарата Белого дома Стивен Миллер считается основным кандидатом на смену Уолтцу, сообщил Axios.</li>
                <li><span>20:39</span> Замглавы аппарата Белого дома Стивен Миллер считается основным кандидатом на смену Уолтцу, сообщил Axios.</li>
                <li><span>20:39</span> Замглавы аппарата Белого дома Стивен Миллер считается основным кандидатом на смену Уолтцу, сообщил Axios.</li>
                <li><span>20:39</span> Замглавы аппарата Белого дома Стивен Миллер считается основным кандидатом на смену Уолтцу, сообщил Axios.</li>
                <li><span>20:39</span> Замглавы аппарата Белого дома Стивен Миллер считается основным кандидатом на смену Уолтцу, сообщил Axios.</li>
            </ul>
        </aside>

        <section class="popular-section">
            <h3>Популярное</h3>
            <div class="popular-grid">
                <div class="popular-item">
                    <h4>В ООН побеспокоились о пытках российских военнопленных на украине</h4>
                    <p class="date">02.12.2025</p>
                </div>
                <div class="popular-item">
                    <h4>В ООН побеспокоились о пытках российских военнопленных на украине</h4>
                    <p class="date">02.12.2025</p>
                </div>
                <div class="popular-item">
                    <h4>В ООН побеспокоились о пытках российских военнопленных на украине</h4>
                    <p class="date">02.12.2025</p>
                </div>
                <div class="popular-item">
                    <h4>В ООН побеспокоились о пытках российских военнопленных на украине</h4>
                    <p class="date">02.12.2025</p>
                </div>
            </div>
        </section>

        <button class="load-more" id="load-more">Загрузить ещё публикации</button>
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

</body>
</html>