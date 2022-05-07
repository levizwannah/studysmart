<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace DataStructure\Factory;

    use DataStructure\AbstractConditionFormat;
    use DataStructure\SqlCF;
    use GlobalConstants;

    #uns#


/**
 * Returns a condition format
 */
    class CFFactory   {

        # use traits
        #ut#

        private function __construct(){}

        public function getCF(string $type): AbstractConditionFormat{
            switch($type){
                case GlobalConstants::TXT_SQL:
                    {
                        return new SqlCF();
                    }
                default:
                    {
                        return new SqlCF();
                    }
            }
        }
    }

?>