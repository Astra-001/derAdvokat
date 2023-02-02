<?php /* Smarty version 2.6.18, created on 2014-12-05 13:38:44
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/lohnherstellungsvertrag.tpl */ ?>
<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>Lohnherstellungsvertrag</h1>

<form name="lohnherstellungsvertrag" action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">

<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Ihre Daten</b></font></td>
</tr>
<?php if (strlen ( $this->_tpl_vars['msg_eigene_daten'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_eigene_daten']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td width="170">Anrede</td>
	<td width="60"><select name="geschlecht" onchange="eigene_daten_eing_form_check()">
        <option value="1" <?php if ($_POST['geschlecht'] == 1): ?> selected="selected" <?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['geschlecht'] == 2): ?> selected="selected" <?php endif; ?>>Frau</option>
        <option value="3" <?php if ($_POST['geschlecht'] == 3): ?> selected="selected" <?php endif; ?>>Firma</option>
    </select></td>
    <td align="right" width="57">ggf. Titel</td>
	<td colspan="3"><input type="text" name="titel" value="<?php if ($this->_tpl_vars['titel']): ?><?php echo $this->_tpl_vars['titel']; ?>
<?php else: ?><?php echo $_POST['titel']; ?>
<?php endif; ?>" /></td>
</tr>
<tr>
	<td>Nachname*</td>
	<td colspan="3"><input type="text" name="name" value="<?php echo $this->_tpl_vars['name']; ?>
" size="44" /></td>
</tr>
<tr>
	<td>Vorname <br />(bei nat&uuml;rlicher Person)</td>
	<td colspan="3"><input type="text" name="vorname" value="<?php echo $this->_tpl_vars['vorname']; ?>
" size="44" /></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="firma_name" value="<?php echo $this->_tpl_vars['firma_name']; ?>
" size="44" /></td>
</tr>
<tr>
	<td>ggf. vertreten durch</td>
	<td colspan="3"><input type="text" name="vertreter" value="<?php if ($this->_tpl_vars['vertreter']): ?><?php echo $this->_tpl_vars['vertreter']; ?>
<?php else: ?><?php echo $_POST['vertreter']; ?>
<?php endif; ?>" size="44" /></td>
</tr>
<tr>
	<td>Stra&szlig;e und Hausnummer*</td>
	<td colspan="3"><input type="text" name="strasse"  value="<?php echo $this->_tpl_vars['strasse']; ?>
" size="44" /></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td width="57"><input type="text" name="plz"  value="<?php echo $this->_tpl_vars['plz']; ?>
" size="5"  maxlength="5" /></td>
	<td align="right">Ort*</td>
	<td><input type="text" name="ort"  value="<?php echo $this->_tpl_vars['ort']; ?>
" /></td>
</tr>
</table>
<br />
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Vertragspartners</b></font></td>
</tr>
<?php if (strlen ( $this->_tpl_vars['msg_vertragspartner'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_vertragspartner']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td width="170">Wer ist der Vertragspartner?</td>
	<td><input type="radio" name="person" value="1" <?php if ($_POST['person'] == 1): ?> checked="checked" <?php endif; ?> /><br/>Auftraggeber</td>
	<td colspan="2"><input type="radio" name="person" value="2" <?php if ($_POST['person'] == 2): ?> checked="checked" <?php endif; ?> /><br/>Auftragnehmer</td>
</tr>
<tr>
	<td>Anrede*</td>
	<td colspan="1" width="55"><select name="ex_anrede" onchange="eigene_daten_eing_form_check()">
        <option value="1" <?php if ($_POST['ex_anrede'] == 1): ?> selected="selected"<?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['ex_anrede'] == 2): ?> selected="selected"<?php endif; ?>>Frau</option>
        <option value="3" <?php if ($_POST['ex_anrede'] == 3): ?> selected="selected"<?php endif; ?>>Firma</option>
    </select></td>
    <td align="right" width="57">ggf. Titel</td>
    <td><input type="text" name="ex_titel" value="<?php if (isset ( $_POST['ex_titel'] )): ?><?php echo $_POST['ex_titel']; ?>
<?php endif; ?>" /></td>
</tr>
<tr>
	<td>Nachname*</td>
	<td colspan="3"><input type="text" name="ex_name" <?php if (strlen ( $this->_tpl_vars['msg_name'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_name'] )): ?><?php echo $_POST['ex_name']; ?>
<?php endif; ?>" size="44" /></td>
</tr>
<tr>
	<td>Vorname*</td>
	<td colspan="3"><input type="text" name="ex_vorname" <?php if (strlen ( $this->_tpl_vars['msg_vorname'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_vorname'] )): ?><?php echo $_POST['ex_vorname']; ?>
<?php endif; ?>" size="44" /></td>
</tr>
<tr>
	<td>ggf. vertreten durch</td>
	<td colspan="3"><input type="text" name="ex_vertreter" <?php if (strlen ( $this->_tpl_vars['msg_vertreter'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_vertreter'] )): ?><?php echo $_POST['ex_vertreter']; ?>
<?php endif; ?>" size="44" /></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="ex_firmen_name" <?php if (strlen ( $this->_tpl_vars['msg_firmen_name'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_firmen_name'] )): ?><?php echo $_POST['ex_firmen_name']; ?>
<?php endif; ?>" size="44" /></td>
</tr>
<tr>
	<td>Stra&szlig;e und Hausnummer*</td>
	<td colspan="3"><input type="text" name="ex_strasse" <?php if (strlen ( $this->_tpl_vars['msg_strasse'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_strasse'] )): ?><?php echo $_POST['ex_strasse']; ?>
<?php endif; ?>" size="44" /></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td width="57"><input type="text" name="ex_plz" <?php if (strlen ( $this->_tpl_vars['msg_plz'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_plz'] )): ?><?php echo $_POST['ex_plz']; ?>
<?php endif; ?>" size="5" maxlength="5" /></td>
	<td align="right">Ort*</td>
	<td><input type="text" name="ex_ort" <?php if (strlen ( $this->_tpl_vars['msg_ort'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_ort'] )): ?><?php echo $_POST['ex_ort']; ?>
<?php endif; ?>" /></td>
</tr>
</table>
<br />
<br />

<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Allgemeine Vertragsangaben</b></font></td>
</tr>
<tr>
	<td width="340">Wer entwickelt das Produkt?</td>
	<td><select name="produktentwiklungsaufnahme">
        <option value="1" <?php if ($_POST['produktentwiklungsaufnahme'] == 1): ?> selected="selected"<?php endif; ?>>Auftraggeber</option>
        <option value="2" <?php if ($_POST['produktentwiklungsaufnahme'] == 2): ?> selected="selected"<?php endif; ?>>Aufgragnehmer</option>
    </select></td>
</tr>
<tr>
	<td width="340">Darf der Auftragnehmer die Lohnherstellung auch durch Dritte vornehmen lassen?</td>
	<td><select name="aufgaben_durch_dritte">
        <option value="1" <?php if ($_POST['aufgaben_durch_dritte'] == 1): ?> selected="selected"<?php endif; ?>>Ja</option>
        <option value="2" <?php if ($_POST['aufgaben_durch_dritte'] == 2): ?> selected="selected"<?php endif; ?>>Nein</option>
    </select></td>
</tr>	
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Dokumentation</b></font></td>
</tr>
<tr>
	<td width="340">Auftragnehmer muss alle Dokumente dem Auftraggeber &uuml;bergeben</td>
	<td><input type="radio" name="dokumentation_ubergabe" value="1" <?php if ($_POST['dokumentation_ubergabe'] != 2): ?> checked="checked" <?php endif; ?> /></td>
</tr>
<tr>
	<td width="340">Dokumente mit Betriebsgeheimnissen des Auftragnehmers sind hiervon ausgenommen</td>
	<td><input type="radio" name="dokumentation_ubergabe" value="2" <?php if ($_POST['dokumentation_ubergabe'] == 2): ?> checked="checked" <?php endif; ?> /></td>
</tr>
<tr>
	<td width="340">Die Dokumentation zu den gesetzlich erforderlichen Produktinformationen liegt in dem Pflichtenbereich des</td>
	<td><select name="produktinformation">
        <option value="1" <?php if ($_POST['produktinformation'] == 1): ?> selected="selected"<?php endif; ?>>Auftragnehmers</option>
        <option value="2" <?php if ($_POST['produktinformation'] == 2): ?> selected="selected"<?php endif; ?>>Auftraggebers</option>
    </select></td>
</tr>
<tr>
	<td width="340">Die Mitteilungs- und Berichtspflichten an die zust&auml;ndigen Beh&ouml;rden sind von dem</td>
	<td><select name="behordenpflicht">
        <option value="1" <?php if ($_POST['behordenpflicht'] == 1): ?> selected="selected"<?php endif; ?>>Auftragnehmer</option>
        <option value="2" <?php if ($_POST['behordenpflicht'] == 2): ?> selected="selected"<?php endif; ?>>Auftraggeber</option>
    </select> wahrzunehmen.</td>
</tr>
<tr>
	<td width="340">Das Mindesthaltbarkeitsdatum des Produktes wird vom</td>
	<td><select name="produkthaltbarkeit">
        <option value="1" <?php if ($_POST['produkthaltbarkeit'] == 1): ?> selected="selected"<?php endif; ?>>Auftragnehmer</option>
        <option value="2" <?php if ($_POST['produkthaltbarkeit'] == 2): ?> selected="selected"<?php endif; ?>>Auftraggeber</option>
    </select> vorgegeben.</td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Einkauf der zu verwendenden Stoffe</b></font></td>
</tr>
<?php if (strlen ( $this->_tpl_vars['msg_rohstoffe_einkauf'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_rohstoffe_einkauf']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td width="340">Auftraggeber stellt die Rohstoffe (oder beauftragt Dritte, die dann bei Auftragnehmer anliefern)</td>
	<td><input type="radio" name="rohstoffe_einkauf" value="1" <?php if ($_POST['rohstoffe_einkauf'] == 1): ?> checked="checked" <?php endif; ?> /></td>
</tr>
<tr>
	<td width="340">Auftragnehmer stellt alle Rohstoffe (bzw. ordert diese bei Dritten)</td>
	<td><input type="radio" name="rohstoffe_einkauf" value="2" <?php if ($_POST['rohstoffe_einkauf'] == 2): ?> checked="checked" <?php endif; ?> /></td>
</tr>
<tr>
	<td width="340">Auftragnehmer und Auftraggeber stellen jeweils einen Teil der Rohstoffe</td>
	<td><input type="radio" name="rohstoffe_einkauf" value="3" <?php if ($_POST['rohstoffe_einkauf'] == 3): ?> checked="checked" <?php endif; ?> /></td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Verpackung / Bef&uuml;llung</b></font></td>
</tr>
<?php if (strlen ( $this->_tpl_vars['msg_verpackung'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_verpackung']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td width="340">Verpackung ist Sache des Auftraggebers</td>
	<td><input type="radio" name="verpackung" value="1" <?php if ($_POST['verpackung'] == 1): ?> checked="checked" <?php endif; ?>  onclick="check_verpackung()"/></td>
</tr>
<tr>
	<td width="340">Auftragnehmer nimmt (ggf. zum Teil) Verpackung vor</td>
	<td><input type="radio" name="verpackung" value="2" <?php if ($_POST['verpackung'] == 2): ?> checked="checked" <?php endif; ?>  onclick="check_verpackung()"/></td>
</tr>
<tr>
	<td width="340"></td>
	<td>
	
	<table border="0" width="100%">
	<tr>
		<td bgcolor="gainsboro">Der Auftragnehmer nimmt folgende Verpackungsschritte vor: </td>
	</tr>
	<tr>
		<td><br/><br/>
		
			<input type="checkbox" name="verpackungsschritte_abfuellen" value="abfuellen" <?php if ($_POST['verpackungsschritte_abfuellen'] == abfuellen): ?> checked="checked" <?php endif; ?> /> - Abf&uuml;llen<br/><br/>
			<input type="checkbox" name="verpackungsschritte_verschliessen" value="verschliessen" <?php if ($_POST['verpackungsschritte_verschliessen'] == verschliessen): ?> checked="checked" <?php endif; ?> /> - Verschlie&szlig;en<br/><br/>
			<input type="checkbox" name="verpackungsschritte_etiketieren" value="etiketieren" <?php if ($_POST['verpackungsschritte_etiketieren'] == etiketieren): ?> checked="checked" <?php endif; ?> /> - Etikettieren<br/><br/>
			<input type="checkbox" name="verpackungsschritte_kennziefern" value="kennziefern" <?php if ($_POST['verpackungsschritte_kennziefern'] == kennziefern): ?> checked="checked" <?php endif; ?> /> - Versehen mit Kennziffern<br/><br/>

				</td>
	</tr>
	</table>
	
	</td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Lieferung / Gefahr&uuml;bergang
</b></font></td>
</tr>
<?php if (strlen ( $this->_tpl_vars['msg_lieferung'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_lieferung']; ?>
</td>
</tr>
<?php endif; ?>	
<tr>
	<td width="340" class="contenttable">Auftragnehmer liefert an Firmensitz des Auftraggebers</td>
	<td class="contenttable">
	
	<table border="0" width="100%">
	<tr>
		<td style="vertical-align:top;"><input type="radio" name="lieferung" value="1" <?php if ($_POST['lieferung'] == 1): ?> checked="checked" <?php endif; ?> onchange="check_lieferung_gefahrubergang()" /></td>
		<td> - Der Auftragnehmer tr&auml;gt das diesbez&uuml;gliche Versendungsrisiko. Sollte der Auftraggeber eine Lieferung zu einem anderen Ort w&uuml;nschen, &uuml;bernimmt der Auftraggeber das Versendungsrisiko, sofern die Parteien keine andere Vereinbarung getroffen haben.</td>
	</tr>
	<tr>
		<td style="vertical-align:top;"><input type="radio" name="lieferung" value="2" <?php if ($_POST['lieferung'] == 2): ?> checked="checked" <?php endif; ?> onchange="check_lieferung_gefahrubergang()" /></td>
		<td> - Der Aufgragsgeber tr&auml;gt das diesbez&uuml;gliche Versendungsrisiko</td>
	</tr>
	</table>
	
	</td>	
</tr>
<tr>
	<td width="340" class="contenttable">Auftraggeber holt das Produkt ab (bzw. l&auml;sst abholen)</td>
	<td class="contenttable">
	
	<table border="0" width="100%">
	<tr>
		<td style="vertical-align:top;"><input type="radio" name="lieferung" value="3" <?php if ($_POST['lieferung'] == 3): ?> checked="checked" <?php endif; ?> onclick="check_lieferung_gefahrubergang()" /></td>
		<td> - an einem in Deutschland befindlichen und vom Auftragnehmer benannten Ort </td>
	</tr>
	<tr>
		<td style="vertical-align:top;"><input type="radio" name="lieferung" value="4" <?php if ($_POST['lieferung'] == 4): ?> checked="checked" <?php endif; ?> onclick="check_lieferung_gefahrubergang()" /></td>
		<td> - an dem Firmensitz des Auftragnehmers</td>
	</tr>
	<tr>
		<td style="vertical-align:top;"><input type="radio" name="lieferung" value="5" <?php if ($_POST['lieferung'] == 5): ?> checked="checked" <?php endif; ?> onclick="check_lieferung_gefahrubergang()" /></td>
		<td> - an dem Herstellungsort des Produktes</td>
	</tr>
	</table>
	
		</td>	
</tr>
<tr>
	<td width="340" class="contenttable"></td>
	<td class="contenttable"><input type="radio" name="lieferung" value="6" onclick="check_lieferung_gefahrubergang()" /> Auswahl aufheben</td>
</tr>




	
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Haftung</b></font></td>
</tr>	
<?php if (strlen ( $this->_tpl_vars['msg_haftung'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_haftung']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="2">Der Auftragnehmer haftet dem Auftraggeber im Falle des Verschuldens f&uuml;r</td>
</tr>
<tr>
	<td colspan="2"><br/>
	
	<input type="checkbox" name="haftung_gewinn" value="gewinn" <?php if ($_POST['haftung_gewinn'] == gewinn): ?> checked="checked" <?php endif; ?> /> - entgangenen Gewinn<br/><br/>
	<input type="checkbox" name="haftung_ruckruf" value="ruckruf" <?php if ($_POST['haftung_ruckruf'] == ruckruf): ?> checked="checked" <?php endif; ?> /> - Kosten von R&uuml;ckrufaktionen<br/><br/>
	<input type="checkbox" name="haftung_geldbuss" value="geldbuss" <?php if ($_POST['haftung_geldbuss'] == geldbuss): ?> checked="checked" <?php endif; ?> /> - Geldbu&szlig;en<br/><br/>
	<input type="checkbox" name="haftung_gutachter" value="gutachter" <?php if ($_POST['haftung_gutachter'] == gutachter): ?> checked="checked" <?php endif; ?> /> - Gutachterkosten<br/><br/>
	
	</td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Beendigung</b></font></td>
</tr>
<?php if (strlen ( $this->_tpl_vars['msg_beendigung'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_beendigung']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="2">Die K&uuml;ndigungsfrist betr&auml;gt <input type="text" name="frist" value="<?php echo $_POST['frist']; ?>
" maxlength = "2" size="2"/> Monate</td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Schlussbestimmungen</b></font></td>
</tr>
<?php if (strlen ( $this->_tpl_vars['msg_anlagen'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_anlagen']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="2">folgende Anlagen sind Bestandteil des Vertrages:</td>
</tr>
<tr>
	<td colspan="2">
	<br/>
	
		<input type="checkbox" name="anlage_1" value="1" <?php if ($_POST['anlage_1'] == 1): ?> checked="checked" <?php endif; ?> /> - in der Anlage 1 - Produktspezifikation und die zu verwendeten Rohstoffe sowie das zu verwendende Verpackungsmaterial<br/><br/>
		<input type="checkbox" name="anlage_2" value="2" <?php if ($_POST['anlage_2'] == 2): ?> checked="checked" <?php endif; ?> /> - in der Anlage 2 - die Preise und ggf. Staffellisten<br/><br/>
		<input type="checkbox" name="anlage_3" value="3" <?php if ($_POST['anlage_3'] == 3): ?> checked="checked" <?php endif; ?> /> - in der Anlage 3 - Abgrenzung der Verantwortlichkeiten<br/><br/>
		<input type="checkbox" name="anlage_4" value="4" <?php if ($_POST['anlage_4'] == 4): ?> checked="checked" <?php endif; ?> /> - in der Anlage 4 - Qualit&auml;tsanforderungen sowie die Qualit&auml;tskontroll- und Pr&uuml;fma&szlig;nahmen<br/><br/>
		<input type="checkbox" name="anlage_5" value="5" <?php if ($_POST['anlage_5'] == 5): ?> checked="checked" <?php endif; ?> /> - in der Anlage 5 - Umgang mit Restmaterialien<br/><br/>
	
	</td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Gerichtsstand</b></font></td>
</tr>
<?php if (strlen ( $this->_tpl_vars['msg_gerichtstand'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_gerichtstand']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="2">Als Gerichtsstand wird vereinbart der Sitz des:</td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="beklagten" <?php if ($_POST['beklagten']): ?> checked="checked"<?php endif; ?>/> jeweils Beklagten</td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="auftraggeber" <?php if ($_POST['auftraggeber']): ?> checked="checked"<?php endif; ?>/> Auftraggeber</td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="auftragnehmer" <?php if ($_POST['auftragnehmer']): ?> checked="checked"<?php endif; ?>/> Auftragnehmer</td>
</tr>
</table>




	
<br />
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="lohnherstellungsvertrag" value="Ausgabe" /></td>
</tr>
</table>

</form>
<script type="text/javascript">
    /* <![CDATA[ */
eigene_daten_eing_form_check();
    /* ]]> */
    </script>
    
    <script type="text/javascript">
    /* <![CDATA[ */
check_lieferung_gefahrubergang();
    /* ]]> */
    </script>
    
        <script type="text/javascript">
    /* <![CDATA[ */
check_verpackung();
    /* ]]> */
    </script>
