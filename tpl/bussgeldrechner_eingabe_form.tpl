<form action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" cellpadding="5" class="contenttable">
{if strlen($msg)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg}</td>
</tr>
{/if}
<tr>
	<td>Ich bin</td>
	<td>
	<select name="ort">
        <option value="1" {if $smarty.post.ort == 1} selected="selected"{/if}>au&szlig;erhalb</option>
        <option value="2" {if $smarty.post.ort == 2} selected="selected"{/if}>innerhalb</option>
    </select></td>
	<td>geschlossener Ortschaften</td>
</tr>
<tr>
	<td></td>
	<td><input type="text" name="geschwindigkeit" {if strlen($msg)}class="error"{/if} value="{if is_numeric($smarty.post.geschwindigkeit)}{$smarty.post.geschwindigkeit}{/if}" size="11" /></td>
	<td>km/h zu schnell gefahren</td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="sent" value="Berechnen" /></td>
	<td></td>
</tr>
</table>
{if strlen($bussgeld)}
<table border="0" cellpadding="5">
<tr>
	<td colspan="4">Die Folgen</td>
</tr>
<tr>
	<td>Bu&szlig;geld:</td>
	<td>{$bussgeld}</td>
	<td>&euro;</td>
</tr>
{if strlen($punkte!=0)}
<tr>
	<td>Punkte in Flensburg:</td>
	<td>{$punkte}</td>
	<td>Punkt{$buchstabe_punkte}</td>
</tr>
{/if}
{if strlen($fahrverbot!=0)}
<tr>
	<td>Fahrverbot:</td>
	<td>{$fahrverbot}</td>
	<td> Monat{$buchstabe_monate}</td>
</tr>
{/if}
</table>
{/if}
</form>