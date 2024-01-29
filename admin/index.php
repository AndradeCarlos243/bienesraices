<?php

    //Importar BD
    require '../includes/config/database.php';
    $db = conectarDB();

    //Escribir query
    $query = "SELECT * FROM propiedades";

    //Consultar la BD
    $resultado_propiedades = mysqli_query($db, $query);

    //Muestra mensaje condicional
    $respuesta = $_GET['respuesta'] ?? null;

    //Carga un template
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php
            if( intval($respuesta) === 1):
        ?>
            <div class="alerta exito">
                <div class="mensaje_exito">
                    <?php echo 'Registrado correctamente'; ?>
                </div>
            </div>
        <?php
            endif;
        ?>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde-inline-block">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TÍTULO</th>
                    <th>IMÁGEN</th>
                    <th>PRECIO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while( $propiedad = mysqli_fetch_array($resultado_propiedades)):
                ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen-tabla" class="imagen-tabla"></td>
                    <td>$<?php echo $propiedad['precio']; ?></td>
                    <td>
                        <a href="#" class="boton-ladrillo-block">Eliminar</a>
                        <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>

    </main>
    
<?php
    //Cerrar la conexión
    mysqli_close($db);

    incluirTemplate('footer');
?>