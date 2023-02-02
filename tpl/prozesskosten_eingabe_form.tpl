<table border="0">
<tr>
	<td>Prozesskostenrechner</td>
</tr>
<tr>
	<td>
<form action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" cellpadding="5" class="contenttable">
{if strlen($msg)}
<tr>
	<td class="fehlermeldung" colspan="2">{$msg}</td>
</tr>
{/if}
<tr>
	<td>Streitwert in &euro; (z.Bsp. 500 oder 4659,20)</td>
	<td><input type="text" name="wert" {if strlen($msg)}class="error"{/if} value="{if is_numeric($smarty.post.wert)}{$smarty.post.wert}{/if}" size="11" /> &euro;</td>
</tr>
<tr>
	<td>Instanz (Welche Instanz ist es bereits?)</td>
	<td>
    <select name="instanz">
        <option value="1" {if $smarty.post.instanz == 1} selected="selected"{/if}>1. Instanz</option>
        <option value="2" {if $smarty.post.instanz == 2} selected="selected"{/if}>2. Instanz</option>
    </select>
   </td>
</tr>
<tr>
	<td>Anwalt (Wieviel?)</td>
	<td>
    <select name="anwalt">
        <option value="1" {if $smarty.post.anwalt == 1} selected="selected"{/if}>1. Anwalt</option>
        <option value="2" {if $smarty.post.anwalt == 2} selected="selected"{/if}>2. Anw&auml;lte</option>
    </select>
    </td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="sent" value="Berechnen" /></td>
</tr>
</table>
</form></td></tr>


{if $smarty.server.REQUEST_METHOD == 'POST' && strlen($msg) == 0}
<tr>
	<td height="40">Das Ergebnis der Berechnung</td>
</tr>
<tr>
	<td>
<table border="0" width="100%"cellpadding="5" class="contenttable">
<tr>
	<td style="border-style:solid;border-width:2px;border-color:orange;" align="right">Streitwert:</td>
	<td style="border-style:solid;border-width:2px;border-color:orange;">{if isset($smarty.post.wert)}{$wert}{/if} &euro;</td>
</tr>
<tr>
	<td style="border-style:solid;border-width:2px;border-color:orange;" align="right">{if isset($smarty.post.instanz)}{$instanz}{/if} Instanz</td>
	<td style="border-style:solid;border-width:2px;border-color:orange;">{$anwalt}{if $smarty.post.anwalt == 1} Anwalt{/if}{if $smarty.post.anwalt == 2} Anw&auml;lte{/if}</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
<tr>
	<td>Anwaltgeb&uuml;hren </td>
	<td>{if $smarty.server.REQUEST_METHOD == 'POST' && strlen($msg) == 0}
            {if $smarty.post.anwalt == 1}
                {$record.anwalt1|number_format:2:',':'.'}
            {else}
                {$record.anwalt2|number_format:2:',':'.'}
            {/if}
        {/if} &euro;</td>
</tr>
<tr>
	<td>Auslagenpauschale</td>
	<td>&euro;</td>
</tr>
<tr>
	<td>MwSt. 19%</td>
	<td>&euro;</td>
</tr>
<tr>
	<td>Gerichtkosten</td>
	<td>{if $smarty.server.REQUEST_METHOD == 'POST' && strlen($msg) == 0}{$record.gerichtskosten|number_format:2:',':'.'}{/if} &euro;<br />_________ </td>
</tr>

<tr>
	<td>Gesamtkosten</td>
	<td>{if $smarty.server.REQUEST_METHOD == 'POST' && strlen($msg) == 0}{$summe|number_format:2:',':'.'}{/if} &euro;</td>
</tr>
</table></td></tr>
{/if}
</table>