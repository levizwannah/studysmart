<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace Engine;
    use \PDO;
    #uns#


/**
 * The abstract class for every SQL engine.
 * It uses PDO to connect to the underlying database.
 */
    abstract class AbstractSqlEngine  implements DatabaseEngineInterface {

        protected   string $driver;
        protected   string $dbHost;
        protected   string $dbPort;
        protected   string $dbName;
        protected   bool   $withOption;
        protected   \PDO   $connection;
                    
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
				$this->connection = new \PDO(
					$dsn,
					$user,
					$pass, 
					$options
				);
			} 
			catch (\PDOException $e) {
				echo $e->getMessage(). " Error occurred while creating connection\n";
				exit($e->getMessage());
			}
        }

        /**
         * closes the database connection
         * @return void
         */
        public function disConnect(){
            $this->connection = null;
        }
    }

?>