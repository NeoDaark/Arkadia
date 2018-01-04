<?php
    require_once('../Classes/Partida.php');
    require_once('../Classes/Partida_Usuari.php');
    require_once("../../System/Classes/Usuario.php");
    $usuari = new Usuario();
    
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];
        
        $id_usuario = $value['id_usuario'];
        $pos = ($usuari->returnNum_Partidas($id_usuario) + 1);
        
        $nombre=$_POST['nombre'];
        $imagen = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $descripcion = $_POST['descripcion'];
        $anyo = $_POST['anyo'];
        $nv_sobrenatural = $_POST['nivel'];
        $limite = 4;
        
        $p_u = new Partida_Usuari();
        $flag = $p_u->viewPos($id_usuario, $pos);
        if($flag == null){
            $usuari->modNum_Partidas($id_usuario, $pos); // mod num de partidas actual
            
            move_uploaded_file($imagen_tmp, "../../Public/img/partida/$imagen"); // imagen -- No funciona ? --

            $partida = new Partida($id_usuario,$nombre,$imagen,$descripcion,$anyo,$nv_sobrenatural,$limite); // Objecte Partida
            $id_partida=$partida->add(); // Primer Insert
            
            $string = $value['nickname'].$id_partida.$nombre;
            $token = sha1(uniqid($string, true));
            $partida->modToken($id_partida, $token);

            $partida_usuari = new Partida_Usuari($id_usuario, $id_partida, $pos, 'master'); // Objecte Partida_Usuari
            $partida_usuari->add(); // Segon Insert
            header('Location: ../../settings/table/view_partida.php?id='.$id_partida);
        }else{
            header('Location: ../../settings/table/view_partida.php?id='.$id_partida);
        }
        
    }
        
    
    
    

    
?>

