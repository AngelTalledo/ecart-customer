<?PHP

class Cpu_Mysql implements Cpu_DbInterface
{
	
	private $_database;
        public $_affectedRows;
        
	/**
         * 
         * @return type objmysqli
         */
	public function connect()
	{

	$this->_database = new mysqli(Cpu_Config::get('hostDataBase'),Cpu_Config::get('userDataBase'),Cpu_Config::get('passwordDataBase'),Cpu_Config::get('nameDataBase'));
        //die("Clase database1 ".Cpu_Config::get('hostDataBase')."--".Cpu_Config::get('userDataBase')."--".Cpu_Config::get('passwordDataBase')."-".Cpu_Config::get('nameDataBase'));
      
	if(mysqli_connect_errno())
			die('Error de conexion con Base de Datos');
	
	return $this->_database;
		
	}
	
	public function executeQueryStoreProcedure($sql)
	{
		$result =  $this->_database->query($sql);
                $this->_affectedRows = $this->_database->affected_rows;
                return  $result;
		
	}
        public function executeUpdateStoreProcedure($sql) {
            
            $this->_database->query($sql);
            $this->_affectedRows = $this->_database->affected_rows;
            return $this->_affectedRows;
            
        }
        

}