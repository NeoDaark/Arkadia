<?php
    require_once('../Classes/Usuario.php');
    
    session_start();
    if(isset($_SESSION['user'])){
        // Datos de la session
        $value=$_SESSION['user'];

        $user_id = $value['id_usuario'];
        $user=$value['nickname'];
        $pass = md5($_POST['pass']);
        $usuari = new Usuario();
        $result1 = $usuari->verificar_login($user,$pass);
        if( $result1 != null){ 
            $result2 = $usuari->delete($user_id);
            if($result2){
                echo '002';
                session_destroy();
            }
        }else{
            echo '001';
        }
    }
?>