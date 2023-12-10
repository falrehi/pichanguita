document.addEventListener("DOMContentLoaded", function () {
    var splashImage = document.getElementById("splashImage");
    var images = [
        "imagenes/deportivo2.png",
        "imagenes/deportivo3.png",
        "imagenes/deportivo4.png",
        "imagenes/deportivo5.png"
    ];
    var currentIndex = 0;

    function changeImage() {
        splashImage.style.opacity = 0; // Establecer opacidad a 0 antes de cambiar la imagen

        setTimeout(function () {
            splashImage.src = images[currentIndex];
            currentIndex = (currentIndex + 1) % images.length;
            splashImage.style.opacity = 1; // Establecer opacidad a 1 después de cambiar la imagen
        }, 1000); // Esperar 1 segundo antes de cambiar la opacidad
    }

    // Cambiar la imagen cada segundo con desvanecimiento
    setInterval(changeImage, 2000); // Usar 2000ms (2 segundos) para que el desvanecimiento y la imagen estén en pantalla al mismo tiempo

    // Redirigir a la página de inicio de sesión después de 5 segundos
    setTimeout(function () {
        window.location.href = "login.html";
    }, 10000);
});
