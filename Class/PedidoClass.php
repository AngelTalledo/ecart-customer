<?php
/**
 * Created by PhpStorm.
 * User: ANGEL
 * Date: 20/06/14
 * Time: 11:14 AM
 */

require_once('Components/Config.conf');
class  Class_PedidoClass{

    private $_idPedido;
    private $_fkCustomers;
    private $_fechaPedido;
    private $_totalPedido;
    private $_fechaRegistro;
    private $_estadoRegistro;
    private $_idDetallePedido;
    private $_idProducto;
    private $_cantidad;
    private $_subtotal;

    public function __call($name, $arguments) {
        $methodType = substr($name, 0,3);
        $attribName  = substr($name, 3,  strlen($name));
        $attribName = strtolower($attribName[0]).substr($attribName, 1,strlen($name));
        $attribName = '_'.$attribName;

        switch ($methodType){
            case 'set':
                $this->$attribName = $arguments[0];
                break;
            case 'get':
                return $this->$attribName;
                break;
            default:
                die("Metodo  Incorrecto");
                break;
        }
    }

    public function addPedido($fkCustumers,$total){
        $objDataBase = new Cpu_DataBase();
        $sql="CALL ecart_add_pedido(".$fkCustumers.",".$total.");";
        return $objDataBase->executeUpdateStoreProcedure($sql);
    }
    public  function getPkPedido($fkCustumers){
        $objDataBase = new Cpu_DataBase();
        $sql="CALL ecart_getPkPedido(".$fkCustumers.")";
        return $objDataBase->executeQueryStoreProcedure($sql);
    }
    public function addDetalle($fkPedido,$fkProducto,$cantidad,$subtotal){
        $objDataBase = new Cpu_DataBase();
        $sql="CALL ecart_addDetallePedido(".$fkPedido.",".$fkProducto.",".$cantidad.",".$subtotal.");";
        return $objDataBase->executeUpdateStoreProcedure($sql);
    }
    public  function updateStock($InStock,$InPk){
        $objDataBase = new Cpu_DataBase();
        $sql="CALL ecart_updateStock(".$InStock.",".$InPk.")";
        return $objDataBase->executeUpdateStoreProcedure($sql);
    }
    public function getLisPedido($PkUser){
        $objDataBase = new Cpu_DataBase();
        $sql="CALL ecart_getListPedido(".$PkUser.");";
        return $objDataBase->executeQueryStoreProcedure($sql);
    }
    public function getLisDTP($pkP){
        $objDataBase = new Cpu_DataBase();
        $sql="ecart_getListPedidoDetalle(".$pkP.");";
        return $objDataBase->executeQueryStoreProcedure($sql);
    }
    public function report($idP){
        $objReport = new Cpu_Report('rptOrder','pdf',false);
        $objReport->setParameters(array('IdPedido'=>$idP));
        $objReport->run();
    }

} 