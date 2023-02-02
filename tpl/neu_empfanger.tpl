<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="30"><a href="/derAdvokat/newsletter_menu"><img src="/derAdvokat/grafik/pfail_back.png" alt="zur&uuml;ck in Newsletter Men&uuml;" border="no" name="back" onmouseover="javascript:document.back.src='/derAdvokat/grafik/pfail_back_on.png';" onmouseout="javascript:document.back.src='/derAdvokat/grafik/pfail_back.png';"/></a></td>
	<td width="30"><a href="/derAdvokat/newsletter_archive"><img src="/derAdvokat/grafik/archive.png" alt="Archive" border="no"/></a></td>
	<td><a href="/derAdvokat/index.php?task=newsletter"><img src="/derAdvokat/grafik/edit.png" alt="Neuen Newsletter erstellen" border="no"/></a></td>
</tr>
</table>
<h1>Neue Adressen hinzuf&uuml;gen</h1>

<form name="neu_empfanger" action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" class="contenttable" width="100%">
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
	<td>E-Mail</td>
	<td colspan="3"><input type="text" name="email" value="" size="50" /></td>
</tr>
<tr>
	<td>Geschlecht</td>
	<td colspan="3"><select name="geschlecht">
        <option value="1" {if $smarty.post.geschlecht == 1} selected="selected"{/if}>Herr</option>
        <option value="2" {if $smarty.post.geschlecht == 2} selected="selected"{/if}>Frau</option>
        <option value="3" {if $smarty.post.geschlecht == 3} selected="selected"{/if}>Firma</option>
    </select></td>
</tr>
<tr>
	<td>Nachname</td>
	<td colspan="3"><input type="text" name="name" value="" size="50" /></td>
</tr>
<tr>
	<td>Vorname</td>
	<td colspan="3"><input type="text" name="vorname" value="" size="50" /></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="firma_name" value="" size="50" /></td>
</tr>
<tr>
	<td>Empf&auml;ngerart (legen Sie fest...<br/> Als Empf&auml;nger, zu welcher Gruppe geh&ouml;rt diese Person?)</td>
	<td colspan="3"><select name="empf_art">
        <option value="1">Sonstige</option>
        <option value="2">Kosmetikhersteller</option>
        <option value="3">Vermieter</option>
    </select></td>
</tr>
</table>
<br/>
<br/>

<table border="0" class="contenttable" width="100%">
<tr>
	<td align="right"><input type="submit" name="neu_empfanger" value="Empf&auml;nger hinzuf&uuml;gen" /></td>
</tr>	
</table>
</form>
<br/>
<br/>

<h1>Adressbuch - externe Empf&auml;nger</h1>

<form name="empfanger_auswahl" action="{$smarty.server.REQUEST_URI}"  method="post">

<table border="0" width="100%">
<tr>
	<td>
		<table border="0" cellpadding="5" class="contenttable" width="100%">
		<tr>
			<td>	
		
			<div id="artikelubersicht">	
			
				<table border="0" cellpadding="5" width="100%">
				
				{foreach from=$adressbuch item=ab name=adressbuch}
				<tr>
					<td colspan="2"><b>{$ab.firma_name}</b></td>
					<td>{if $ab.empfanger_art==1}Sonstige{/if}{if $ab.empfanger_art==2}Kosmetikhersteller{/if}{if $ab.empfanger_art==3}Vermieter{/if}</td>
					<td></td>
				</tr>	
				<tr>
					<td>{if $ab.geschlecht==1}Herr{/if}{if $ab.geschlecht==2}Frau{/if}{if $ab.geschlecht==3}Firma{/if}</td>
					<td>{$ab.name} {$ab.vorname}</td>
					<td><a href="mailto:{$ab.email}?subject=www.derAdvokat.de%20Kanzlei-Strauch">{$ab.email}</a></td>
					<td><a href="/derAdvokat/index.php?task=neu_empfanger&amp;id={$ab.id}&amp;act=del">L&ouml;schen</a></td>
				</tr>
				<tr>
					<td colspan="8" style="border-bottom: thin solid gainsboro; border-width: thin; border-color: gainsboro;"></td>
				</tr>
				
				{foreachelse}
				<tr>
					<td colspan="3">Keine Mitglieder vorhanden.</td>
				</tr>
				{/foreach}
				
				</table>
				
			</div>
			</td>
			
		</tr>
		</table>

	</td>
</tr>
</table>
</form>