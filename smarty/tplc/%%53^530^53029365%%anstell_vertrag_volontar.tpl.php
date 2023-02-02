<?php /* Smarty version 2.6.18, created on 2014-12-04 13:31:45
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/anstell_vertrag_volontar.tpl */ ?>
<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>Volont&auml;rsvertrag</h1>
<form name="anstellung" action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
<?php if (strlen ( $this->_tpl_vars['msg_fehler'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_fehler']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Arbeitgebers</b></font></td>
</tr>
<tr>
	<td width="170">Anrede</td>
	<td width="60"><select name="geschlecht" onchange="check_anstellung()">
        <option value="1" <?php if ($_POST['geschlecht'] == 1): ?> selected="selected" <?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['geschlecht'] == 2): ?> selected="selected" <?php endif; ?>>Frau</option>
        <option value="3" <?php if ($_POST['geschlecht'] == 3): ?> selected="selected" <?php endif; ?>>Firma</option>
    </select></td>
    <td width="57" align="right">ggf. Titel</td>
	<td><input type="text" name="titel" value="<?php echo $this->_tpl_vars['titel']; ?>
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
"  maxlength="5" size="5" /></td>
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
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Mitarbeiters</b></font></td>
</tr>
<tr>
	<td width="170">Anrede</td>
	<td width="60"><select name="ex_anrede">
        <option value="1" <?php if ($_POST['ex_anrede'] == 1): ?> selected="selected"<?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['ex_anrede'] == 2): ?> selected="selected"<?php endif; ?>>Frau</option>
    </select></td>
    <td width="57" align="right">ggf. Titel</td>
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
	<td>Stra&szlig;e und Hausnummer*</td>
	<td colspan="3"><input type="text" name="ex_strasse" <?php if (strlen ( $this->_tpl_vars['msg_strasse'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_strasse'] )): ?><?php echo $_POST['ex_strasse']; ?>
<?php endif; ?>" size="44" /></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td width="57"><input type="text" name="ex_plz" <?php if (strlen ( $this->_tpl_vars['msg_plz'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_plz'] )): ?><?php echo $_POST['ex_plz']; ?>
<?php endif; ?>" size="5"  maxlength="5" /></td>
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
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Beginn des Arbeitsverh&auml;ltnisses</b></font></td>
</tr>
<tr>
	<td width="170">Beginn</td>
	<td colspan="3"><input type="text" name="beginn" <?php if (strlen ( $this->_tpl_vars['msg_beginn'] )): ?>class="error"<?php endif; ?> <?php if (isset ( $_POST['beginn'] )): ?>value="<?php echo $_POST['beginn']; ?>
"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> size="20" /></td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<?php if (strlen ( $this->_tpl_vars['msg_tatig'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_tatig']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>T&auml;tigkeit</b></font></td>
</tr>
<tr>
	<td width="170">Der Volont&auml;r wird im Bereich </td>
	<td colspan="3"><input type="text" name="bereich" <?php if (strlen ( $this->_tpl_vars['msg_bereich'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['bereich'] )): ?><?php echo $_POST['bereich']; ?>
<?php endif; ?>" size="20" /> ausgebildet.</td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<?php if (strlen ( $this->_tpl_vars['msg_vergutung'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_vergutung']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Verg&uuml;tung</b></font></td>
</tr>
<tr>
	<td width="170">Verg&uuml;tungssumme</td>
	<td colspan="3"><input type="text" name="gehalt" <?php if (strlen ( $this->_tpl_vars['msg_vergutung'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['gehalt'] )): ?><?php echo $_POST['gehalt']; ?>
<?php endif; ?>" size="20" /> &euro;</td>
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