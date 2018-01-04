<?php
$id_objeto=$_POST['id_objeto'];
 $car1=$_POST['15'];
 $car2=$_POST['16'];
 $car3=$_POST['17'];
 $car4=$_POST['18'];
 $car5=$_POST['19'];
 $car6=$_POST['20'];
 $car7=$_POST['21'];
 $car8=$_POST['22'];
 $car9=$_POST['23'];
 $car10=$_POST['24'];
 $car11=$_POST['25'];
 $car12=$_POST['26'];

 $val1=$_POST['v15'];
 $val2=$_POST['v16'];
 $val3=$_POST['v17'];
 $val4=$_POST['v18'];
 $val5=$_POST['v19'];
 $val6=$_POST['v20'];
 $val7=$_POST['v21'];
 $val8=$_POST['v22'];
 $val9=$_POST['v23'];
 $val10=$_POST['v24'];
 $val11=$_POST['v25'];
 $val12=$_POST['v26'];

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

if(isset($_POST['id_partida']) && !empty($_POST['id_partida'])){
    $id_partida = $_POST['id_partida'];
    header('Location: ../../settings/table/view_partida.php?id='.$id_partida);
}else{
    header('Location: ../../zone.php');
}
?>
