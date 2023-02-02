<?php /* Smarty version 2.6.18, created on 2017-06-27 13:49:47
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/darlehen.tpl */ ?>
<script type="text/javascript"  src="/derAdvokat/js/wz_tooltip.js"></script>
<script type="text/javascript" src="/derAdvokat/js/tip_followscroll.js"></script>
<script type="text/javascript" src="/derAdvokat/js/tip_centerwindow.js"></script>
<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>Darlehensvertrag</h1>
<form name="darlehen" action="<?php echo $_SERVER['REQUEST_URI']; ?>
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
	<td width="60"><select name="geschlecht" onchange="check_darlehen()">
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
		<td><input type="radio" name="person" value="1" <?php if ($_POST['person'] == 1): ?> checked="checked" <?php endif; ?> />Darlehensgeber</td>
		<td colspan="2"><input type="radio" name="person" value="2" <?php if ($_POST['person'] == 2): ?> checked="checked" <?php endif; ?> />Darlehensnehmer</td>
	</tr>
	</table>
	
	</td>
</tr>	
<tr>
	<td width="170">Anrede*</td>
	<td colspan="1" width="55"><select name="ex_anrede" onchange="check_darlehen()">
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
	<td>Beginn des Darlehens*</td>
	<td width="150"><input type="text" name="beginn_darlehen" <?php if (strlen ( $this->_tpl_vars['msg_beginn'] )): ?>class="error"<?php endif; ?> <?php if (isset ( $_POST['beginn_darlehen'] )): ?>value="<?php echo $_POST['beginn_darlehen']; ?>
"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> size="20" /></td>
	<td align="right" width="80">bis zum </td>
	<td><input type="text" name="dauer" <?php if (strlen ( $this->_tpl_vars['msg_dauer'] )): ?>class="error"<?php endif; ?> <?php if (isset ( $_POST['dauer'] )): ?>value="<?php echo $_POST['dauer']; ?>
"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> size="20" /></td>
</tr>
<tr>
	<td>F&auml;lligkeit der Zinszahlungen*</td>
	<td colspan="3"><select name="falligkeit">
        <option value="1" <?php if ($_POST['falligkeit'] == 1): ?> selected="selected"<?php endif; ?>>monatlich</option>
        <option value="2" <?php if ($_POST['falligkeit'] == 2): ?> selected="selected"<?php endif; ?>>1/4jährlich</option>
        <option value="3" <?php if ($_POST['falligkeit'] == 3): ?> selected="selected"<?php endif; ?>>1/2jährlich</option>
        <option value="4" <?php if ($_POST['falligkeit'] == 4): ?> selected="selected"<?php endif; ?>>jährlich</option>
    </select></td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<?php if (strlen ( $this->_tpl_vars['msg_bankdaten'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_bankdaten']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Kontodaten des Darlehensnehmers</b></font></td>
</tr>
<tr>
	<td width="170">Konto*</td>
	<td width="150"><input type="text" name="konto" <?php if (strlen ( $this->_tpl_vars['msg_konto'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['konto'] )): ?><?php echo $_POST['konto']; ?>
<?php endif; ?>" size="10" /> </td>
	<td align="right" width="80">Bankleitzahl*</td>
	<td><input type="text" name="blz" <?php if (strlen ( $this->_tpl_vars['msg_blz'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['blz'] )): ?><?php echo $_POST['blz']; ?>
<?php endif; ?>" size="20" /></td>
</tr>
<tr>
	<td width="150">Name der Bank*</td>
	<td colspan="3"><input type="text" name="bank" <?php if (strlen ( $this->_tpl_vars['msg_bank'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['bank'] )): ?><?php echo $_POST['bank']; ?>
<?php endif; ?>" size="20" /></td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<?php if (strlen ( $this->_tpl_vars['msg_sicherheiten'] )): ?>
<tr>
	<td colspan="2" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_sicherheiten']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="2" bgcolor="#9FC6FF"><font color="white"><b>Sicherheiten</b></font></td>
</tr>
<tr>
	<td width="170">Sicherheit*</td>
	<td width="250"  colspan="2"><input type="radio" name="sicherheit" value="1" onclick="check_sicherheit()" <?php if ($_POST['sicherheit'] == 1): ?> checked="checked" <?php endif; ?> /> Ja <br/><input type="radio" name="sicherheit" value="2" onclick="check_sicherheit()" <?php if ($_POST['sicherheit'] == 2): ?> checked="checked" <?php endif; ?> /> Nein</td>
</tr>
<tr>
	<td colspan="2" bgcolor="#EDEDF5"></td>
</tr>
<tr>
	<td width="170">Sicherungsgut*</td>
	<td><input type="radio" name="sicherungs_gut" value="1" onclick="check_sicherungsgut()" <?php if ($_POST['sicherungs_gut'] == 1): ?> checked="checked" <?php endif; ?> /> Ja <input type="text" name="sicherheit_gut" <?php if (strlen ( $this->_tpl_vars['msg_sicherheit_gut'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['sicherheit_gut'] )): ?><?php echo $_POST['sicherheit_gut']; ?>
<?php endif; ?>" size="30" /><img src="/derAdvokat/grafik/frage.png" onmouseover="Tip('z.B. Warenbestand.')" onmouseout="UnTip()" alt="Warenbestand" /> in H&ouml;he von <input type="text" name="sicherheit_hohe" <?php if (strlen ( $this->_tpl_vars['msg_sicherheit_hohe'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['sicherheit_hohe'] )): ?><?php echo $_POST['sicherheit_hohe']; ?>
<?php endif; ?>" size="10" /> &euro;<br/> <input type="radio" name="sicherungs_gut" value="2" onclick="check_sicherungsgut()" <?php if ($_POST['sicherungs_gut'] == 2): ?> checked="checked" <?php endif; ?> /> Nein</td>
</tr>
<tr>
	<td colspan="2" bgcolor="#EDEDF5"></td>
</tr>
<tr>
	<td>Grundschuld*</td>
	<td><input type="radio" name="grundschuld" value="1" onclick="check_grundschuld()" <?php if ($_POST['grundschuld'] == 1): ?> checked="checked" <?php endif; ?> /> Ja, in H&ouml;he von <input type="text" name="grundschuld_hohe" <?php if (strlen ( $this->_tpl_vars['msg_grundschuld_hohe'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['grundschuld_hohe'] )): ?><?php echo $_POST['grundschuld_hohe']; ?>
<?php endif; ?>" size="20" /> &euro;<br/>
	<input type="radio" name="grundschuld" value="2" onclick="check_grundschuld()" <?php if ($_POST['grundschuld'] == 2): ?> checked="checked" <?php endif; ?> /> Nein</td>
</tr>
<tr>
	<td colspan="2" bgcolor="#EDEDF5"></td>
</tr>
<tr>
	<td>B&uuml;rgschaft*</td>
	<td><input type="radio" name="burgschaft" value="1" onclick="check_burgschaft()" <?php if ($_POST['burgschaft'] == 1): ?> checked="checked" <?php endif; ?> /> Ja, pers&ouml;nliche B&uuml;rgschaft des/der <input type="text" name="burgschafts_des" <?php if (strlen ( $this->_tpl_vars['msg_burgschafts_des'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['burgschafts_des'] )): ?><?php echo $_POST['burgschafts_des']; ?>
<?php endif; ?>" size="20" /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; in H&ouml;he von <input type="text" name="burgschafts_hohe" <?php if (strlen ( $this->_tpl_vars['msg_burgschafts_hohe'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['burgschafts_hohe'] )): ?><?php echo $_POST['burgschafts_hohe']; ?>
<?php endif; ?>" size="10" /> &euro; <br/>
	<input type="radio" name="burgschaft" value="2" onclick="check_burgschaft()" <?php if ($_POST['burgschaft'] == 2): ?> checked="checked" <?php endif; ?> /> Nein</td>
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
check_darlehen();
    /* ]]> */
    </script>

<script type="text/javascript">
    /* <![CDATA[ */
check_sicherungsgut();
    /* ]]> */
    </script>    
    
<script type="text/javascript">
    /* <![CDATA[ */
check_grundschuld();
    /* ]]> */
    </script>
    
 <script type="text/javascript">
    /* <![CDATA[ */
check_burgschaft();
    /* ]]> */
    </script>   