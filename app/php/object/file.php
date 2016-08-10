<?php namespace relay\module; ?>
<?php class file {




    /** var - input(s) **/
    private $input_relay    = null;
    private $input_filename = null;




    /** | __ **/

        public function __construct() {
            $this->input_filename = $_GET['filename'];
            $this->input_relay    = $_GET['relay'];
        }

    /** __ | **/




    /** | download **/

        public function download() {
            $file = DIR_RELAY.'/'.$this->input_relay.'/'.$this->input_filename;
            if( is_readable($file) ){
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: '.filesize($file));
                ob_clean();
                flush();
                readfile($file);
                unlink($file);
                exit;
            } else {
                throw new \exception('Unable to download file');
            }
        }

    /** download | **/




} ?>
<?php $object = new file(); ?>
