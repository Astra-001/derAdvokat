<?php
include ('fpdi.php');
include ('tcpdf.php');

    class Pdf extends FPDI
    {
        public function __construct() {
            parent::__construct();
        }
    }
?>
