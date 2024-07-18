jQuery(document).ready(function($) {
    // Obtiene la referencia al carrusel y al contenedor de miniaturas
    var carrusel = $('#mi-carrusel');
    var miniaturasContenedor = $('#miniaturas-contenedor');

    // Añade un evento al cambio de diapositiva del carrusel
    carrusel.on('slide.bs.carousel', function (event) {
        var indiceDiapositiva = event.to;
        // Obtiene todas las miniaturas
        var miniaturas = miniaturasContenedor.find('.miniatura');
        
        // Quita la clase 'active' de todas las miniaturas
        miniaturas.removeClass('active');

        // Agrega la clase 'active' a la miniatura correspondiente
        miniaturas.eq(indiceDiapositiva).addClass('active');
    });
});




document.addEventListener("DOMContentLoaded", function () {
    const col2Contenido = document.getElementById("col-2-contenido");
    const dropdownItems = document.querySelectorAll(".dropdown-item");
    const mobile = window.innerWidth < 768;

    if (mobile) {
        col2Contenido.style.display = "none";
    } else {
        dropdownItems.forEach((item) => {
            item.addEventListener("mouseenter", function () {
                const contenido = this.getAttribute("data-contenido");
                col2Contenido.querySelectorAll("section").forEach((section) => {
                    section.style.display = "none"; // Oculta todas las secciones
                });
                col2Contenido.querySelector(`.${contenido}`).style.display = "block"; // Muestra la sección correspondiente
            });
        });
    }
});






let x = 0;
let p = -10;
let i = 1;
let doom = document.getElementsByClassName('item');
let confr = (doom.length - 3) * (-350);
let confl = 0;

// Botón izquierdo
document.getElementById("l").addEventListener("click", function () {
    x += 350;
    if (x > confl) {
        x = confr - 350;
    } else {
        document.getElementById("move").style.marginLeft = x + "px";
    }
});

// Botón derecho
document.getElementById("r").addEventListener("click", function () {
    x += -350;
    p += -10;
    if (x < confr) {
        x = 350;
    } else {
        document.getElementById("move").style.marginLeft = x + "px";
    }
});




  