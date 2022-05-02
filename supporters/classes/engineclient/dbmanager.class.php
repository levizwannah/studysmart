<?php
    // Comments with #.# are required by `zas` for code insertion.

    namespace EngineClient;

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

        public function query(array $params)
        {
            return $this->engine->query($params);
        }

        public function update(array $params)
        {
            return $this->engine->update($params);
        }

        public function insert(array $params)
        {
            return $this->engine->insert($params);
        }

        public function delete(array $params)
        {
            return $this->engine->delete($params);
        }
    }

?>