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
    private $request_module = null;
    private $request_method = null;

    /** var(s) - valid **/
    private $valid_modules = array(
        'create',
        'delete',
        'index'
    );




    /** __ - construct **/
    public function __construct() {
        $this->detect_module();
        $this->detect_method();
        $this->exec();
    }

    /** __ - destruct **/
    public function __destruct() {
        $this->display_json();
    }




    /** detect - module **/
    private function detect_module($module = null) {
        if(isset($_GET['module']))  { 
            $module = $_GET['module'];
                unset($_GET['module']);
        }
        if(isset($_POST['module'])) {
            $module = $_POST['module'];
                unset($_POST['module']);
        }
        if(in_array($module, $this->valid_modules)) {
            $this->request_module = $module;
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
        $module = $this->request_module;
        $method = $this->request_method;
        if( ! $module ){
            throw new \exception('Invalid module');
        }
        if( ! $method ){
            throw new \exception('Invalid method');
        }
        if(   file_exists(__DIR__.'/module/'.$module.'.php')) {
            require_once(__DIR__.'/module/'.$module.'.php');
        } else {
            throw new \exception('Module not found');
        }
        if( ! method_exists($object, $method)) {
            throw new \exception('Method not found');
        }
        return $object->$method();
    }




    /** init - dir **/
    private function init_dir() {
        if( ! is_dir(DIR_RELAY)      ){ throw new \exception("System relay directory '".DIR_RELAY."' could not be found"); }
        if( ! is_writable(DIR_RELAY) ){ throw new \exception("System relay directory '".DIR_RELAY."' is not writeable");   }
        return true;
    }




} ?>
