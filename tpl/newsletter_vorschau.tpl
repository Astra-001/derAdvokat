<div class="contenttable">
<table border="0" cellpadding="5">
<tr>
	<td width="30"><a href="/derAdvokat/newsletter_menu"><img src="/derAdvokat/grafik/pfail_back.png" alt="zur&uuml;ck in Newsletter Men&uuml;" border="no"/></a></td>
	<td width="30"><a href="/derAdvokat/newsletter_archive"><img src="/derAdvokat/grafik/archive.png" alt="Archive" border="no"/></a></td>
	<td><a href="/derAdvokat/index.php?task=newsletter&amp;nl_id={$newsletter_vorschau[0].id}"><img src="/derAdvokat/grafik/edit.png" alt="Newsletter &uuml;berarbeiten" border="no"/></a></td>
</tr>
</table>
</div>

<br/><br/>	
<h1>Newsletter Vorschau</h1>
<form action="{$smarty.server.REQUEST_URI|escape}" name="upload" method="post" enctype="multipart/form-data">


<table border="0" cellpadding="5">
<tr>
	<td>{include file="`$smarty.const.SMARTY_TEMPLATE_DIR`newsletter_vorschau_include.tpl"}</td>
</tr>
</table>

<br/>
<br/>

<div class="contenttable">
<table border="0" width="100%">
<tr>
	<td align="right"><input type="submit" name="selbsttest" value="Selbsttest" /><br/><br/><input type="submit" name="versand" value="Versenden" /></td>
</tr>	
</table>		
</div>
</form>