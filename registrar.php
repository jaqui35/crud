<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtPuesto"]) || empty($_POST["txtEmpresa"]) || empty($_POST["txtMensaje"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'modal/conexion.php';
    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $telefono = $_POST["txtTelefono"];
    $puesto = $_POST["txtPuesto"];
    $empresa = $_POST["txtEmpresa"];
    $mensaje= $_POST["txtMensaje"];

    $sentencia = $bd->prepare("INSERT INTO contacto(nombre,correo,telefono,puesto,empresa,mensaje) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$correo,$telefono,$puesto,$empresa,$mensaje]);
    if($resultado === TRUE){
        header('Location: index.php?mensaje=registrado');

    }else{
        header('Location: index.php?mensaje=error');
        exit();
    }

?>

