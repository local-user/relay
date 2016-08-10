<?php namespace relay\module; ?>
<?php class files {




    /** var - input(s) **/
    private $input_relay = null;

    /** var - invalid(s) **/
    private $invalid_files = array(
        '.',
        '..'
    );




    /** | list **/

        public function list() {
                    $this->set_input_relay();
                    $list  = array();
                    $relay = DIR_RELAY.'/'.$this->input_relay;
                    $files = scandir(DIR_RELAY.'/'.$this->input_relay);
                    $files = array_diff($files, $this->invalid_files);
                    $files = array_values($files);
            foreach($files as $file){
                $list[] = array(
                    'filename'      => $file,
                    'date_modified' => filemtime($relay.'/'.$file)
                );
            }
            return  $list;
        }

    /** list | **/




    /** | set **/

        public function set_input_relay() {
            if( ! isset($_GET['relay'])                ){ throw new \exception("Invalid argument 'relay'"); }
            if( ! ctype_alnum($_GET['relay'])          ){ throw new \exception("Invalid argument 'relay'"); }
            if( ! is_dir(DIR_RELAY.'/'.$_GET['relay']) ){ throw new \exception("Invalid argument 'relay'"); }
            $this->input_relay = $_GET['relay'];
            return true;
        }

    /** set | **/




} ?>
<?php $object = new files(); ?>
