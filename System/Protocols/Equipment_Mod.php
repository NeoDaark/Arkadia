<?php
if(isset($_GET['idp'])&& !empty($_GET['idp'])){
    $id_part = $_GET['idp'];
}else{
    $id_part = null;
}
require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];
$id_personaje=$_POST['id_personaje'];
$id_partida=$_POST['id_partida'];
$id_objeto1=$_POST['id_objeto1'];
$id_objeto2=$_POST['id_objeto2'];
echo $arma = $_POST['armas'];
echo $armadura=$_POST['armadura'];
if (isset($_POST['armas'])){
        require_once "../Classes/Personaje_Objeto.php";
        $perObj=new Personaje_Objeto();
        $perObj=$perObj->modPerObj($id_personaje, $id_objeto1, $arma);
}
if (isset($_POST['armadura'])){
        require_once "../Classes/Personaje_Objeto.php";
        $perObj=new Personaje_Objeto();
        $perObj=$perObj->modPerObj($id_personaje, $id_objeto2, $armadura);
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
//si el personaje es teu
$personaje=new Personaje();
$personaje=$personaje->viewPersonaje($id_personaje);
$userPer=$personaje['id_usuario'];

echo $userConectat=$value['id_usuario'];

if(isset($_GET['idp'])&& !empty($_GET['idp'])){
    header('Location: ../../settings/table/view_personaje.php?id_personaje='.$id_personaje.'&id_partida='.$id_part.'');
}else{
    if($userPer==$userConectat){
        header('Location: ../../settings/character/view_personaje.php?id_personaje='.$id_personaje.'&id_partida='.$id_partida.'');
    }else{
        header('Location: ../../settings/table/view_partida.php?id='.$id_partida.'');
    }
}

    }
?>