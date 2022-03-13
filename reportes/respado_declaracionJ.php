<style>

@page {
    margin:0;
}
.detalleSuperior{
    width: 900px;
    height:260px;
    border:5px solid red;
    background:red;
    color:black;
    display:flex;
    align-items:flex-end;
    line-height:0.5em;
    
    
}
.destinatario{
    width:200px;
    height:100px;
   
}
.receptor{
    width:250px;
    height:100px;
    margin-left:260px;

}

.direccion{
    line-height:0.8em;
}
.membretesSuperior{
    font-size: 0.8rem;
    
}
.membretes{
    font-size: 0.8rem;
    font-style:italic;
    Background:#00001a;
    line-height:1em;
    color:white;
    
}
.nombre{
    font-size: 0.8rem;
}
.letraDetalles{
    font-size: 0.7rem;
    
}

.detalles{
    width: 1020px;
    height:50px;
    border:5px solid red;
    background:red;
    color:black;
    display:flex;
    align-items:flex-end;
    margin-top:200px;
    line-height:0.7em;
    
}
.cantidad{
    width:115px;
    height:150px;
  
    /*background:blue;*/
}
.descripcion{
    width:155px;
    height:150px;
    margin-left:115px;
    margin-right:300px;
    /*background:green;*/
}
.precio{
    width:180px;
    height:150px;
    margin-left:270px;
    /*background:red;*/
    
}
.total{
    width:100px;
    height:150px;
    margin: right 370px;
    /*background:red;*/
    
}

#house{
    color:red;
    margin-left:50px;
    
    /*text-align:center;*/
    
}

.color_columna{
    background:#ccccff;
}

table{
    background:#ccccff;
}

</style>


</head>   
<?php

include "../conexion.php";


if (isset($_GET['id_guia'])) {
    $id = $_GET['id_guia'];
    $query = "SELECT * FROM guia_embarque WHERE id_guia = $id";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $id_guia = $row['id_guia'];
        $peso_real = $row['peso_real'];
        $cod_origen = $row['cod_origen'];
        $cod_destino = $row['cod_destino'];
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


<body>




<br>

<div class="detalleSuperior ">
    <div class="destinario membretesSuperior">
        <h4 id="house">HOUSE </h4>
        <p><strong>Fecha/Date: </strong><?php echo date("F") . " " . date("m") . ", " . date("Y");?> </p>
        <p ><strong>Factura/Invoice: </strong></p>

        <p ><strong><u>SHIPPER:</u></strong></p>

        <?php
        $queryPais = "SELECT * FROM cod_pais WHERE id_pais =$cod_origen";
        $resultadoPais= mysqli_query($conexion, $queryPais);
        while ($rowPais = $resultadoPais->fetch_assoc()) {?>
        <div>
                <?php
                $codPais = $rowPais['codigo'];
            ?>
            <p><strong>Enviado desde: </strong><?php echo $codPais; ?></p>
        </div> <?php
        } ?>
            <?php
        $queryEnvia = "SELECT * FROM personas WHERE id_persona =$remitente";
        $resultadoEnv = mysqli_query($conexion, $queryEnvia);
        while ($rowEnv = $resultadoEnv->fetch_assoc()) {?>
            <p><strong>I.D / RUC / Passport: </strong><?php echo $rowEnv['dni']; ?></p>
            <p><strong>Contacto/Contact: </strong><?php echo $rowEnv['nombre'] . ' ' . $rowEnv['apellidos']; ?></p>
            <p><strong>Teléfono/Phone: </strong><?php echo $rowEnv['tel']; ?></p>
            <p><strong>E-mail: </strong><?php echo $rowEnv['correo']; ?></p>
            <p><strong>Compañía/Company: </strong><?php echo $rowEnv['correo']; ?></p>
            <p class="direccion"><strong>Direccion/Address: </strong><?php echo $rowEnv['direccion'] . ' ' . $rowEnv['pais'] . ' ' . $rowEnv['departamento']; ?></p>
        <?php
            }?>
        <br>
        <p><strong>Comentarios/Comments or Special <br>Instructions:</strong></p>

       
    </div>
    <div class="receptor membretesSuperior">
        <h2 class="text-center" style="max-width:80%;">Factura Comercial  </h2>
        <h2 class="text-center" style="max-width:80%;">(Commercial Invoice)</h2><br>
        <p class="text-center"><strong><u>SHIPPED TO:</u></strong></p>
            

        <?php
        $queryPais = "SELECT * FROM cod_pais WHERE id_pais =$cod_destino";
        $resultadoPais= mysqli_query($conexion, $queryPais);
        while ($rowPais = $resultadoPais->fetch_assoc()) {?>
        <div>
                <?php
                $codPais = $rowPais['codigo'];
            ?>
            <p><strong>Enviado desde: </strong><?php echo $codPais; ?></p>
        </div> <?php
        } ?>
        <?php
            $queryEnvia = "SELECT * FROM personas WHERE id_persona =$destinatario";
            $resultadoEnv = mysqli_query($conexion, $queryEnvia);
            while ($rowEnv = $resultadoEnv->fetch_assoc()) {?>
                <p><strong>I.D / RUC / Passport: </strong><?php echo $rowEnv['dni']; ?></p>
                <p><strong>Contacto/Contact: </strong><?php echo $rowEnv['nombre'] . ' ' . $rowEnv['apellidos']; ?></p>
                <p><strong>Teléfono/Phone: </strong><?php echo $rowEnv['tel']; ?></p>
                <p><strong>E-mail: </strong><?php echo $rowEnv['correo']; ?></p>
                <p><strong>Compañía/Company: </strong><?php echo $rowEnv['correo']; ?></p>
                <p class="direccion"><strong>Direccion/Address: </strong><?php echo $rowEnv['direccion'] . ' ' . $rowEnv['pais'] . ' ' . $rowEnv['departamento']; ?></p>
        <?php
            }?>
        
        <p><strong>Incoterm: </strong><?php echo $icontem; ?></p>
        
    </div>
</div>

<br>
<br>

<div class="detalles">
<div class="cantidad letraDetalles">
    <h3 class="membretes">Cantidad (Quantity) <br>.</h3> 
    <p> <?php echo $_GET['cant1'];?> </p>
    <p> <?php echo $_GET['cant2'];?> </p>
    <p> <?php echo $_GET['cant3'];?></p>
    <p> <?php echo $_GET['cant4'];?></p>
    <p> <?php echo $_GET['cant5'];?></p>
    <p> <?php echo $_GET['cant6'];?></p>
    <p> <?php echo $_GET['cant7'];?></p>
    <p> <?php echo $_GET['cant8'];?></p>
    <p> <?php echo $_GET['cant9'];?></p>
    <p> <?php echo $_GET['cant10'];?></p>
    <p> <?php echo $_GET['cant11'];?></p>
    <p> <?php echo $_GET['cant12'];?></p>
    <p> <?php echo $_GET['cant13'];?></p>
    <p> <?php echo $_GET['cant14'];?></p>
    <p> <?php echo $_GET['cant15'];?></p>
    <p> <?php echo $_GET['cant16'];?></p>
    <p> <?php echo $_GET['cant17'];?></p>
    <p> <?php echo $_GET['cant18'];?></p>
    <p> <?php echo $_GET['cant19'];?></p>
    <p> <?php echo $_GET['cant20'];?></p>
    
    </div>
    <div class="descripcion letraDetalles">
    <h3 class="membretes">Descripcion (Description) <br>.</h3><br>
    <p> <?php echo $_GET['descripcion1'];?></p>
    <p> <?php echo $_GET['descripcion2'];?></p>
    <p> <?php echo $_GET['descripcion3'];?></p>
    <p> <?php echo $_GET['descripcion4'];?></p>
    <p> <?php echo $_GET['descripcion5'];?></p>
    <p> <?php echo $_GET['descripcion6'];?></p>
    <p> <?php echo $_GET['descripcion7'];?></p>
    <p> <?php echo $_GET['descripcion8'];?></p>
    <p> <?php echo $_GET['descripcion9'];?></p>
    <p> <?php echo $_GET['descripcion10'];?></p>
    <p> <?php echo $_GET['descripcion11'];?></p>
    <p> <?php echo $_GET['descripcion12'];?></p>
    <p> <?php echo $_GET['descripcion13'];?></p>
    <p> <?php echo $_GET['descripcion14'];?></p>
    <p> <?php echo $_GET['descripcion15'];?></p>
    <p> <?php echo $_GET['descripcion16'];?></p>
    <p> <?php echo $_GET['descripcion17'];?></p>
    <p> <?php echo $_GET['descripcion18'];?></p>
    <p> <?php echo $_GET['descripcion19'];?></p>
    <p> <?php echo $_GET['descripcion20'];?></p>
    
    </div>


    <div class="precio letraDetalles">
    <h3 class="membretes">Precio Unitario <br> (Unit Price)</h3>
    <p> <?php echo $_GET['precio1'];?></p>
    <p> <?php echo $_GET['precio2'];?></p>
    <p> <?php echo $_GET['precio3'];?></p>
    <p> <?php echo $_GET['precio4'];?></p>
    <p> <?php echo $_GET['precio5'];?></p>
    <p> <?php echo $_GET['precio6'];?></p>
    <p> <?php echo $_GET['precio7'];?></p>
    <p> <?php echo $_GET['precio8'];?></p>
    <p> <?php echo $_GET['precio9'];?></p>
    <p> <?php echo $_GET['precio10'];?></p>
    <p> <?php echo $_GET['precio11'];?></p>
    <p> <?php echo $_GET['precio12'];?></p>
    <p> <?php echo $_GET['precio13'];?></p>
    <p> <?php echo $_GET['precio14'];?></p>
    <p> <?php echo $_GET['precio15'];?></p>
    <p> <?php echo $_GET['precio16'];?></p>
    <p> <?php echo $_GET['precio17'];?></p>
    <p> <?php echo $_GET['precio18'];?></p>
    <p> <?php echo $_GET['precio19'];?></p>
    <p> <?php echo $_GET['precio20'];?></p>
    
    </div>

    <div class="total letraDetalles">
    <h3 class="membretes">Cantidad (Amount)</h3><br>
    <p> <?php echo $_GET['total1'];?></p>
    <p> <?php if  ($_GET['total2']>0) echo $_GET['total2'];?></p>
    <p> <?php if  ($_GET['total3']>0) echo $_GET['total3'];?></p>
    <p> <?php if  ($_GET['total4']>0) echo $_GET['total4'];?></p>
    <p> <?php if  ($_GET['total5']>0) echo $_GET['total5'];?></p>
    <p> <?php if  ($_GET['total6']>0) echo $_GET['total6'];?></p>
    <p> <?php if  ($_GET['total7']>0) echo $_GET['total7'];?></p>
    <p> <?php if  ($_GET['total8']>0) echo $_GET['total8'];?></p>
    <p> <?php if  ($_GET['total9']>0) echo $_GET['total9'];?></p>
    <p> <?php if  ($_GET['total10']>0) echo $_GET['total10'];?></p>
    <p> <?php if  ($_GET['total11']>0) echo $_GET['total11'];?></p>
    <p> <?php if  ($_GET['total12']>0) echo $_GET['total12'];?></p>
    <p> <?php if  ($_GET['total13']>0) echo $_GET['total13'];?></p>
    <p> <?php if  ($_GET['total14']>0) echo $_GET['total14'];?></p>
    <p> <?php if  ($_GET['total15']>0)  echo $_GET['total15'];?></p>
    <p> <?php if  ($_GET['total16']>0) echo $_GET['total16'];?></p>
    <p> <?php if  ($_GET['total17']>0) echo $_GET['total17'];?></p>
    <p> <?php if  ($_GET['total18']>0) echo $_GET['total18'];?></p>
    <p> <?php if  ($_GET['total19']>0) echo $_GET['total19'];?></p>
    <p> <?php if  ($_GET['total20']>0) echo $_GET['total20'];?></p>
    
    </div>

</div>





</div>  
<br>

<table>
    <thead class="membretes">
        <tr>
            <th>Cantidad (Quantity)</th>
            <th>Descripcio (Description)</th>
            <th>Precio Unitario (Unit Price)</th>
            <th>Cantidad (Amount)
        </tr>  
    </thead>     
    <tbody class="letraDetalles"> 
        <tr>
            <th><p> <?php echo $_GET['cant1'];?> </p></th>
            <th><p> <?php echo $_GET['descripcion1'];?></p></th>
            <th><p> <?php echo $_GET['precio1'];?></p></th>
            <th class="color_columna"><p> <?php if  ($_GET['total1']>0) echo $_GET['total1'];?></p> </th>
        </tr>  
        <tr>
            <th><p> <?php echo $_GET['cant2'];?> </p></th>
            <th><p> <?php echo $_GET['descripcion2'];?></p></th>
            <th><p> <?php echo $_GET['precio2'];?></p></th>
            <th class="color_columna"><p> <?php if  ($_GET['total2']>0) echo $_GET['total2'];?></p> </th>
        </tr> 
        <tr>
            <th><p> <?php echo $_GET['cant3'];?> </p></th>
            <th><p> <?php echo $_GET['descripcion3'];?></p></th>
            <th><p> <?php echo $_GET['precio3'];?></p></th>
            <th class="color_columna"><p> <?php if  ($_GET['total3']>0) echo $_GET['total3'];?></p> </th>
        </tr> 
    </tbody>    
        </table  >




    

</body>
</html>
