<?php
    require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];

        $id=$value['id_usuario'];
        $user=$value['nickname'];

        $usuari = new Usuario();
        $result = $usuari->delete($id);
        header('Location: ../../logout.php');
    }
?>

