<?php /* Smarty version 2.6.18, created on 2014-07-18 20:52:10
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/userliste.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(['plugins' => [['modifier', 'date_format', '/var/customers/webs/strauchyve/derAdvokat/tpl/userliste.tpl', 60, false]]], $this); ?>
<!--<script type="text/javascript" src="/derAdvokat/js/monitoring.js"></script>  -->
<script type="text/javascript" src="/derAdvokat/js/checkbox_markierung.js"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(['smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."seiten_incl.tpl", 'smarty_include_vars' => []]);
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br/><br/>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>
" name="userliste_form" method="post">

<div id="user_liste">

<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td><h1>Aktivit&auml;ten nicht registrierter Besuchern</h1></td>
</tr>

<?php if ($this->_tpl_vars['logsArray'][0]): ?>
<tr>
	<td><input type="submit" name="log_entfernen" value="Entfernen"/></td>
</tr>
<tr>
	<td><input type="checkbox" name="all_select" value="" onclick="enable_checkbox()"/>- Alle ausw&auml;hlen</td>
</tr>
<?php endif; ?>

<tr>
	<td>

		<?php echo '
		<script type="text/javascript">
		function set_visible_del(id)
		{
			document.getElementById(\'del_button_\' + id).style.visibility = "visible";
		    document.getElementById(\'del_button_\' + id).style.display = "block";
		}
		function set_unvisible_del(id)
		{
			document.getElementById(\'del_button_\' + id).style.visibility = "hidden";
		    document.getElementById(\'del_button_\' + id).style.display = "none";
		}
		</script>
		'; ?>


		<?php if ($this->_tpl_vars['logsArray'][$this->_tpl_vars['u']['id']][0]['uid'] == 0): ?>
		<!-- GAST MONITORING -->
		<div id="gast_container">
		<div style="height:auto;max-height:200px;overflow-y:scroll;">
		<?php $_from = $this->_tpl_vars['logsArray'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['logsArray'] = ['total' => is_countable($_from) ? count($_from) : 0, 'iteration' => 0];
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
		<td width="30"><input type="checkbox" name="log[]" value="<?php echo $this->_tpl_vars['l']['id']; ?>
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
		<?php endforeach; else: ?>
		Keine Aufzeichnungen vorhanden
		<?php endif; unset($_from); ?>
		</div>
		</div>

		<?php endif; ?>

	</td>
</tr>
</table>
<br/><br/>

<h1>Mitgliederliste </h1>

sortiert nach <select onchange="javascript:document.userliste_form.submit();" name="mitglieder_sort">
        <option value="1" <?php if ($_POST['mitglieder_sort'] == 1): ?> selected="selected" <?php endif; ?>>- Mitglieder ID -</option>
        <option value="2" <?php if ($_POST['mitglieder_sort'] == 2): ?> selected="selected" <?php endif; ?>>- zuletzt angemeldet -</option>
    </select><br/><br/>

<table border="0" cellpadding="5" class="contenttable" width="100%">

<?php $_from = $this->_tpl_vars['user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user'] = ['total' => is_countable($_from) ? count($_from) : 0, 'iteration' => 0];
if ($this->_foreach['user']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['u']):
        $this->_foreach['user']['iteration']++;
?>
<tr>
	<td>ID</td>
	<td><?php echo $this->_tpl_vars['u']['id']; ?>
</td>
	<td align="right"><?php if ($this->_tpl_vars['u']['geschlecht'] == 1): ?>Herr<?php endif; ?> <?php if ($this->_tpl_vars['u']['geschlecht'] == 2): ?> Frau <?php endif; ?> <?php if ($this->_tpl_vars['u']['geschlecht'] == 3): ?> Firma <?php endif; ?></td>
	<td><?php if ($this->_tpl_vars['u']['geschlecht'] != 3): ?><?php echo $this->_tpl_vars['u']['vorname']; ?>
 <?php echo $this->_tpl_vars['u']['name']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['u']['geschlecht'] == 3): ?> <?php echo $this->_tpl_vars['u']['firma_name']; ?>
<?php endif; ?></td>
	<td><?php if ($this->_tpl_vars['u']['status'] != @STATUS_ADMIN): ?><a href='index.php?task=userliste&amp;act=del&amp;id=<?php echo $this->_tpl_vars['u']['id']; ?>
<?php if ($_GET['page']): ?>&amp;page=<?php echo $_GET['page']; ?>
<?php endif; ?>'>L&ouml;schen</a><?php endif; ?></td>
</tr>
<tr>
	<td>Logins</td>
	<td><?php echo $this->_tpl_vars['u']['logins']; ?>
</td>
	<td align="right">E-Mail</td>
	<td><a href="mailto:<?php echo $this->_tpl_vars['u']['email']; ?>
?subject=www.derAdvokat.de%20Kanzlei-Strauch"><?php echo $this->_tpl_vars['u']['email']; ?>
</a></td>
	<td><?php if ($this->_tpl_vars['u']['status'] != @STATUS_ADMIN): ?><a href='index.php?task=userliste&amp;act=edit&amp;id=<?php echo $this->_tpl_vars['u']['id']; ?>
<?php if ($_GET['page']): ?>&amp;page=<?php echo $_GET['page']; ?>
<?php endif; ?>'>Bearbeiten</a><?php endif; ?></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td align="right">Empf&auml;nger Gruppe</td>
	<td><?php if ($this->_tpl_vars['u']['empfanger_art'] == 0): ?>Nicht gesetzt<?php endif; ?><?php if ($this->_tpl_vars['u']['empfanger_art'] == 1): ?>Sonstige<?php endif; ?><?php if ($this->_tpl_vars['u']['empfanger_art'] == 2): ?>Kosmetikhersteller<?php endif; ?><?php if ($this->_tpl_vars['u']['empfanger_art'] == 3): ?>Vermieter<?php endif; ?></td>
	<td><?php if ($this->_tpl_vars['u']['status'] == @STATUS_ACTIVE_AGB): ?><a href='index.php?task=userliste&amp;act=lock&amp;id=<?php echo $this->_tpl_vars['u']['id']; ?>
<?php if ($_GET['page']): ?>&amp;page=<?php echo $_GET['page']; ?>
<?php endif; ?>'>Sperren</a><?php endif; ?>
	<?php if ($this->_tpl_vars['u']['status'] == @STATUS_DISABLED): ?><a href='index.php?task=userliste&amp;act=unlock&amp;id=<?php echo $this->_tpl_vars['u']['id']; ?>
<?php if ($_GET['page']): ?>&amp;page=<?php echo $_GET['page']; ?>
<?php endif; ?>'><font color="red">Entsperren</font></a><?php endif; ?></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td align="right">Letzte Anmeldung</td>
	<td><?php if ($_SESSION['user']['letzte_anmeldung'] < $this->_tpl_vars['u']['letzte_anmeldung']): ?><font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['u']['letzte_anmeldung'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</font><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['u']['letzte_anmeldung'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
<?php endif; ?></td>
	<td></td><!-- && $u.status!=$smarty.const.STATUS_ADMIN  -->
</tr>
<tr>
	<td></td>
	<td></td>
	<td align="right">Reg.Datum</td>
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['u']['registrationsdatum'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</td>
	<td></td>
</tr>
<?php if ($this->_tpl_vars['logsArray'][$this->_tpl_vars['u']['id']]): ?>
<tr>
	<td><input type="submit" name="log_entfernen" value="Entfernen"/></td>
</tr>
<tr>
	<td><input type="checkbox" name="all_mitglieder_log_select" value="" onclick="enable_mitglieder_checkbox()"/>- Alle ausw&auml;hlen</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="5">

		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(['smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."log.tpl", 'smarty_include_vars' => []]);
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	</td>
</tr>
<tr>
	<td colspan="5"><hr /></td>
</tr>
<?php endforeach; else: ?><tr><td>Keine Mitglieder vorhanden.</td></tr>
<?php endif; unset($_from); ?>
</table>
</div>

</form>
<br/><br/>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(['smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."seiten_incl.tpl", 'smarty_include_vars' => []]);
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
