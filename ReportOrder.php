<?php
require_once('Class/PedidoClass.php');
$ObjPedido = new Class_PedidoClass();
$idP = $_GET['idP'];
$ObjPedido->report($idP);