<?php
/*
private $_dni;
private $_sexo;
private $_direccion;
private $_email;
private $_telefono;
private $_celular;
private  $_usuario;
private $_password;
 *  */
require_once('Components/Config.conf');
include 'Class/UsersClass.php';
$objUserClass = new Class_UserClass();
$objUserClass->setPaterno($_POST['firsName']);
$objUserClass->setMaterno($_POST['lastName']);
$objUserClass->setNombres($_POST['staffNames']);
$objUserClass->setDni($_POST['dni']);
$objUserClass->setSexo($_POST['sexo']);
$objUserClass->setDireccion($_POST['address']);
$objUserClass->setEmail($_POST['email']);
$objUserClass->setTelefono($_POST['phone']);
$objUserClass->setCelular($_POST['celular']);
$objUserClass->setUsuario($_POST['userName']);
$objUserClass->setPassword($_POST['userPassword']);
$objUserClass->setUserPhoto($_POST['userName']);


    if($objUserClass->addUser()>0){
    if($_FILES["photo"]["type"]=="image/jpeg")
                {
                    //subimor la foto
                    $foto=$_POST["userName"].".jpg";
                      copy($_FILES["photo"]["tmp_name"],"Imagenes/User/$foto");
                }
        header ("Location:index.php?m=1");
    }else{
        echo 'Ya existen estos datos...';
    }
?>