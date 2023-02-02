<?php /* Smarty version 2.6.18, created on 2016-03-17 22:18:06
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/newsletter_archive.tpl */ ?>
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td width="30"><a href="/derAdvokat/newsletter_menu"><img src="/derAdvokat/grafik/pfail_back.png" alt="zur&uuml;ck in Newsletter Men&uuml;" border="no" name="back" onmouseover="javascript:document.back.src='/derAdvokat/grafik/pfail_back_on.png';" onmouseout="javascript:document.back.src='/derAdvokat/grafik/pfail_back.png';"/></a></td>
	<td width="30"><a href="/derAdvokat/index.php?task=neu_empfanger"><img src="/derAdvokat/grafik/new_user.png" alt="Neuen E-Mail hinzuf&uuml;gen" border="no"/></a></td>
	<td><a href="/derAdvokat/newsletter"><img src="/derAdvokat/grafik/edit.png" alt="Neuen Newsletter erstellen" border="no"/></a></td>
</tr>
</table>
<h1>Newsletter Archive</h1>

<form name="newsletter_archive" action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">
<table border="0" width="100%">
<?php if (strlen ( $this->_tpl_vars['erfolg'] )): ?>
<tr>
	<td class="erfolgsmeldung" colspan="3"><?php echo $this->_tpl_vars['erfolg']; ?>
</td>
</tr>
<?php endif; ?>	
<tr>
	<td>
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td>	
<div id="artikelubersicht">	

<table border="0" cellpadding="5" width="100%">
<tr align="center">
	<th>Titel</th>
	<th>Erstellt am</th>
	<th>Gesendet am</th>
	<th>Aktion</th>
</tr>

<?php $_from = $this->_tpl_vars['newsletter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['newsletter'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['newsletter']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nl']):
        $this->_foreach['newsletter']['iteration']++;
?>
<tr>
	<td width="320"><a href="/derAdvokat/index.php?task=newsletter&amp;nl_id=<?php echo $this->_tpl_vars['nl']['id']; ?>
"><?php echo $this->_tpl_vars['nl']['titel']; ?>
</a></td>
	<td><?php echo $this->_tpl_vars['nl']['erstellt']; ?>
</td> 
	<td><?php echo $this->_tpl_vars['nl']['versendet']; ?>
</td>
	<td><a href="/derAdvokat/index.php?task=newsletter_archive&amp;id=<?php echo $this->_tpl_vars['nl']['id']; ?>
&amp;act=del">L&ouml;schen</a></td>
</tr>
<tr>
	<td colspan="8"><hr /></td>
</tr>
<?php endforeach; else: ?><tr><td colspan="3">Keine Eintr&auml;ge vorhanden.</td></tr>
<?php endif; unset($_from); ?>
</table>
	
</div></td></tr></table>

	</td>
</tr>
</table>
</form>