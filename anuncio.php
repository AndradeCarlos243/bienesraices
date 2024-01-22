<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="./build/img/destacada.webp" type="image/webp">
            <source srcset="./build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="./build/img/destacada.jpg" alt="Imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">
                $3,000,000
            </p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="./build/img/icono_wc.svg" alt="icono baño">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="./build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="./build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p>4</p>
                </li>
            </ul>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Exercitationem facilis at odio repellat possimus dignissimos 
                aut illo enim obcaecati incidunt harum totam eveniet, mollitia 
                perferendis, est atque aliquid veritatis sapiente?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Exercitationem facilis at odio repellat possimus dignissimos 
                aut illo enim obcaecati incidunt harum totam eveniet, mollitia 
                perferendis, est atque aliquid veritatis sapiente?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Exercitationem facilis at odio repellat possimus dignissimos 
                aut illo enim obcaecati incidunt harum totam eveniet, mollitia 
                perferendis, est atque aliquid veritatis sapiente?
            </p>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Exercitationem facilis at odio repellat possimus dignissimos 
                aut illo enim obcaecati incidunt harum totam eveniet, mollitia 
                perferendis, est atque aliquid veritatis sapiente?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Exercitationem facilis at odio repellat possimus dignissimos 
                aut illo enim obcaecati incidunt harum totam eveniet, mollitia 
                perferendis, est atque aliquid veritatis sapiente?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Exercitationem facilis at odio repellat possimus dignissimos 
                aut illo enim obcaecati incidunt harum totam eveniet, mollitia 
                perferendis, est atque aliquid veritatis sapiente?
            </p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>