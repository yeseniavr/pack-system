<?php
include("session.php");
include("conexion.php");

if(isset($_POST['manifiesto'])){//Validacion de envio de formulario
    if(!empty($_POST['guia'])){ // si al menos hay una guia seleccionada, CREA EL MANIFIESTO
        $vuelo =$_POST['vuelo'];
        $expedidor = $_POST['expedidor'];
        $consignatario = $_POST['consignatario'];
        $fecha='2022-02-14';
        $cod_origen=$_POST['cod_origen'];
        $cod_destino=$_POST['cod_destino'];
        $query = "INSERT INTO manifiesto(fecha,vuelo,cod_origen,cod_destino, expedidor, consignatario ) VALUES ('$fecha','$vuelo','$cod_origen','$cod_destino', '$expedidor', '$consignatario')";
        $resultado = mysqli_query($conexion, $query);  

        if(!$resultado){
            die("Query failed");
        }else{
            $manifiesto="SELECT  max(id_manifiesto) as id_manifiesto FROM manifiesto WHERE cod_origen='$cod_origen' and cod_destino='$cod_destino' ";
            
            $rowManifiesto = mysqli_query($conexion, $manifiesto);
            if (mysqli_num_rows($rowManifiesto) == 1) {
                $rowManif = mysqli_fetch_array($rowManifiesto);
                $Manif=$rowManif['id_manifiesto'];
                
                foreach($_POST['guia'] as $id_guia){ // Ciclo para mostrar las casillas checked checkbox. IMPORTANTE: asigna a la variable id_guia los distintos valores de las guia a incluir en el manifiesto
                    //echo $id_guia."</br>";// Imprime resultados
                    $query = "INSERT INTO manif_embarq(manifiesto_id,guia_id ) VALUES ('$Manif','$id_guia')";
                    $resultado = mysqli_query($conexion, $query);  
            
                    if(!$resultado){
                        die("Query failed");
                    }
                    else{

                        $query = "UPDATE guia_embarque set estado_id = '2' WHERE id_guia = $id_guia";
                        mysqli_query($conexion, $query);
                        if (!$resultado) {
                            die("Query failed");
                        } 
                    }
            
                }
            }
            $_SESSION['message'] = "manifiesto guardado";
            $_SESSION['message-type'] = 'success';
            header('Location: nuevo_manifiesto.php');
        }
    }
   // header("Location: manifiesto.php");
}
?>
