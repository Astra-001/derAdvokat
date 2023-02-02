<h1>Erkl&auml;rung zum Besitz einer Fahrerlaubnis</h1>
<form name="burg_erkl_eigen_dat" action="{$smarty.server.REQUEST_URI}"  method="post">

<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td colspan="4">{if strlen($msg)}
	    <div class="fehlermeldung">{$msg}</div>
    {/if}</td>
</tr>

<tr>
	<td colspan="4"><font color="white">Daten des Vertragspartners</font></td>
</tr>
<tr>
	<td>Anrede</td>
	<td colspan="1"><select name="anrede" onclick="check()">
        <option value="1" {if $smarty.post.anrede == 1} selected="selected"{/if}>Herr</option>
        <option value="2" {if $smarty.post.anrede == 2} selected="selected"{/if}>Frau</option>
    </select></td>
    <td></td>
    <td></td>
</tr>
<tr>
	<td>Nachname*</td>
	<td colspan="3"><input type="text" name="name" {if strlen($msg_name)}class="error"{/if} value="{if isset($smarty.post.name)}{$smarty.post.name}{/if}" size="56" /></td>
</tr>
<tr>
	<td>Vorname*</td>
	<td colspan="3"><input type="text" name="vorname" {if strlen($msg_vorname)}class="error"{/if} value="{if isset($smarty.post.vorname)}{$smarty.post.vorname}{/if}" size="56" /></td>
</tr>
<tr>
	<td>Abteilung</td>
	<td colspan="3"><input type="text" name="abteilung" {if strlen($msg_abteilung)}class="error"{/if} value="{if isset($smarty.post.abteilung)}{$smarty.post.abteilung}{/if}" size="56" /></td>
</tr>
<tr>
	<td>Zugeordnetes Kraftfahrzeug AKZ *</td>
	<td colspan="3"><input type="text" name="fahrzeug" {if strlen($msg_fahrzeug)}class="error"{/if} value="{if isset($smarty.post.fahrzeug)}{$smarty.post.fahrzeug}{/if}" size="56" /></td>
</tr>
<tr>
	<td>F&uuml;hrerscheinklasse(n) *</td>
	<td colspan="3"><input type="text" name="fuehrschein_klasse" {if strlen($msg_fuehrschein_klasse)}class="error"{/if} value="{if isset($smarty.post.fuehrschein_klasse)}{$smarty.post.fuehrschein_klasse}{/if}" size="5" maxlength="5" /></td>
</tr>
</table>
<br />
<table border="0"cellpadding="5" class="contenttable" width="100%">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="sent" value="Ausgabe" /></td>
</tr>
</table>
</form>