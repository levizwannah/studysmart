<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace EngineClient;

    use DataStructure\AbstractConditionFormat;
    use Engine\DatabaseEngineInterface;
    use Engine\EngineInterface;

    #uns#


    class DbManager  implements DatabaseEngineClientInterface {

        private DatabaseEngineInterface $engine;
        # use traits
        #ut#

        public function __construct(DatabaseEngineInterface $engine){
            $this->setEngine($engine);
        }

        public function setEngine(EngineInterface $engine)
        {
            $this->engine = $engine;
            return $this;
        }  
    
		public function query(string $container, array $columns, AbstractConditionFormat $condition, array $conditionValues, array $options){
			return $this->engine->query($container, $columns, $condition, $conditionValues, $options);
		}

		public function insert(string $container, array $columns, array $values){
			return $this->engine->insert($container, $columns, $values);
		}

		public function delete(string $container, array $columns, AbstractConditionFormat $condition, array $conditionValues){
			return $this->engine->delete($container, $columns, $condition, $conditionValues);
		}

		public function update(string $container, array $columns, array $newColValues, AbstractConditionFormat $condition, array $conditionValues){
			return $this->engine->update($container, $columns, $newColValues, $condition, $conditionValues);
		}
	}

?>