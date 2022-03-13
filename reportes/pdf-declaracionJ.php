

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
    line-height:0.01rem;
}

.letraDetallesPie{
    font-size: 0.6rem;
    line-height:0.1rem;
}

.letraDetallesNotaPie{
    font-size: 0.5rem;
    line-height:0.9rem;
    margin-right:10px;
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
.pieTabla{
    line-height:1em;
    margin-left:10px;
}

#house{
    color:red;
    margin-left:50px;
    
    /*text-align:center;*/
    
}

.color_columna{
    background:#ccccff;
}

.interno{
border: 1px solid black;
}
.collapse{
    border-collapse:collapse;
    border: 1px solid black;
    padding:0;
}
table{
    width:100%;
    padding:0;
}

.izq{
    text-align:left;
    margin:2px;
}

.der{
    text-align:right;
    margin-right:3px;
}

.cant{
    width:20%;
}

.desc{
    width:37%; 
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

<table class="collapse">
    <thead class="membretes">
        <tr>
            <th class="cant">Cantidad (Quantity)</th>
            <th class="desc">Descripcion (Description)</th>
            <th>Precio Unitario (Unit Price)</th>
            <th>Cantidad (Amount)
        </tr>  
    </thead>     
    <tbody class="letraDetalles "> 
        <tr class="collapse">
            <th class="collapse"><p> <?php echo $_GET['cant1'];?> </p></th>
            <th class="collapse"><p class="izq"> <?php echo $_GET['descripcion1'];?></p></th>
            <th class="collapse"><p  class="der"> <?php echo number_format($_GET['precio1'],2,',','.' );?></p></th>
            <th class="color_columna collapse"><p class="der"> <?php if  ($_GET['total1']>0) echo number_format($_GET['total1'],2,',','.');?></p> </th>
        </tr>  
        <tr class="collapse">
            <th class="collapse"><p> <?php echo $_GET['cant2'];?> </p></th>
            <th class="collapse"><p class="izq"> <?php echo $_GET['descripcion2'];?></p></th>
            <th class="collapse"><p  class="der"> <?php  if ($_GET['total2']>0) echo number_format($_GET['precio2'],2,',','.' );?></p></th>
            <th class="color_columna collapse"><p class="der"> <?php if  ($_GET['total2']>0) echo number_format($_GET['total2'],2,',','.');?></p> </th>
        </tr> 
        <tr>
            <th class="collapse"><p> <?php echo $_GET['cant3'];?> </p></th>
            <th class="collapse"><p class="izq"> <?php echo $_GET['descripcion3'];?></p></th>
            <th class="collapse"><p  class="der"> <?php if ($_GET['total3']>0) echo number_format($_GET['precio3'],2,',','.' );?></p></th>
            <th class="color_columna collapse"><p class="der"> <?php if  ($_GET['total3']>0) echo number_format($_GET['total3'],2,',','.');?></p> </th>

        </tr> 
        <tr>
            <th class="collapse"><p> <?php echo $_GET['cant4'];?> </p></th>
            <th class="collapse"><p class="izq"> <?php echo $_GET['descripcion4'];?></p></th>
            <th class="collapse"><p> <?php if ($_GET['total4']>0) echo number_format($_GET['precio4'],2,',','.' );?></p></th>
            <th class="color_columna collapse"><p> <?php if  ($_GET['total4']>0) echo $_GET['total4'];?></p> </th>
        </tr>
        <tr>
            <th class="collapse"><p> <?php echo $_GET['cant5'];?> </p></th>
            <th class="collapse"><p class="izq"> <?php echo $_GET['descripcion5'];?></p></th>
            <th class="collapse"><p> <?php if ($_GET['total5']>0) echo number_format($_GET['precio5'],2,',','.' );?></p></th>
            <th class="color_columna collapse"><p> <?php if  ($_GET['total5']>0) echo $_GET['total5'];?></p> </th>
        </tr>
        <tr>
            <th class="collapse"><p> <?php echo $_GET['cant6'];?> </p></th>
            <th class="collapse"><p class="izq"> <?php echo $_GET['descripcion6'];?></p></th>
            <th class="collapse"><p> <?php if ($_GET['total6']>0) echo number_format($_GET['precio6'],2,',','.' );?></p></th>
            <th class="color_columna collapse"><p> <?php if  ($_GET['total6']>0) echo $_GET['total6'];?></p> </th>
        </tr>
        <tr>
            <th class="collapse"><p> <?php echo $_GET['cant7'];?> </p></th>
            <th class="collapse"><p class="izq"> <?php echo $_GET['descripcion7'];?></p></th>
            <th class="collapse"><p> <?php if ($_GET['total7']>0) echo number_format($_GET['precio7'],2,',','.' );?></p></th>
            <th class="color_columna collapse"><p> <?php if  ($_GET['total7']>0) echo $_GET['total7'];?></p> </th>
        </tr>
        <tr>
            <th class="collapse"><p> <?php echo $_GET['cant8'];?> </p></th>
            <th class="collapse"><p class="izq"> <?php echo $_GET['descripcion8'];?></p></th>
            <th class="collapse"><p> <?php if ($_GET['total8']>0) echo number_format($_GET['precio8'],2,',','.' );?></p></th>
            <th class="color_columna collapse"><p> <?php if  ($_GET['total8']>0) echo $_GET['total8'];?></p> </th>
        </tr>
        <tr>
            <th class="collapse"><p> <?php echo $_GET['cant9'];?> </p></th>
            <th class="collapse"><p class="izq"> <?php echo $_GET['descripcion9'];?></p></th>
            <th class="collapse"><p> <?php if ($_GET['total9']>0) echo number_format($_GET['precio9'],2,',','.' );?></p></th>
            <th class="color_columna collapse"><p> <?php if  ($_GET['total9']>0) echo $_GET['total9'];?></p> </th>
        </tr>

        <tr>
            <td colspan= "2"  rowspan="4"> <p class="pieTabla"><strong>The exporter of the products covered by this document   declares that, except where otherwise clearly indicated, these products are of  URUGUAY,  preferential origin.  I/We hereby certify that the information on this invoice is true and correct and that the contents of this shipment are as stated above.</strong> </p>
            </td> 
            <td class="collapse"><p class="der letraDetallesPie"><strong>TAX RATE</strong></p> </td>
            <td class="collapse"><p class="der">0,00%</p> </td>

            
        </tr>
        <tr>
            <td class="collapse "><p class="der letraDetallesPie"><strong> SALES TAX</strong></p> </td>
            <td class="collapse color_columna"><p class="der">0,00</p> </td>

        </tr> 
        <tr>   
            <td class="collapse"><p class="der letraDetallesPie "><strong>SHIPPING & HANDLING </strong></p> </td>
            <td class="collapse"><p class="der"> <strong>0,00</strong></p> </td>
        <tr>  
            <td class="collapse"><p class="der letraDetallesPie "><strong>Sub TOTAL</strong></p> </td>
            <td class="collapse color_columna"><p class="der"><strong><?php echo number_format($_GET['totalDeclarado'],2,',','.');?></strong></p> </td>
        </tr>
    </tbody>    
</table > 
<p class=" letraDetalles pieTabla"><strong>Declaro que según mi leal saber y enteder, la informacion antes mencionada es cierta y correcta, ademas que este envio se origina en el pais de URUGUAY. </p>
<br>

<?php
    $queryEnvia = "SELECT * FROM personas WHERE id_persona =$remitente";
    $resultadoEnv = mysqli_query($conexion, $queryEnvia);
    while ($rowEnv = $resultadoEnv->fetch_assoc()) {?>
    <p class="letraDetalles"><strong>Nombre/Name: </strong><?php echo $rowEnv['nombre'] . ' ' . $rowEnv['apellidos']; ?>       Firma/Signature: </strong>_____________________</p> 
    <?php
    }?></span>
<p class="letraDetallesNotaPie"> <strong>ADJUNTAR Y ARCHIVAR COPIAS DE LA DECLARACION DE SEGURIDAD, COPIA DE PASAPORTE O IDENTIDAD PERSONAL, LICENCIA DE <br> CONDUCIR</strong></p>				
	
<script>



    

</body>
</html>
