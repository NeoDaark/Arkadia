<?php
require_once('../Classes/Partida.php');
session_start();
if(isset($_SESSION['user'])){
    $id_partida=$_POST['id'];
    $diario = $_POST['datos'];
    $partida= new Partida();  
    $partida->modDiario($id_partida, $diario);
}

