<?php
    require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];
        $id=$value['id_usuario'];
        $user=$value['nickname'];

        $newNom = $_POST['nom'];
        $newCognom = $_POST['cognom'];

        $usuari = new Usuario();
        $result = $usuari->modIdentity($id, $user, $newNom, $newCognom);
        if($result){
            $result = $usuari->return_user($id);
            if($result != "error"){
                $_SESSION['user'] = $result;
                header('Location: ../../user/');
            }
        }
    }
?>

