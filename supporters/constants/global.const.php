<?php
    // Comments with #.# are required by `zas` for code insertion.

    

    #uns#

    class GlobalConstants {

        # const ...
        /**
         * Database constants
         */
        const   TXT_SQL = "sql",
                TXT_MYSQl = "mysql";

        /** 
         * Constructor kept private so that no instance of this class can be created.
         */
        private function __construct(){}
    }

?>