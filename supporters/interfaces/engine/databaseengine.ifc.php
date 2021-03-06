<?php
    # Comments with #...# are required by `zas` for code insertion. Do not remove nor modify them!

    namespace Engine;

    
	use \Engine\Specification\DatabaseEngineSpecInterface;
	#uns#


/**
 * Holds the specification of a database Engine
 */
    interface DatabaseEngineInterface extends DatabaseEngineSpecInterface, EngineInterface {
        
    }

?>