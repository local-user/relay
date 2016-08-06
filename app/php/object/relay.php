<?php namespace relay\module; ?>
<?php class relay {




    /** var - invalid(s) **/
    private $invalid_relays = array(
        '.',
        '..'
    );




    /** create **/
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


    /** delete **/
    public function delete() {

        // check(s)
        if( ! isset($_POST['name'])       ){ throw new \exception("Missing required argument 'name'");  }
        if( ! ctype_alnum($_POST['name']) ){ throw new \exception("Invalid argument 'name'");           }

        // ? - already - deleted
        if( ! is_dir(DIR_RELAY."/".$_POST['name']) ){
            return true;
        }

        // delete
        rmdir(DIR_RELAY."/".$_POST['name']);

        // ? - error - delete
        if(is_dir(DIR_RELAY."/".$_POST['name']) ){
            throw new \exception("Unable to delete relay");
        }

        // return
        return true;

    }


    /** get **/
    public function get() {
                $relays = scandir(DIR_RELAY);
                $relays = array_diff($relays, $this->invalid_relays);
                $relays = array_values($relays);
        return  $relays;
    }




} ?>
<?php $object = new relay(); ?>
