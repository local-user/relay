<?php namespace relay; ?>
<?php




    define('DIR_APP',       realpath(__DIR__.'/../'));
    define('DIR_RELAYS',    '/tmp/relay');

    define('FLAG_DEBUG',    true);




?>
<?php class api {




    /** var(s) - response **/
    private $response_code = 000;
    private $response_data = array();

    /** var(s) - request **/
    private $request_object = null;
    private $request_method = null;

    /** var(s) - valid **/
    private $valid_objects = array(
        'file',
        'files',
        'relay'
    );




    /** | __ **/

        public function __construct() {
            if( $this->check_args() ){
                $this->detect_object();
                $this->detect_method();
                $this->exec();
                return true;
            } else {
                $this->response_code = 400;
                $this->response_data = array(
                    'message' => 'bad arguments'
                );
                return false;
            }
        }

        /** __ - destruct **/
        public function __destruct() {
            $this->display_json();
            return true;
        }

    /** __ | **/




    /** | check **/

        private function check_args() {
            foreach( $_GET as $key => $value ){
                if( ! ctype_alnum($value) ){
                    return false;
                }
            }
            return true;
        }

    /** check | **/




    /** | detect **/

        private function detect_object($object = null) {
            if( isset($_GET['object']) ){ 
                $object = $_GET['object'];
                    unset($_GET['object']);
            }
            if( in_array($object, $this->valid_objects) ){
                $this->request_object = $object;
                return true;
            } else {
                return false;
            }
        }

        private function detect_method($method = null) {
            if( isset($_GET['method']) ){
                $method = $_GET['method'];
                    unset($_GET['method']);
            }
            if( $method ){
                $this->request_method = $method;
                return true;
            } else {
                return false;
            }
        }

    /** detect | **/




    /** | display **/

        private function display_json() {
            header('Content-Type: application/json');
            http_response_code($this->response_code);
            echo json_encode($this->response_data);
            return true;
        }

    /** display | **/




    /** | exec **/

        private function exec() {
            try {
                $this->init_dir();
                $this->response_code = 200;
                $this->response_data = array(
                    $this->exec_request()
                );
                return true;
            } catch(\exception $e) {
                if(FLAG_DEBUG){ print_r($e); }
                $this->response_code = 500;
                $this->response_data = array(
                    'message' => $e->getMessage()
                );
                return false;
            }
        }

        private function exec_request() {
            $object = $this->request_object;
            $method = $this->request_method;
            if( ! $object ){
                throw new \exception('Invalid object');
            }
            if( ! $method ){
                throw new \exception('Invalid method');
            }
            if(  file_exists(__DIR__.'/object/'.$object.'.php')) {
                require_once(__DIR__.'/object/'.$object.'.php');
            } else {
                throw new \exception('object not found');
            }
            if( ! method_exists($object, $method)) {
                throw new \exception('Method not found');
            }
            return $object->$method();
        }

    /** exec | **/




    /** | init **/

        private function init_dir() {
            if( ! is_dir(DIR_RELAYS)      ){ mkdir(DIR_RELAYS);                                                                  }
            if( ! is_dir(DIR_RELAYS)      ){ throw new \exception("System relay directory '".DIR_RELAYS."' could not be found"); }
            if( ! is_writable(DIR_RELAYS) ){ throw new \exception("System relay directory '".DIR_RELAYS."' is not writeable");   }
            return true;
        }

    /** init | **/




}?>
