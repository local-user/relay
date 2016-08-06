<?php namespace relay; ?>
<?php




    define('DIR_APP',       realpath(__DIR__.'/../'));
    define('DIR_RELAY',     '/tmp/relay');

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
        'relay'
    );




    /** __ - construct **/
    public function __construct() {
        $this->detect_object();
        $this->detect_method();
        $this->exec();
    }

    /** __ - destruct **/
    public function __destruct() {
        $this->display_json();
    }




    /** detect - object **/
    private function detect_object($object = null) {
        if(isset($_GET['object']))  { 
            $object = $_GET['object'];
                unset($_GET['object']);
        }
        if(isset($_POST['object'])) {
            $object = $_POST['object'];
                unset($_POST['object']);
        }
        if(in_array($object, $this->valid_objects)) {
            $this->request_object = $object;
            return true;
        } else {
            return false;
        }
    }


    /** detect - method **/
    private function detect_method($method = null) {
        if(isset($_GET['method']))  {
            $method = $_GET['method'];
                unset($_GET['method']);
        }
        if(isset($_POST['method'])) {
            $method = $_POST['method'];
                unset($_POST['method']);
        }
        if($method) {
            $this->request_method = $method;
            return true;
        } else {
            return false;
        }
    }




    /** display - json **/
    private function display_json() {
        header('Content-Type: application/json');
        http_response_code($this->response_code);
        echo json_encode($this->response_data);
        return true;
    }




    /** exec **/
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

    /** exec - request **/
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




    /** init - dir **/
    private function init_dir() {
        if( ! is_dir(DIR_RELAY)      ){ mkdir(DIR_RELAY);                                                                  }
        if( ! is_dir(DIR_RELAY)      ){ throw new \exception("System relay directory '".DIR_RELAY."' could not be found"); }
        if( ! is_writable(DIR_RELAY) ){ throw new \exception("System relay directory '".DIR_RELAY."' is not writeable");   }
        return true;
    }




}?>
