<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace DataStructure;

    #uns#


/**
 * Unary condition formatters.
 * Contains the equal and not operator
 */
    class UnaryCF extends AbstractConditionFormat  {

        # use traits
        #ut#

        public function __construct(){
            #code...
        }

        /**
         * Represents and equal to condition (lhs = rhs)
         * @param mixed $lhs - left hand side
         * @param mixed $rhs - right hand side
         * 
         * @return \DataStructure\UnaryCF
         */
        public function equal($lhs, $rhs){
            $this->parsed[] = "$lhs = $rhs";
            return $this;
        }

        /**
         * Represents not equal to condition (lhs != rhs)
         * @param mixed $lhs
         * @param mixed $rhs
         * 
         * @return \DataStructure\UnaryCF
         */
        public function not($lhs, $rhs){
            $this->parsed[] = "$lhs != $rhs";
            return $this;
        }
    
		public function output(){
			return $this->parsed[0];
		}
	}

?>