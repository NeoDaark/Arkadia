<?php
$id_partida=$_POST['id_partida'];
echo $id_objeto=$_POST['id_objeto'];
echo $nombre=$_POST['nombre'];
echo $peso=$_POST['peso'];
echo $precio=$_POST['precio'];
echo $disponibilidad=$_POST['disponibilidad'];
echo $calidad=$_POST['calidad'];
echo $descripcion=$_POST['descripcion'];

require_once "../Classes/Objeto.php";
$objeto = new Objeto();
$objeto=$objeto->modObj($id_objeto,$nombre,$descripcion,$peso,$precio,$disponibilidad,$calidad);
header('Location: ../../settings/table/view_partida.php?id='.$id_partida);
?>
