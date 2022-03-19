<?php
include_once '../vendor/autoload.php' ;
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf();

ob_start();
include "../conexion.php";


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
  p{
      font-size:10px;
  }
</style>
</head>
<body>
<br>
<div class="container">
    <div class="row" style="border:solid 1px black;">
        <div class="col-xs-3">
            <img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/pack/proyecto-pack-master/img/logo.png" style="max-width: 150px; margin-top:15px" alt="logo pack">
            <br>
            <p><strong>Cliente: </strong>Pack Express Uruguay S.A.S (COMVD07341)</p>
            <p><strong>Origen: </strong>Aeropuerto de Carrasco, Montevideo (MVD)</p>
            <p><strong>Dirección: </strong> Carlos Quijano 1258 Esq. Soriano, Centro. Montevideo, Uruguay</p>
            <p><strong>Tel.: </strong>(+598) 2902 7227 / (+598) 93 594 297</p>
            <p><strong>Email: </strong>packexpress2021@gmail.com</p>
        </div>
        <div class="col-xs-4" style="border:solid 1px black; text-align:center">
            <?php
                $queryPais = "SELECT * FROM cod_pais WHERE id_pais =$cod_origen";
                $resultadoPais= mysqli_query($conexion, $queryPais);
                while ($rowPais = $resultadoPais->fetch_assoc()) {?>
                    <div>
                        <h5>Destino: <?php $codPais = $rowPais['codigo'];
                        echo $codPais; ?>
                        </h5> 
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
                } 
            ?>
        </div>
        <div class="col-xs-5">
            <h5><u>Remitente</u></h5>
            <?php
                $queryEnvia = "SELECT * FROM personas WHERE id_persona =$remitente";
                $resultadoEnv = mysqli_query($conexion, $queryEnvia);
                while ($rowEnv = $resultadoEnv->fetch_assoc()) {?>
                    <p><strong>Nombre: </strong><?php echo $rowEnv['nombre'] . ' ' . $rowEnv['apellidos']; ?></p>
                    <p><strong>Dirección: </strong><?php echo $rowEnv['direccion'] . '<br>' . $rowEnv['pais'] . ' ' . $rowEnv['departamento']; ?></p>
                    <p><strong>Tel.: </strong><?php echo $rowEnv['tel']; ?></p>
                    <?php
                }?>
            
            <h5><u>Destinatario</u></h5>

            <?php

            $queryDest = "SELECT * FROM personas  WHERE id_persona =$destinatario";
            $resultadoDest = mysqli_query($conexion, $queryDest);
            while ($rowDest = $resultadoDest->fetch_assoc()) {?>
                <p><strong>Nombre: </strong><?php echo $rowDest['nombre'] . ' ' . $rowDest['apellidos']; ?></p>
                <p><strong>Dirección: </strong><?php echo $rowDest['direccion'] . '<br>' . $rowDest['pais'] . ' ' . $rowDest['departamento']; ?></p>
                <p><strong>Tel.: </strong><?php echo $rowDest['tel']; ?></p>
            <?php
            }?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="border-left:solid 1px black; border-right:solid 1px black;">
        <div class="col-xs-12" style="text-align:center">
            <h5><u>Información de Envío</u></h5>
            <br>
        </div>
    </div>
    <div class="row" style="border-bottom:solid 1px black;border-left:solid 1px black; border-right:solid 1px black;">
        <div class="col-xs-4">
            <p><strong>Origen: </strong>Montevideo, Uruguay</p>
            <p><strong>Fecha: <?php echo $row['fecha']; ?></strong></p>
            <p><strong>Fecha embarque: <?php echo $row['fecha_emb']; ?></strong></p>
            <p><strong>Valor mercancía (USD): <?php echo $row['valor_mercancia']; ?></strong></p>
        </div>
        <div class="col-xs-4">
            <p><strong>Peso (Kg): <?php echo $row['peso_real']; ?></strong></p>
            <p><strong>Descripción: <?php echo $row['descripcion']; ?></strong></p>
            <p><strong>Tipo de bulto: <?php echo $row['tipo_bulto']; ?></strong></p>
            <p><strong>Cond. Entrega: <?php echo $row['incotem']; ?></strong></p>
        </div>
        <div class="col-xs-4">
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
</div>


<input type="hidden" name="guia" id="guia" generarFactura()value=<?php echo $id_guia;?>>
 <!----------fin guia de embarque----------->


                <?php
$html = ob_get_clean();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');

$dompdf->render();
$dompdf->stream("reportes.pdf", array("Attachment"=>false));
?>
    

</body>
</html>
