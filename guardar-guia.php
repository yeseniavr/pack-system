<?php
include "session.php";
include "conexion.php";

/*if (isset($_POST['generar-guia'])) {*/
    $peso_real = $_POST['peso_real'];
    $cod_origen = $_POST['cod_origen'];
    $cod_destino = $_POST['cod_destino'];
    $fecha = $_POST['fecha'];
    $valor = $_POST['valor'];
    $tipo_bulto = $_POST['tipo_bulto'];
    $num_bulto = $_POST['num_bulto'];
    $empaquetado = $_POST['empaquetado'];
    $peso_real = $_POST['peso_real'];
    $peso_volumetrico = $_POST['peso-volumetrico'];
    $servicio = $_POST['servicio']; 
    $icontem = $_POST['incotem'];
    $producto = $_POST['producto']; 
    $destinatario = $_POST['destinatario'];
    $remitente = $_POST['remitente'];
    $descripcion = $_POST['descripcion'];

    //insertar valores en tabla
    $query = "INSERT INTO guia_embarque(cod_origen, cod_destino, fecha_emb, valor_mercancia, peso_real, tipo_bulto, cantidad_bulto,descripcion, empaquetado, peso_volumetrico, incotem, personasEnv_id, personasDest_id) VALUES ('$cod_origen', '$cod_destino', '$fecha', '$valor', '$peso_real', '$tipo_bulto','$num_bulto', '$descripcion', '$empaquetado', '$peso_volumetrico', '$icontem', '$remitente', '$destinatario')";
    //almacenar valores
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        die("Query failed");
    } else {
        $_SESSION['message'] = 'Guia guardada';
        $_SESSION['message-type'] = 'success';
        echo 'guia aguardada';
        header('Location: guia.php');
    }
/*}*/
