<?PHP

class Cpu_DataBase
	{
		private $_database;
		
		public function __construct()
		{
			$dbm = Cpu_Config::get('typeDataBase');
                        $dbm = 'Cpu_'.$dbm;
			$this->_database = new $dbm;		
			return $this->_database->connect();			
			
		}
		public function executeQueryStoreProcedure( $sql )
		{
			return $this->_database->executeQueryStoreProcedure($sql);
		}
		public function executeUpdateStoreProcedure($sql)
                {
                       return  $this->_database->executeUpdateStoreProcedure($sql);
                }
               
	}