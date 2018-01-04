<?php
require_once('../Classes/Partida.php');
require_once("../../System/Classes/Usuario.php");
$usuari = new Usuario();
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    $id_usuario = $value['id_usuario'];
    
    $id_partida=$_GET['id_partida'];
    
    $partida= new Partida();  
    $partida= $partida->viewPartida($id_partida);
    if(empty($partida) || $partida->getId_Usuario()!== $value['id_usuario'] ){
        header('Location: ../../settings/table/');
    }else{
        
        $string = $value['nickname'].$partida->getToken().$partida->getNombre();
        $token = sha1(uniqid($string, true));
        $partida->modToken($id_partida, $token);
        
        header('Location: ../../settings/table/invite.php?id='.$id_partida);
    }
}

