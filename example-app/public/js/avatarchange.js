document.addEventListener("DOMContentLoaded", function () {
    const avatarInput = document.getElementById("avatar-input");
    const avatarPreview = document.getElementById("avatar-preview");

    // Открытие диалога выбора файла при нажатии на кнопку "Изменить аватар"
    document.querySelector(".change-avatar-button").addEventListener("click", function () {
        avatarInput.click();
    });

    // Обновление превью аватара после выбора файла
    avatarInput.addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                avatarPreview.src = e.target.result;
            };
            reader.readAsDataURL(file);

            // Отправка файла на сервер через AJAX
            const formData = new FormData();
            formData.append("avatar", file);

            fetch("/update-avatar", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        console.log("Аватар успешно обновлен!");
                    } else {
                        alert("Ошибка при загрузке аватара.");
                    }
                })
                .catch((error) => {
                    console.error("Ошибка:", error);
                });
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const editProfileButton = document.getElementById("edit-profile-button");
    const modal = document.getElementById("edit-profile-modal");
    const closeModalButton = document.querySelector(".close-modal");

    // Открытие модального окна
    editProfileButton.addEventListener("click", function () {
        modal.style.display = "flex";
    });

    // Закрытие модального окна
    closeModalButton.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // Закрытие модального окна при клике вне его области
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});

