<?php
    require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];

        $id=$value['id_usuario'];
        $user=$value['nickname'];

        $newImatge = $_FILES['imagen']['name'];
        $newImatge_tmp = $_FILES['imagen']['tmp_name'];
        $temp = explode(".", $_FILES["imagen"]["name"]);
	$newName = $value['id_usuario'] . '.' . end($temp);
        
        move_uploaded_file($newImatge_tmp, "../../Public/img/usuarios/$newName");

        $usuari = new Usuario();
        $result = $usuari->modImage($id, $newName);
        
        $result = $usuari->return_user($id);
            if( $result != null){ 
                $_SESSION['user'] = $result;
                 header('Location: ../../settings/');
            }
    }
?>

