<?php
    require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        // Datos de la session
        $value=$_SESSION['user'];
        $id=$value['id_usuario'];
        
        //Datos recibidos "POST"
        $newMail = $_POST['email'];
        
        //Declaramos la clase Usuario();
        $usuari = new Usuario();
        
        // Comprobar si los datos nuevos son iguales que los que tiene el usuario
        $mailflag = $usuari->mailflag($id, $newMail);
        // Comprobar si los datos nuevos ya existen en la BD
        $mailexiste = $usuari->mailexiste($newMail);
        
        //Condiciones if else
        if($mailflag == 'no' && $mailexiste == 'yes'){
            echo '001';// email no disponible
            
        }else if($mailflag == 'yes' && $mailexiste == 'yes'){
            echo '002';// New email == Old email
            
        }else if($mailflag == 'no' && $mailexiste == 'no'){
            $usuari->modEmail($id,$newMail); //New Email != Old Email && Email Disponible
            
            $result = $usuari->return_user($id);
            if( $result != null){ 
                $_SESSION['user'] = $result;
                echo '003';
            }
        }
        
        
    }
?>

