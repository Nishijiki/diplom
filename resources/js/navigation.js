document.addEventListener('DOMContentLoaded', function() {
    // Получаем текущий путь
    const currentPath = window.location.pathname;
    
    // Находим все ссылки в навигации
    const navLinks = document.querySelectorAll('nav ul li a');
    
    // Проходим по всем ссылкам
    navLinks.forEach(link => {
        // Получаем путь из href ссылки
        const linkPath = new URL(link.href).pathname;
        
        // Проверяем соответствие текущего пути и пути ссылки
        if (currentPath === linkPath) {
            link.classList.add('active');
        } else if (currentPath.includes(linkPath) && linkPath !== '/') {
            // Для вложенных путей (например, /admin/users находится внутри /admin)
            // Не добавляем класс active для корневого пути '/'
            link.classList.add('active');
        }
    });
});