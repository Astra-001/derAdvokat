<?php
#session_start();
#if($_SESSION['userID']==false) header("Location: ../index.php5");

require_once("classes/artikelubersicht.class.php");

new artikelubersicht($_smarty,$_database);//Objekt der Klasse
?>