<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
new bussgeldrechner_abstand($smarty,$database);
new mutterschutzurlaub($smarty,$database);
#require_once('bussgeldrechner_abstand.php');
require_once('bussgeldrechner.php');
require_once('prozesskosten.php');
$smarty->assign('contentTemplate', 'rechner.tpl');
?>