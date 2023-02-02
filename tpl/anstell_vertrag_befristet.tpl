<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>Befristeter Einstellungsvertrag Allgemein</h1>
<form name="anstellung" action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
{if strlen($msg_fehler)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_fehler}</td>
</tr>
{/if}
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Arbeitgebers</b></font></td>
</tr>
<tr>
	<td width="170">Anrede</td>
	<td width="60"><select name="geschlecht" onchange="check_anstellung()">
        <option value="1" {if $smarty.post.geschlecht == 1} selected="selected" {/if}>Herr</option>
        <option value="2" {if $smarty.post.geschlecht == 2} selected="selected" {/if}>Frau</option>
        <option value="3" {if $smarty.post.geschlecht == 3} selected="selected" {/if}>Firma</option>
    </select></td>
    <td width="57" align="right">ggf. Titel</td>
	<td><input type="text" name="titel" value="{if isset($smarty.post.titel)}{$smarty.post.titel} {else if $titel}{$titel}{/if}" /></td>
</tr>
<tr>
	<td>Nachname*</td>
	<td colspan="3"><input type="text" name="name" value="{$name}" size="44" /></td>
</tr>
<tr>
	<td>Vorname <br />(bei nat&uuml;rlicher Person)</td>
	<td colspan="3"><input type="text" name="vorname" value="{$vorname}" size="44" /></td>
</tr>
<tr>
	<td>ggf. vertreten durch</td>
	<td colspan="3"><input type="text" name="vertreter" value="{$vertreter}" size="44" /></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="firma_name" value="{$firma_name}" size="44" /></td>
</tr>
<tr>
	<td>Stra&szlig;e und Hausnummer*</td>
	<td colspan="3"><input type="text" name="strasse"  value="{$strasse}" size="44" /></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td width="57"><input type="text" name="plz"  value="{$plz}"  maxlength="5" size="5" /></td>
	<td align="right">Ort*</td>
	<td><input type="text" name="ort"  value="{$ort}" /></td>
</tr>
</table>
<br />
<table border="0" cellpadding="5" class="contenttable" width="100%">
{if strlen($msg)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg}</td>
</tr>
{/if}
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Mitarbeiters</b></font></td>
</tr>
<tr>
	<td width="170">Anrede</td>
	<td width="60"><select name="ex_anrede">
        <option value="1" {if $smarty.post.ex_anrede == 1} selected="selected"{/if}>Herr</option>
        <option value="2" {if $smarty.post.ex_anrede == 2} selected="selected"{/if}>Frau</option>
    </select></td>
    <td width="57" align="right">ggf. Titel</td>
    <td><input type="text" name="ex_titel" value="{if isset($smarty.post.ex_titel)}{$smarty.post.ex_titel}{/if}" /></td>
</tr>
<tr>
	<td>Nachname*</td>
	<td colspan="3"><input type="text" name="ex_name" {if strlen($msg_name)}class="error"{/if} value="{if isset($smarty.post.ex_name)}{$smarty.post.ex_name}{/if}" size="44" /></td>
</tr>
<tr>
	<td>Vorname*</td>
	<td colspan="3"><input type="text" name="ex_vorname" {if strlen($msg_vorname)}class="error"{/if} value="{if isset($smarty.post.ex_vorname)}{$smarty.post.ex_vorname}{/if}" size="44" /></td>
</tr>
<tr>
	<td>Stra&szlig;e und Hausnummer*</td>
	<td colspan="3"><input type="text" name="ex_strasse" {if strlen($msg_strasse)}class="error"{/if} value="{if isset($smarty.post.ex_strasse)}{$smarty.post.ex_strasse}{/if}" size="44" /></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td width="57"><input type="text" name="ex_plz" {if strlen($msg_plz)}class="error"{/if} value="{if isset($smarty.post.ex_plz)}{$smarty.post.ex_plz}{/if}" size="5"  maxlength="5" /></td>
	<td align="right">Ort*</td>
	<td><input type="text" name="ex_ort" {if strlen($msg_ort)}class="error"{/if} value="{if isset($smarty.post.ex_ort)}{$smarty.post.ex_ort}{/if}" /></td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
{if strlen($msg_dar)}
<tr>
	<td colspan="3" class="fehlermeldung">{$msg_dar}</td>
</tr>
{/if}
<tr>
	<td colspan="3" bgcolor="#9FC6FF"><font color="white"><b>Beginn und Befristung des Arbeitsverh&auml;ltnisses</b></font></td>
</tr>
<tr>
	<td width="170">Befristung</td>
	<td>befristet vom <br />nach § 14 TzBfG <input type="text" name="beginn" {if strlen($msg_beginn)}class="error"{/if} {if isset($smarty.post.beginn)}value="{$smarty.post.beginn}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} size="20" /></td>
	<td><br />bis zum <input type="text" name="bis" {if strlen($msg_bis)}class="error"{/if} {if isset($smarty.post.bis)}value="{$smarty.post.bis}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} size="20" /></td>	
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
{if strlen($msg_tatig)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_tatig}</td>
</tr>
{/if}
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>T&auml;tigkeit</b></font></td>
</tr>
<tr>
	<td width="170">Unternehmensbereich</td>
	<td colspan="3"><input type="text" name="bereich" {if strlen($msg_bereich)}class="error"{/if} value="{if isset($smarty.post.bereich)}{$smarty.post.bereich}{/if}" size="20" /></td>
</tr>
<tr>
	<td width="170">Funktion</td>
	<td colspan="3"><input type="text" name="funktion" {if strlen($msg_funktion)}class="error"{/if} value="{if isset($smarty.post.funktion)}{$smarty.post.funktion}{/if}" size="20" /></td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
{if strlen($msg_vergutung)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_vergutung}</td>
</tr>
{/if}
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Verg&uuml;tung</b></font></td>
</tr>
<tr>
	<td width="170">Monatsbruttogehalt</td>
	<td colspan="3"><input type="text" name="gehalt" {if strlen($msg_vergutung)}class="error"{/if} value="{if isset($smarty.post.gehalt)}{$smarty.post.gehalt}{/if}" size="20" /> &euro;</td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
{if strlen($msg_urlaub)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_urlaub}</td>
</tr>
{/if}
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Urlaub</b></font></td>
</tr>
<tr>
	<td width="170">Anzahl Urlaubstage</td>
	<td colspan="3"><input type="text" name="urlaub" {if strlen($msg_urlaub)}class="error"{/if} value="{if isset($smarty.post.urlaub)}{$smarty.post.urlaub}{/if}" size="20" /></td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="einstellung_allg" value="Ausgabe" /></td>
</tr>
</table>

</form>

<script type="text/javascript">
    /* <![CDATA[ */
check_anstellung();
    /* ]]> */
    </script>