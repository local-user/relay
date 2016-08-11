<?php namespace relay\module; ?>
<?php class     relay {




    /** var - global(s)) **/
    private $relay = null;

    /** var - invalid(s) **/
    private $invalid_files = array(
        '.',
        '..'
    );




    /** | __ **/

        public function __construct() {
            if( isset($_GET['relay']) ){ $this->relay = $_GET['relay']; }
        }

    /** **| **/




    /** | create **/

        public function create() {

            // var - list
            $relay = DIR_RELAYS.'/'.$this->relay;

            // check(s) **/
            if( ! $this->relay                  ){ throw new \exception('invalid relay');           }
            if(   is_dir($relay)                ){ return true;                                     }
            if( ! is_writeable(dirname($relay)) ){ throw new \exception('directory not writeable'); }

            // return
            return mkdir($relay);

        }

    /** create | **/




    /** | list **/

        public function files() {

                        // var - list/relay
                        $list  = array();
                        $relay = DIR_RELAYS.'/'.$this->relay;

                        // ? - check(s)
                        if( ! $this->relay   ){ throw new \exception('invalid relay'); }
                        if( ! is_dir($relay) ){ $this->create();                       }

                        // prepare - relay - files
                        $files = scandir($relay);
                        $files = array_diff($files, $this->invalid_files);
                        $files = array_values($files);
                natsort($files);

                // prepare- file(s) - extra
                foreach($files as $file){
                    $list[] = array(
                        'filename'      => $file,
                        'date_modified' => date ("H:i:s - d-m-Y", filemtime($relay.'/'.$file))
                    );
                }

            // return
            return  $list;

        }

    /** list | **/




} ?>
<?php $object = new relay(); ?>
