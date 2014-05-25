<?php
session_start();
class Class_LoginClass{
private $_name;
private $_password;   
public function __call($name, $arguments) {
        $methodType = substr($name, 0,3);
        $attribName  = substr($name, 3,  strlen($name));
        $attribName = strtolower($attribName[0]).substr($attribName, 1,
                      strlen($name));
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
    public function registrarUser(){
   $objDataBase = new Cpu_DataBase();
   $sql="CALL ecart_validate_Customers('".$this->_name."','".$this->_password."')";
        return $objDataBase->executeQueryStoreProcedure($sql);
}
}
?>