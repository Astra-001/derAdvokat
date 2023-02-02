<?php /* Smarty version 2.6.18, created on 2019-04-01 12:53:55
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/index.tpl */ ?>
n<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="de" />
    <meta name="author" content="" />
    <meta name="publisher" content="" />
    <meta name="copyright" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="page-topic" content="" />
    <meta name="audience" content="alle" />
    <meta name="content-language" content="DE" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />

    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="revisit-after" content="1 days" />
    <meta name="robots" content="index" />
    <meta name="robots" content="follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <link rel="shortcut icon" type="image/x-icon" href="/derAdvokat/grafik/favicon.ico" />
    <link href="/derAdvokat/style/design.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/derAdvokat/style/print.css" rel="stylesheet" type="text/css" media="print" />
    <link rel="alternate" type="application/rss+xml" title="Neue Beiträge im Rechtsportal der Kanzlei Strauch" href="http://www.deradvokat.de/derAdvokat/feed.php" />
    <script type="text/javascript" src="/derAdvokat/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
    <title>derAdvokat</title>
</head>
<body>
    <div id="head"<?php if (! isset ( $_REQUEST['task'] )): ?> class="home_head"<?php endif; ?>>
        <a href="/derAdvokat/" onfocus="this.blur();"><img src="/derAdvokat/grafik/logo-der-advokatA<?php if (isset ( $_REQUEST['task'] )): ?>-klein<?php endif; ?>.png" class="logo" border="no" alt="derAdvokat"<?php if (! isset ( $_REQUEST['task'] )): ?> style="margin-top: 100px;"<?php endif; ?> /></a>
        <div id="home_uberschrift_content"<?php if (! isset ( $_REQUEST['task'] )): ?> style="margin-left: 355px;"<?php endif; ?>>Rechtsportal der Kanzlei Strauch</div>
    </div>
    <?php if (strlen ( $this->_tpl_vars['fehler'] )): ?>
    	<div id="error"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."meldung.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
    <?php endif; ?>
    <div id="contentwrapper"<?php if (! isset ( $_REQUEST['task'] )): ?> style="background-image: none;"<?php endif; ?>>
        <div id="navi" class="<?php if (! isset ( $_REQUEST['task'] )): ?>center<?php else: ?>nav2<?php endif; ?>">
        <?php if (! isset ( $_REQUEST['task'] )): ?>
            <div id="nav_content_wrapper">
        <?php endif; ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."navi.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php if (! isset ( $_REQUEST['task'] )): ?>
            </div>
        <?php endif; ?>
        </div>
        <?php if (isset ( $_REQUEST['task'] )): ?>
        <div id="content">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR).($this->_tpl_vars['contentTemplate']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <?php endif; ?>
    </div>
<?php echo '
<!--<script type="text/javascript">//-->
<!--var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");//-->
<!--document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));//-->
<!--</script>//-->
<!--<script type="text/javascript">//-->
<!--try {//-->
<!--var pageTracker = _gat._getTracker("UA-11860219-1");//-->
<!--pageTracker._trackPageview();//-->
<!--} catch(err) {}</script>//-->
'; ?>

</body></html>