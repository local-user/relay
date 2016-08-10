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
            if( isset($_GET['relay']) ){ $this->relay = $relay; }
        }

    /** **| **/



    /** | list **/

        public function list() {

                        // var - list
                         $list  = array();

                        // var - relay
                        $relay = DIR_RELAYS.'/'.$this->relay;

                        // prepare - relay - files
                        $files = scandir($relay);
                        $files = array_diff($files, $this->invalid_files);
                        $files = array_values($files);

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
