<?php

$tm = strtotime("20.10.2009 12:00:00");
    $day = (60*60*24);
    for ($i=0; $i<10; $i++) 
    {
        echo date("d-m-Y ", $tm).$tm."<br>";
        $tm += $day;
    }

 $smarty->assign('unterkategorie', $tm);   
$smarty->assign('contentTemplate', 'test.tpl');
?>