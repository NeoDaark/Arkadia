<?php
    require_once('../Classes/Partida.php');

        $limite=$_POST['max_players'];
        $id_partida=$_POST['id_partida'];
        $desc = $_POST['descripcion'];
        $anyo = $_POST['anyo'];
        $nivel = $_POST['nivel'];
        
        $imagen = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        //echo $nombre.$desc.$anyo.$imagen.$nivel.$id_partida;
        move_uploaded_file($imagen_tmp, "../../Public/img/partida/$imagen");
        
        $partida = new Partida();
        $db2=$partida->modPartida($id_partida,$imagen,$desc,$anyo,$nivel,$limite);
        header('Location: ../../settings/table/view_partida.php?id='.$id_partida);
?>

