<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>

<h1>Zeugnis f&uuml;r Arbeitnehmer</h1>
<form action="{$smarty.server.REQUEST_URI}"  method="post">

{if strlen($error)}
<div class="fehlermeldung">{$error}</div>
{/if}
<h3>1. Daten des Arbeitnehmers</h3>
<table border="0" cellpadding="5" class="contenttable">
<tr>
	<td width="233">Anrede</td>
	<td colspan="3"><select name="geschlecht">
        <option value="1" {if $smarty.post.geschlecht == 1} selected="selected"{/if}>Herr</option>
        <option value="2" {if $smarty.post.geschlecht == 2} selected="selected"{/if}>Frau</option>
    </select></td>
    <td></td>
</tr>
<tr>
	<td>Name*</td>
	<td colspan="3"><input type="text" name="name" {if strlen($msg_name)}class="error"{/if} value="{if !is_numeric($smarty.post.name)}{$smarty.post.name}{/if}" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Vorname*</td>
	<td colspan="3"><input type="text" name="vorname" {if strlen($msg_vorname)}class="error"{/if} value="{if !is_numeric($smarty.post.vorname)}{$smarty.post.vorname}{/if}" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Geburtsdatum*</td>
	<td colspan="3"><input type="text" name="geb_datum" {if strlen($msg_geb_datum)}class="error"{/if} value="{if !is_numeric($smarty.post.geb_datum)}{$smarty.post.geb_datum}{/if}" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Geburtsort*</td>
	<td colspan="3"><input type="text" name="geb_ort" {if strlen($msg_geb_ort)}class="error"{/if} value="{if !is_numeric($smarty.post.geb_ort)}{$smarty.post.geb_ort}{/if}" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>ggf. Titel</td>
	<td colspan="3"><input type="text" name="titel" {if strlen($msg)}class="error"{/if} value="{if !is_numeric($smarty.post.titel)}{$smarty.post.titel}{/if}" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Stra&szlig;e und Hausnummer*</td>
	<td colspan="3"><input type="text" name="strasse" {if strlen($msg_strasse)}class="error"{/if} value="{if !is_numeric($smarty.post.strasse)}{$smarty.post.strasse}{/if}" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td><input type="text" name="plz" {if strlen($msg_plz)}class="error"{/if} value="{if is_numeric($smarty.post.plz)}{$smarty.post.plz}{/if}" size="5" maxlength="5" /></td>
	<td>Ort*</td>
	<td><input type="text" name="ort" {if strlen($msg_ort)}class="error"{/if} value="{if !is_numeric($smarty.post.ort)}{$smarty.post.ort}{/if}" size="33" /></td>
	<td width="150"></td>
</tr>
<tr>
	<td>Beginn des Arbeitsvertrages*</td>
	<td colspan="3"><input type="text" name="beginn_arbeitsvertrag" {if strlen($msg_beginn_arbeitsvertrag)}class="error"{/if} {if $smarty.post.beginn_arbeitsvertrag}{if !is_numeric($smarty.post.beginn_arbeitsvertrag)}value="{$smarty.post.beginn_arbeitsvertrag}"{/if}{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Ende des Arbeitsvertrages*</td>
	<td colspan="3"><input type="text" name="ende_arbeitsvertrag" {if strlen($msg_ende_arbeitsvertrag)}class="error"{/if} {if $smarty.post.ende_arbeitsvertrag}{if !is_numeric($smarty.post.ende_arbeitsvertrag)}value="{$smarty.post.ende_arbeitsvertrag}"{/if}{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} size="50" /></td>
	<td></td>
</tr>
<tr>
	<td colspan="5"><hr /></td>
</tr>	
<tr>
	<td>Grund der Beendigung*</td>
	<td colspan="3">
<input type="radio" name="ende_grund" value="1" {if $smarty.post.ende_grund == 1} checked {/if} />auf eigenen Wunsch<br />
<input type="radio" name="ende_grund" value="2" {if $smarty.post.ende_grund == 2} checked {/if} />einvernehmlich<br />
<input type="radio" name="ende_grund" value="3" {if $smarty.post.ende_grund == 3} checked {/if} />betriebsbedingte K&uuml;ndigung<br />
<input type="radio" name="ende_grund" value="4" {if $smarty.post.ende_grund == 4} checked {/if} />personenbedingte Kündigung (Krankheit etc.)<br />
<input type="radio" name="ende_grund" value="5" {if $smarty.post.ende_grund == 5} checked {/if} />sonstige Kündigung</td>
<td></td>
</tr>
</table>
<h3>2. Aufgabenbeschreibung</h3>
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="233">Bezeichnung des Arbeitsplatzes*</td>
	<td><textarea name="bezeichnung_arb_platz" {if strlen($msg_bezeichnung_arb_platz)}class="error"{/if} cols="50" rows="3">{if !is_numeric($smarty.post.bezeichnung_arb_platz)}{$smarty.post.bezeichnung_arb_platz}{/if}</textarea><img src="../grafik/frage.png" alt="Hilfe" onmouseover="Tip('z.B. Verkaufsassistent, Verkaufsleiter usw.')" onmouseout="UnTip()"/></td>
</tr>
<tr>
	<td>Aufgaben des Arbeitnehmers*</td>
	<td><textarea name="aufgabe_arb_nehmer" cols="50" rows="3">{if !is_numeric($smarty.post.aufgabe_arb_nehmer)}{$smarty.post.aufgabe_arb_nehmer}{/if}</textarea><img src="../grafik/frage.png" alt="Hilfe" onmouseover="Tip('z.B. Seine Aufgaben waren:<br/><br/>-telefonische Auftragsannahme<br/>-Erstellung von Lieferscheinen<br/>-Planung der Auslieferungstouren<br/>-Erstellung der Rechnungen<br/>-Betreuung der Kunden im Außendienst')" onmouseout="UnTip()"/></td>
</tr>
<tr>
	<td>Kompetenzen und Vollmachten<br/>(nur ausf&uuml;llen, soweit zutreffend)</td>
	<td><textarea name="kompetenz" cols="50" rows="3">{if !is_numeric($smarty.post.kompetenz)}{$smarty.post.kompetenz}{/if}</textarea><img src="../grafik/frage.png" alt="Hilfe" onmouseover="Tip('z.B. Er war als Gruppenleiter tätig und <br/>führte drei Mitarbeiter')" onmouseout="UnTip()"/></td>
</tr>
<tr>
	<td>Erweiterung des Aufgabenbereichs<br />(nur ausf&uuml;llen soweit zutreffen)</td>
	<td><textarea name="erw_aufgaben_bereich" cols="50" rows="3">{if !is_numeric($smarty.post.erw_aufgaben_bereich)}{$smarty.post.erw_aufgaben_bereich}{/if}</textarea><img src="../grafik/frage.png" alt="Hilfe" onmouseover="Tip('z.B. Herr Mustermann übernahm im September 2008<br/> auch den Bereich Personalcoaching')" onmouseout="UnTip()"/></td>
</tr>
<tr>
	<td>Ver&auml;nderung des Aufgabenbereichs<br />(nur ausf&uuml;llen soweit zutreffen)</td>
	<td><textarea name="ver_aufgaben_bereich" cols="50" rows="3">{if !is_numeric($smarty.post.ver_aufgaben_bereich)}{$smarty.post.ver_aufgaben_bereich}{/if}</textarea><img src="../grafik/frage.png" alt="Hilfe" onmouseover="Tip('z.B. Von April 2008<br/>an war er für den Bereich<br/>Service tätig.')" onmouseout="UnTip()"/></td>
</tr>
</table>
<h3>3. Benotung</h3>
<h4>A. Leistung</h4>
	<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="270">Berufserfahrung des<br /> Arbeitnehmers in dem Beruf<br /> vor Beginn des Arbeitsvertrages*</td>
	<td>
<input type="radio" name="berufserfahrung" value="1" {if $smarty.post.berufserfahrung == 1} checked {/if} />keine<br />
<input type="radio" name="berufserfahrung" value="2" {if $smarty.post.berufserfahrung == 2} checked {/if} />unter einem Jahr<br />
<input type="radio" name="berufserfahrung" value="3" {if $smarty.post.berufserfahrung == 3} checked {/if} />1-4 Jahre<br />
<input type="radio" name="berufserfahrung" value="4" {if $smarty.post.berufserfahrung == 4} checked {/if} />&uuml;ber 5 Jahre</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Einarbeitungszeit bei<br />Aufnahme der T&auml;tigkeit*</td>
	<td>
<input type="radio" name="einarbeitung" value="1" {if $smarty.post.einarbeitung == 1} checked {/if} />sehr schnell<br />
<input type="radio" name="einarbeitung" value="2" {if $smarty.post.einarbeitung == 2} checked {/if} />schnell<br />
<input type="radio" name="einarbeitung" value="3" {if $smarty.post.einarbeitung == 3} checked {/if} />durchschnittlich<br />
<input type="radio" name="einarbeitung" value="4" {if $smarty.post.einarbeitung == 4} checked {/if} />langsam<br />
<input type="radio" name="einarbeitung" value="5" {if $smarty.post.einarbeitung == 5} checked {/if} />schaffte die Einarbeitung nicht vollst&auml;ndig</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Qualit&auml;t der Arbeit*</td>
	<td>
<input type="radio" name="qualitat" value="1" {if $smarty.post.qualitat == 1} checked {/if} />sehr gut<br />
<input type="radio" name="qualitat" value="2" {if $smarty.post.qualitat == 2} checked {/if} />gut<br />
<input type="radio" name="qualitat" value="3" {if $smarty.post.qualitat == 3} checked {/if} />befriedigend<br />
<input type="radio" name="qualitat" value="4" {if $smarty.post.qualitat == 4} checked {/if} />ausreichend<br />
<input type="radio" name="qualitat" value="5" {if $smarty.post.qualitat == 5} checked {/if} />mangelhaft</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Quantit&auml;t der Arbeit*<br />(Arbeitsgeschwindigkeit)</td>
	<td>
<input type="radio" name="quantitat" value="1" {if $smarty.post.quantitat == 1} checked {/if} />sehr gut<br />
<input type="radio" name="quantitat" value="2" {if $smarty.post.quantitat == 2} checked {/if} />gut<br />
<input type="radio" name="quantitat" value="3" {if $smarty.post.quantitat == 3} checked {/if} />befriedigend<br />
<input type="radio" name="quantitat" value="4" {if $smarty.post.quantitat == 4} checked {/if} />ausreichend<br />
<input type="radio" name="quantitat" value="5" {if $smarty.post.quantitat == 5} checked {/if} />mangelhaft</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Arbeitsbef&auml;higung*<br />(insgesamt)</td>
	<td>
<input type="radio" name="arbeits_befahigung" value="1" {if $smarty.post.arbeits_befahigung == 1} checked {/if} />sehr gut<br />
<input type="radio" name="arbeits_befahigung" value="2" {if $smarty.post.arbeits_befahigung == 2} checked {/if} />gut<br />
<input type="radio" name="arbeits_befahigung" value="3" {if $smarty.post.arbeits_befahigung == 3} checked {/if} />befriedigend<br />
<input type="radio" name="arbeits_befahigung" value="4" {if $smarty.post.arbeits_befahigung == 4} checked {/if} />ausreichend<br />
<input type="radio" name="arbeits_befahigung" value="5" {if $smarty.post.arbeits_befahigung == 5} checked {/if} />mangelhaft</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Engagement</td>
	<td>
<input type="radio" name="engagement" value="1" {if $smarty.post.engagement == 1} checked {/if} />sehr gut<br />
<input type="radio" name="engagement" value="2" {if $smarty.post.engagement == 2} checked {/if} />gut<br />
<input type="radio" name="engagement" value="3" {if $smarty.post.engagement == 3} checked {/if} />befriedigend<br />
<input type="radio" name="engagement" value="4" {if $smarty.post.engagement == 4} checked {/if} />ausreichend<br />
<input type="radio" name="engagement" value="5" {if $smarty.post.engagement == 5} checked {/if} />mangelhaft</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Besondere Leistungen*<br />(Weiterentwicklung von Arbeitsabl&auml;ufen)</td>
	<td>
<input type="radio" name="bes_leistungen" value="1" {if $smarty.post.bes_leistungen == 1} checked {/if} />sehr gut<br />
<input type="radio" name="bes_leistungen" value="2" {if $smarty.post.bes_leistungen == 2} checked {/if} />gut<br />
<input type="radio" name="bes_leistungen" value="3" {if $smarty.post.bes_leistungen == 3} checked {/if} />befriedigend<br />
<input type="radio" name="bes_leistungen" value="4" {if $smarty.post.bes_leistungen == 4} checked {/if} />keine</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Gesamtnote der Leistung*</td>
	<td>
<input type="radio" name="leistung_gesamt_note" value="1" {if $smarty.post.leistung_gesamt_note == 1} checked {/if} />sehr gut<br />
<input type="radio" name="leistung_gesamt_note" value="2" {if $smarty.post.leistung_gesamt_note == 2} checked {/if} />gut<br />
<input type="radio" name="leistung_gesamt_note" value="3" {if $smarty.post.leistung_gesamt_note == 3} checked {/if} />befriedigend<br />
<input type="radio" name="leistung_gesamt_note" value="4" {if $smarty.post.leistung_gesamt_note == 4} checked {/if} />ausreichend<br />
<input type="radio" name="leistung_gesamt_note" value="5" {if $smarty.post.leistung_gesamt_note == 5} checked {/if} />mangelhaft</td>
</tr>
</table>
<h4>B. Verhalten</h4>
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="270">gegen&uuml;ber Vorgesetzten*</td>
	<td>
<input type="radio" name="vorgesetzte" value="1" {if $smarty.post.vorgesetzte == 1} checked {/if} />sehr gut<br />
<input type="radio" name="vorgesetzte" value="2" {if $smarty.post.vorgesetzte == 2} checked {/if} />gut<br />
<input type="radio" name="vorgesetzte" value="3" {if $smarty.post.vorgesetzte == 3} checked {/if} />befriedigend<br />
<input type="radio" name="vorgesetzte" value="4" {if $smarty.post.vorgesetzte == 4} checked {/if} />ausreichend<br />
<input type="radio" name="vorgesetzte" value="5" {if $smarty.post.vorgesetzte == 5} checked {/if} />mangelhaft<br />
<input type="radio" name="vorgesetzte" value="6" {if $smarty.post.vorgesetzte == 6} checked {/if} />keine Vorgesetzten vorhanden</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>gegen&uuml;ber Kollegen*</td>
	<td>
<input type="radio" name="kollegen" value="1" {if $smarty.post.kollegen == 1} checked {/if} />sehr gut<br />
<input type="radio" name="kollegen" value="2" {if $smarty.post.kollegen == 2} checked {/if} />gut<br />
<input type="radio" name="kollegen" value="3" {if $smarty.post.kollegen == 3} checked {/if} />befriedigend<br />
<input type="radio" name="kollegen" value="4" {if $smarty.post.kollegen == 4} checked {/if} />ausreichend<br />
<input type="radio" name="kollegen" value="5" {if $smarty.post.kollegen == 5} checked {/if} />mangelhaft<br />
<input type="radio" name="kollegen" value="6" {if $smarty.post.kollegen == 6} checked {/if} />keine Kollegen vorhanden</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>gegen&uuml;ber Untergebenen*</td>
	<td>
<input type="radio" name="untergebene" value="1" {if $smarty.post.untergebene == 1} checked {/if} />sehr gut<br />
<input type="radio" name="untergebene" value="2" {if $smarty.post.untergebene == 2} checked {/if} />gut<br />
<input type="radio" name="untergebene" value="3" {if $smarty.post.untergebene == 3} checked {/if} />befriedigend<br />
<input type="radio" name="untergebene" value="4" {if $smarty.post.untergebene == 4} checked {/if} />ausreichend<br />
<input type="radio" name="untergebene" value="5" {if $smarty.post.untergebene == 5} checked {/if} />mangelhaft<br />
<input type="radio" name="untergebene" value="6" {if $smarty.post.untergebene == 6} checked {/if} />keine Untergebenen vorhanden</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>gegen&uuml;ber Kunden*</td>
	<td>
<input type="radio" name="kunden" value="1" {if $smarty.post.kunden == 1} checked {/if} />sehr gut<br />
<input type="radio" name="kunden" value="2" {if $smarty.post.kunden == 2} checked {/if} />gut<br />
<input type="radio" name="kunden" value="3" {if $smarty.post.kunden == 3} checked {/if} />befriedigend<br />
<input type="radio" name="kunden" value="4" {if $smarty.post.kunden == 4} checked {/if} />ausreichend<br />
<input type="radio" name="kunden" value="5" {if $smarty.post.kunden == 5} checked {/if} />mangelhaft<br />
<input type="radio" name="kunden" value="6" {if $smarty.post.kunden == 6} checked {/if} />kein Kundenkontakt</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Auftreten*</td>
	<td>
<input type="radio" name="auftreten" value="1" {if $smarty.post.auftreten == 1} checked {/if} />sehr gut<br />
<input type="radio" name="auftreten" value="2" {if $smarty.post.auftreten == 2} checked {/if} />gut<br />
<input type="radio" name="auftreten" value="3" {if $smarty.post.auftreten == 3} checked {/if} />befriedigend<br />
<input type="radio" name="auftreten" value="4" {if $smarty.post.auftreten == 4} checked {/if} />ausreichend<br />
<input type="radio" name="auftreten" value="5" {if $smarty.post.auftreten == 5} checked {/if} />mangelhaft</td>
</tr>
</table>
<h4>C. Gesamtnote*</h4>
<table border="0" cellpadding="5" class="contenttable" width="100%">
	<tr>
	<td width="270"></td>
	<td>
<input type="radio" name="ges_note" value="1" {if $smarty.post.ges_note == 5} checked {/if} />sehr gut<br />
<input type="radio" name="ges_note" value="2" {if $smarty.post.ges_note == 5} checked {/if} />gut<br />
<input type="radio" name="ges_note" value="3" {if $smarty.post.ges_note == 5} checked {/if} />befriedigend<br />
<input type="radio" name="ges_note" value="4" {if $smarty.post.ges_note == 5} checked {/if} />ausreichend<br />
<input type="radio" name="ges_note" value="5" {if $smarty.post.ges_note == 5} checked {/if} />mangelhaft</td>
</tr>
</table>
<br />
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="sent" value="Ausgabe" /></td>
</tr>
</table>
</form>