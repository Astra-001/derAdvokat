<!--<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>-->
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="30"><a href="/derAdvokat/newsletter_menu"><img src="/derAdvokat/grafik/pfail_back.png" alt="zur&uuml;ck in Newsletter Men&uuml;" border="no" name="back" onmouseover="javascript:document.back.src='/derAdvokat/grafik/pfail_back_on.png';" onmouseout="javascript:document.back.src='/derAdvokat/grafik/pfail_back.png';"/></a></td>
	<td width="30"><a href="/derAdvokat/newsletter_archive"><img src="/derAdvokat/grafik/archive.png" alt="Archive" border="no"/></a></td>
	<td><a href="/derAdvokat/index.php?task=neu_empfanger"><img src="/derAdvokat/grafik/new_user.png" alt="Neue E-Mail hinzuf&uuml;gen" border="no"/></a></td>
</tr>
</table>
<br/><br/>
<h1>Newsletter</h1>
{literal}
<script type="text/javascript">
tinyMCE.init({
 mode : "textareas",
        theme : "advanced",
        plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,fontsizeselect,|,forecolor,|,justifyleft,justifycenter,justifyright,justifyfull,|,cut,copy,paste,|,pastetext,pasteword",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        // Theme options
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",

        language : 'de',

        // Example content CSS (should be your site CSS)
        content_css : "css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js"
});
</script>
{/literal}
<form name="upload" action="{$smarty.server.REQUEST_URI|escape}" method="post" enctype="multipart/form-data" id="upload">

<table border="0" cellpadding="5" class="contenttable" width="100%">
{if strlen($error)}
<tr>
	<td class="fehlermeldung" colspan="3">{$error}</td>
</tr>
{/if}
{if strlen($erfolg)}
<tr>
	<td class="erfolgsmeldung" colspan="3">{$erfolg}</td>
</tr>
{/if}
<tr>
	<td colspan="2" align="right"><img src="/derAdvokat/newsletter_bilder/klein_4babe997cfce3.jpg" />{if strlen($bild) || strlen($newsletter[0].bild_name)}<img src="newsletter_bilder/klein_{if $smarty.server.REQUEST_METHOD == 'POST' && file_exists("`$smarty.const.ROOT_DIR`newsletter_bilder/klein_`$bild`")}{$bild}{else}{$newsletter[0].bild_name}{/if}" alt="Newsletter"/>{/if}<input type="hidden" name="bild" value="{$newsletter[0].bild_name}"/></td>
</tr>
<tr>
	<td>Titel</td>
	<td><input type="text" name="titel" {if strlen($msg)}class="error"{/if} value="{if isset($smarty.post.titel)}{$smarty.post.titel}{elseif {$newsletter[0].titel}{$newsletter[0].titel}{/if}" size="86" /></td>
</tr>
<tr>
	<td>Inhalt</td>
	<td><textarea name="inhalt" {if strlen($msg)}class="error"{/if} cols="65" rows="20">{if isset($smarty.post.inhalt)}{$smarty.post.inhalt}{elseif {$newsletter[0].content}{$newsletter[0].content}{/if}</textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="file" name="bild" />&nbsp;Logo Typ
	<select name="logo_typ">
        <option value="1" {if $newsletter[0].logo_typ == 1} selected="selected"{/if}>derAdvokat</option>
        <option value="2" {if $newsletter[0].logo_typ == 2} selected="selected"{/if}>Kanzlei-Strauch</option>
        <option value="3" {if $newsletter[0].logo_typ == 3} selected="selected"{/if}>ICADA</option>
    </select></td>
</tr>
<tr>
	<td></td>
	<td>Max Dataigrösse-3,0 MB <br />Zul&auml;ssige Formate: GIF, JPG, PNG</td>
</tr>
</table>
<br/>
<h1>Artikel&uuml;bersicht</h1>
{if $show==true}
<input type="checkbox" name="keine_artikeln" onclick="disable_artikeln_checkbox()" value="1"/> Keine Artikeln ausw&auml;hlen<br/><br/>
{/if}
<table border="0" class="contenttable">
<tr>
	<td>
<div id="artikelubersicht">
<table border="0" cellpadding="5">
<tr align="center">
	<th></th>
    <th>Kategorie</th>
    <th>Unterkategorie</th>
    <th>Titel</th>
    <th>Premium</th>
    <th>Aktion</th>
</tr>
{foreach from=$artikel item=a name=artikel}
<tr>
	<td><input type="checkbox" name="artikel[]" {if $a.id==$nl_artikel[$a.id]}checked="checked"{/if} value="{$a.id}"/></td>
    <td>{$cat[$a.kat_id]}</td>
    <td>{$cat[$a.ukat_id]}</td>
    <td>{$a.titel}</td>
    <td>{if $a.premium == $smarty.const.ARTICLE_PREMIUM}Premium{else if $a.premium != $smarty.const.ARTICLE_PREMIUM}&Ouml;ffentlich{/if}</td>
    <td align="right">
    <a href='index.php?task=artikel&amp;kat_id={$a.kat_id}&amp;art_id={$a.id}&amp;act=edit'>Bearbeiten</a>    
    </td>
</tr>
<tr>
    <td colspan="6"><hr /></td>
</tr>
{foreachelse}<tr><td colspan="5">Keine Artikel vorhanden.</td></tr>
{/foreach}
</table>
</div></td>
</tr>
</table>
<br/>
<br/>
<h1>Empf&auml;nger&uuml;bersicht</h1>


<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td><a href="/derAdvokat/index.php?task=neu_empfanger"><img src="/derAdvokat/grafik/new_user.png" alt="Neue E-Mail hinzuf&uuml;gen" border="no"/></a></td>
	{if $smarty.get.task.newsletter AND !$smarty.get.nl_id}
	<td><select name="task_empf" onchange="javascript:document.upload.submit();">
        <option value="1" {if $smarty.post.task_empf == 1} selected="selected" {/if}>Alle Empf&auml;nger</option>
        <option value="2" {if $smarty.post.task_empf == 2} selected="selected" {/if}>Kosmetikhersteller</option>
        <option value="3" {if $smarty.post.task_empf == 3} selected="selected" {/if}>Vermieter</option>
    </select></td>{/if}
</tr>
</table>

<br/>

		Hinweis: <img src="/derAdvokat/grafik/blau.png" alt="E-Mail´s von externen Empf&auml;ngern"/>  E-Mail´s von externen Empf&auml;ngern
		<table border="0" width="100%">
		<tr>
			<td>
			<table border="0" cellpadding="5" class="contenttable" width="100%">
		<tr>
			<td>
				<div id="empfangerubersicht">	
				<table border="0" cellpadding="5" width="100%">
				<tr align="center">
					<th></th>
					<th>Geschlecht</th>
					<th>Vor-/Nachname/Firma</th>
					<th>E-Mail</th>
				</tr>
				{foreach from=$user item=u name=user}
				<tr {if $u.TYPE==100}bgcolor="#ccccff"{/if}>
					<td><input type="checkbox" name="empfanger[{$u.TYPE}][]" {if $u.id==$nl_empfanger[$u.TYPE][$u.id]}checked="checked"{/if} value="{$u.id}"/></td>
					<td>{if $u.geschlecht==1}H{/if} {if $u.geschlecht==2} F {/if}</td>
					<td>{if $u.geschlecht!=3}{$u.vorname} {$u.name} {/if}{if $u.geschlecht==3} {$u.firma_name}{/if}</td>
					<td><a href="mailto:{$u.email}?subject=www.derAdvokat.de%20Kanzlei-Strauch">{$u.email}</a></td>
				</tr>
				<tr>
					<td colspan="8"  style="border-bottom: thin solid gainsboro; border-width: thin; border-color: gainsboro;"></td>
				</tr>
				{foreachelse}<tr><td>Keine Mitglieder vorhanden.</td></tr>
				{/foreach}
				</table>
				
				</div>
		
			</td>
		</tr>
		</table>

	</td>
</tr>
</table>
<br/>
<br/>
<table border="0" class="contenttable" width="100%">
<tr>
	<td align="right"><input type="submit" name="vorschau" value="Vorschau" /></td>
</tr>	
</table>		
</form>