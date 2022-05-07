<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace DataStructure;

    #uns#


    class BinaryCF extends UnaryCF  {

        # use traits
        #ut#

        public function __construct(){
            #code...
        }

        /**
         * Represents the AND condition between two or more Unary CF
         * @param array<UnaryCf> $unaryCfs - when present, will be evaluated and considered for ANDing.
         * 
         * @return \DataStructure\BinaryCF
         */
        public function and(array $unaryCfs = []){
            $this->parsed = [$this->parseUnaryCfs($unaryCfs)->format("AND")];
            return $this;
        }

        /**
         * @param array<UnaryCf> $unaryCfs - when present, will be evaluated and considered for ORing.
         * 
         * @return \DataStructure\BinaryCF
         */
        public function or(array $unaryCfs = []){
            $this->parsed = [$this->parseUnaryCfs($unaryCfs)->format("OR")];
            return $this;
        }

        /**
         * @param mixed $operator - format the binary strings
         * 
         * @return string
         */
        protected function format($operator){
            $val = "";
            
            $count = count($this->parsed);
            
            for($i = 0; $i < $count; $i++){
                
                if($i == 0){
                    $val .= $this->parsed[$i];
                    continue;
                }
                
                $val = "($val $operator ".$this->parsed[$i] . ")";

            }
            
            return $val;
        }

        /**
         * Add the result of unaryCfs to parsed
         * @param array<UnaryCF> $unaryCf
         * 
         * @return \DataStructure\BinaryCF
         */
        protected function parseUnaryCfs(array $unaryCf){
            
            foreach($unaryCf as $uni){
                if($uni instanceof UnaryCF){
                    $this->parsed[] = $uni->output();
                }
            }

            return $this;
        }

    }

?>