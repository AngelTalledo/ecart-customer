<?PHP

/**
 * Clase Config
 * @package clase1
 * @author Jose Lee
 * @copyright 2010
 * @version 1.0
 * @access public
 */
class Cpu_Config {

    /**
     * Obtener elemento del arreglo config
     *
     * @param string $nameOfArray nombre del elemento del arreglo
     * @return string
     */
    public static function get( $nameOfArray ) {

        global $config;

        if( empty($nameOfArray) or empty($config[$nameOfArray])  )
           die('nombre de variable ('.$nameOfArray.') no existe');
        else return $config[$nameOfArray];


    }

}