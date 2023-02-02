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
    <div id="head"{if !isset($smarty.request.task)} class="home_head"{/if}>
        <a href="/derAdvokat/" onfocus="this.blur();"><img src="/derAdvokat/grafik/logo-der-advokatA{if isset($smarty.request.task)}-klein{/if}.png" class="logo" border="no" alt="derAdvokat"{if !isset($smarty.request.task)} style="margin-top: 100px;"{/if} /></a>
        <div id="home_uberschrift_content"{if !isset($smarty.request.task)} style="margin-left: 355px;"{/if}>Rechtsportal der Kanzlei Strauch</div>
    </div>
    {if strlen($fehler)}
    	<div id="error">{include file="`$smarty.const.SMARTY_TEMPLATE_DIR`meldung.tpl"}</div>
    {/if}
    <div id="contentwrapper"{if !isset($smarty.request.task)} style="background-image: none;"{/if}>
        <div id="navi" class="{if !isset($smarty.request.task)}center{else}nav2{/if}">
        {if !isset($smarty.request.task)}
            <div id="nav_content_wrapper">
        {/if}
            {include file="`$smarty.const.SMARTY_TEMPLATE_DIR`navi.tpl"}
        {if !isset($smarty.request.task)}
            </div>
        {/if}
        </div>
        {if isset($smarty.request.task)}
        <div id="content">
            {include file="`$smarty.const.SMARTY_TEMPLATE_DIR``$contentTemplate`"}
        </div>
        {/if}
    </div>
{literal}
<!--<script type="text/javascript">//-->
<!--var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");//-->
<!--document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));//-->
<!--</script>//-->
<!--<script type="text/javascript">//-->
<!--try {//-->
<!--var pageTracker = _gat._getTracker("UA-11860219-1");//-->
<!--pageTracker._trackPageview();//-->
<!--} catch(err) {}</script>//-->
{/literal}
</body></html>