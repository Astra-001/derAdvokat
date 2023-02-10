<?php /* Smarty version 2.6.18, created on 2014-09-19 10:22:03
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/artikel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(['plugins' => [['modifier', 'escape', '/var/customers/webs/strauchyve/derAdvokat/tpl/artikel.tpl', 29, false]]], $this); ?>
<h1><?php if (isset ( $_REQUEST['art_id'] )): ?>Artikel bearbeiten<?php else: ?>Neuer Artikel<?php endif; ?></h1>
<?php echo '
<script type="text/javascript">
tinyMCE.init({
 mode : "textareas",
        theme : "advanced",
        plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,fontsizeselect,|,forecolor,|,justifyleft,justifycenter,justifyright,justifyfull",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        // Theme options
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",

        language : \'de\',

        // Example content CSS (should be your site CSS)
        content_css : "css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js"
});
</script>
'; ?>

<form action="<?php echo ((is_array($_tmp=$_SERVER['REQUEST_URI'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" name="upload" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="5" class="contenttable" width="100%">
<?php if (strlen ( $this->_tpl_vars['error'] )): ?>
<tr>
	<td class="fehlermeldung" colspan="3"><?php echo $this->_tpl_vars['error']; ?>
</td>
</tr>
<?php endif; ?>
<?php if (strlen ( $this->_tpl_vars['erfolg'] )): ?>
<tr>
	<td class="erfolgsmeldung" colspan="3"><?php echo $this->_tpl_vars['erfolg']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
	<td>Status</td>
	<td><select name="status">
        <option value="1" <?php if ($_POST['status'] == 1): ?> selected="selected"<?php endif; ?> <?php if ($this->_tpl_vars['artikel']['premium'] == 1): ?> selected="selected"<?php endif; ?>>Öffentlich</option>
        <option value="2" <?php if ($_POST['status'] == 2): ?> selected="selected"<?php endif; ?> <?php if ($this->_tpl_vars['artikel']['premium'] == 2): ?> selected="selected"<?php endif; ?>>Premium</option>
    </select></td>
    <td rowspan="3"><?php if (strlen ( $this->_tpl_vars['bild'] ) || strlen ( $this->_tpl_vars['artikel']['bild_name'] )): ?><img src="bilder/klein_<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && file_exists ( (@ROOT_DIR)."bilder/klein_".($this->_tpl_vars['bild']) )): ?><?php echo $this->_tpl_vars['bild']; ?>
<?php else: ?><?php echo $this->_tpl_vars['artikel']['bild_name']; ?>
<?php endif; ?>"/><?php endif; ?></td>
</tr>
<tr>
	<td>Kategorien</td>
	<td><select name="kategorie">
	<?php $_from = $this->_tpl_vars['kategorie']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['kategorie'] = ['total' => is_countable($_from) ? count($_from) : 0, 'iteration' => 0];
if ($this->_foreach['kategorie']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k']):
        $this->_foreach['kategorie']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['k']['id']; ?>
" <?php if ($_POST['kategorie'] == $this->_tpl_vars['k']['id']): ?> selected="selected"<?php endif; ?> <?php if ($this->_tpl_vars['artikel']['kat_id'] == $this->_tpl_vars['k']['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['k']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    </select></td>
</tr>
<tr>
	<td>Unterkategorien</td>
	<td><select name="unterkategorie">
	<?php $_from = $this->_tpl_vars['unterkategorie']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['unterkategorie'] = ['total' => is_countable($_from) ? count($_from) : 0, 'iteration' => 0];
if ($this->_foreach['unterkategorie']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['uk']):
        $this->_foreach['unterkategorie']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['uk']['id']; ?>
" <?php if ($_POST['unterkategorie'] == $this->_tpl_vars['uk']['id']): ?> selected="selected"<?php endif; ?> <?php if ($this->_tpl_vars['artikel']['ukat_id'] == $this->_tpl_vars['uk']['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['uk']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    </select><a href="/derAdvokat/unterkategorien_verwaltung"> Unterkategorien editiren</a></td>
</tr>
<tr>
	<td>Titel</td>
	<td colspan="2"><input type="text" name="titel" <?php if (strlen ( $this->_tpl_vars['msg'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['titel'] )): ?><?php echo $_POST['titel']; ?>
<?php elseif ("{".($this->_tpl_vars['artikel']).".titel"): ?><?php echo $this->_tpl_vars['artikel']['titel']; ?>
<?php endif; ?>" size="41" /></td>
</tr>
<tr>
	<td>Inhalt</td>
	<td colspan="2"><textarea name="inhalt" <?php if (strlen ( $this->_tpl_vars['msg'] )): ?>class="error"<?php endif; ?> cols="65" rows="20"><?php if (isset ( $_POST['inhalt'] )): ?><?php echo $_POST['inhalt']; ?>
<?php elseif ("{".($this->_tpl_vars['artikel']).".content"): ?><?php echo $this->_tpl_vars['artikel']['content']; ?>
<?php endif; ?></textarea></td>
</tr>
<tr>
	<td></td>
	<td colspan="2"><input type="file" name="bild" /></td>
</tr>
<tr>
	<td></td>
	<td colspan="2">Max Dataigrösse-3,0 MB <br />Zul&auml;ssige Formate: GIF, JPG, PNG</td>
</tr>
<tr>
	<td></td>
	<td colspan="2"><input type="submit" name="sent" value="Hochladen" /><?php if (! $_GET['act'] == 'edit'): ?><input type="reset" value="Eingaben löschen" /><?php endif; ?></td>
</tr>
</table>
</form>
