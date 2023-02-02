<?php
    $year = $_GET['year'];
    echo date("m/d/Y", easter_date($year)) ;
    die();
?>