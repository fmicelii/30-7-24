<?php
	$nombre= $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$direccion = $_POST["direccion"];
    $contrasena = $_POST["contrasena"];
    $telefono = $_POST["telefono"];

    $servername = "127.0.0.1";
    $database = "pagina";
    $username = "alumno";
    $password = "alumnoipm";
    
    $conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        //insertamos el resultado del formulario
        $query = "insert into usuario values(null,'$email','$nombre', '$apellido','$direccion','$contrasena','$telefono');";
        $resultado=mysqli_query($conexion, $query);

        echo "Datos que hay en la base:\n";

        $resultados = mysqli_query($conexion,"select * from usuario;");

        

        while($fila=mysqli_fetch_assoc($resultados)){ // recorremos cada fila obtenida y mostramos el nombre y el apellido
        ?>
            <p><?php echo $fila['nombre']. " - " .$fila['apellido']. " - ".$fila['email']. " - ".$fila['direccion']. " - ".$fila['telefono']?></p>
            <?php
        }

        //mostrarDatosTabla($conexion);

    }

    function mostrarDatosTabla($conexion){  ?>
        <table>
            <!-- encabezados -->
            <th>Nombre</th>
            <th>Apellido</th>
    <?php
        $resultados = mysqli_query($conexion,"select * from usuario;");

        while($fila=mysqli_fetch_assoc($resultados)){ // recorremos cada fila obtenida y mostramos nombre y apellido
            ?>
        <tr>
            <td> <?php echo $fila['nombre']?></td>
            <td> <?php echo $fila['apellido']?></td>
        </tr>

        <?php
        } 
        ?>
        </table>
    <?php
    }
    mysqli_close($conexion);
?>