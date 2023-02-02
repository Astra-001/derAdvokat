<h1>Quittung</h1>
<form name="burg_erkl_eigen_dat" action="{$smarty.server.REQUEST_URI}"  method="post">

<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td colspan="4">{if strlen($msg)}
	    <div class="fehlermeldung">{$msg}</div>
    {/if}</td>
</tr>
<tr>
	<td>Den Betrag in Höhe von</td>
	<td colspan="3"><input type="text" name="betrag" {if strlen($msg_betrag)}class="error"{/if} value="{if isset($smarty.post.betrag)}{$smarty.post.betrag}{/if}" size="56" /> &euro;</td>
</tr>
<tr>
	<td>Betrag in Worten</td>
	<td colspan="3"><input type="text" name="betrag_worten" {if strlen($msg_betrag_worten)}class="error"{/if} value="{if isset($smarty.post.betrag_worten)}{$smarty.post.betrag_worten}{/if}" size="56" /> &euro;</td>
</tr>
<tr>
	<td>Zahlungsempf&auml;nger</td>
	<td colspan="3"><input type="text" name="empfanger" {if strlen($msg_empfanger)}class="error"{/if} value="{if isset($smarty.post.empfanger)}{$smarty.post.empfanger}{/if}" size="56" /></td>
</tr>
<tr>
	<td>Zahler</td>
	<td colspan="3"><input type="text" name="zahler" {if strlen($msg_zahler)}class="error"{/if} value="{if isset($smarty.post.zahler)}{$smarty.post.zahler}{/if}" size="56" /></td>
</tr>
<tr>
	<td>Ort</td>
	<td colspan="3"><input type="text" name="ort" {if strlen($msg_ort)}class="error"{/if} value="{if isset($smarty.post.ort)}{$smarty.post.ort}{/if}" size="56" /></td>
</tr>
<tr>
	<td>Datum</td>
	<td colspan="3"><input type="text" name="datum" {if strlen($msg_datum)}class="error"{/if} {if isset($smarty.post.datum)}value="{$smarty.post.datum}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} size="56" /></td>
</tr>
</table>
<br />
<table border="0"cellpadding="5" class="contenttable" width="100%">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="sent" value="Ausgabe" /></td>
</tr>
</table>
</form>