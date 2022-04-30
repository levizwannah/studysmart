<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace Engine;

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
		 * @param array $params - should be [string $table, array $columns, string $conditionString, array $conditionValues, bool $addTicks = true, bool $fetchAll = false]
		 * 
		 * @return mixed
		 */
		public function query(array $params){
			return $this->doQuery(...$params);
		}

		
		/**
		 * @param array $params - should be [string $table, array $columns, array $values]
		 * 
		 * @return int
		 */
		public function insert(array $params){
			return $this->doInsert(...$params);
		}

		/**
		 * @param array $params - should be [string $table, string $conditionString, array $conditionValues]
		 * 
		 * @return bool
		 */
		public function delete(array $params){
			return $this->doDelete(...$params);
		}

		/**
		 * @param array $params - [string $table, string $columnsString, array $values, string $conditionString, string $conditionValues]
		 * 
		 * @return bool
		 */
		public function update(array $params){
			return $this->doUpdate(...$params);
		}

		
		/**
		 * querys the mysql database
		 * @param string $table
		 * @param array $columns
		 * @param string $conditionString
		 * @param array $conditionValues
		 * @param bool $addTicks
		 * @param bool $fetchAll
		 * 
		 * @return mixed
		 */
		private function doQuery(string $table, array $columns, string $conditionString, array $conditionValues, bool $addTicks = true, bool $fetchAll = false) {
			$this->connect();

			if($addTicks === true){
				$table = "`$table`";
			}

			$sql = "SELECT " . implode (", ", $columns) ." from $table where $conditionString";

				$stmt = $this->dbConnection->prepare($sql);
				if($stmt->execute($conditionValues)){
					$result = ($this->fetchAll || $fetchAll)? $stmt->fetchAll() : $stmt->fetch();
					$return = $result;
				}
				else{
					$return = false;
				}
				return $return;
		}

		/**
		 *
		 * @param string $table 
		 * @param array $columns 
		 * @param array $values 
		 *
		 * @return int
		 */
		private function doInsert(string $table, array $columns, array $values) {
			$sql = "INSERT INTO `$table`(". implode(", ",$columns). ") values (". $this->buildInsertPlaceholders(count($values)) .")";
			
			$this->connect();
			$statement = $this->dbConnection->prepare($sql);
			$newRowId = -1;

			if($statement->execute($values)){
				$newRowId = $this->dbConnection->lastInsertId();
			}
			
			return $newRowId;
		}

		
		/**
		 * @param string $table
		 * @param string $conditionString
		 * @param array $conditionValues
		 * 
		 * @return bool
		 */
		private function doDelete(string $table, string $conditionString, array $conditionValues) {
			$this->connect();
			$sql = "DELETE from `$table` where $conditionString";
			$stmt = $this->dbConnection->prepare($sql);
			$this->currentStatement = $stmt;
			if($stmt->execute($conditionValues)){
				return true;
			}
			return false;
		}

		/**
		 * @param string $table
		 * @param string $columnsString
		 * @param array $values
		 * @param string $conditionString
		 * @param string $conditionValues
		 * 
		 * @return bool
		 */
		private function doUpdate(string $table, string $columnsString, array $values, string $conditionString, string $conditionValues) {
			$this->connect();
	
			$sql = "UPDATE `$table` set $columnsString where $conditionString";
	
				$stmt = $this->dbConnection->prepare($sql);
				$this->currentStatement = $stmt;
				$combinedValues = array_merge($values, $conditionValues);
				if($stmt->execute($combinedValues)){
					return true;
				}
				return false;
		}
		/**
		 * @param int $number
		 * Creates the place holder string
		 */
		private function buildInsertPlaceholders(int $number){
			$placeholders = str_repeat("?,", $number);
			return substr($placeholders, 0, strlen($placeholders) - 1);
		}


	}

?>