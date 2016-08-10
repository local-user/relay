<?php namespace relay\module; ?>
<?php class relay {




    /** global(s) **/
    private $relay          = null;
    private $invalid_relays = array(
        '.',
        '..'
    );




    /** | create **/

        public function create() {

            // check(s)
            if( ! isset($_POST['name'])       ){ throw new \exception("Missing required argument 'name'");  }
            if( ! ctype_alnum($_POST['name']) ){ throw new \exception("Invalid argument 'name'");           }

            // relay
            mkdir(DIR_RELAY."/".$_POST['name']);

            // ? - error
            if( ! is_dir(DIR_RELAY."/".$_POST['name']) ){
                throw new \exception("Unable to relay relay");
            }

            // return
            return true;

        }

    /** create | **/


    /** | delete **/

        public function delete() {

            // set - relay
            $this->set_relay();

            // ? - already - deleted
            if( ! is_dir(DIR_RELAY."/".$this->relay) ){ return true;}

            // delete
            rmdir(DIR_RELAY."/".$this->relay);

            // ? - error - delete
            if( is_dir(DIR_RELAY."/".$relay){
                throw new \exception("Unable to delete relay");
            }

            // return
            return true;

        }

    /** delete | **/



    /** | list **/

        public function list() {
                    $relays = scandir(DIR_RELAY);
                    $relays = array_diff($relays, $this->invalid_relays);
                    $relays = array_values($relays);
            return  $relays;
        }

    /** list | **/




    /** | set **/

        public function set_relay($relay = null) {
            if( ! $relay ){
                if( !       isset($_POST['relay']) ){ throw new \exception("Missing required argument 'name'");  }
                if( ! ctype_alnum($_POST['relay']) ){ throw new \exception("Invalid argument 'name'");           }
                         $relay = $_POST['relay'];
            }
            if( ! is_dir(DIR_RELAY.'/'.$relay) ){
                return false;
            }
            $this->relay = $relay;
            return true;
        }

    /** set | **/




} ?>
<?php $object = new relay(); ?>
