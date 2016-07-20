<?php namespace relay\module; ?>
<?php class index {




    /** var - invalid(s) **/
    private $invalid_relays = array(
        '.',
        '..'
    );




    /** list - **/
    public function all() {
                $relays = scandir(DIR_RELAY);
                $relays = array_diff($relays, $this->invalid_relays);
                $relays = array_values($relays);
        return  $relays;
    }




} ?>
<?php $object = new index(); ?>
