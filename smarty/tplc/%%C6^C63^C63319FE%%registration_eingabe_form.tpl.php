<?php /* Smarty version 2.6.18, created on 2014-07-18 21:05:07
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/registration_eingabe_form.tpl */ ?>
<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
﻿<h1>Neuen Benutzer anlegen</h1>
<table border="0" width="100%">
<tr>
	<td>
<form name="registration" action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
<?php if (strlen ( $this->_tpl_vars['error'] )): ?>
<tr>
	<td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['error']; ?>
</td>
</tr>
<?php endif; ?>
<?php if (strlen ( $this->_tpl_vars['erfolg'] )): ?>
<tr>
	<td colspan="4" class="erfolgsmeldung"><?php echo $this->_tpl_vars['erfolg']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="4" height="30" bgcolor="#9FC6FF"><b>Zu Person</b></td>
</tr>
<tr>
	<td>Anrede</td>
	<td colspan="3"><select name="geschlecht" onchange="check_registration()">
        <option value="1" <?php if ($_POST['geschlecht'] == 1): ?> selected="selected"<?php endif; ?> <?php if ($this->_tpl_vars['user']['geschlecht'] == 1): ?> selected="selected"<?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['geschlecht'] == 2): ?> selected="selected"<?php endif; ?> <?php if ($this->_tpl_vars['user']['geschlecht'] == 2): ?> selected="selected"<?php endif; ?>>Frau</option>
        <option value="3" <?php if ($_POST['geschlecht'] == 3): ?> selected="selected"<?php endif; ?> <?php if ($this->_tpl_vars['user']['geschlecht'] == 3): ?> selected="selected"<?php endif; ?>>Firma</option>
    </select></td>
</tr>
<tr>
	<td>Titel</td>
	<td colspan="3"><input type="text" name="titel"  value="<?php if (isset ( $_POST['titel'] )): ?><?php echo $_POST['titel']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['titel'] )): ?><?php echo $this->_tpl_vars['user']['titel']; ?>
<?php endif; ?>" size="50" /></td>
</tr>
<tr>
	<td>Vorname</td>
	<td colspan="3"><input type="text" name="vorname" <?php if (strlen ( $this->_tpl_vars['msg_vorname'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['vorname'] )): ?><?php echo $_POST['vorname']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['vorname'] )): ?><?php echo $this->_tpl_vars['user']['vorname']; ?>
<?php endif; ?>" size="50" /></td>
</tr>
<tr>
	<td>Nachname</td>
	<td colspan="3"><input type="text" name="name" <?php if (strlen ( $this->_tpl_vars['msg_name'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['name'] )): ?><?php echo $_POST['name']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['name'] )): ?><?php echo $this->_tpl_vars['user']['name']; ?>
<?php endif; ?>" size="50" /></td>
</tr>
<tr>
	<td>Empf&auml;ngerart<br/>(legen Sie fest... Als Empf&auml;nger,<br/> zu welcher Gruppe geh&ouml;rt diese Person?)</td>
	<td colspan="3"><select name="empf_art"">
        <option value="1" <?php if ($_GET['act'] == \EDIT && $this->_tpl_vars['user']['empfanger_art'] == 1): ?> selected="selected" <?php endif; ?>>Sonstige</option>
        <option value="2" <?php if ($_GET['act'] == \EDIT && $this->_tpl_vars['user']['empfanger_art'] == 2): ?> selected="selected" <?php endif; ?>>Kosmetikhersteller</option>
        <option value="3" <?php if ($_GET['act'] == \EDIT && $this->_tpl_vars['user']['empfanger_art'] == 3): ?> selected="selected" <?php endif; ?>>Vermieter</option>
    </select></td>
</tr>
<tr>
	<td colspan="4" height="30" bgcolor="#9FC6FF"><b>Firmen Daten</b></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="firma_name" value="<?php if (isset ( $_POST['firma_name'] )): ?><?php echo $_POST['firma_name']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['firma_name'] )): ?><?php echo $this->_tpl_vars['user']['firma_name']; ?>
<?php endif; ?>" size="50" /></td>
</tr>
<tr>
	<td>ggf. vertretten durch</td>
	<td colspan="3"><input type="text" name="vertreter" value="<?php if (isset ( $_POST['vertreter'] )): ?><?php echo $_POST['vertreter']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['vertreter'] )): ?><?php echo $this->_tpl_vars['user']['vertreter']; ?>
<?php endif; ?>" size="50" /></td>
</tr>
<tr>
	<td colspan="4" align="center" height="30"><b>Kontakt Daten</b></td>
</tr>
<tr>
	<td>Email</td>
	<td colspan="3"><input type="text" name="email" <?php if (strlen ( $this->_tpl_vars['msg_mail'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['email'] )): ?><?php echo $_POST['email']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['email'] )): ?><?php echo $this->_tpl_vars['user']['email']; ?>
<?php endif; ?>" size="50" /></td>
</tr>
<tr>
	<td>Telefon</td>
	<td colspan="3"><input type="text" name="tel" value="<?php if (isset ( $_POST['tel'] )): ?><?php echo $_POST['tel']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['tel'] )): ?><?php echo $this->_tpl_vars['user']['tel']; ?>
<?php endif; ?>" size="50" /></td>
</tr>
<tr>
	<td>Fax</td>
	<td colspan="3"><input type="text" name="fax" value="<?php if (isset ( $_POST['fax'] )): ?><?php echo $_POST['fax']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['fax'] )): ?><?php echo $this->_tpl_vars['user']['fax']; ?>
<?php endif; ?>" size="50" /></td>
</tr>
<tr>
	<td colspan="4" height="30" bgcolor="#9FC6FF"><b>Anschrift</b></td>
</tr>
<tr>
	<td>Stra&szlig;e</td>
	<td colspan="3"><input type="text" name="strasse"  value="<?php if (isset ( $_POST['strasse'] )): ?><?php echo $_POST['strasse']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['strasse'] )): ?><?php echo $this->_tpl_vars['user']['strasse']; ?>
<?php endif; ?>" size="50" /></td>
</tr>
<tr>
	<td>Postleitzahl</td>
	<td><input type="text" name="plz"  value="<?php if (isset ( $_POST['plz'] )): ?><?php echo $_POST['plz']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['plz'] )): ?><?php echo $this->_tpl_vars['user']['plz']; ?>
<?php endif; ?>" size="7" /></td>
	<td>Ort</td>
	<td><input type="text" name="ort"  value="<?php if (isset ( $_POST['ort'] )): ?><?php echo $_POST['ort']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['ort'] )): ?><?php echo $this->_tpl_vars['user']['ort']; ?>
<?php endif; ?>" size="27" /></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="sent" value="Speichern" /></td>
</tr>
</table>
</form></td></tr>
</table>
<script type="text/javascript">
    /* <![CDATA[ */
check_registration();
    /* ]]> */
    </script>
