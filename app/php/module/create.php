<?php namespace relay\module; ?>
<?php class create {




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

        // create
        mkdir(DIR_RELAY."/".$_POST['name']);

        // ? - error
        if( ! is_dir(DIR_RELAY."/".$_POST['name']) ){
            throw new \exception("Unable to create relay");
        }

        // return
        return true;

    }




} ?>
<?php $object = new create(); ?>
