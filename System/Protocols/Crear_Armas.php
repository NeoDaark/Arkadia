<?php
$id_objeto=$_POST['id_objeto'];
 $car1=$_POST['1'];
 $car2=$_POST['2'];
 $car3=$_POST['3'];
 $car4=$_POST['4'];
 $car5=$_POST['5'];
 $car6=$_POST['6'];
 $car7=$_POST['7'];
 $car8=$_POST['8'];
 $car9=$_POST['9'];
 $car10=$_POST['10'];
 $car11=$_POST['11'];
 $car12=$_POST['12'];
 $car13=$_POST['13'];
 $car14=$_POST['14'];

 $val1=$_POST['v1'];
 $val2=$_POST['v2'];
 $val3=$_POST['v3'];
 $val4=$_POST['v4'];
 $val5=$_POST['v5'];
 $val6=$_POST['v6'];
 $val7=$_POST['v7'];
 $val8=$_POST['v8'];
 $val9=$_POST['v9'];
 $val10=$_POST['v10'];
 $val11=$_POST['v11'];
 $val12=$_POST['v12'];
 $val13=$_POST['v13'];
 $val14=$_POST['v14'];

require_once "../../System/Classes/Objeto_Caracteristica.php";
$objCar=new Objeto_Caracteristica($car1,$id_objeto,$val1);
$objCar->add();
$objCar=new Objeto_Caracteristica($car2,$id_objeto,$val2);
$objCar->add();
$objCar=new Objeto_Caracteristica($car3,$id_objeto,$val3);
$objCar->add();
$objCar=new Objeto_Caracteristica($car4,$id_objeto,$val4);
$objCar->add();
$objCar=new Objeto_Caracteristica($car5,$id_objeto,$val5);
$objCar->add();
$objCar=new Objeto_Caracteristica($car6,$id_objeto,$val6);
$objCar->add();
$objCar=new Objeto_Caracteristica($car7,$id_objeto,$val7);
$objCar->add();
$objCar=new Objeto_Caracteristica($car8,$id_objeto,$val8);
$objCar->add();
$objCar=new Objeto_Caracteristica($car9,$id_objeto,$val9);
$objCar->add();
$objCar=new Objeto_Caracteristica($car10,$id_objeto,$val10);
$objCar->add();
$objCar=new Objeto_Caracteristica($car11,$id_objeto,$val11);
$objCar->add();
$objCar=new Objeto_Caracteristica($car12,$id_objeto,$val12);
$objCar->add();
$objCar=new Objeto_Caracteristica($car13,$id_objeto,$val13);
$objCar->add();
$objCar=new Objeto_Caracteristica($car14,$id_objeto,$val14);
$objCar->add();

if(isset($_POST['id_partida']) && !empty($_POST['id_partida'])){
    $id_partida = $_POST['id_partida'];
    header('Location: ../../settings/table/view_partida.php?id='.$id_partida);
}else{
    header('Location: ../../zone.php');
}
?>
