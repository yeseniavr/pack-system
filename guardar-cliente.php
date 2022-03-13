<?php
include("session.php");
include("conexion.php");

if (isset($_POST['guardar_cliente'])){

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $tel = $_POST['tel'];
    $pais = $_POST['pais'];
    $departamento = $_POST['departamento'];
    $cod_postal = $_POST['cod_postal'];
    $correo = $_POST['correo'];

    $consultaPersona="SELECT * FROM personas WHERE dni='$dni' ";
    $consulta=mysqli_query($conexion,$consultaPersona);
    if (mysqli_num_rows($consulta)==0)// si no se encuentra registrada la persona, lo registra
    {

        $query = "INSERT INTO personas(dni, nombre, apellidos, direccion,tel,pais,departamento,cod_postal,correo) VALUES ('$dni', '$nombre','$apellidos','$direccion','$tel','$pais','$departamento','$cod_postal', '$correo')";
        
        //almacenar valores
        $resultado = mysqli_query($conexion, $query);  

        if(!$resultado){
            die("Query failed");
        }else{
            $_SESSION['message']= 'Cliente guardado';
            $_SESSION['message-type'] = 'success';
            header('Location: gestion.php');
        } 

    }
    else{ // si la persona se encuentra registrada con usuario, envía mensaje de que ya existe
        $_SESSION['message'] = "El cliente ya se encuentra registrado";
        $_SESSION['message-type'] = 'warning';

        header("Location: gestion.php");
    }
}
?>