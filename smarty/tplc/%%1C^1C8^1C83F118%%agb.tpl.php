<?php /* Smarty version 2.6.18, created on 2014-07-21 14:43:14
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/agb.tpl */ ?>
<h1>AGB f&uuml;r das Rechtsportal &bdquo;derAdvokat&ldquo; Premium/Login Bereich</h1>
<?php if ($_SESSION['user']['status'] == @STATUS_ACTIVE): ?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">

<table border="0" cellpadding="5" class="contenttable">
<tr>
	<td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."agb_text.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr>
	<td><input type="submit" name="agb_sent" value="Akzeptieren" /><input type="submit" name="agb_ablehnung" value="Ablehnen" /></td>
</tr>
</table>

</form>
<?php else: ?>
<table border="0" cellpadding="5" class="contenttable">
<tr>
	<td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."agb_text.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
</table>
<?php endif; ?>