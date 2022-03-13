<?php
include "conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM guia_embarque WHERE id_guia = $id";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $id_guia = $row['id_guia'];
        $peso_real = $row['peso_real'];
        $cod_origen = $row['cod_origen'];
        $fecha = $row['fecha_emb'];
        $valor = $row['valor_mercancia'];
        $tipo_bulto = $row['tipo_bulto'];
        $num_bulto = $row['cantidad_bulto'];
        $empaquetado = $row['empaquetado'];
        $peso_volumetrico = $row['peso_volumetrico'];
        $icontem = $row['incotem'];
        $destinatario = $row['personasDest_id'];
        $remitente = $row['personasEnv_id'];
        $descripcion = $row['descripcion'];
    }

}

?>
<!doctype html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Administrativo Pack</title>
    <meta name="keywords" content="">
    <meta name="description" content="Gestión de Cheques">
    <meta name="author" content="Carolina Ayelen Calviño">
    <!--Css-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href='css/style.css'>
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <!--iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
      
   .guia{

      text-align: center;
   }
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

 /* .centrado{
                text-align: center;
                color: #86b7fe;
                background: red;
            }
*/



.box01{
    width: 1020px;
    height:300px;
    border:5px solid red;
    background:red;
    color:black;
    display:flex;
    align-items:flex-end;
}
.box02{
    width:270px;
    height:150px;
    /*background:blue;*/
}
.box03{
    width:270px;
    height:150px;
    margin-left:320px;
    /*background:green;*/
}
.box04{
    width:175px;
    height:150px;
    margin-left:670px;
    /*background:red;*/
    
}

.box05{
    width: 1020px;
    height:150px;
    border:5px solid red;
    background:red;
    color:black;
    display:flex;
    align-items:flex-end;
}
.box06{
    width:270px;
    height:100px;
    /*background:blue;*/
}
.box07{
    width:270px;
    height:100px;
    margin-left:300px;
    /*background:green;*/
}
.box08{
    width:175px;
    height:100px;
    margin-left:650px;
    /*background:red;*/
    
}

</style>
</head>
<body>

           



<br>
<div class="box01">
    <div class="box02">
       <!-- <img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/proyecto-pack-master/img/logo.jpg" style="max-width: 200px;" alt="logo pack">-->
     <img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/pack/proyecto-pack-master/img/logo.jpg" style="max-width: 200px;" alt="logo pack">


        <br>
        <p><strong>Cliente: </strong>Pack Express Uruguay S.A.S (COMVD07341)</p>
        <p><strong>Origen: </strong>Aeropuerto de Carrasco, Montevideo (MVD)</p>
        <p><strong>Dirección: </strong> Carlos Quijano 1258 Esq. Soriano, Centro. Montevideo, Uruguay</p>
        <p><strong>Tel.: </strong>(+598) 2902 7227 / (+598) 93 594 297</p>
        <p><strong>Email: </strong>packexpress2021@gmail.com</p>

    </div>
    <div class="box03">
    <?php
                        $queryPais = "SELECT * FROM cod_pais WHERE id_pais =$cod_origen";
                        $resultadoPais= mysqli_query($conexion, $queryPais);
                        while ($rowPais = $resultadoPais->fetch_assoc()) {?>
                        <div>
                            <?php
                                $barHTML = new Picqer\Barcode\BarcodeGeneratorHTML();
                                $codPais = $rowPais['codigo'];
                                $length = 5;
                                $string = substr(str_repeat(0, $length).$id_guia, - $length);
                                $codigoBarra= $codPais . $string;
                                echo $barHTML->getBarcode($codigoBarra, $barHTML::TYPE_CODE_128);
                                echo $codigoBarra;
                            ?>
                        </div> <?php
                        } ?>
    </div>
    <div class="box04">
        <h5>Remitente</h5>
        <?php
            $queryEnvia = "SELECT * FROM personas WHERE id_persona =$remitente";
            $resultadoEnv = mysqli_query($conexion, $queryEnvia);
            while ($rowEnv = $resultadoEnv->fetch_assoc()) {?>
                <p><strong>Nombre: </strong><?php echo $rowEnv['nombre'] . ' ' . $rowEnv['apellidos']; ?></p>
                <p><strong>Dirección: </strong><?php echo $rowEnv['direccion'] . ' ' . $rowEnv['pais'] . ' ' . $rowEnv['departamento']; ?></p>
                <p><strong>Tel.: </strong><?php echo $rowEnv['tel']; ?></p>
                <?php
            }?>
        
        <h5>Destinatario</h5>

        <?php

        $queryDest = "SELECT * FROM personas  WHERE id_persona =$destinatario";
        $resultadoDest = mysqli_query($conexion, $queryDest);
        while ($rowDest = $resultadoDest->fetch_assoc()) {?>
            <p><strong>Nombre: </strong><?php echo $rowDest['nombre'] . ' ' . $rowDest['apellidos']; ?></p>
            <p><strong>Dirección: </strong><?php echo $rowDest['direccion'] . ' ' . $rowDest['pais'] . ' ' . $rowDest['departamento']; ?></p>
            <p><strong>Tel.: </strong><?php echo $rowDest['tel']; ?></p>
        <?php
        }?>

    </div>   
</div>  
<br>
<br>
<br>
    <h3 class="guia">Informacion de Envio</h3>

    <div class="box05">

                
                <div class="box06">
                    <p><strong>Fecha: <?php echo $row['fecha']; ?></strong></p>
                    <p><strong>Fecha embarque: <?php echo $row['fecha_emb']; ?></strong></p>
                    <p><strong>Valor mercancía (USD): <?php echo $row['valor_mercancia']; ?></strong></p>
                </div>
                <div class="box07">
                    <p><strong>Peso (Kg): <?php echo $row['peso_real']; ?></strong></p>
                    <p><strong>Descripción: <?php echo $row['descripcion']; ?></strong></p>
                    <p><strong>Tipo de bulto: <?php echo $row['tipo_bulto']; ?></strong></p>
                    <p><strong>Cond. Entrega: <?php echo $row['incotem']; ?></strong></p>
                </div>
                <div class="box08">
                    <p><strong>Producto: IES</strong></p>
                    <p><strong>Bultos: <?php echo $row['cantidad_bulto']; ?></strong></p>
                    <?php
                    if ($peso_real > $peso_volumetrico) {?>
                        <p><strong>Peso a cobrar: <?php echo $peso_real; ?></strong></p>
                    <?php
                    } else {?>
                    <p><strong>Peso a cobrar: <?php echo $peso_volumetrico; ?> </strong></p>
                    <?php }?>
                    <p><strong>Status: </strong></p>
                </div>
            </div>  

         
                <!----------fin guia de embarque----------->



    

</body>
</html>
