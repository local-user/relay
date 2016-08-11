<?php namespace relay\module; ?>
<?php class file {




    /** var - input(s) **/
    private $relay    = null;
    private $filename = null;




    /** | __ **/

        public function __construct() {
            if( isset($_GET['filename']) ){ $this->filename = $_GET['filename']; }
            if( isset($_GET['relay'])    ){ $this->relay    = $_GET['relay'];    }
        }

    /** __ | **/




    /** | download **/

        public function download() {

            // check(s)
            if( ! isset($this->relay)    ){ throw new \exception('invalid relay');    }
            if( ! isset($this->filename) ){ throw new \exception('invalid filename'); }

            // file - download - target
            $file = DIR_RELAYS.'/'.$this->relay.'/'.$this->filename;

            // ? - readable - download
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




    /** | upload **/

        public function upload() {

            // file - upload - target
            $folder = DIR_RELAYS.'/'.$this->relay;

            // check(s) - relay
            if( ! isset($this->relay)   ){ throw new \exception('invalid relay');   }
            if( ! is_dir($folder)       ){ throw new \exception('invalid relay');   }

            // iterate - files
            foreach( $_FILES as $file ){

                // ? - symlink
                if( is_link($file['tmp_name']) ){
                    unlink($file['tmp_name']);
                    continue;
                }

                // move - uploaded - file -> relay
                move_uploaded_file( $file['tmp_name'], $folder.'/'.$file['name'] );

            }

            // return
            return true;

        }

    /** upload | **/




} ?>
<?php $object = new file(); ?>
