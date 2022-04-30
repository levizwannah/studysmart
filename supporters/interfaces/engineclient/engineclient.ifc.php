<?php
    # Comments with #...# are required by `zas` for code insertion. Do not remove nor modify them!

    namespace EngineClient;

    use Engine\EngineInterface;
    #uns#


    interface EngineClientInterface  {
        /**
         * Sets the engine of the engine client
         * @param EngineInterface $engine
         * 
         * @return void
         */
        public function setEngine(EngineInterface $engine);
    }

?>