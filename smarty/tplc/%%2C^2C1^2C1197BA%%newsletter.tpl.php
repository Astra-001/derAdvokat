<?php /* Smarty version 2.6.18, created on 2014-08-13 20:27:13
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/newsletter.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/var/customers/webs/strauchyve/derAdvokat/tpl/newsletter.tpl', 38, false),)), $this); ?>
<!--<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>-->
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="30"><a href="/derAdvokat/newsletter_menu"><img src="/derAdvokat/grafik/pfail_back.png" alt="zur&uuml;ck in Newsletter Men&uuml;" border="no" name="back" onmouseover="javascript:document.back.src='/derAdvokat/grafik/pfail_back_on.png';" onmouseout="javascript:document.back.src='/derAdvokat/grafik/pfail_back.png';"/></a></td>
	<td width="30"><a href="/derAdvokat/newsletter_archive"><img src="/derAdvokat/grafik/archive.png" alt="Archive" border="no"/></a></td>
	<td><a href="/derAdvokat/index.php?task=neu_empfanger"><img src="/derAdvokat/grafik/new_user.png" alt="Neue E-Mail hinzuf&uuml;gen" border="no"/></a></td>
</tr>
</table>
<br/><br/>
<h1>Newsletter</h1>
<?php echo '
<script type="text/javascript">
tinyMCE.init({
 mode : "textareas",
        theme : "advanced",
        plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,fontsizeselect,|,forecolor,|,justifyleft,justifycenter,justifyright,justifyfull,|,cut,copy,paste,|,pastetext,pasteword",
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

<form name="upload" action="<?php echo ((is_array($_tmp=$_SERVER['REQUEST_URI'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" method="post" enctype="multipart/form-data" id="upload">

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
	<td colspan="2" align="right"><img src="/derAdvokat/newsletter_bilder/klein_4babe997cfce3.jpg" /><?php if (strlen ( $this->_tpl_vars['bild'] ) || strlen ( $this->_tpl_vars['newsletter'][0]['bild_name'] )): ?><img src="newsletter_bilder/klein_<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && file_exists ( (@ROOT_DIR)."newsletter_bilder/klein_".($this->_tpl_vars['bild']) )): ?><?php echo $this->_tpl_vars['bild']; ?>
<?php else: ?><?php echo $this->_tpl_vars['newsletter'][0]['bild_name']; ?>
<?php endif; ?>" alt="Newsletter"/><?php endif; ?><input type="hidden" name="bild" value="<?php echo $this->_tpl_vars['newsletter'][0]['bild_name']; ?>
"/></td>
</tr>
<tr>
	<td>Titel</td>
	<td><input type="text" name="titel" <?php if (strlen ( $this->_tpl_vars['msg'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['titel'] )): ?><?php echo $_POST['titel']; ?>
<?php elseif ("{".($this->_tpl_vars['newsletter'][0]).".titel"): ?><?php echo $this->_tpl_vars['newsletter'][0]['titel']; ?>
<?php endif; ?>" size="86" /></td>
</tr>
<tr>
	<td>Inhalt</td>
	<td><textarea name="inhalt" <?php if (strlen ( $this->_tpl_vars['msg'] )): ?>class="error"<?php endif; ?> cols="65" rows="20"><?php if (isset ( $_POST['inhalt'] )): ?><?php echo $_POST['inhalt']; ?>
<?php elseif ("{".($this->_tpl_vars['newsletter'][0]).".content"): ?><?php echo $this->_tpl_vars['newsletter'][0]['content']; ?>
<?php endif; ?></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="file" name="bild" />&nbsp;Logo Typ
	<select name="logo_typ">
        <option value="1" <?php if ($this->_tpl_vars['newsletter'][0]['logo_typ'] == 1): ?> selected="selected"<?php endif; ?>>derAdvokat</option>
        <option value="2" <?php if ($this->_tpl_vars['newsletter'][0]['logo_typ'] == 2): ?> selected="selected"<?php endif; ?>>Kanzlei-Strauch</option>
        <option value="3" <?php if ($this->_tpl_vars['newsletter'][0]['logo_typ'] == 3): ?> selected="selected"<?php endif; ?>>ICADA</option>
    </select></td>
</tr>
<tr>
	<td></td>
	<td>Max Dataigrösse-3,0 MB <br />Zul&auml;ssige Formate: GIF, JPG, PNG</td>
</tr>
</table>
<br/>
<h1>Artikel&uuml;bersicht</h1>
<?php if ($this->_tpl_vars['show'] == true): ?>
<input type="checkbox" name="keine_artikeln" onclick="disable_artikeln_checkbox()" value="1"/> Keine Artikeln ausw&auml;hlen<br/><br/>
<?php endif; ?>
<table border="0" class="contenttable">
<tr>
	<td>
<div id="artikelubersicht">
<table border="0" cellpadding="5">
<tr align="center">
	<th></th>
    <th>Kategorie</th>
    <th>Unterkategorie</th>
    <th>Titel</th>
    <th>Premium</th>
    <th>Aktion</th>
</tr>
<?php $_from = $this->_tpl_vars['artikel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['artikel'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artikel']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['a']):
        $this->_foreach['artikel']['iteration']++;
?>
<tr>
	<td><input type="checkbox" name="artikel[]" <?php if ($this->_tpl_vars['a']['id'] == $this->_tpl_vars['nl_artikel'][$this->_tpl_vars['a']['id']]): ?>checked="checked"<?php endif; ?> value="<?php echo $this->_tpl_vars['a']['id']; ?>
"/></td>
    <td><?php echo $this->_tpl_vars['cat'][$this->_tpl_vars['a']['kat_id']]; ?>
</td>
    <td><?php echo $this->_tpl_vars['cat'][$this->_tpl_vars['a']['ukat_id']]; ?>
</td>
    <td><?php echo $this->_tpl_vars['a']['titel']; ?>
</td>
    <td><?php if ($this->_tpl_vars['a']['premium'] == @ARTICLE_PREMIUM): ?>Premium<?php else: ?>&Ouml;ffentlich<?php endif; ?></td>
    <td align="right">
    <a href='index.php?task=artikel&amp;kat_id=<?php echo $this->_tpl_vars['a']['kat_id']; ?>
&amp;art_id=<?php echo $this->_tpl_vars['a']['id']; ?>
&amp;act=edit'>Bearbeiten</a>    
    </td>
</tr>
<tr>
    <td colspan="6"><hr /></td>
</tr>
<?php endforeach; else: ?><tr><td colspan="5">Keine Artikel vorhanden.</td></tr>
<?php endif; unset($_from); ?>
</table>
</div></td>
</tr>
</table>
<br/>
<br/>
<h1>Empf&auml;nger&uuml;bersicht</h1>


<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td><a href="/derAdvokat/index.php?task=neu_empfanger"><img src="/derAdvokat/grafik/new_user.png" alt="Neue E-Mail hinzuf&uuml;gen" border="no"/></a></td>
	<?php if ($_GET['task']['newsletter'] && ! $_GET['nl_id']): ?>
	<td><select name="task_empf" onchange="javascript:document.upload.submit();">
        <option value="1" <?php if ($_POST['task_empf'] == 1): ?> selected="selected" <?php endif; ?>>Alle Empf&auml;nger</option>
        <option value="2" <?php if ($_POST['task_empf'] == 2): ?> selected="selected" <?php endif; ?>>Kosmetikhersteller</option>
        <option value="3" <?php if ($_POST['task_empf'] == 3): ?> selected="selected" <?php endif; ?>>Vermieter</option>
    </select></td><?php endif; ?>
</tr>
</table>

<br/>

		Hinweis: <img src="/derAdvokat/grafik/blau.png" alt="E-Mail´s von externen Empf&auml;ngern"/>  E-Mail´s von externen Empf&auml;ngern
		<table border="0" width="100%">
		<tr>
			<td>
			<table border="0" cellpadding="5" class="contenttable" width="100%">
		<tr>
			<td>
				<div id="empfangerubersicht">	
				<table border="0" cellpadding="5" width="100%">
				<tr align="center">
					<th></th>
					<th>Geschlecht</th>
					<th>Vor-/Nachname/Firma</th>
					<th>E-Mail</th>
				</tr>
				<?php $_from = $this->_tpl_vars['user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['u']):
        $this->_foreach['user']['iteration']++;
?>
				<tr <?php if ($this->_tpl_vars['u']['TYPE'] == 100): ?>bgcolor="#ccccff"<?php endif; ?>>
					<td><input type="checkbox" name="empfanger[<?php echo $this->_tpl_vars['u']['TYPE']; ?>
][]" <?php if ($this->_tpl_vars['u']['id'] == $this->_tpl_vars['nl_empfanger'][$this->_tpl_vars['u']['TYPE']][$this->_tpl_vars['u']['id']]): ?>checked="checked"<?php endif; ?> value="<?php echo $this->_tpl_vars['u']['id']; ?>
"/></td>
					<td><?php if ($this->_tpl_vars['u']['geschlecht'] == 1): ?>H<?php endif; ?> <?php if ($this->_tpl_vars['u']['geschlecht'] == 2): ?> F <?php endif; ?></td>
					<td><?php if ($this->_tpl_vars['u']['geschlecht'] != 3): ?><?php echo $this->_tpl_vars['u']['vorname']; ?>
 <?php echo $this->_tpl_vars['u']['name']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['u']['geschlecht'] == 3): ?> <?php echo $this->_tpl_vars['u']['firma_name']; ?>
<?php endif; ?></td>
					<td><a href="mailto:<?php echo $this->_tpl_vars['u']['email']; ?>
?subject=www.derAdvokat.de%20Kanzlei-Strauch"><?php echo $this->_tpl_vars['u']['email']; ?>
</a></td>
				</tr>
				<tr>
					<td colspan="8"  style="border-bottom: thin solid gainsboro; border-width: thin; border-color: gainsboro;"></td>
				</tr>
				<?php endforeach; else: ?><tr><td>Keine Mitglieder vorhanden.</td></tr>
				<?php endif; unset($_from); ?>
				</table>
				
				</div>
		
			</td>
		</tr>
		</table>

	</td>
</tr>
</table>
<br/>
<br/>
<table border="0" class="contenttable" width="100%">
<tr>
	<td align="right"><input type="submit" name="vorschau" value="Vorschau" /></td>
</tr>	
</table>		
</form>