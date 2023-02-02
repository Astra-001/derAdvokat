<?php /* Smarty version 2.6.18, created on 2017-06-27 15:42:33
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/sicherung.tpl */ ?>
<script type="text/javascript"  src="/derAdvokat/js/wz_tooltip.js"></script>
<script type="text/javascript" src="/derAdvokat/js/tip_followscroll.js"></script>
<script type="text/javascript" src="/derAdvokat/js/tip_centerwindow.js"></script>
<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>Sicherungsvertrag - Grundst&uuml;ck</h1>
<form name="burg_erkl_eigen_dat" action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">

<table border="0" cellpadding="5" class="contenttable" width="100%">
<?php if (strlen ( $this->_tpl_vars['msg_erfolg'] )): ?>
<tr>
	<td colspan="4" class="erfolgsmeldung"><?php echo $this->_tpl_vars['msg_erfolg']; ?>
</td>
</tr>
<?php endif; ?>
<?php if (strlen ( $this->_tpl_vars['msg_fehler'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_fehler']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Ihre Daten</b></font></td>
</tr>
<tr>
	<td width="170">Anrede</td>
	<td width="60"><select name="geschlecht" onchange="check()">
        <option value="1" <?php if ($_POST['geschlecht'] == 1): ?> selected="selected" <?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['geschlecht'] == 2): ?> selected="selected" <?php endif; ?>>Frau</option>
        <option value="3" <?php if ($_POST['geschlecht'] == 3): ?> selected="selected" <?php endif; ?>>Firma</option>
    </select></td>
    <td align="right" width="57">ggf. Titel</td>
	<td colspan="3"><input type="text" name="titel" value="<?php echo $this->_tpl_vars['titel']; ?>
" /></td>
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
	<td>ggf. vertreten durch</td>
	<td colspan="3"><input type="text" name="vertreter" value="<?php echo $this->_tpl_vars['vertreter']; ?>
" size="44" /></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="firma_name" value="<?php echo $this->_tpl_vars['firma_name']; ?>
" size="44" /></td>
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
<?php if (strlen ( $this->_tpl_vars['msg'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Vertragspartners</b></font></td>
</tr>
<tr>
	<td colspan="4">
	
	<table border="0">
	<tr>
		<td width="170">Wer ist der Vertragspartner?</td>
		<td><input type="radio" name="person" value="1" <?php if ($_POST['person'] == 1): ?> checked="checked" <?php endif; ?> />Sicherungsgeber</td>
		<td colspan="2"><input type="radio" name="person" value="2" <?php if ($_POST['person'] == 2): ?> checked="checked" <?php endif; ?> />Sicherungsnehmer</td>
	</tr>
	</table>
	
	</td>
</tr>	
<tr>
	<td width="170">Anrede*</td>
	<td colspan="1" width="55"><select name="ex_anrede" onchange="check()">
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
<table border="0" width="100%" cellpadding="5" class="contenttable">
<?php if (strlen ( $this->_tpl_vars['msg_dar'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_dar']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="4"  bgcolor="#9FC6FF"><font color="white"><b>Darlehen</b></font></td>
</tr>
<tr>
	<td width="170">Darlehenssumme*</td>
	<td><input type="text" name="darlehen_summe" <?php if (strlen ( $this->_tpl_vars['msg_summe'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['darlehen_summe'] )): ?><?php echo $_POST['darlehen_summe']; ?>
<?php endif; ?>" size="10" /> Euro</td>
	<td align="right">nebst*</td>
	<td><input type="text" name="zinssatz" <?php if (strlen ( $this->_tpl_vars['msg_zins'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['zinssatz'] )): ?><?php echo $_POST['zinssatz']; ?>
<?php endif; ?>" size="10" /> v. H. Jahreszins</td>
</tr>
<tr>
	<td>Grundst&uuml;cksbezeichnung</td>
	<td width="150" colspan="3">
	
	<textarea name="grundstuck_bezeichnung" <?php if (strlen ( $this->_tpl_vars['msg_grundstuck_bezeichnung'] )): ?>class="error"<?php endif; ?> cols="50" rows="2"><?php if (isset ( $_POST['grundstuck_bezeichnung'] )): ?><?php echo $_POST['grundstuck_bezeichnung']; ?>
<?php endif; ?></textarea></td>
</tr>
<tr>
	<td>Beginn des Darlehens*</td>
	<td width="150"><input type="text" name="beginn_darlehen" <?php if (strlen ( $this->_tpl_vars['msg_beginn'] )): ?>class="error"<?php endif; ?> <?php if (isset ( $_POST['beginn_darlehen'] )): ?>value="<?php echo $_POST['beginn_darlehen']; ?>
"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> size="20" /></td>
	<!--<td align="right" width="80">Dauer*</td>
	<td><input type="text" name="dauer" <?php if (strlen ( $this->_tpl_vars['msg_dauer'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['dauer'] )): ?><?php echo $_POST['dauer']; ?>
<?php endif; ?>" size="20" /></td>//-->
	<td align="right" width="80"></td>
	<td></td>
</tr>
<tr>
	<td rowspan="4">Grundst&uuml;cksbezeichnung</td>
	<td>Grundst&uuml;ck FIStNr.*</td>
	<td><input type="text" name="grundstuck" <?php if (strlen ( $this->_tpl_vars['msg_grundstuck'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['grundstuck'] )): ?><?php echo $_POST['grundstuck']; ?>
<?php endif; ?>" size="20" /></td>
	<td></td>
</tr>
<tr>
	<td>auf Gemarkung*</td>
	<td><input type="text" name="gemarkung" <?php if (strlen ( $this->_tpl_vars['msg_gemarkung'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['gemarkung'] )): ?><?php echo $_POST['gemarkung']; ?>
<?php endif; ?>" size="20" /></td>
	<td></td>
</tr>
<tr>
	<td>eingetragen im Grundbuch von*</td>
	<td><input type="text" name="grundbuch" <?php if (strlen ( $this->_tpl_vars['msg_grundbuch'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['grundbuch'] )): ?><?php echo $_POST['grundbuch']; ?>
<?php endif; ?>" size="20" /></td>
	<td></td>
</tr>
<tr>
	<td>Blatt*</td>
	<td><input type="text" name="blatt" <?php if (strlen ( $this->_tpl_vars['msg_blatt'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['blatt'] )): ?><?php echo $_POST['blatt']; ?>
<?php endif; ?>" size="20" /></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td>und Grundst&uuml;cke FIStNr.</td>
	<td><input type="text" name="und_grundstuck" <?php if (strlen ( $this->_tpl_vars['msg_und_grundstuck'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['und_grundstuck'] )): ?><?php echo $_POST['und_grundstuck']; ?>
<?php endif; ?>" size="20" /></td>
	<td><img src="/derAdvokat/grafik/frage.png" onmouseover="Tip('z.B. wenn Sie noch ein Grundstück eintragen möchten.')" onmouseout="UnTip()" alt="zusätzlicher Grundstück" /></td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<?php if (strlen ( $this->_tpl_vars['msg_voreintragungen'] )): ?>
<tr>
	<td colspan="2" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_voreintragungen']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="2" bgcolor="#9FC6FF"><font color="white"><b>Eigentum und Voreintragungen</b></font></td>
</tr>
<tr>
	<td width="170">Belastungen und Voreintragungen*</td>
	<td><textarea name="belastung" <?php if (strlen ( $this->_tpl_vars['msg_belastung'] )): ?>class="error"<?php endif; ?> cols="50" rows="3"><?php if (! is_numeric ( $_POST['belastung'] )): ?><?php echo $_POST['belastung']; ?>
<?php endif; ?></textarea><img src="/derAdvokat/grafik/frage.png" onmouseover="Tip('z.B. welche Belastungen Sie hatten oder welche Voreintragungen, usw.,<br /> falls Sie keine hatten, dann lassen Sie diesen Feld frei.')" onmouseout="UnTip()" alt="Belastungen" /></td>
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
