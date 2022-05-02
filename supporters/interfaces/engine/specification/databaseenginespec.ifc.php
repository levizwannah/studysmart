<?php
    # Comments with #...# are required by `zas` for code insertion. Do not remove nor modify them!

    namespace Engine\Specification;

    #uns#


    interface DatabaseEngineSpecInterface  {
         /**
         * For querying the underlying database
         * @param array $params
         * 
         * @return [type]
         */
        public function query(array $params);

        /**
         * Insert into the underlying database
         * @param array $params
         * 
         * @return [type]
         */
        public function insert(array $params);
        
        /**
         * deletes from the underlying database
         * @param array $params
         * 
         * @return [type]
         */
        public function delete(array $params);

        /**
         * Updates the underlying database data
         * @param array $params
         * 
         * @return [type]
         */
        public function update(array $params);
    }

?>