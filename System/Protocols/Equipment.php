<?php
$id_personaje=$_POST['id_personaje'];
$id_partida=$_POST['id_partida'];
$arma = $_POST['armas'];
$armadura=$_POST['armadura'];
if (isset($_POST['armas'])){
        require_once "../Classes/Personaje_Objeto.php";
        $perObj=new Personaje_Objeto($id_personaje, $arma);
        $perObj->add();
}
if (isset($_POST['armadura'])){
        require_once "../Classes/Personaje_Objeto.php";
        $perObj=new Personaje_Objeto($id_personaje, $armadura);
        $perObj->add();
}

require_once "../../System/Classes/Objeto_Caracteristica.php";
$objCar=new Objeto_Caracteristica();
$objCar=$objCar->selectArma($arma);
foreach ($objCar as $objCar){
    $valor=$objCar->getValor();
}
$objCar=$objCar->selectArmadura($armadura);
foreach ($objCar as $objCar){
    $valor2=$objCar->getValor();
}
echo $valor;
echo $valor2;

require_once "../../System/Classes/Personaje.php";
$personaje=new Personaje();
$personaje=$personaje->modDanyoTA($id_personaje, $valor, $valor2);
header('Location: ../../settings/character/view_personaje.php?id_personaje='.$id_personaje.'&id_partida='.$id_partida.'');
?>