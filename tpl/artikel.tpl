<h1>{if isset($smarty.request.art_id)}Artikel bearbeiten{else}Neuer Artikel{/if}</h1>
{literal}
<script type="text/javascript">
tinyMCE.init({
 mode : "textareas",
        theme : "advanced",
        plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,fontsizeselect,|,forecolor,|,justifyleft,justifycenter,justifyright,justifyfull",
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
<form action="{$smarty.server.REQUEST_URI|escape}" name="upload" method="post" enctype="multipart/form-data">
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
	<td>Status</td>
	<td><select name="status">
        <option value="1" {if $smarty.post.status == 1} selected="selected"{/if} {if $artikel.premium == 1} selected="selected"{/if}>Öffentlich</option>
        <option value="2" {if $smarty.post.status == 2} selected="selected"{/if} {if $artikel.premium == 2} selected="selected"{/if}>Premium</option>
    </select></td>
    <td rowspan="3">{if strlen($bild) || strlen($artikel.bild_name)}<img src="bilder/klein_{if $smarty.server.REQUEST_METHOD == 'POST' && file_exists("`$smarty.const.ROOT_DIR`bilder/klein_`$bild`")}{$bild}{else}{$artikel.bild_name}{/if}"/>{/if}</td>
</tr>
<tr>
	<td>Kategorien</td>
	<td><select name="kategorie">
	{foreach from=$kategorie item=k name=kategorie}
        <option value="{$k.id}" {if $smarty.post.kategorie == $k.id} selected="selected"{/if} {if $artikel.kat_id == $k.id} selected="selected"{/if}>{$k.name}</option>
    {/foreach}
    </select></td>
</tr>
<tr>
	<td>Unterkategorien</td>
	<td><select name="unterkategorie">
	{foreach from=$unterkategorie item=uk name=unterkategorie}
        <option value="{$uk.id}" {if $smarty.post.unterkategorie == $uk.id} selected="selected"{/if} {if $artikel.ukat_id == $uk.id} selected="selected"{/if}>{$uk.name}</option>
    {/foreach}
    </select><a href="/derAdvokat/unterkategorien_verwaltung"> Unterkategorien editiren</a></td>
</tr>
<tr>
	<td>Titel</td>
	<td colspan="2"><input type="text" name="titel" {if strlen($msg)}class="error"{/if} value="{if isset($smarty.post.titel)}{$smarty.post.titel}{elseif {$artikel.titel}{$artikel.titel}{/if}" size="41" /></td>
</tr>
<tr>
	<td>Inhalt</td>
	<td colspan="2"><textarea name="inhalt" {if strlen($msg)}class="error"{/if} cols="65" rows="20">{if isset($smarty.post.inhalt)}{$smarty.post.inhalt}{elseif {$artikel.content}{$artikel.content}{/if}</textarea></td>
</tr>
<tr>
	<td></td>
	<td colspan="2"><input type="file" name="bild" /></td>
</tr>
<tr>
	<td></td>
	<td colspan="2">Max Dataigrösse-3,0 MB <br />Zul&auml;ssige Formate: GIF, JPG, PNG</td>
</tr>
<tr>
	<td></td>
	<td colspan="2"><input type="submit" name="sent" value="Hochladen" />{if !$smarty.get.act=='edit'}<input type="reset" value="Eingaben löschen" />{/if}</td>
</tr>
</table>
</form>
