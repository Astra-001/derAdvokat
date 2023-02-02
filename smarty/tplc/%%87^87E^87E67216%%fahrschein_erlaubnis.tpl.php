<?php /* Smarty version 2.6.18, created on 2021-06-07 15:29:09
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/fahrschein_erlaubnis.tpl */ ?>
<h1>Erkl&auml;rung zum Besitz einer Fahrerlaubnis</h1>
<form name="burg_erkl_eigen_dat" action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">

<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td colspan="4"><?php if (strlen ( $this->_tpl_vars['msg'] )): ?>
	    <div class="fehlermeldung"><?php echo $this->_tpl_vars['msg']; ?>
</div>
    <?php endif; ?></td>
</tr>

<tr>
	<td colspan="4"><font color="white">Daten des Vertragspartners</font></td>
</tr>
<tr>
	<td>Anrede</td>
	<td colspan="1"><select name="anrede" onclick="check()">
        <option value="1" <?php if ($_POST['anrede'] == 1): ?> selected="selected"<?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['anrede'] == 2): ?> selected="selected"<?php endif; ?>>Frau</option>
    </select></td>
    <td></td>
    <td></td>
</tr>
<tr>
	<td>Nachname*</td>
	<td colspan="3"><input type="text" name="name" <?php if (strlen ( $this->_tpl_vars['msg_name'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['name'] )): ?><?php echo $_POST['name']; ?>
<?php endif; ?>" size="56" /></td>
</tr>
<tr>
	<td>Vorname*</td>
	<td colspan="3"><input type="text" name="vorname" <?php if (strlen ( $this->_tpl_vars['msg_vorname'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['vorname'] )): ?><?php echo $_POST['vorname']; ?>
<?php endif; ?>" size="56" /></td>
</tr>
<tr>
	<td>Abteilung</td>
	<td colspan="3"><input type="text" name="abteilung" <?php if (strlen ( $this->_tpl_vars['msg_abteilung'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['abteilung'] )): ?><?php echo $_POST['abteilung']; ?>
<?php endif; ?>" size="56" /></td>
</tr>
<tr>
	<td>Zugeordnetes Kraftfahrzeug AKZ *</td>
	<td colspan="3"><input type="text" name="fahrzeug" <?php if (strlen ( $this->_tpl_vars['msg_fahrzeug'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['fahrzeug'] )): ?><?php echo $_POST['fahrzeug']; ?>
<?php endif; ?>" size="56" /></td>
</tr>
<tr>
	<td>F&uuml;hrerscheinklasse(n) *</td>
	<td colspan="3"><input type="text" name="fuehrschein_klasse" <?php if (strlen ( $this->_tpl_vars['msg_fuehrschein_klasse'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['fuehrschein_klasse'] )): ?><?php echo $_POST['fuehrschein_klasse']; ?>
<?php endif; ?>" size="5" maxlength="5" /></td>
</tr>
</table>
<br />
<table border="0"cellpadding="5" class="contenttable" width="100%">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="sent" value="Ausgabe" /></td>
</tr>
</table>
</form>