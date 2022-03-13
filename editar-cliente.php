<?php
include("session.php");
include("conexion.php");

//trae los datos de la base
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM personas WHERE id_persona = $id";
    $resultado = mysqli_query($conexion, $query);

    if(mysqli_num_rows($resultado) == 1){
        $row = mysqli_fetch_array($resultado);
        $dni=$row['dni'];
        $nombre = $row['nombre'];
        $apellidos= $row['apellidos'];
        $direccion=$row['direccion'];
        $pais=$row['pais'];
        $departamento=$row['departamento'];
        $cod_postal=$row['cod_postal'];
        $tel=$row['tel'];
        $correo=$row['correo'];
   }
 
}
//actualizar datos
if(isset($_POST['update'])){
   $id = $_GET['id'];
    $dni=$_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $direccion=$_POST['direccion'];
    $pais=$_POST['pais'];
    $departamento=$_POST['departamento'];
    $cod_postal=$_POST['cod_postal'];
    $tel=$_POST['tel'];
    $correo=$_POST['correo'];

    $query = "UPDATE personas set nombre = '$nombre', apellidos='$apellidos', direccion='$direccion', pais='$pais', departamento='$departamento', cod_postal='$cod_postal', tel='$tel', correo='$correo' WHERE id_persona = $id";
    mysqli_query($conexion, $query);

    $_SESSION['message'] = "Registro modificado con exito";
    $_SESSION['message-type'] = 'success';
    header('Location: gestion.php');

}

?>

<?php   
include_once("includes/header.php");
include_once("includes/sidebar.php");
?>
<br>
<h2>Modificar Cliente</h2>
    <div class="container">
        <form class="form-horizontal" method="POST" action="editar-cliente.php?id=<?php echo $_GET['id']; ?>" autocomplete="off">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4 div-nuevo">
                        <label>DNI</label>
                        <input type="text" name="dni" id="dni" class='form-control' maxlength="50" required value="<?php echo $dni; ?>"></input>
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label>Nombre</label>
                        <input type="text" name="nombre" id="nombre" class='form-control' maxlength="50" required value="<?php echo $nombre; ?>"></input>
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label>Nombre</label>
                        <input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="50" required value="<?php echo $apellidos; ?>"></input>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-4 div-nuevo">
                        <label>Dirección</label>
                        <input type="text" name="direccion" id="direccion" class='form-control' maxlength="50" required value="<?php echo $direccion; ?>"></input>
                    </div>
                    <div class="col-md-4 div-nuevo">
                    <label>Cod de origen</label>  <!--Llenado pais actual y todos -->
                        <select name="pais" class="form-select" aria-label="Default select example">
                            
                        <?php
                        $query = "SELECT * FROM cod_pais ";
                        $result = mysqli_query($conexion, $query);
                        while ($rowOrg = mysqli_fetch_array($result)) {
                            if($rowOrg['id_pais'] == $cod_origen){;  
                                echo '<option selected = "' . $cod_origen . '"value="' . $cod_origen . '">' . $rowOrg['codigo'] . '</option>';
                            }
                            else{
                                echo '<option value="' . $rowOrg['id_pais'] . '">' . $rowOrg['descripcion'] .' </option>';                    
                            }
                        }
                        ?>

                        </select>
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label>Departamento</label>
                        <input type="text" name="departamento" id="departamento" class='form-control' maxlength="50" required value="<?php echo $departamento; ?>"></input>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 div-nuevo">
                        <label>Cód Postal</label>
                        <input type="text" name="cod_postal" id="cod_postal" class='form-control' maxlength="50" required value="<?php echo $cod_postal; ?>"></input>
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label>Teléfono</label>
                        <input type="text" name="tel" id="tel" class='form-control' maxlength="50" required value="<?php echo $tel; ?>"></input>
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <input type="email" class="form-control" id="correo" name="correo" required value= "<?php echo $correo; ?>">
                    </div>

                </div>
            </div>



            <br>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                        <button type="button"  class="btn btn-dark boton-secundario"><a href="gestion.php">Regresar</a></button>
                        <button type="submit" name="update" class="btn btn-primary">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include_once("includes/footer.php"); ?>




