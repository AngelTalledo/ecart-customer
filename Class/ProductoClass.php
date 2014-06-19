<?php
/**
 * Created by PhpStorm.
 * User: ANGEL
 * Date: 05/06/14
 * Time: 02:45 PM
 */
require_once('Components/Config.conf');
class Class_ProductoClass {

    private $_IdProducto;
    private $_IdTipoProducto;
    private $_idModelo;
    private $_precioCompra;
    private $_precioVenta;
    private $_stock;
    private $_nuevo;
    private $_masVendido;
    private $_descripcionProducto;
    private $_CaracteristicasProducto;
    private $_EspecificacionesProducto;
    private $_fechaRegistro;
    private $_stadoRegistro;

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

    public function getProducto($page,$largo){
       $objDataBase = new Cpu_DataBase();
       $sql="CALL ecart_getListProducto(".$page.",".$largo.")";
       return $objDataBase->executeQueryStoreProcedure($sql);
    }

    public function getSliderProducto(){
        $objDataBase = new Cpu_DataBase();
        $sql="CALL ecart_getSliderProducto()";
        return $objDataBase->executeQueryStoreProcedure($sql);
    }

    public function getListProductoMarca($Marca,$page,$largo){
        $objDataBase = new Cpu_DataBase();
        $sql="CALL ecart_getListProductoMarca(".$Marca.",".$page.",".$largo.")";
        return $objDataBase->executeQueryStoreProcedure($sql);
    }
    public function getCountProducto(){
        $objDataBase = new Cpu_DataBase();
        $sql= "Call ecart_OverallPageProducto();";
        return $objDataBase->executeQueryStoreProcedure($sql);
    }
    public  function getListProductoModelo($Modelo){
        $objDataBase = new Cpu_DataBase();
        $sql= "Call ecart_getListProductoModelo($Modelo);";
        return $objDataBase->executeQueryStoreProcedure($sql);
    }

    public  function getListProductoId($Id){
        $objDataBase = new Cpu_DataBase();
        $sql= "Call ecart_getListProductoId($Id);";
        return $objDataBase->executeQueryStoreProcedure($sql);

    }

}