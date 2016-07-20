<?php namespace relay\module; ?>
<?php class index {




    /** var - invalid(s) **/
    private $invalid_relays = array(
        '.',
        '..'
    );




    /** __ - construct **/
    public function __construct() {
        $this->init_dir();
    }

    /** __ - destruct **/
    public function __destruct() {
    }




    /** init - dir **/
    private function init_dir() {
        if( ! is_dir(DIR_RELAY)      ){ throw new \exception("System relay directory '".DIR_RELAY."' could not be found"); }
        if( ! is_writable(DIR_RELAY) ){ throw new \exception("System relay directory '".DIR_RELAY."' is not writeable");   }
        return true;
    }




    /** list - **/
    public function all() {
                $relays = scandir(DIR_RELAY);
                $relays = array_diff($relays, $this->invalid_relays);
                $relays = array_values($relays);
        return  $relays;
    }




} ?>
<?php $object = new index(); ?>
