<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>B&uuml;rgschaftserklärung</h1>
<form name="burg_erkl_eigen_dat" action="{$smarty.server.REQUEST_URI}"  method="post">

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
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Ihre Daten</b></font></td>
</tr>
<tr>
	<td width="170">Anrede</td>
	<td width="60"><select name="geschlecht" onchange="check()">
        <option value="1" {if $smarty.post.geschlecht == 1} selected="selected" {/if}>Herr</option>
        <option value="2" {if $smarty.post.geschlecht == 2} selected="selected" {/if}>Frau</option>
        <option value="3" {if $smarty.post.geschlecht == 3} selected="selected" {/if}>Firma</option>
    </select></td>
    <td align="right" width="57">ggf. Titel</td>
	<td colspan="3"><input type="text" name="titel" value="{$titel}" /></td>
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
	<td width="57"><input type="text" name="plz"  value="{$plz}" size="5"  maxlength="5" /></td>
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
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Vertragspartners</b></font></td>
</tr>
<tr>
	<td width="170">Wer ist der Vertragspartner?</td>
	<td><input type="radio" name="person" value="1" {if $smarty.post.person == 1} checked="checked" {/if} />B&uuml;rge</td>
	<td colspan="2"><input type="radio" name="person" value="2" {if $smarty.post.person == 2} checked="checked" {/if} />Darlehensgeber</td>
</tr>
<tr>
	<td>Anrede*</td>
	<td colspan="1" width="55"><select name="ex_anrede" onchange="check()">
        <option value="1" {if $smarty.post.ex_anrede == 1} selected="selected"{/if}>Herr</option>
        <option value="2" {if $smarty.post.ex_anrede == 2} selected="selected"{/if}>Frau</option>
        <option value="3" {if $smarty.post.ex_anrede == 3} selected="selected"{/if}>Firma</option>
    </select></td>
    <td align="right" width="57">ggf. Titel</td>
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
	<td>ggf. vertreten durch</td>
	<td colspan="3"><input type="text" name="ex_vertreter" {if strlen($msg_vertreter)}class="error"{/if} value="{if isset($smarty.post.ex_vertreter)}{$smarty.post.ex_vertreter}{/if}" size="44" /></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="ex_firmen_name" {if strlen($msg_firmen_name)}class="error"{/if} value="{if isset($smarty.post.ex_firmen_name)}{$smarty.post.ex_firmen_name}{/if}" size="44" /></td>
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
	<td colspan="4" class="fehlermeldung">{$msg_dar}</td>
</tr>
{/if}
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Darlehen</b></font></td>
</tr>
<tr>
	<td width="170">Beginn des Darlehens*</td>
	<td colspan="3"><input type="text" name="beginn_darlehen" {if strlen($msg_beginn)}class="error"{/if} {if isset($smarty.post.beginn_darlehen)}value="{$smarty.post.beginn_darlehen}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} size="20" /></td>
</tr>
<tr>
	<td>Darlehenssumme*</td>
	<td colspan="3"><input type="text" name="darlehen_summe" {if strlen($msg_summe)}class="error"{/if} value="{if isset($smarty.post.darlehen_summe)}{$smarty.post.darlehen_summe}{/if}" size="10" /> Euro</td>
</tr>
<tr>
	<td>Zinssatz*</td>
	<td colspan="3"><input type="text" name="zinssatz" {if strlen($msg_zins)}class="error"{/if} value="{if isset($smarty.post.zinssatz)}{$smarty.post.zinssatz}{/if}" size="10" /> v. H. Jahreszins</td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="darlehen" value="Ausgabe" /></td>
</tr>
</table>

</form>
<script type="text/javascript">
    /* <![CDATA[ */
check();
    /* ]]> */
    </script>

