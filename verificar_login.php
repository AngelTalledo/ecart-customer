<?php
require_once('Components/Config.conf');
include 'Class/LoginClass.php';
$objLoginClass = new Class_LoginClass();

$objLoginClass->setName($_POST['name']);
$objLoginClass->setPassword($_POST['password']);
$result = $objLoginClass->registrarUser();
$row = $result->fetch_array();
if(count($row )>0){
    $_SESSION['usuario']=$row['pkCustomers'];
    header("Location:index.php");
}else{
echo 'contraseña incorrecta';
return;
}
 /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
