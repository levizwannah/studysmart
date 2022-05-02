<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace Engine\Factory;

    use Engine\DatabaseEngineInterface;
    use Engine\EngineConstants;
    use Engine\MysqlEngine;
    
    #uns#


    class DBEngineFactory   {

        # use traits
        #ut#

        private function __construct(){
            #code...
        }

        public static function getEngine(string $engineName): DatabaseEngineInterface{

            switch ($engineName){
                case EngineConstants::MYSQL_DB:
                    {
                        return new MysqlEngine();
                    }
            }

            return null;
        }
    }

?>