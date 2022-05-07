<?php
    # Comments with #...# are required by `zas` for code insertion. Do not remove nor modify them!

    namespace Engine\Specification;

    use DataStructure\AbstractConditionFormat;

    #uns#


    interface DatabaseEngineSpecInterface  {
         
        /**
         * @param string $container - container name (table for example)
         * @param array $columns - columns to select
         * @param AbstractConditionFormat $condition - the condition for the query
         * @param array $conditionValues - array condition values (if prepared statement is used)
         * @param array $options - options for the underlying engine if any
         * 
         * @return array
         */
        public function query(string $container, array $columns, AbstractConditionFormat $condition, array $conditionValues, array $options);

       
        /**
         * @param string $container - container name (table for example)
         * @param array $columns - columns to insert
         * @param array $values - values to insert
         * 
         * @return mixed
         */
        public function insert(string $container, array $columns, array $values);
        
        
        /**
         * @param string $container - container name (table for example)
         * @param array $columns - columns to deleted. 
         * > Note: You delete the whole row for SQL databases
         * @param AbstractConditionFormat $condition - the condition for the deletion
         * @param array $conditionValues - values (if any, mainly when you are using prepared statements)
         * 
         * @return bool
         */
        public function delete(string $container, array $columns, AbstractConditionFormat $condition, array $conditionValues);

        
        /**
         * @param string $container - container name (table for example)
         * @param array $columns - columns to updated
         * @param array $newColValues - new columns value (order sensitive)
         * @param AbstractConditionFormat $condition - condition for update
         * @param array $conditionValues - condition value if any (mainly for prepared statements)
         * 
         * @return bool
         */
        public function update(string $container, array $columns, array $newColValues, AbstractConditionFormat $condition, array $conditionValues);
    }

?>