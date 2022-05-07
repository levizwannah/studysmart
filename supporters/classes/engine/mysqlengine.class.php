<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace Engine;
	use DataStructure\AbstractConditionFormat;

    #uns#


    class MysqlEngine extends AbstractSqlEngine  {

		 # use traits
        #ut#

        public function __construct(){
            parent::__construct();
			$this->driver = AbstractSqlEngine::DRIVER_MYSQL;
			$this->dbHost = "127.0.0.1"; 
			$this->dbPort = "3306";
			$this->dbName   = "study_smart_db";
        }

		/**
		 * @param int $number
		 * Creates the place holder string
		 */
		private function buildInsertPlaceholders(int $number){
			$placeholders = str_repeat("?,", $number);
			return substr($placeholders, 0, strlen($placeholders) - 1);
		}

	

		/**
		 * @param array<string<mixed>> $options; [addTicks=>true, fetchAll = false]
		 */
		public function query(string $container, array $columns, AbstractConditionFormat $condition, array $conditionValues, array $options = ["addTicks"=>true, "fetchAll"=>false]){
			$this->connect();
			$options = (object)$options;

			$addTicks = $options->addTicks ?? true;
			$fetchAll = $options->fetchAll ?? false;

			if($addTicks === true){
				$container = "`$container`";
			}

			$sql = "SELECT " . implode (", ", $columns) ." from $container where ". $condition->output();

			$stmt = $this->connection->prepare($sql);
			$retVal = [];
			if($stmt->execute($conditionValues)){
				$retVal = $fetchAll ? $stmt->fetchAll() : $stmt->fetch();
			}
			$this->disConnect();
			return $retVal;
		}

		public function insert(string $container, array $columns, array $values){
			$sql = "INSERT INTO `$container`(". implode(", ",$columns). ") values (". $this->buildInsertPlaceholders(count($values)) .")";
			
			$this->connect();
			$statement = $this->connection->prepare($sql);
			$retVal = -1;

			if($statement->execute($values)){
				$retVal = $this->connection->lastInsertId();
			}
			
			$this->disConnect();
			return $retVal;
		}

		public function delete(string $container, array $columns, AbstractConditionFormat $condition, array $conditionValues){
			$this->connect();
			$sql = "DELETE from `$container` where " . $condition->output();
			$stmt = $this->connection->prepare($sql);
			$retVal = true;
			if(!$stmt->execute($conditionValues)){
				$retVal = false;
			}

			$this->disConnect();
			return $retVal;
		}

		public function update(string $container, array $columns, array $newColValues, AbstractConditionFormat $condition, array $conditionValues){
			
			$columnsString = "";
			foreach($columns as $col){
				if(!empty($columnsString)) $columnsString .= ",";

				$columnsString .= "$col = ?";
			}

			$this->connect();
			$sql = "UPDATE `$container` set $columnsString where ". $condition->output();
	
			$stmt = $this->connection->prepare($sql);
			$combinedValues = array_merge($newColValues, $conditionValues);
			$retVal = true;

			if(!$stmt->execute($combinedValues)){
				$retVal = false;
			}

			$this->disConnect();
			return $retVal;
		}
	}

?>