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

 $val1=$_POST['v15'];
 $val2=$_POST['v16'];
 $val3=$_POST['v17'];
 $val4=$_POST['v18'];
 $val5=$_POST['v19'];
 $val6=$_POST['v20'];
 $val7=$_POST['v21'];
 $val8=$_POST['v22'];

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

    header('Location: ../../admin/');

?>
