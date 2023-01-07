<?php include 'template/header.php' ?>

<?php
    include_once "modal/conexion.php";
    $sentencia = $bd ->query("select * from contacto");
    $contacto = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($contacto);
?>

<div class="container mt-7">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <!------ alertas---->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']== 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error! </strong> Rellenar todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']== 'registrado'){
            ?>
            <div class="alert alert-succes alert-dismissible fade show" role="alert">
                <strong>Registrado </strong> Se agregaron los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']== 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Elimimnado  </strong> Los datos fueron eliminados
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>
            <!---fin alerta---->
            <div class="card">
                <div class="card-header">
                    Envíanos tus datos
                </div>
                <div class="p-4">
                    
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Puesto (Opcional)</th>
                                    <th scope="col">Empresa (Opcional)</th>
                                    <th scope="col">Mensaje (Opcional)</th>
                                    <th score="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($contacto as $dato){

                                    
                                ?>
                                <tr class="">
                                    <td scope="row"><?php echo $dato->codigo;?></td>
                                    <td scope="row"><?php echo $dato->nombre;?></td>
                                    <td scope="row"><?php echo $dato->correo;?></td>
                                    <td scope="row"><?php echo $dato->telefono;?></td>
                                    <td scope="row"><?php echo $dato->puesto;?></td>
                                    <td scope="row"><?php echo $dato->empresa;?></td>
                                    <td scope="row"><?php echo $dato->mensaje;?></td>
                                    <td><a class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash3"></i></a></td>
                                    <td><a class="text-succes" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo:</label>
                        <input type="text" class="form-control" name="txtCorreo" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número de teléfono:</label>
                        <input type="text" class="form-control" name="txtTelefono" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Puesto:</label>
                        <input type="text" class="form-control" name="txtPuesto" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Empresa:</label>
                        <input type="text" class="form-control" name="txtEmpresa" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mensaje:</label>
                        <input type="text" class="form-control" name="txtMensaje" autofocus>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>

