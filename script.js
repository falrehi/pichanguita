document.addEventListener("DOMContentLoaded", function () {
    var loginForm = document.getElementById("loginForm");
    var errorDisplay = document.getElementById("errorDisplay");
    var usernameInput = document.getElementById("username");
    var passwordInput = document.getElementById("password");

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        var username = usernameInput.value;
        var password = passwordInput.value;

        errorDisplay.textContent = "";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "login.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText.trim() === "success") {
                    window.location.href = "lozas.html";
                } else {
                    errorDisplay.textContent = "Nombre de usuario o contraseña incorrectos";
                }
            }
        };

        xhr.send("username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password));
    });

    // Limpiar el mensaje de error al enfocar en los campos de entrada
    usernameInput.addEventListener("focus", function () {
        errorDisplay.textContent = "";
    });

    passwordInput.addEventListener("focus", function () {
        errorDisplay.textContent = "";
    });
});
