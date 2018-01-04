<?php
    require_once('../Classes/Usuario.php');
    //Requiered inputs
    ob_start();
    $newUser = strtolower ($_POST['user']);
    $newPass = md5($_POST['pass']);
    $newEmail = $_POST['email'];
    //Tipus d'usuari >> User = 2<<
    $newId_Tipus = 1;
    
    //Afegir Usuari a la BD.
    $newUsuari = new Usuario($newUser, $newEmail, $newPass, $newId_Tipus);
    $db2 = $newUsuari->add();
    //var_dump($test);
    //Comprobació de si s'ha afegit l'usuari i loggin
    if($db2 != false){
        $usuari = $newUsuari->verificar_login($newUser,$newPass);
        if( $usuari != null){ 
            session_start();
            $_SESSION['user'] = $usuari;
            header('Location: ../../settings');
        }
    }else{
        echo '<br><form><input type="button" value="Torna atras" name="Torna atras" onclick="history.back()" /></form>';
    }
?>