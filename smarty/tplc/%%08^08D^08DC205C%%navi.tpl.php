<?php /* Smarty version 2.6.18, created on 2019-04-01 12:55:30
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/navi.tpl */ ?>
<table border="0" width="<?php if (! $_GET['task']): ?>210<?php else: ?>210<?php endif; ?>" cellpadding="2">

<?php $_from = $this->_tpl_vars['kategorien']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['kategorien'] = ['total' => is_countable($_from) ? count($_from) : 0, 'iteration' => 0];
if ($this->_foreach['kategorien']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k']):
        $this->_foreach['kategorien']['iteration']++;
?>

<tr>
	<td>&raquo;</td>
    <td height="15"><a href="/derAdvokat/kategorien/<?php echo $this->_tpl_vars['k']['id']; ?>
"><?php echo $this->_tpl_vars['k']['name']; ?>
</a></td>
</tr>

<?php endforeach; endif; unset($_from); ?>

<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/rechnermodul">Rechner</a><br /></td>
</tr>

<?php if ($_SESSION['login']): ?>

<tr>
	<td></td>
	<td height="15"></td>
</tr>

<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/vertrag">Vertr&auml;ge</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/arbeitsmodule">Arbeitsmodule</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/formulare">Formulare</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/vortrag">Vortr&auml;ge/Seminare</a><br /></td>
</tr>

<?php endif; ?>

<?php if ($_SESSION['user']['status'] == @STATUS_ADMIN): ?>

<tr>
	<td></td>
	<td height="15"></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/userliste">Mitgliederliste</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/userliste/add">Registrierung</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/artikeladmin">Artikel&uuml;bersicht</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/artikel">Neuer Artikel</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/newsletter_menu">Newsletter</a><br /></td>
</tr>

<?php endif; ?>

<?php if ($_SESSION['login']): ?>
<tr>
	<td>&raquo;</td>
	<td height="15" id="eigene_daten"><a href="/derAdvokat/eigene_daten">Meine Daten</a></td>
</tr>
<?php endif; ?>

<?php if ($_SESSION['login']): ?>

<tr>
	<td></td>
	<td height="15"></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/logout">Logout</a><br /></td>
</tr>

<?php else: ?>

<tr>
	<td></td>
	<td height="15"></td>
</tr>

<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/login">Login</a><br /></td>
</tr>

<?php endif; ?>

<tr>
	<td></td>
	<td height="15"></td>
</tr>
<!--<tr>
	<td>&raquo;</td>
	<td height="15" id="Kontakt"><a href="/derAdvokat/kontakt">Kontakt</a></td>
</tr>//-->
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/impressum">Impressum</a></td>
</tr>



<?php if ($_SESSION['login']): ?>

<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/agb"> AGB</a></td>
</tr>

<?php endif; ?>
</table>
