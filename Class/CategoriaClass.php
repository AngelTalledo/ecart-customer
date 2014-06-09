<?php 

class Class_CategoriaClass{
    private $_nombreTipoProducto;
    private $_idMarca;
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

    public function getIdCategoria(){
        $objDataBase = new Cpu_DataBase();
        $sql= "CALL ecart_getListAllMarca(1);";
        return $objDataBase->executeQueryStoreProcedure($sql);
    }
    public function getFkCategoria($idMarca){
        $objDataBase = new Cpu_DataBase();
        $sql = "CALL ecart_getModoloMarca(".$idMarca.",1);";
        return $objDataBase->executeQueryStoreProcedure($sql);
    }
}

?>