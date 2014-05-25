<?PHP
/**
 * Description of Session
 * Esta Clase Maneja Todas Mi Sessiones.
 * @author SPENCER
 */
class Cpu_Session {
    //put your code here

    /**
     * Obtiene una variable enviada por el arreglo SESSION.
     * @param type $key: nombre de la Session
     * @param type $value: Valor asignar a la Session
     */
    public static function session($key,$value){
        if(is_null($key))
            die('El valor para la clave de la session  no Puede ser nula.');
        else{
            $_SESSION[$key] = $value;
        }
    }
    /**
     * Setea una variable del arreglo SESSION.
     * @param type $key:nombre de la Variable
     * @return type String
     */
    public static  function  getSession($key){
        if(is_null($key))
            die('El valor para la clave de la session  no Puede ser nula.');
        else {
          return  $_SESSION[$key];
        }
    }
    /**
     * Destruye la Sessiones Actuales
     */
    public static  function destroy(){
        session_destroy();
    }
    /**
     * Inicializa la Session
     */
    public static function startSession(){
        session_start();
    }
}

