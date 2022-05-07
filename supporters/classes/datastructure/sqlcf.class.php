<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace DataStructure;

    #uns#


/**
 * SQL condition format.
 */
    class SqlCF extends BinaryCF  {

        # use traits
        #ut#

        public function __construct(){
            #code...
        }

        /**
         * Represents the in operation in SQL.  
         * Ensure that the type of data in the rhs is the same
         * @param string $lhs
         * @param array $rhs
         * 
         * @return \DataStructure\SqlCF
         */
        public function in(string $lhs, array $rhs){
            $concat = $this->commaSeparate($rhs);
            $this->parsed[] = "$lhs IN ($concat)";

            return $this;
        }

        /**
         * SQL NOT IN operator
         * @param mixed $lhs
         * @param array $rhs
         * 
         * @return \DataStructure\SqlCF
         */
        public function notIn($lhs, array $rhs){
            $concat = $this->commaSeparate($rhs);
            $this->parsed[] = "$lhs NOT IN ($concat)";

            return $this;
        }

        /**
         * concatenates an array
         * @param array $val
         * 
         * @return string
         */
        private function commaSeparate(array $val){
            return implode(",", $val);
        }

        
        /**
         * The SQL Between operator
         * @param mixed $lhs - subject 
         * @param mixed $rhs1 - first value
         * @param mixed $rhs2 - second value
         * 
         * @return \DataStructure\SqlCF
         */
        public function between($lhs, $rhs1, $rhs2){
            $this->parsed[] = "$lhs BETWEEN $rhs1 AND $rhs2";
            return $this;
        }

        /**
         * The SQL Not Between operator
         * @param mixed $lhs - subject 
         * @param mixed $rhs1 - first value
         * @param mixed $rhs2 - second value
         * 
         * @return \DataStructure\SqlCF
         */
        public function notBetween($lhs, $rhs1, $rhs2){
            $this->parsed[] = "$lhs NOT BETWEEN $rhs1 AND $rhs2";
            return $this;
        }


    }

?>