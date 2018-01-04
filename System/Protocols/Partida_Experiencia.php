<?php
    require_once('../Classes/Personaje.php');
    require_once('../Classes/Nivel.php');
    
    $id_partida = $_POST['id_partida'];     //1
    $entrada = $_POST['personaje'];         //2_darkAsasin
    $entrada2 = explode("_", $entrada);
    
    $id_personaje = $entrada2[0];
    //var_dump($id_personaje);
    
    $Nombrepersonaje = $entrada2[1];
    //var_dump($Nombrepersonaje);
    
    if(empty($_POST['expe'])){
        $experiencia_Nova = 0;
    }else{
        $experiencia_Nova = $_POST['expe'];          //21
    }
    //echo $id_partida.' '.$usuario.' '.$newExpe;
    
    //Update de la experiencia final
    $personaje = new Personaje();
    $result = $personaje->updateExpe($experiencia_Nova,$id_personaje);
    
    
    
    
    
    /*Comprovar si tiene más experiencia actual que la experiencia necesaria para subir de level*/
    //Select de personaje exp actual y select de exp necesaria de nivel+1
    
    $personaje2 = new Personaje();
    $newPersonaje = $personaje2->viewPersonaje($id_personaje);
    $newPersonaje['nivel'];
    $newPersonaje['exp_actual'];
    
    $expNecesaria = new Nivel();
    $expNecesaria2 = $expNecesaria->viewNivel($newPersonaje['nivel']+1);
    $experirenciaNecesaria = $expNecesaria2->getExp_Necesaria();
    
    /*Subir level*/
    if($newPersonaje['exp_actual'] >= $experirenciaNecesaria) {
        //Restar la experiencia para subir el nivel
        $experienciaRestante = $newPersonaje['exp_actual'] - $experirenciaNecesaria;
        
        //Subir el nivel en +1
        $newPersonaje['nivel'] = $newPersonaje['nivel']+1;
        
        //Efectuar el update
        $result2 = $personaje->updatePersonaje($newPersonaje['nivel'], $experienciaRestante, $id_personaje);
        
        //Enviament de resultats
        if ($result2){
        echo 'success2'; 
        }else{
            echo 'fail2';
        }
    }
    
    
    
    if ($result){
        echo 'success'; 
    }else{
        echo 'fail';
    }
    
    
    
?>

