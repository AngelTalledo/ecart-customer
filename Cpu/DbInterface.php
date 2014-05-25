<?PHP

	interface Cpu_DbInterface
	{

		public function connect();
		public function executeQueryStoreProcedure($sql);
                public function executeUpdateStoreProcedure($sql);
		
	}