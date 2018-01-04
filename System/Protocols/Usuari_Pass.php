<?php
    require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];

        $id=$value['id_usuario'];
        $pass = $value['password'];
        
        $oldPass = md5($_POST['oldPass']);
        $newPass = md5($_POST['newPass']);
        $newPass2 = md5($_POST['newPassAgain']);

        $usuari = new Usuario();
        
        if($pass == $oldPass){
            if($newPass == $newPass2){
                $result = $usuari->modPass($id, $newPass);
                $result = $usuari->return_user($id);
                if( $result != null){ 
                    $_SESSION['user'] = $result;
                    echo '003';
                }
            }
            else{
                echo '002';
            }
        }else{
            echo '001';
        }
    }
?>
