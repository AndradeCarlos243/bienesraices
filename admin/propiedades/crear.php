<?php
    //BD
    require '../../includes/config/database.php';
    $db = conectarDB();

    //consulta de los vendedores
    $vendedores_sql = 'SELECT * FROM vendedores';
    $vendedores_resultado = mysqli_query($db, $vendedores_sql);

    require '../../includes/funciones.php';
    incluirTemplate('header');

    //Arreglo con mensajes de error
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedores_id = '';
    $creado = date('Y/m/d');

    //Se ejecuta después de que se manda la petición POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        $titulo = mysqli_real_escape_string( $db, $_POST['titulo']);
        $precio = mysqli_real_escape_string( $db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string( $db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento']);
        $vendedores_id = mysqli_real_escape_string( $db, $_POST['vendedor']);

        //Asignar files a una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = 'Debes añadir un título';
        }

        if(!$precio){
            $errores[] = 'Debes añadir un precio';
        }

        if(!$descripcion){
            $errores[] = 'Debes añadir una descripción';
        }else{
            if(strlen($descripcion) < 50){
                $errores[] = 'La descripción debe tener al menos 50 carácteres';
            }
        }

        if(!$habitaciones){
            $errores[] = 'Debes indicar un número de habitaciones';
        }

        if(!$wc){
            $errores[] = 'Debes indicar un número de baños';
        }

        if(!$estacionamiento){
            $errores[] = 'Debes indicar un número de lotes de estacionamiento';
        }

        if(!$vendedores_id){
            $errores[] = 'Debes indicar el vendedor de la propiedad';
        }

        if(!$imagen['name'] || $imagen['error']){
            $errores[] = 'La imágen es obligatoria y debe ser menor o igual a 1mb';
        }

        //validar por tamaño
        $medidaImagen = 1000 * 1000;
        if($imagen['size'] > $medidaImagen){
            $errores[] = 'La imágen no debe superar 1mb';
        }

        if(empty($errores)){

            //Subida de archivos
            //Crear carpeta
            $carpetaImagenes = '../../imagenes/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

            // Insertar en la BD
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id ) VALUES ( '$titulo', '$precio', '$nombreImagen',
            '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id')";
            $resultado = mysqli_query($db, $query);
            if($resultado){
                //Redireccionamos al usuario
                header("location: /admin?respuesta=1");
            }else{
                echo "Error al insertar";
            }
        }

        echo '<pre>';
        // var_dump($errores);
        echo '</pre>';
    }
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde-inline-block">Volver</a>
        <div class="alerta error">
            <?php foreach($errores as $error):?>
                <div class="mensaje_error"><?php echo $error; ?></div>
            <?php endforeach ?>
        </div>
        
        <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>" placeholder="Titulo Propiedad">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" value="<?php echo $precio; ?>" placeholder="Precio Propiedad">

                <label for="imagen">Imágen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" value="<?php echo $habitaciones; ?>" placeholder="Habitaciones Propiedad" min="1" max="9">

                <label for="wc">Baños:</label>
                <input type="number" name="wc" id="wc" value="<?php echo $wc; ?>" placeholder="Baños Propiedad" min="1" max="9">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento" value="<?php echo $estacionamiento; ?>" placeholder="Estacionamiento Propiedad" min="1" max="9">

            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="vendedor">Vendedor:</label>
                <select name="vendedor" id="vendedor">
                    <option value="" selected disabled>VENDEDOR</option>
                    <?php while ($vendedor = mysqli_fetch_assoc($vendedores_resultado)): ?>
                        <option value="<?php echo $vendedor['id']; ?>" <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?>><?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido']; ?></option>
                    <?php endwhile; ?>
                </select>

                <input type="submit" value="Crear Propiedad" class="boton boton-verde-inline-block">
            </fieldset>
        </form>

    </main>
    
<?php
    incluirTemplate('footer');
?>