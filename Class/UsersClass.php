
<?php 

class Class_UserClass{
        private $_paterno;
        private $_materno;
        private $_nombres;
        private $_dni;
        private $_sexo;
        private $_direccion;
        private $_email;
        private $_telefono;
        private $_celular;
        private  $_usuario;
        private $_password;
        private $_userPhoto;


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
        public function  addUser(){
          $objDataBase = new Cpu_DataBase();
            $sql = "CALL ecart_add_ecart_customersr('".$this->_paterno."','".$this->_materno."','".$this->_nombres."',".$this->_dni.",'".$this->_sexo."','".
                    $this->_direccion."','".$this->_email."','".$this->_telefono."','".$this->_celular."','".$this->_usuario."','".$this->_password."','".$this->_userPhoto."')";
            return $objDataBase->executeUpdateStoreProcedure($sql);
        }

        public function  changeUser(){
        $objDataBase = new Cpu_DataBase();

        }

        public function  uploadedPhoto($image){
            $imageName = $image['name'];
            $size = $image['size'];
            $tmpName = $image['tmp_name'];
            if(move_uploaded_file($tmpName, 'Public/Images/Company/'.$imageName)){
                return true;
            }
            else{
                return false;
            }
        }
}
?>


