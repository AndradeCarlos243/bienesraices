<?php
    //BD
    require '../../includes/config/database.php';
    $db = conectarDB();

    require '../../includes/funciones.php';
    incluirTemplate('header');

    //Arreglo con mensajes de error
    $errores = [];

    //Se ejecuta después de que se manda la petición POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedores_id = $_POST['vendedor'];

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

        if(empty($errores)){
            // Insertar en la BD
            $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id ) VALUES ( '$titulo',$precio,'$descripcion','$habitaciones','$wc','$estacionamiento','$vendedores_id')";
            $resultado = mysqli_query($db, $query);
            if($resultado){
                echo "Insertado correctamente";
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
        
        <form action="/admin/propiedades/crear.php" class="formulario" method="POST">
            <fieldset>
                <legend>Información general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo" value="" placeholder="Titulo Propiedad">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imágen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Habitaciones Propiedad" min="1" max="9">

                <label for="wc">Baños:</label>
                <input type="number" name="wc" id="wc" placeholder="Baños Propiedad" min="1" max="9">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Estacionamiento Propiedad" min="1" max="9">

            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="vendedor">Vendedor:</label>
                <select name="vendedor" id="vendedor">
                    <option value="" selected disabled>VENDEDOR</option>
                    <option value="1">Carlos</option>
                    <option value="2">Ana</option>
                </select>

                <input type="submit" value="Crear Propiedad" class="boton boton-verde-inline-block">
            </fieldset>
        </form>

    </main>
    
<?php
    incluirTemplate('footer');
?>