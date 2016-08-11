<?php namespace relay\module; ?>
<?php class file {




    /** var - input(s) **/
    private $relay    = null;
    private $filename = null;




    /** | __ **/

        public function __construct() {
            $this->filename = $_GET['filename'];
            $this->relay    = $_GET['relay'];
        }

    /** __ | **/




    /** | download **/

        public function download() {
            $file = DIR_RELAYS.'/'.$this->relay.'/'.$this->filename;
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
            } else {
                throw new \exception('Unable to download file');
            }
        }

    /** download | **/




} ?>
<?php $object = new file(); ?>
