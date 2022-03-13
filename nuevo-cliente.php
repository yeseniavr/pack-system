<?php
include "session.php";
include "conexion.php";
include_once "includes/header.php";
include_once "includes/sidebar.php";
include_once "includes/footer.php";

?>


<br>
    <h2>Nuevo Cliente</h2>
    <div class="container">
        <form class="form-horizontal" method="POST" action="guardar-cliente.php" autocomplete="off">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4 div-nuevo">
                        <label>DNI</label>
                        <input type="text" name="dni" id="dni" class='form-control' maxlength="20" required ></input>
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label>Nombres</label>
                        <input type="text" name="nombre" id="nombre" class='form-control' maxlength="25" required ></input>
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="25" required ></input>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4 div-nuevo">
                        <label for="direccion" class="col-sm-2 control-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion">
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label for="pais" class="col-sm-2 control-label">País</label>
                        <select name="pais" class="form-select" aria-label="Default select example">
                            <option value="0">Seleccione:</option>
                            <?php
                                $query = "SELECT * FROM cod_pais";
                                $result = mysqli_query($conexion, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row[id_pais] . '">' . $row[descripcion] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label for="departamento" class="col-sm-2 control-label">Departamento</label>
                        <input type="text" class="form-control" id="departamento" name="departamento" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4 div-nuevo">
                        <label for="cod_postal" class="col-sm-8 control-label">Cód Postal</label>
                        <input type="text" class="form-control" id="cod_postal" name="cod_postal">
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label for="telefono" class="col-sm-2 control-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="tel">
                    </div>
                    <div class="col-md-4 div-nuevo">
                        <label for="email" class="col-sm-2 control-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                </div>
            </div>
            <br>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-dark boton-secundario"><a href="gestion.php">Regresar</a></button>
                        <button type="submit" name= "guardar_cliente" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</main>
