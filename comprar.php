<?php
/**
 * Created by PhpStorm.
 * User: ANGEL
 * Date: 20/06/14
 * Time: 12:31 PM
 */
session_start();
    include_once("Class/PedidoClass.php");

    if(!isset($_SESSION['pkCustomers'])){
     ?>
        <script style="text/javascript">
            alert("Iniciar sesion para comprar!!");
                location.href="./login.php?n=2";
        </script>
    <?php
    }else{
        $arreglo=$_SESSION['carrito'];
        $total=0;
        $fkUsuario = $_SESSION['pkCustomers'];
        $pkPedido = 0;
        for($i=0; $i<count($arreglo); $i++){
            $total=($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])+$total;
        }
        $objPedido = new Class_PedidoClass();
        $objPedido->addPedido($fkUsuario,$total);
        $row=$objPedido->getPkPedido($fkUsuario);
        while($f = $row->fetch_array()){
            $pkPedido= $f['IdPedido'];
        }
        for($y=0; $y<count($arreglo);$y++){
            $objPedido->addDetalle($pkPedido,$arreglo[$y]['Id'],$arreglo[$y]['Cantidad'],($arreglo[$y]['Precio']*$arreglo[$y]['Cantidad']));

        }
        unset($_SESSION['carrito']);
        header("Location: Index.php");
    }
