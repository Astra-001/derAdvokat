<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>Vertrag &uuml;ber die Nutzung eines Dienstfahrzeugs</h1>
<form name="dienstfahrzeug" action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td colspan="4" align="center">
{if strlen($msg_erfolg)}
    <span class="erfolgsmeldung">{$msg_erfolg}</span>
{/if}
{if strlen($msg_fehler)}
    <span class="fehlermeldung">{$msg_fehler}</span>
{/if}
	</td>
</tr>
<tr>
    <td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Arbeitgebers</b></font></td>
</tr>
<tr>
    <td width="170">Anrede</td>
    <td width="60"><select name="geschlecht" onchange="check_form_dienst()">
        <option value="1" {if $smarty.post.geschlecht == 1} selected="selected" {/if}>Herr</option>
        <option value="2" {if $smarty.post.geschlecht == 2} selected="selected" {/if}>Frau</option>
        <option value="3" {if $smarty.post.geschlecht == 3} selected="selected" {/if}>Firma</option>
    </select></td>
    <td width="57" align="right">ggf. Titel</td>
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
    <td width="57"><input type="text" name="plz"  value="{$plz}" size="5" maxlength="5" /></td>
    <td align="right">Ort*</td>
    <td><input type="text" name="ort"  value="{$ort}" /></td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
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
    <td  width="60"><select name="ex_anrede">
        <option value="1" {if $smarty.post.ex_anrede == 1} selected="selected"{/if}>Herr</option>
        <option value="2" {if $smarty.post.ex_anrede == 2} selected="selected"{/if}>Frau</option>
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
    <td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Fahrzeugs</b></font></td>
</tr>
<tr>
    <td width="170">Marke*</td>
    <td colspan="3"><input type="text" name="marke" {if strlen($msg_marke)}class="error"{/if} value="{if isset($smarty.post.marke)}{$smarty.post.marke}{/if}" size="20" /></td>
</tr>
<tr>
    <td>Typ*</td>
    <td colspan="3"><input type="text" name="typ" {if strlen($msg_typ)}class="error"{/if} value="{if isset($smarty.post.typ)}{$smarty.post.typ}{/if}" size="10" /></td>
</tr>
<tr>
    <td>Amtliches Kennzeichen*</td>
    <td colspan="3"><input type="text" name="kennzeichen" {if strlen($msg_kennzeichen)}class="error"{/if} value="{if isset($smarty.post.kennzeichen)}{$smarty.post.kennzeichen}{/if}" size="10" /></td>
</tr></table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
{if strlen($msg_dar_priv)}
<tr>
    <td colspan="4" class="fehlermeldung">{$msg_dar_priv}</td>
</tr>
{/if}
<tr>
    <td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Privatfahrten</b></font></td>
</tr>
<tr>
  <td rowspan="3">Erlaubnis</td>
  <td><input type="radio" name="erlaubnis" value="1" {if $smarty.post.erlaubnis == 1} checked="checked" {/if} onclick="check_dienstfahrzeug()" />Nicht erlaubt</td>
  <td></td>
</tr>
<tr>
  <td><input type="radio" name="erlaubnis" value="2" {if $smarty.post.erlaubnis == 2} checked="checked" {/if} onclick="check_dienstfahrzeug()" />Genehmigung der Gesch&auml;ftsleitung notwendig</td>
  <td></td>
</tr>  
<tr>
  <td><input type="radio" name="erlaubnis" value="3" {if $smarty.post.erlaubnis == 3} checked="checked" {/if} onclick="check_dienstfahrzeug()" />Erlaubt</td>
  <td></td>
</tr>
<tr>
	<td colspan="3"><hr /></td>
</tr>
<tr>
  <td rowspan="3">Zuzahlung f&uuml;r Privatfahrten</td>
  <td><input type="radio" name="zuzahlung" value="1" onclick="check_dienstfahrzeug()" {if $smarty.post.zuzahlung == 1} checked="checked" {else} checked="checked"  {/if} />Keine Zuzahlung</td>
  <td></td>
</tr>
<tr>
  <td><input type="radio" name="zuzahlung" value="2" {if $smarty.post.zuzahlung == 2} checked="checked" {/if} onclick="check_dienstfahrzeug()" />Zahlung einer Kilometerpauschale in Höhe von </td>
  <td><input type="text" name="km_pauschale_summe" {if strlen($msg_km_pauschale_summe)}class="error"{/if} value="{if isset($smarty.post.km_pauschale_summe)}{$smarty.post.km_pauschale_summe}{/if}" size="10" /> Euro</td>
</tr>
<tr>
  <td><input type="radio" name="zuzahlung" value="3" {if $smarty.post.zuzahlung == 3} checked="checked" {/if} onclick="check_dienstfahrzeug()" />Zahlung einer Monatspauschale in Höhe von </td>
  <td><input type="text" name="monats_pauschale_summe" {if strlen($msg_monats_pauschale_summe)}class="error"{/if} value="{if isset($smarty.post.monats_pauschale_summe)}{$smarty.post.monats_pauschale_summe}{/if}" size="10" /> Euro</td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
    <td align="right" style="padding:10px;"><input type="submit" name="dienstfahrzeug" value="Ausgabe" /></td>
</tr>
</table>
</form>

<script type="text/javascript">
    /* <![CDATA[ */
check_dienstfahrzeug();
    /* ]]> */
    </script>
    
    <script type="text/javascript">
    /* <![CDATA[ */
check_form_dienst();
    /* ]]> */
    </script>