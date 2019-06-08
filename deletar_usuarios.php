<?php

    require 'config.php';
    require 'classes/usuarios.class.php';

    $usuarios = new Usuarios();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $usuarios->deletarUsuario($id);
        header("Location: index.php");
    }


?>