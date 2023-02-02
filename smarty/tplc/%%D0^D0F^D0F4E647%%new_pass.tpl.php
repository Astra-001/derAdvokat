<?php /* Smarty version 2.6.18, created on 2014-07-18 20:05:06
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/new_pass.tpl */ ?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">
    <table border="0" width="400" cellpadding="5"  class="contenttable">
	<?php if (strlen ( $this->_tpl_vars['msg_erfolg'] )): ?>
	<tr>
		<td colspan="3" class="erfolgsmeldung"><?php echo $this->_tpl_vars['msg_erfolg']; ?>
</td>
	</tr>
	<?php endif; ?>
    <?php if (strlen ( $this->_tpl_vars['msg_fehler'] )): ?>
	<tr>
		<td colspan="3" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_fehler']; ?>
</td>
	</tr>
	<?php endif; ?>
	<tr>
		<td colspan="2">Bitte schreiben Sie uns Ihr E-Mail, unter welchen Sie bei uns angemeldet waren.
Nach dem Sie abgesendet haben, erhalten Sie ein E-Mail von uns,
mit Zugangscode auf die eingegebene E-Mail Adresse.</td>
	</tr>
    <tr>
        <td align="right"><label for="email">E-Mail:</label></td>
        <td><input name="email" id="email" type="text" size="35" /></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="new_pass" value="Passwort zusenden" /></td>
    </tr>
    </table>
</form>