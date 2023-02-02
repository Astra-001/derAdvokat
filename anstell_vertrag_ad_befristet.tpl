<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>Befristeter Anstellungsvertrag f&uuml;r Au&szlig;endienst</h1>
<form name="anstellung" action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" cellpadding="5" class="contenttable">
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
	<td><input type="text" name="titel" value="{$titel}" /></td>
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
	<td width="57"><input type="text" name="plz"  value="{$plz}" size="5" maxlength="5" /></td>
	<td  align="right">Ort*</td>
	<td><input type="text" name="ort"  value="{$ort}" /></td>
</tr>
</table>
<br />
<table border="0" cellpadding="5" class="contenttable">
{if strlen($msg)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg}</td>
</tr>
{/if}
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Mitarbeiters</b></font></td>
</tr>
<tr>
	<td width="170">Anrede*</td>
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
	<td width="57"><input type="text" name="ex_plz" {if strlen($msg_plz)}class="error"{/if} value="{if isset($smarty.post.ex_plz)}{$smarty.post.ex_plz}{/if}" size="5" maxlength="5" /></td>
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
	<td colspan="3" bgcolor="#9FC6FF"><font color="white"><b>Beginn des Arbeitsverh&auml;ltnisses</b></font></td>
</tr>
<tr>
	<td width="170">Befristung</td>
	<td>befristet vom <br />nach § 14 TzBfG <input type="text" name="beginn" {if strlen($msg_beginn)}class="error"{/if} value="{if isset($smarty.post.beginn)}{$smarty.post.beginn}{/if}" size="20" /></td>
	<td><br />bis zum <input type="text" name="bis" {if strlen($msg_bis)}class="error"{/if} value="{if isset($smarty.post.bis)}{$smarty.post.bis}{/if}" size="20" /></td>
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
	<td>Der Arbeitgeber wird dem Mitarbeiter ein Vertriebsgebiet innerhalb von </td>
	<td colspan="3"><input type="text" name="vertriebsgebiet" {if strlen($msg_vertriebsgebiet)}class="error"{/if} value="{if isset($smarty.post.vertriebsgebiet)}{$smarty.post.vertriebsgebiet}{/if}" size="20" /> zugewiesen.</td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
{if strlen($msg_vergutung)}
<tr>
	<td class="fehlermeldung" colspan="3">{$msg_vergutung}</td>
</tr>
{/if}
<tr>
	<td bgcolor="#9FC6FF" colspan="3"><font color="white"><b>Verg&uuml;tung</b></font></td>
</tr>
<tr>
	<td width="170">Monatsbruttogehalt</td>
	<td colspan="2"><input type="text" name="gehalt" {if strlen($msg_vergutung)}class="error"{/if} value="{if isset($smarty.post.gehalt)}{$smarty.post.gehalt}{/if}" size="20" /></td>
</tr>
<tr>
	<td width="170" rowspan="5">Erstattung der Reisekosten</td>

</tr>
<tr>
	<td><input type="radio" name="reisekosten" value="1"  {if $smarty.post.reisekosten == 1} checked="checked" {/if} onclick="check_anstellung_vergutung_ad()" /> Ja</td>
	<td></td>
</tr>
<tr>
	<td>- Verpflegungsspesen t&auml;glich in H&ouml;he von </td>
	<td><input type="text" name="verpflegung" {if strlen($msg_verpflegung)}class="error"{/if} value="{if isset($smarty.post.verpflegung)}{$smarty.post.verpflegung}{/if}" size="20" /> Euro</td>
</tr>
<tr>
	<td>- &Uuml;bernachtungsspesen t&auml;glich in H&ouml;he von </td>
	<td><input type="text" name="ubernachtung" {if strlen($msg_ubernachtung)}class="error"{/if} value="{if isset($smarty.post.ubernachtung)}{$smarty.post.ubernachtung}{/if}" size="20" /> Euro</td>
</tr>
<tr>
	<td><input type="radio" name="reisekosten"  value="2" onclick="check_anstellung_vergutung_ad()" {if $smarty.post.reisekosten == 2} checked="checked" {/if}  /> Nein</td>
	<td></td>
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
	<td align="right" style="padding:10px;"><input type="submit" name="einstellung_allg" value="RTF Ausgabe" /></td>
</tr>
</table>

</form>

<script type="text/javascript">
    /* <![CDATA[ */
check_anstellung();
    /* ]]> */
    </script>
    
<script type="text/javascript">
    /* <![CDATA[ */
check_anstellung_vergutung_ad();
    /* ]]> */
    </script>    
