<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="./build/img/nosotros.webp" type="image/webp">
                    <source srcset="./build/img/nosotros.jpg" type="image/jpeg">
                    <img src="./build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>

                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Dicta, sapiente commodi! Inventore eos voluptatibus laudantium 
                    porro sint consequatur fugiat. Provident reprehenderit 
                    temporibus et impedit, voluptates incidunt sed animi 
                    reiciendis corporis.
                </p>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Dicta, sapiente commodi! Inventore eos voluptatibus laudantium 
                    porro sint consequatur fugiat. Provident reprehenderit 
                    temporibus et impedit, voluptates incidunt sed animi 
                    reiciendis corporis.
                </p>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="./build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quisquam, voluptatum.</p>
            </div>
            <div class="icono">
                <img src="./build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quisquam, voluptatum.</p>
            </div>
            <div class="icono">
                <img src="./build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quisquam, voluptatum.</p>
            </div>
        </div>
    </section>

<?php
    incluirTemplate('footer');
?>