<?php
include_once '../vendor/autoload.php' ;
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf();

ob_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">    <!--iconos-->
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
    </style>
</head>
<body>
<br>
<div class="container">
    <div class="row" style="border:solid black 0.5px;">
        <div class="col-xs-6">
            <h3> <?php echo $guiaAWB;?></h3>
        </div>
        <div class="col-xs-6">
            <h3> <?php echo $guiaAWB;?></h3>
        </div>
    </div>
    <div class="row" style="border:solid black 0.5px;">
        <div class="col-xs-4" style="border-right:solid black 0.5px;">
            <h6>Shipper´s Name and Address</h6>
            <?php
            $queryEnvia = "SELECT * FROM personas WHERE id_persona =$remitente";
            $resultadoEnv = mysqli_query($conexion, $queryEnvia);
            while ($rowEnv = $resultadoEnv->fetch_assoc()) {?>
                
                <p class="nombre"><?php echo $rowEnv['nombre'] . ' ' . $rowEnv['apellidos']; ?></p>
                <p class="nombre"><?php echo $rowEnv['direccion'] . ' ' . $rowEnv['pais'] . ' ' . $rowEnv['departamento']; ?></p>
                <p class="nombre">Tel.:<?php echo $rowEnv['tel']; ?></p>
                <?php
            }
            ?>
        </div>
        <div class="col-xs-2">
            <h6>Not Negotiable</h6>
            <h3>Air Waybill</h3>
            <h6>Issued by</h6>
        </div>
        <div class="col-xs-6" style="text-align:center">
            <h4>COPA AIRLINES</h4>
            <H4>Compañia Panameñia de Aviación, S.A</H4>
            <h4>P.O.BOX 1572</h4>
            <h4>PANAMA 1, PANAMA</h4>
            <p>Copies 1, 2 and 3 of this Air Waybill are originals and <br>have the same validity</p>
        </div>
    </div>
    <div class="row" style="border:solid black 0.5px;">
        <div class="col-xs-4">
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
        </div>
        <div class="col-xs-8" style="border-left:solid black 0.5px;">
            <p>It is agreed that the goods described herein are accepted in apparent good order an condition<br> (except as noted) for carriage SUBJECT TO THE CONDITIONS OF
            CONTRACT ON THE REVERSE HEREOF, ALL GOODS MAY BE CARRIED BY ANY OTHER MEANS INCLUDING ROAD OR ANY <br>OTHER CARRIER UNLESS
            SPECIFIC CONTRARY INSTRUCTIONS ARE GIVEN HEREON BY THE SHIPPER, AND SHIPPER AGREES TAHT THE SHIPMENT MAY BE CARRIED VIA
            INTERMEDIATE STOPPING PLACES WICH THE CARRIER DEEMS APPROPRIATE. THE SHIPPER´S ATTENTION<br> IS DRAWN TO THE NOTICE CONCERNING
            CARRIER´S LIMITATION OF LIABILITY. Shipper may<br> increase such limitation of liability by declaring a higher value for carriage and paying a supplemental <br>charge if
            required. </p>
        </div>
    </div>
    <div class="row" style="border:solid black 0.5px;">
        <div class="col-xs-4" style="border-right:solid black 0.5px;">
            <div style="border-bottom:solid black 0.5px">
                <h6>Issuing Carrier´s Agent Name and City</h6>
                <p>FERIBAN - MONTEVIDEO URUGUAY </p>
            </div>
            <div style="border-bottom:solid black 0.5px">
                <h6>Agent´s IATA Code</h6>
            </div>
            <div style="border-bottom:solid black 0.5px">
                <h6>Account No.</h6>
            </div>
            <h6> Airport of Departure (Addr. Of First Carrier) and Requested Routing </h6>
            <p style="text-align:center"><?php echo $pais_origen; ?> </p>
        </div>
        <div class="col-xs-8">
            <h6>Accounting Information</h6>
            <p>FREIGHT PREPAID</p>
        </div>
    </div>
</div>

<!--hasta aca llegue-->


       
      
        
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

<?php
$html = ob_get_clean();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();
$dompdf->stream("reportes.pdf", array("Attachment"=>false));
?>
    

</body>
</html>
