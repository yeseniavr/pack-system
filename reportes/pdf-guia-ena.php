

<?php

include "../conexion.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $guiaAWB=$_GET['guiaAWB'];
    $query = "SELECT * FROM guia_embarque  WHERE id_guia = $id";
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
    $query3 = "SELECT * FROM cod_pais  WHERE id_pais = $cod_origen ";
    $resultado3 = mysqli_query($conexion, $query3);

    if (mysqli_num_rows($resultado3) == 1) {
        $row3 = mysqli_fetch_array($resultado3);
        $pais_origen=$row3['descripcion'];
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
    width:200px;
    height:150px;
    /*background:blue;*/
}
.box03{
    width:270px;
    height:150px;
    margin-left:220px;
    /*background:green;*/
}
.box04{
    width:175px;
    height:150px;
    margin-left:570px;
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
   
}
.box07{
    width:270px;
    height:100px;
    margin-left:300px;

}
.box08{
    width:175px;
    height:100px;
    margin-left:650px;

}
.membretes{
    font-size: 0.6rem;
}
.nombre{
    font-size: 0.8rem;
}
#detalle{
    font-size: 0.5rem;
}

</style>
</head>
<body>


<br>
<div class="box01">
    <div class="box02">
    <h3> <?php echo $guiaAWB;?></h3>
    <h5 class="membretes">Shipper´s Name and Address</h5>

        <?php
            $queryEnvia = "SELECT * FROM personas WHERE id_persona =$remitente";
            $resultadoEnv = mysqli_query($conexion, $queryEnvia);
            while ($rowEnv = $resultadoEnv->fetch_assoc()) {?>
                
                <p class="nombre"><?php echo $rowEnv['nombre'] . ' ' . $rowEnv['apellidos']; ?></p>
                <p class="nombre"><?php echo $rowEnv['direccion'] . ' ' . $rowEnv['pais'] . ' ' . $rowEnv['departamento']; ?></p>
                <p class="nombre">Tel.:<?php echo $rowEnv['tel']; ?></p>
                <?php
            }?>
       
        <h5 class="membretes">Consignee´s Name and Address</h5>
        
        <?php

        $queryDest = "SELECT * FROM personas  WHERE id_persona =$destinatario";
        $resultadoDest = mysqli_query($conexion, $queryDest);
        while ($rowDest = $resultadoDest->fetch_assoc()) {?>
            <p class="nombre"><?php echo $rowDest['nombre'] . ' ' . $rowDest['apellidos']; ?></p>
            <p class="nombre"><?php echo $rowDest['direccion'] . ' ' . $rowDest['pais'] . ' ' . $rowDest['departamento']; ?></p>
            <p class="nombre">Tel.: <?php echo $rowDest['tel']; ?></p>
        <?php
        }?>
        
        <h5 class="membretes">Issuing Carrier´s Agent Name and City</h5>
        <p class="nombre">FERIBAN - MONTEVIDEO URUGUAY </p>
        <h5 class="membretes">Agent´s IATA Code         Account No</h5>
        <h5 class="membretes"> Airport of Departure (Addr. Of First Carrier) and Requested Routing </h5>
        <p class="nombre"><?php echo $pais_origen; ?> </p>

    </div>

    <div class="box03">

        <h3> <?php echo $guiaAWB;?></h3>
        <h5 class="membretes">Not Negotiable</h5>    Pack Express Uruguay S.A.S (COMVD07341)</p>
        <p class="nombre">Aeropuerto de Carrasco, Montevideo (MVD)</p>
        <p class="nombre"> Carlos Quijano 1258 Esq. Soriano, Centro. Montevideo, Uruguay</p>
        <h5 class="membretes"> Copies 1, 2 and 3 of this Air Waybill are originals and have the same validity.</h5>
        <p id="detalle">It is agreed that the goods described herein are accepted in apparent good order an condition (except as noted) for carriage SUBJECT TO THE CONDITIONS OF CONTRACT ON THE REVERSE HEREOF, ALL GOODS MAY BE CARRIED BY ANY OTHER MEANS INCLUDING ROAD OR ANY OTHER CARRIER UNLESS SPECIFIC CONTRARY INSTRUCTIONS ARE GIVEN HEREON BY THE SHIPPER, AND SHIPPER AGREES TAHT THE SHIPMENT MAY BE CARRIED VIA INTERMEDIATE STOPPING PLACES WICH THE CARRIER DEEMS APPROPRIATE. THE SHIPPER´S ATTENTION IS DRAWN TO THE NOTICE CONCERNING CARRIER´S LIMITATION OF LIABILITY. Shipper may increase such limitation of liability by declaring a higher value for carriage and paying a supplemental charge if required.
        <h5 class="membretes">Accounting Information</h5>
        <p class="nombre">FREIGHT PREPAID</p>


    </div>




</div>  
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  

    <div class="box05">

                
                <div class="box06">
                    <!--<p><strong>Fecha:--> <?php /*echo $row['fecha']; */?> <!--</strong></p>-->
                    <p><strong>Fecha embarque: <?php echo $row['fecha_emb']; ?></strong></p>
                    <p><strong>Valor mercancía (USD): <?php echo $row['valor_mercancia']; ?></strong></p>
                </div>
                <div class="box07">
                    <p><strong>Peso (Kg): <?php echo $row['peso_real']; ?></strong></p>
                    <p><strong>Descripción: <?php echo $row['descripcion']; ?></strong></p>
                   <!-- <p><strong>Tipo de bulto:--> <?php /* echo $row['tipo_bulto'];*/ ?></strong></p>
                   <!-- <p><strong>Cond. Entrega: <?php /*echo $row['incotem']; */?></strong></p>
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