<?php
    require_once('../Classes/Usuario.php');
    $user = $_GET['user'];
    
    $usuari = new Usuario();
    $return = $usuari->buscUsuario($user);
    echo json_encode($return);
?>

