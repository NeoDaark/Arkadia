<?php
    require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        // Datos de la session
        $value=$_SESSION['user'];
        $id=$value['id_usuario'];
        
        //Datos recibidos "POST"
        $newUser =$_POST['user'];
        
        //Declaramos la clase Usuario();
        $usuari = new Usuario();
        
        // Comprobar si los datos nuevos son iguales que los que tiene el usuario
        $userflag = $usuari->userflag($id, $newUser);
        // Comprobar si los datos nuevos ya existen en la BD
        $userexiste = $usuari->userexiste($newUser);
        
        //Condiciones if else
        if($userflag == 'no' && $userexiste == 'yes'){
            echo '001';// NickName no disponible
            
        }else if($userflag == 'yes' && $userexiste == 'yes'){
            echo '002';// New Nickname == Old Nickname
            
        }else if($userflag == 'no' && $userexiste == 'no'){
            $usuari->modNickname($id,$newUser); //New Nickname != Old Nickname && NickName Disponible
            
            $result = $usuari->return_user($id);
            if( $result != null){ 
                $_SESSION['user'] = $result;
                echo '003';
            }
        }
    }
?>

