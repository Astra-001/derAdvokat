<script type="text/javascript"  src="/derAdvokat/js/wz_tooltip.js"></script>
<script type="text/javascript" src="/derAdvokat/js/tip_followscroll.js"></script>
<script type="text/javascript" src="/derAdvokat/js/tip_centerwindow.js"></script>
<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>Sicherungsvertrag - Grundst&uuml;ck</h1>
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
	<td colspan="4">
	
	<table border="0">
	<tr>
		<td width="170">Wer ist der Vertragspartner?</td>
		<td><input type="radio" name="person" value="1" {if $smarty.post.person == 1} checked="checked" {/if} />Sicherungsgeber</td>
		<td colspan="2"><input type="radio" name="person" value="2" {if $smarty.post.person == 2} checked="checked" {/if} />Sicherungsnehmer</td>
	</tr>
	</table>
	
	</td>
</tr>	
<tr>
	<td width="170">Anrede*</td>
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
	<td colspan="4"  bgcolor="#9FC6FF"><font color="white"><b>Darlehen</b></font></td>
</tr>
<tr>
	<td width="170">Darlehenssumme*</td>
	<td><input type="text" name="darlehen_summe" {if strlen($msg_summe)}class="error"{/if} value="{if isset($smarty.post.darlehen_summe)}{$smarty.post.darlehen_summe}{/if}" size="10" /> Euro</td>
	<td align="right">nebst*</td>
	<td><input type="text" name="zinssatz" {if strlen($msg_zins)}class="error"{/if} value="{if isset($smarty.post.zinssatz)}{$smarty.post.zinssatz}{/if}" size="10" /> v. H. Jahreszins</td>
</tr>
<tr>
	<td>Grundst&uuml;cksbezeichnung</td>
	<td width="150" colspan="3">
	
	<textarea name="grundstuck_bezeichnung" {if strlen($msg_grundstuck_bezeichnung)}class="error"{/if} cols="50" rows="2">{if isset($smarty.post.grundstuck_bezeichnung)}{$smarty.post.grundstuck_bezeichnung}{/if}</textarea></td>
</tr>
<tr>
	<td>Beginn des Darlehens*</td>
	<td width="150"><input type="text" name="beginn_darlehen" {if strlen($msg_beginn)}class="error"{/if} {if isset($smarty.post.beginn_darlehen)}value="{$smarty.post.beginn_darlehen}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} size="20" /></td>
	<!--<td align="right" width="80">Dauer*</td>
	<td><input type="text" name="dauer" {if strlen($msg_dauer)}class="error"{/if} value="{if isset($smarty.post.dauer)}{$smarty.post.dauer}{/if}" size="20" /></td>//-->
	<td align="right" width="80"></td>
	<td></td>
</tr>
<tr>
	<td rowspan="4">Grundst&uuml;cksbezeichnung</td>
	<td>Grundst&uuml;ck FIStNr.*</td>
	<td><input type="text" name="grundstuck" {if strlen($msg_grundstuck)}class="error"{/if} value="{if isset($smarty.post.grundstuck)}{$smarty.post.grundstuck}{/if}" size="20" /></td>
	<td></td>
</tr>
<tr>
	<td>auf Gemarkung*</td>
	<td><input type="text" name="gemarkung" {if strlen($msg_gemarkung)}class="error"{/if} value="{if isset($smarty.post.gemarkung)}{$smarty.post.gemarkung}{/if}" size="20" /></td>
	<td></td>
</tr>
<tr>
	<td>eingetragen im Grundbuch von*</td>
	<td><input type="text" name="grundbuch" {if strlen($msg_grundbuch)}class="error"{/if} value="{if isset($smarty.post.grundbuch)}{$smarty.post.grundbuch}{/if}" size="20" /></td>
	<td></td>
</tr>
<tr>
	<td>Blatt*</td>
	<td><input type="text" name="blatt" {if strlen($msg_blatt)}class="error"{/if} value="{if isset($smarty.post.blatt)}{$smarty.post.blatt}{/if}" size="20" /></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td>und Grundst&uuml;cke FIStNr.</td>
	<td><input type="text" name="und_grundstuck" {if strlen($msg_und_grundstuck)}class="error"{/if} value="{if isset($smarty.post.und_grundstuck)}{$smarty.post.und_grundstuck}{/if}" size="20" /></td>
	<td><img src="/derAdvokat/grafik/frage.png" onmouseover="Tip('z.B. wenn Sie noch ein Grundstück eintragen möchten.')" onmouseout="UnTip()" alt="zusätzlicher Grundstück" /></td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
{if strlen($msg_voreintragungen)}
<tr>
	<td colspan="2" class="fehlermeldung">{$msg_voreintragungen}</td>
</tr>
{/if}
<tr>
	<td colspan="2" bgcolor="#9FC6FF"><font color="white"><b>Eigentum und Voreintragungen</b></font></td>
</tr>
<tr>
	<td width="170">Belastungen und Voreintragungen*</td>
	<td><textarea name="belastung" {if strlen($msg_belastung)}class="error"{/if} cols="50" rows="3">{if !is_numeric($smarty.post.belastung)}{$smarty.post.belastung}{/if}</textarea><img src="/derAdvokat/grafik/frage.png" onmouseover="Tip('z.B. welche Belastungen Sie hatten oder welche Voreintragungen, usw.,<br /> falls Sie keine hatten, dann lassen Sie diesen Feld frei.')" onmouseout="UnTip()" alt="Belastungen" /></td>
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

