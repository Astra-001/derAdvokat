<?php
require_once("defines.php");
require_once(ROOT_DIR."classes/phprtflite/rtf/Rtf.php");
#require_once("classes/tcpdf/tcpdf.php");
#require_once("classes/tcpdf/pdf.php");
#require_once("classes/tcpdf/config/tcpdf_config.php");

// require_once(ROOT_DIR."classes/mysqlDatabase.class.php");
#require_once("classes/mysqlField.class.php");
#require_once("classes/mysqlTable.class.php");
require_once(ROOT_DIR."classes/password.class.php");
#require_once("classes/mail.class.php");

#require_once("smarty/Smarty.class.php");

function myAutoloader ($klasse) 
{
  // die bösesten zeichen in klassennamen mal sicherheitshalber verbieten
  if (strpos ($klasse, '.') !== false || strpos ($klasse, '/') !== false
      || strpos ($klasse, '\\') !== false || strpos ($klasse, ':') !== false) {
    return;
  }
  if (file_exists (ROOT_DIR.'classes/'.$klasse.'.class.php')) {
    include_once ROOT_DIR.'classes/'.$klasse.'.class.php';
  }
  if (file_exists (ROOT_DIR.'smarty/'.$klasse.'.class.php')) {
    include_once ROOT_DIR.'smarty/'.$klasse.'.class.php';
  }
}

spl_autoload_register('myAutoloader');
?>