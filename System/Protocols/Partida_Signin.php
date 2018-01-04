<?php
    session_start();
    if(isset($_SESSION['url'])){
        $url = $_SESSION['url']; // Guarda la $url del ultimo sitio visitado
    }else{
        $url = "../../index.php"; // Si no hay un sitio visitado redirije a /settings/account/
    }
    require_once('../Classes/Partida_Usuari.php');
    $id_partida = $_GET['idp'];
    $id_usuario = $_GET['idu'];
    $pos = -1;
    $aceptado = 'true';
    $partida_usuari = new Partida_Usuari($id_usuario, $id_partida, $pos, $aceptado);
    $partida_usuari->mod();
    header('Location:'.$url);
?>

