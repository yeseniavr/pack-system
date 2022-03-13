<?php
include "session.php";
include "conexion.php";
include_once "includes/header.php";
include_once "includes/sidebar.php";
include_once "includes/footer.php";

//buscador
$where = "";

if (isset($_POST["enviar-nombre"])) {
    $valor = $_POST['campo'];
    if (!empty($valor)) {
        $where = "WHERE dni LIKE '%$valor%' OR nombre LIKE '%$valor%' OR apellidos LIKE '%$valor%'";
    }
}

?>

<!--Mostrar msj si existe $_SESSION['message']-->
<?php if (isset($_SESSION['message'])) {?>
        <div class="alert alert-<?=$_SESSION['message-type'];?> alert-dismissible fade show" role="alert">
            <?=$_SESSION['message'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php unset($_SESSION['message']);}?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <div class="col-md-6">
    <h2>Cartera de Clientes</h2>
  </div>
  <div class="col-md-6">
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
      <div class="input-group">
        <div class="form-outline">
          <input type="search" id="form1" class="form-control-dos" name="campo" />
        </div>
        <button type="submit" class="btn btn-primary" name="enviar-nombre" value="Buscar">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </form>
  </div>
</div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">DNI</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Dirección</th>
          <th scope="col">tel</th>
          <th scope="col">País</th>
          <th scope="col">Departamento</th>
          <th scope="col">Cod Postal</th>
          <th scope="col">Correo</th>
        </tr>
      </thead>
      <tbody>
        <?php

$query = "SELECT * FROM personas $where";
$result = mysqli_query($conexion, $query);

//recorrer tabla
while ($row = mysqli_fetch_array($result)) {?>
          <tr>
              <td><?php echo $row['dni']; ?></td>
              <td><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['apellidos']; ?></td>
              <td><?php echo $row['direccion']; ?></td>
              <td><?php echo $row['tel']; ?></td>
              <?php 
              $origen=$row['pais'];
              $queryOrigen = "SELECT * FROM cod_pais WHERE id_pais=$origen";
              $resultadoOrigen = mysqli_query($conexion, $queryOrigen);
              while($rowOrigen = $resultadoOrigen->fetch_assoc())
              { ?>
                <td><?php echo $rowOrigen['descripcion']; ?></td>  
             <?php }
              ?>
              <td><?php echo $row['departamento']; ?></td>
              <td><?php echo $row['cod_postal']; ?></td>
              <td><?php echo $row['correo']; ?></td>
              <td><a class="btn btn-secondary" href="editar-cliente.php?id=<?php echo $row['id_persona']; ?>"><i class="bi bi-pencil-fill"></i></a>
                  <a class="btn btn-danger" onclick="return  confirm('¿Desea eliminar el registro?')"href="delete-cliente.php?id=<?php echo $row['id_persona']; ?>"><i class="bi bi-trash-fill" ></i</a>
              </td>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</main>
</div>
</div>
