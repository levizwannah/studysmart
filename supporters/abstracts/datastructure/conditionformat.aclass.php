<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace DataStructure;

    #uns#


    abstract class AbstractConditionFormat   {

        protected array $parsed;

        # use traits
        #ut#

        public function __construct(){
            
        }

        /**
         * returns the formatted condition string
         * @return string
        */
        abstract public function output();
    }

?>