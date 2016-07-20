<?php namespace relay\module; ?>
<?php class delete {




    /** var - invalid(s) **/
    private $invalid_relays = array(
        '.',
        '..'
    );




    /** single **/
    public function single() {

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




} ?>
<?php $object = new delete(); ?>
