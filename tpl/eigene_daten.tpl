<h1>Meine Daten bearbeiten</h1>
<form action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
{if strlen($msg_erfolg)}
<tr>
	<td colspan="4" class="erfolgsmeldung">{$msg_erfolg}</td>
</tr>
{/if}
{if strlen($msg_fehler)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_fehler}</td>
</tr>
{/if}
<tr>
	<td>Mitgliedsnummer</td>
	<td colspan="3">{$id}</td>
</tr>
<tr>
	<td width="200">Registriert seit</td>
	<td colspan="3">{$registrationsdatum}</td>
</tr>
<tr>
	<td>Anrede</td>
	<td colspan="3"><select name="geschlecht">
        <option value="1" {if $smarty.post.geschlecht == 1}{elseif $geschlecht==1} selected="selected"{/if}>Herr</option>
        <option value="2" {if $smarty.post.geschlecht == 2}{elseif $geschlecht==2} selected="selected"{/if}>Frau</option>
        <option value="3" {if $smarty.post.geschlecht == 3}{elseif $geschlecht==3} selected="selected"{/if}>Firma</option>
    </select></td>
</tr>
<tr>
	<td>Nachname*</td>
	<td colspan="3"><input type="text" name="name" value="{$name}" size="50" /></td>
</tr>
<tr>
	<td>Vorname (bei nat&uuml;rlicher Person)</td>
	<td colspan="3"><input type="text" name="vorname" value="{$vorname}" size="50" /></td>
</tr>
<tr>
	<td>ggf. Titel</td>
	<td colspan="3"><input type="text" name="titel" value="{$titel}" size="50" /></td>
</tr>
<tr>
	<td>ggf. vertretten durch</td>
	<td colspan="3"><input type="text" name="vertreter" value="{$vertreter}" size="50" /></td>
</tr>
<tr>
	<td>E-Mail*</td>
	<td colspan="3"><input type="text" name="email" value="{$email}" size="50" /></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="firma_name" value="{$firma_name}" size="50" /></td>
</tr>
<tr>
	<td>Telefon</td>
	<td colspan="3"><input type="text" name="tel" value="{$tel}" size="50" /></td>
</tr>
<tr>
	<td>Fax</td>
	<td colspan="3"><input type="text" name="fax" value="{$fax}" size="50" /></td>
</tr>
<tr>
	<td>Stra&szlig;e*</td>
	<td colspan="3"><input type="text" name="strasse"  value="{$strasse}" size="50" /></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td><input type="text" name="plz"  value="{$plz}" size="7" /></td>
	<td>Ort*</td>
	<td><input type="text" name="ort"  value="{$ort}" size="29" /></td>
</tr>
<tr>
	<td></td>
	<td colspan="3"><input type="submit" name="ubernehmen" value="Speichern" /></td>
</tr>
</table>
</form>
<br /><br /><br />

<div id='pass_anderung_table'>

<form action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
{if strlen($msg_pass_erfolg)}
<tr>
	<td colspan="4" class="erfolgsmeldung">{$msg_pass_erfolg}</td>
</tr>
{/if}
{if strlen($msg_pass_fehler)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_pass_fehler}</td>
</tr>
{/if}
<tr>
	<td width="200">Altes Passwort</td>
	<td><input type="password" name="passw_alt" value="{if isset($smarty.post.passw_alt)}{$smarty.post.passw_alt}{/if}" size="30" /></td>
</tr>
<tr>
	<td>Neues Passwort</td>
	<td><input type="password" name="passw_neu" value="" size="30" /></td>
</tr>
<tr>
	<td>Neues Passwort widerholen</td>
	<td><input type="password" name="passw_neu_1" value="" size="30" /></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="ubernehmen" value="Erstellen" /></td>
</tr>
</table>
</form>
</div>