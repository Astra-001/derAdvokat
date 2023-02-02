<?php /* Smarty version 2.6.18, created on 2014-10-27 12:23:47
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/zeugnis_arbeitsnehmer_eingabe_form.tpl */ ?>
<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>

<h1>Zeugnis f&uuml;r Arbeitnehmer</h1>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">

<?php if (strlen ( $this->_tpl_vars['error'] )): ?>
<div class="fehlermeldung"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>
<h3>1. Daten des Arbeitnehmers</h3>
<table border="0" cellpadding="5" class="contenttable">
<tr>
	<td width="233">Anrede</td>
	<td colspan="3"><select name="geschlecht">
        <option value="1" <?php if ($_POST['geschlecht'] == 1): ?> selected="selected"<?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['geschlecht'] == 2): ?> selected="selected"<?php endif; ?>>Frau</option>
    </select></td>
    <td></td>
</tr>
<tr>
	<td>Name*</td>
	<td colspan="3"><input type="text" name="name" <?php if (strlen ( $this->_tpl_vars['msg_name'] )): ?>class="error"<?php endif; ?> value="<?php if (! is_numeric ( $_POST['name'] )): ?><?php echo $_POST['name']; ?>
<?php endif; ?>" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Vorname*</td>
	<td colspan="3"><input type="text" name="vorname" <?php if (strlen ( $this->_tpl_vars['msg_vorname'] )): ?>class="error"<?php endif; ?> value="<?php if (! is_numeric ( $_POST['vorname'] )): ?><?php echo $_POST['vorname']; ?>
<?php endif; ?>" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Geburtsdatum*</td>
	<td colspan="3"><input type="text" name="geb_datum" <?php if (strlen ( $this->_tpl_vars['msg_geb_datum'] )): ?>class="error"<?php endif; ?> value="<?php if (! is_numeric ( $_POST['geb_datum'] )): ?><?php echo $_POST['geb_datum']; ?>
<?php endif; ?>" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Geburtsort*</td>
	<td colspan="3"><input type="text" name="geb_ort" <?php if (strlen ( $this->_tpl_vars['msg_geb_ort'] )): ?>class="error"<?php endif; ?> value="<?php if (! is_numeric ( $_POST['geb_ort'] )): ?><?php echo $_POST['geb_ort']; ?>
<?php endif; ?>" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>ggf. Titel</td>
	<td colspan="3"><input type="text" name="titel" <?php if (strlen ( $this->_tpl_vars['msg'] )): ?>class="error"<?php endif; ?> value="<?php if (! is_numeric ( $_POST['titel'] )): ?><?php echo $_POST['titel']; ?>
<?php endif; ?>" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Stra&szlig;e und Hausnummer*</td>
	<td colspan="3"><input type="text" name="strasse" <?php if (strlen ( $this->_tpl_vars['msg_strasse'] )): ?>class="error"<?php endif; ?> value="<?php if (! is_numeric ( $_POST['strasse'] )): ?><?php echo $_POST['strasse']; ?>
<?php endif; ?>" size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td><input type="text" name="plz" <?php if (strlen ( $this->_tpl_vars['msg_plz'] )): ?>class="error"<?php endif; ?> value="<?php if (is_numeric ( $_POST['plz'] )): ?><?php echo $_POST['plz']; ?>
<?php endif; ?>" size="5" maxlength="5" /></td>
	<td>Ort*</td>
	<td><input type="text" name="ort" <?php if (strlen ( $this->_tpl_vars['msg_ort'] )): ?>class="error"<?php endif; ?> value="<?php if (! is_numeric ( $_POST['ort'] )): ?><?php echo $_POST['ort']; ?>
<?php endif; ?>" size="33" /></td>
	<td width="150"></td>
</tr>
<tr>
	<td>Beginn des Arbeitsvertrages*</td>
	<td colspan="3"><input type="text" name="beginn_arbeitsvertrag" <?php if (strlen ( $this->_tpl_vars['msg_beginn_arbeitsvertrag'] )): ?>class="error"<?php endif; ?> <?php if ($_POST['beginn_arbeitsvertrag']): ?><?php if (! is_numeric ( $_POST['beginn_arbeitsvertrag'] )): ?>value="<?php echo $_POST['beginn_arbeitsvertrag']; ?>
"<?php endif; ?><?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> size="50" /></td>
	<td></td>
</tr>
<tr>
	<td>Ende des Arbeitsvertrages*</td>
	<td colspan="3"><input type="text" name="ende_arbeitsvertrag" <?php if (strlen ( $this->_tpl_vars['msg_ende_arbeitsvertrag'] )): ?>class="error"<?php endif; ?> <?php if ($_POST['ende_arbeitsvertrag']): ?><?php if (! is_numeric ( $_POST['ende_arbeitsvertrag'] )): ?>value="<?php echo $_POST['ende_arbeitsvertrag']; ?>
"<?php endif; ?><?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> size="50" /></td>
	<td></td>
</tr>
<tr>
	<td colspan="5"><hr /></td>
</tr>	
<tr>
	<td>Grund der Beendigung*</td>
	<td colspan="3">
<input type="radio" name="ende_grund" value="1" <?php if ($_POST['ende_grund'] == 1): ?> checked <?php endif; ?> />auf eigenen Wunsch<br />
<input type="radio" name="ende_grund" value="2" <?php if ($_POST['ende_grund'] == 2): ?> checked <?php endif; ?> />einvernehmlich<br />
<input type="radio" name="ende_grund" value="3" <?php if ($_POST['ende_grund'] == 3): ?> checked <?php endif; ?> />betriebsbedingte K&uuml;ndigung<br />
<input type="radio" name="ende_grund" value="4" <?php if ($_POST['ende_grund'] == 4): ?> checked <?php endif; ?> />personenbedingte Kündigung (Krankheit etc.)<br />
<input type="radio" name="ende_grund" value="5" <?php if ($_POST['ende_grund'] == 5): ?> checked <?php endif; ?> />sonstige Kündigung</td>
<td></td>
</tr>
</table>
<h3>2. Aufgabenbeschreibung</h3>
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="233">Bezeichnung des Arbeitsplatzes*</td>
	<td><textarea name="bezeichnung_arb_platz" <?php if (strlen ( $this->_tpl_vars['msg_bezeichnung_arb_platz'] )): ?>class="error"<?php endif; ?> cols="50" rows="3"><?php if (! is_numeric ( $_POST['bezeichnung_arb_platz'] )): ?><?php echo $_POST['bezeichnung_arb_platz']; ?>
<?php endif; ?></textarea><img src="../grafik/frage.png" alt="Hilfe" onmouseover="Tip('z.B. Verkaufsassistent, Verkaufsleiter usw.')" onmouseout="UnTip()"/></td>
</tr>
<tr>
	<td>Aufgaben des Arbeitnehmers*</td>
	<td><textarea name="aufgabe_arb_nehmer" cols="50" rows="3"><?php if (! is_numeric ( $_POST['aufgabe_arb_nehmer'] )): ?><?php echo $_POST['aufgabe_arb_nehmer']; ?>
<?php endif; ?></textarea><img src="../grafik/frage.png" alt="Hilfe" onmouseover="Tip('z.B. Seine Aufgaben waren:<br/><br/>-telefonische Auftragsannahme<br/>-Erstellung von Lieferscheinen<br/>-Planung der Auslieferungstouren<br/>-Erstellung der Rechnungen<br/>-Betreuung der Kunden im Außendienst')" onmouseout="UnTip()"/></td>
</tr>
<tr>
	<td>Kompetenzen und Vollmachten<br/>(nur ausf&uuml;llen, soweit zutreffend)</td>
	<td><textarea name="kompetenz" cols="50" rows="3"><?php if (! is_numeric ( $_POST['kompetenz'] )): ?><?php echo $_POST['kompetenz']; ?>
<?php endif; ?></textarea><img src="../grafik/frage.png" alt="Hilfe" onmouseover="Tip('z.B. Er war als Gruppenleiter tätig und <br/>führte drei Mitarbeiter')" onmouseout="UnTip()"/></td>
</tr>
<tr>
	<td>Erweiterung des Aufgabenbereichs<br />(nur ausf&uuml;llen soweit zutreffen)</td>
	<td><textarea name="erw_aufgaben_bereich" cols="50" rows="3"><?php if (! is_numeric ( $_POST['erw_aufgaben_bereich'] )): ?><?php echo $_POST['erw_aufgaben_bereich']; ?>
<?php endif; ?></textarea><img src="../grafik/frage.png" alt="Hilfe" onmouseover="Tip('z.B. Herr Mustermann übernahm im September 2008<br/> auch den Bereich Personalcoaching')" onmouseout="UnTip()"/></td>
</tr>
<tr>
	<td>Ver&auml;nderung des Aufgabenbereichs<br />(nur ausf&uuml;llen soweit zutreffen)</td>
	<td><textarea name="ver_aufgaben_bereich" cols="50" rows="3"><?php if (! is_numeric ( $_POST['ver_aufgaben_bereich'] )): ?><?php echo $_POST['ver_aufgaben_bereich']; ?>
<?php endif; ?></textarea><img src="../grafik/frage.png" alt="Hilfe" onmouseover="Tip('z.B. Von April 2008<br/>an war er für den Bereich<br/>Service tätig.')" onmouseout="UnTip()"/></td>
</tr>
</table>
<h3>3. Benotung</h3>
<h4>A. Leistung</h4>
	<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="270">Berufserfahrung des<br /> Arbeitnehmers in dem Beruf<br /> vor Beginn des Arbeitsvertrages*</td>
	<td>
<input type="radio" name="berufserfahrung" value="1" <?php if ($_POST['berufserfahrung'] == 1): ?> checked <?php endif; ?> />keine<br />
<input type="radio" name="berufserfahrung" value="2" <?php if ($_POST['berufserfahrung'] == 2): ?> checked <?php endif; ?> />unter einem Jahr<br />
<input type="radio" name="berufserfahrung" value="3" <?php if ($_POST['berufserfahrung'] == 3): ?> checked <?php endif; ?> />1-4 Jahre<br />
<input type="radio" name="berufserfahrung" value="4" <?php if ($_POST['berufserfahrung'] == 4): ?> checked <?php endif; ?> />&uuml;ber 5 Jahre</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Einarbeitungszeit bei<br />Aufnahme der T&auml;tigkeit*</td>
	<td>
<input type="radio" name="einarbeitung" value="1" <?php if ($_POST['einarbeitung'] == 1): ?> checked <?php endif; ?> />sehr schnell<br />
<input type="radio" name="einarbeitung" value="2" <?php if ($_POST['einarbeitung'] == 2): ?> checked <?php endif; ?> />schnell<br />
<input type="radio" name="einarbeitung" value="3" <?php if ($_POST['einarbeitung'] == 3): ?> checked <?php endif; ?> />durchschnittlich<br />
<input type="radio" name="einarbeitung" value="4" <?php if ($_POST['einarbeitung'] == 4): ?> checked <?php endif; ?> />langsam<br />
<input type="radio" name="einarbeitung" value="5" <?php if ($_POST['einarbeitung'] == 5): ?> checked <?php endif; ?> />schaffte die Einarbeitung nicht vollst&auml;ndig</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Qualit&auml;t der Arbeit*</td>
	<td>
<input type="radio" name="qualitat" value="1" <?php if ($_POST['qualitat'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="qualitat" value="2" <?php if ($_POST['qualitat'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="qualitat" value="3" <?php if ($_POST['qualitat'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="qualitat" value="4" <?php if ($_POST['qualitat'] == 4): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="qualitat" value="5" <?php if ($_POST['qualitat'] == 5): ?> checked <?php endif; ?> />mangelhaft</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Quantit&auml;t der Arbeit*<br />(Arbeitsgeschwindigkeit)</td>
	<td>
<input type="radio" name="quantitat" value="1" <?php if ($_POST['quantitat'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="quantitat" value="2" <?php if ($_POST['quantitat'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="quantitat" value="3" <?php if ($_POST['quantitat'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="quantitat" value="4" <?php if ($_POST['quantitat'] == 4): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="quantitat" value="5" <?php if ($_POST['quantitat'] == 5): ?> checked <?php endif; ?> />mangelhaft</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Arbeitsbef&auml;higung*<br />(insgesamt)</td>
	<td>
<input type="radio" name="arbeits_befahigung" value="1" <?php if ($_POST['arbeits_befahigung'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="arbeits_befahigung" value="2" <?php if ($_POST['arbeits_befahigung'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="arbeits_befahigung" value="3" <?php if ($_POST['arbeits_befahigung'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="arbeits_befahigung" value="4" <?php if ($_POST['arbeits_befahigung'] == 4): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="arbeits_befahigung" value="5" <?php if ($_POST['arbeits_befahigung'] == 5): ?> checked <?php endif; ?> />mangelhaft</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Engagement</td>
	<td>
<input type="radio" name="engagement" value="1" <?php if ($_POST['engagement'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="engagement" value="2" <?php if ($_POST['engagement'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="engagement" value="3" <?php if ($_POST['engagement'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="engagement" value="4" <?php if ($_POST['engagement'] == 4): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="engagement" value="5" <?php if ($_POST['engagement'] == 5): ?> checked <?php endif; ?> />mangelhaft</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Besondere Leistungen*<br />(Weiterentwicklung von Arbeitsabl&auml;ufen)</td>
	<td>
<input type="radio" name="bes_leistungen" value="1" <?php if ($_POST['bes_leistungen'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="bes_leistungen" value="2" <?php if ($_POST['bes_leistungen'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="bes_leistungen" value="3" <?php if ($_POST['bes_leistungen'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="bes_leistungen" value="4" <?php if ($_POST['bes_leistungen'] == 4): ?> checked <?php endif; ?> />keine</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Gesamtnote der Leistung*</td>
	<td>
<input type="radio" name="leistung_gesamt_note" value="1" <?php if ($_POST['leistung_gesamt_note'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="leistung_gesamt_note" value="2" <?php if ($_POST['leistung_gesamt_note'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="leistung_gesamt_note" value="3" <?php if ($_POST['leistung_gesamt_note'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="leistung_gesamt_note" value="4" <?php if ($_POST['leistung_gesamt_note'] == 4): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="leistung_gesamt_note" value="5" <?php if ($_POST['leistung_gesamt_note'] == 5): ?> checked <?php endif; ?> />mangelhaft</td>
</tr>
</table>
<h4>B. Verhalten</h4>
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="270">gegen&uuml;ber Vorgesetzten*</td>
	<td>
<input type="radio" name="vorgesetzte" value="1" <?php if ($_POST['vorgesetzte'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="vorgesetzte" value="2" <?php if ($_POST['vorgesetzte'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="vorgesetzte" value="3" <?php if ($_POST['vorgesetzte'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="vorgesetzte" value="4" <?php if ($_POST['vorgesetzte'] == 4): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="vorgesetzte" value="5" <?php if ($_POST['vorgesetzte'] == 5): ?> checked <?php endif; ?> />mangelhaft<br />
<input type="radio" name="vorgesetzte" value="6" <?php if ($_POST['vorgesetzte'] == 6): ?> checked <?php endif; ?> />keine Vorgesetzten vorhanden</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>gegen&uuml;ber Kollegen*</td>
	<td>
<input type="radio" name="kollegen" value="1" <?php if ($_POST['kollegen'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="kollegen" value="2" <?php if ($_POST['kollegen'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="kollegen" value="3" <?php if ($_POST['kollegen'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="kollegen" value="4" <?php if ($_POST['kollegen'] == 4): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="kollegen" value="5" <?php if ($_POST['kollegen'] == 5): ?> checked <?php endif; ?> />mangelhaft<br />
<input type="radio" name="kollegen" value="6" <?php if ($_POST['kollegen'] == 6): ?> checked <?php endif; ?> />keine Kollegen vorhanden</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>gegen&uuml;ber Untergebenen*</td>
	<td>
<input type="radio" name="untergebene" value="1" <?php if ($_POST['untergebene'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="untergebene" value="2" <?php if ($_POST['untergebene'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="untergebene" value="3" <?php if ($_POST['untergebene'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="untergebene" value="4" <?php if ($_POST['untergebene'] == 4): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="untergebene" value="5" <?php if ($_POST['untergebene'] == 5): ?> checked <?php endif; ?> />mangelhaft<br />
<input type="radio" name="untergebene" value="6" <?php if ($_POST['untergebene'] == 6): ?> checked <?php endif; ?> />keine Untergebenen vorhanden</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>gegen&uuml;ber Kunden*</td>
	<td>
<input type="radio" name="kunden" value="1" <?php if ($_POST['kunden'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="kunden" value="2" <?php if ($_POST['kunden'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="kunden" value="3" <?php if ($_POST['kunden'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="kunden" value="4" <?php if ($_POST['kunden'] == 4): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="kunden" value="5" <?php if ($_POST['kunden'] == 5): ?> checked <?php endif; ?> />mangelhaft<br />
<input type="radio" name="kunden" value="6" <?php if ($_POST['kunden'] == 6): ?> checked <?php endif; ?> />kein Kundenkontakt</td>
</tr>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<tr>
	<td>Auftreten*</td>
	<td>
<input type="radio" name="auftreten" value="1" <?php if ($_POST['auftreten'] == 1): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="auftreten" value="2" <?php if ($_POST['auftreten'] == 2): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="auftreten" value="3" <?php if ($_POST['auftreten'] == 3): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="auftreten" value="4" <?php if ($_POST['auftreten'] == 4): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="auftreten" value="5" <?php if ($_POST['auftreten'] == 5): ?> checked <?php endif; ?> />mangelhaft</td>
</tr>
</table>
<h4>C. Gesamtnote*</h4>
<table border="0" cellpadding="5" class="contenttable" width="100%">
	<tr>
	<td width="270"></td>
	<td>
<input type="radio" name="ges_note" value="1" <?php if ($_POST['ges_note'] == 5): ?> checked <?php endif; ?> />sehr gut<br />
<input type="radio" name="ges_note" value="2" <?php if ($_POST['ges_note'] == 5): ?> checked <?php endif; ?> />gut<br />
<input type="radio" name="ges_note" value="3" <?php if ($_POST['ges_note'] == 5): ?> checked <?php endif; ?> />befriedigend<br />
<input type="radio" name="ges_note" value="4" <?php if ($_POST['ges_note'] == 5): ?> checked <?php endif; ?> />ausreichend<br />
<input type="radio" name="ges_note" value="5" <?php if ($_POST['ges_note'] == 5): ?> checked <?php endif; ?> />mangelhaft</td>
</tr>
</table>
<br />
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="sent" value="Ausgabe" /></td>
</tr>
</table>
</form>