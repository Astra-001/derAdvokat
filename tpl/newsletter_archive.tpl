<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="30"><a href="/derAdvokat/newsletter_menu"><img src="/derAdvokat/grafik/pfail_back.png" alt="zur&uuml;ck in Newsletter Men&uuml;" border="no" name="back" onmouseover="javascript:document.back.src='/derAdvokat/grafik/pfail_back_on.png';" onmouseout="javascript:document.back.src='/derAdvokat/grafik/pfail_back.png';"/></a></td>
	<td width="30"><a href="/derAdvokat/index.php?task=neu_empfanger"><img src="/derAdvokat/grafik/new_user.png" alt="Neuen E-Mail hinzuf&uuml;gen" border="no"/></a></td>
	<td><a href="/derAdvokat/newsletter"><img src="/derAdvokat/grafik/edit.png" alt="Neuen Newsletter erstellen" border="no"/></a></td>
</tr>
</table>
<h1>Newsletter Archive</h1>

<form name="newsletter_archive" action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" width="100%">
{if strlen($erfolg)}
<tr>
	<td class="erfolgsmeldung" colspan="3">{$erfolg}</td>
</tr>
{/if}	
<tr>
	<td>
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td>	
<div id="artikelubersicht">	

<table border="0" cellpadding="5" width="100%">
<tr align="center">
	<th>Titel</th>
	<th>Erstellt am</th>
	<th>Gesendet am</th>
	<th>Aktion</th>
</tr>

{foreach from=$newsletter item=nl name=newsletter}
<tr>
	<td width="320"><a href="/derAdvokat/index.php?task=newsletter&amp;nl_id={$nl.id}">{$nl.titel}</a></td>
	<td>{$nl.erstellt}</td> 
	<td>{$nl.versendet}</td>
	<td><a href="/derAdvokat/index.php?task=newsletter_archive&amp;id={$nl.id}&amp;act=del">L&ouml;schen</a></td>
</tr>
<tr>
	<td colspan="8"><hr /></td>
</tr>
{foreachelse}<tr><td colspan="3">Keine Eintr&auml;ge vorhanden.</td></tr>
{/foreach}
</table>
	
</div></td></tr></table>

	</td>
</tr>
</table>
</form>