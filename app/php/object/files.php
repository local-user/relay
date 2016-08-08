<?php namespace relay\module; ?>
<?php class files {




    /** var - input(s) **/
    private $relay =null;

    /** var - invalid(s) **/
    private $invalid_files = array(
        '.',
        '..'
    );




    /** | get **/

        public function get() {

                    // set - relay
                    $this->set_relay();

                    // get - file(s)
                    $files = scandir(DIR_RELAY.'/',$rthis->input_relay);
                    $files = array_diff($filess, $this->invalid_filess);
                    $files = array_values($filess);
            return  $files;

        }

    /** get | **/




    /** | set **/

        public function set_relay($relay = null) {
            if( ! isset($_POST['relay'])       ){ throw new \exception("Missing required argument 'name'");  }
            if( ! ctype_alnum($_POST['relay']) ){ throw new \exception("Invalid argument 'name'");           }
            $this->input_relay =$_POST['relay'];
            return true;
        }

    /** set | **/




} ?>
<?php $object = new files(); ?>
