<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace Engine;

    use \PDO;
    #uns#


    abstract class AbstractSqlEngine  implements DatabaseEngineInterface {

        protected   string $driver;
        protected   string $dbHost;
        protected   string $dbPort;
        protected   string $dbName;
        protected   bool   $withOption;
                    
        # use traits
        #ut#

        /**
         * Constants for drivers
         */
        const DRIVER_MYSQL = "mysql";

        public function __construct(){
            $this->withOption = false;
        }

        /**
         * Creates a PDO connection
         * @return void
         */
        public function connect(){
            $user = "root";
			$pass = "";
			$dsn = "$this->driver:host=$this->dbHost;port=$this->dbPort;dbname=$this->dbName";
			$options = [];

			if(!$this->withOptions){
				$options = [ 
					PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES => false
			];
			}

			try {
				$this->dbConnection = new \PDO(
					$dsn,
					$user,
					$pass, 
					$options
				);
			} 
			catch (\PDOException $e) {
				echo $e->getMessage(). " Error occured while creating connection\n";
				exit($e->getMessage());
			}
        }
    
		abstract public function query(array $params);

		abstract public function insert(array $params);

		abstract public function delete(array $params);

		abstract public function update(array $params);
	}

?>