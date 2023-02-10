<?php /* Smarty version 2.6.18, created on 2019-02-08 16:01:31
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/newsletter_vorschau.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(['plugins' => [['modifier', 'escape', '/var/customers/webs/strauchyve/derAdvokat/tpl/newsletter_vorschau.tpl', 13, false]]], $this); ?>
<div class="contenttable">
<table border="0" cellpadding="5">
<tr>
	<td width="30"><a href="/derAdvokat/newsletter_menu"><img src="/derAdvokat/grafik/pfail_back.png" alt="zur&uuml;ck in Newsletter Men&uuml;" border="no"/></a></td>
	<td width="30"><a href="/derAdvokat/newsletter_archive"><img src="/derAdvokat/grafik/archive.png" alt="Archive" border="no"/></a></td>
	<td><a href="/derAdvokat/index.php?task=newsletter&amp;nl_id=<?php echo $this->_tpl_vars['newsletter_vorschau'][0]['id']; ?>
"><img src="/derAdvokat/grafik/edit.png" alt="Newsletter &uuml;berarbeiten" border="no"/></a></td>
</tr>
</table>
</div>

<br/><br/>	
<h1>Newsletter Vorschau</h1>
<form action="<?php echo ((is_array($_tmp=$_SERVER['REQUEST_URI'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" name="upload" method="post" enctype="multipart/form-data">


<table border="0" cellpadding="5">
<tr>
	<td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(['smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."newsletter_vorschau_include.tpl", 'smarty_include_vars' => []]);
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
</table>

<br/>
<br/>

<div class="contenttable">
<table border="0" width="100%">
<tr>
	<td align="right"><input type="submit" name="selbsttest" value="Selbsttest" /><br/><br/><input type="submit" name="versand" value="Versenden" /></td>
</tr>	
</table>		
</div>
</form>
