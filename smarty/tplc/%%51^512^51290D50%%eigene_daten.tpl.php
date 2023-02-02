<?php /* Smarty version 2.6.18, created on 2014-07-18 21:06:43
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/eigene_daten.tpl */ ?>
<h1>Meine Daten bearbeiten</h1>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>
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
	<td>Mitgliedsnummer</td>
	<td colspan="3"><?php echo $this->_tpl_vars['id']; ?>
</td>
</tr>
<tr>
	<td width="200">Registriert seit</td>
	<td colspan="3"><?php echo $this->_tpl_vars['registrationsdatum']; ?>
</td>
</tr>
<tr>
	<td>Anrede</td>
	<td colspan="3"><select name="geschlecht">
        <option value="1" <?php if ($_POST['geschlecht'] == 1): ?><?php elseif ($this->_tpl_vars['geschlecht'] == 1): ?> selected="selected"<?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['geschlecht'] == 2): ?><?php elseif ($this->_tpl_vars['geschlecht'] == 2): ?> selected="selected"<?php endif; ?>>Frau</option>
        <option value="3" <?php if ($_POST['geschlecht'] == 3): ?><?php elseif ($this->_tpl_vars['geschlecht'] == 3): ?> selected="selected"<?php endif; ?>>Firma</option>
    </select></td>
</tr>
<tr>
	<td>Nachname*</td>
	<td colspan="3"><input type="text" name="name" value="<?php echo $this->_tpl_vars['name']; ?>
" size="50" /></td>
</tr>
<tr>
	<td>Vorname (bei nat&uuml;rlicher Person)</td>
	<td colspan="3"><input type="text" name="vorname" value="<?php echo $this->_tpl_vars['vorname']; ?>
" size="50" /></td>
</tr>
<tr>
	<td>ggf. Titel</td>
	<td colspan="3"><input type="text" name="titel" value="<?php echo $this->_tpl_vars['titel']; ?>
" size="50" /></td>
</tr>
<tr>
	<td>ggf. vertretten durch</td>
	<td colspan="3"><input type="text" name="vertreter" value="<?php echo $this->_tpl_vars['vertreter']; ?>
" size="50" /></td>
</tr>
<tr>
	<td>E-Mail*</td>
	<td colspan="3"><input type="text" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" size="50" /></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="firma_name" value="<?php echo $this->_tpl_vars['firma_name']; ?>
" size="50" /></td>
</tr>
<tr>
	<td>Telefon</td>
	<td colspan="3"><input type="text" name="tel" value="<?php echo $this->_tpl_vars['tel']; ?>
" size="50" /></td>
</tr>
<tr>
	<td>Fax</td>
	<td colspan="3"><input type="text" name="fax" value="<?php echo $this->_tpl_vars['fax']; ?>
" size="50" /></td>
</tr>
<tr>
	<td>Stra&szlig;e*</td>
	<td colspan="3"><input type="text" name="strasse"  value="<?php echo $this->_tpl_vars['strasse']; ?>
" size="50" /></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td><input type="text" name="plz"  value="<?php echo $this->_tpl_vars['plz']; ?>
" size="7" /></td>
	<td>Ort*</td>
	<td><input type="text" name="ort"  value="<?php echo $this->_tpl_vars['ort']; ?>
" size="29" /></td>
</tr>
<tr>
	<td></td>
	<td colspan="3"><input type="submit" name="ubernehmen" value="Speichern" /></td>
</tr>
</table>
</form>
<br /><br /><br />

<div id='pass_anderung_table'>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
<?php if (strlen ( $this->_tpl_vars['msg_pass_erfolg'] )): ?>
<tr>
	<td colspan="4" class="erfolgsmeldung"><?php echo $this->_tpl_vars['msg_pass_erfolg']; ?>
</td>
</tr>
<?php endif; ?>
<?php if (strlen ( $this->_tpl_vars['msg_pass_fehler'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_pass_fehler']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td width="200">Altes Passwort</td>
	<td><input type="password" name="passw_alt" value="<?php if (isset ( $_POST['passw_alt'] )): ?><?php echo $_POST['passw_alt']; ?>
<?php endif; ?>" size="30" /></td>
</tr>
<tr>
	<td>Neues Passwort</td>
	<td><input type="password" name="passw_neu" value="" size="30" /></td>
</tr>
<tr>
	<td>Neues Passwort widerholen</td>
	<td><input type="password" name="passw_neu_1" value="" size="30" /></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="ubernehmen" value="Erstellen" /></td>
</tr>
</table>
</form>
</div>