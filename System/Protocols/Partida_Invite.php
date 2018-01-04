<?php
    require_once('../Classes/Partida_Usuari.php');
    require_once('../Classes/Partida.php');
    
    $id_partida = $_POST['id_partida'];
    $id_usuario = $_POST['id_usuario'];
    $pos = -1;
    $aceptado = 'false';
    
    $partida_usuari = new Partida_Usuari($id_usuario, $id_partida, $pos, $aceptado);
    $partida = new Partida();
    
    $partida = $partida->viewPartida($id_partida);
    $limite = $partida->getLimite();
    $users = $partida_usuari->countUsers($id_partida);
    if ($users < $limite){
        $partida_usuari->add();
        echo '001'; 
    }else{
        echo '002';
    }
    
    
    
?>

