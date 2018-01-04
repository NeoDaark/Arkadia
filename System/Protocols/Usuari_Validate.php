<?php
    require_once('../Classes/Usuario.php');

    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $usuari = new Usuario();
    $usuari = $usuari->verificar_login($user,$pass);
    if(!isset($_SESSION['user'])){ 
        if( $usuari != null){
            session_start();
            $_SESSION['user'] = $usuari;
            echo 'succes';
        }else{
            echo 'fail';
        } 
    }
