<?php
require_once('Components/Config.conf');
include 'Class/LoginClass.php';
$objLoginClass = new Class_LoginClass();
$objLoginClass->setName($_POST['name']);
$objLoginClass->setPassword($_POST['password']);
$result = $objLoginClass->registrarUser();
$numRow = $result->num_rows;
$row = $result->fetch_array();
if($numRow > 0){
    $_SESSION['usuario'] = $row['pkCustomers'];
    $_SESSION['US']= $row['customersfNames']." ".$row['firstName']." ".$row['lastName'];
    header("Location:index.php");
}else{
    $_SESSION['error']= 'Contraseña o Usuario Incorrecto';
    echo('error');
    return;
}
/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/
?>
