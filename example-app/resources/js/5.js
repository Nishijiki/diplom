document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.menu-button');
    const tables = document.querySelectorAll('.table-content');

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
});

// Функции для кнопок внутри таблиц
function editUser() {
    alert("Функция редактирования пользователя активирована.");
}

function deleteUser() {
    alert("Функция удаления пользователя активирована.");
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

function editPost() {
    alert("Функция редактирования поста активирована.");
}

function deletePost() {
    alert("Функция удаления поста активирована.");
}
