<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace EngineClient;

    use Engine\EngineInterface;
    #uns#


    class DbManager  implements EngineClientInterface {

        private EngineInterface $engine;

        # use traits
        #ut#

        public function __construct(){
            #code...
        }
    
		public function setEngine(EngineInterface $engine){
			$this->engine = $engine;
		}
	}

?>