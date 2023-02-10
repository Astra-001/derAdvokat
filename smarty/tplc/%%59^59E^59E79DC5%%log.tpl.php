<?php /* Smarty version 2.6.18, created on 2014-07-18 20:52:10
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/log.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(['plugins' => [['modifier', 'date_format', '/var/customers/webs/strauchyve/derAdvokat/tpl/log.tpl', 19, false]]], $this); ?>
<?php if ($this->_tpl_vars['logsArray'][$this->_tpl_vars['u']['id']][0]['uid'] == $this->_tpl_vars['u']['id']): ?>
<!-- MITGLIEDERBEZOGENE MONITORING -->
	<div id="user_container">
	<div style="height:auto;max-height:200px;overflow-y:scroll;">

		<?php $_from = $this->_tpl_vars['logsArray'][$this->_tpl_vars['u']['id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['logsArray'] = ['total' => is_countable($_from) ? count($_from) : 0, 'iteration' => 0];
if ($this->_foreach['logsArray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['l']):
        $this->_foreach['logsArray']['iteration']++;
?>

		<table border="0" width="100%" cellpadding="5" class="contenttable" style="margin-bottom:10px;" onmouseover="set_visible_del(<?php echo $this->_tpl_vars['l']['id']; ?>
);" onmouseout="set_unvisible_del(<?php echo $this->_tpl_vars['l']['id']; ?>
);">
		<tr>
			<td colspan="4" bgcolor="#0a264e"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(['smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."log_module.tpl", 'smarty_include_vars' => []]);
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
		</tr>
		<tr height="30">
		<td width="30"><input type="checkbox" name="log_mitglieder[]" value="<?php echo $this->_tpl_vars['l']['id']; ?>
"/></td>
			<td>

			<?php echo $this->_tpl_vars['l']['useragent']; ?>


			</td>
			<td width="110"><?php if ($_SESSION['user']['letzte_anmeldung'] <= $this->_tpl_vars['l']['timestamp']): ?><font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['l']['timestamp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</font><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['l']['timestamp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
<?php endif; ?></td>
			<td width="20"><div id="del_button_<?php echo $this->_tpl_vars['l']['id']; ?>
"  style="display:none;visibility:hidden;"><a href="index.php?task=userliste&amp;execute=delete&amp;id=<?php echo $this->_tpl_vars['l']['id']; ?>
<?php if ($_GET['page']): ?>&amp;page=<?php echo $_GET['page']; ?>
<?php endif; ?>"><img src="/derAdvokat/grafik/del_button.png" alt="Delete" border="no"/></a></div></td>
		</tr>
		</table>
		<?php endforeach; endif; unset($_from); ?>

	</div>
	</div>

<?php endif; ?>
