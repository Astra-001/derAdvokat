<?php /* Smarty version 2.6.18, created on 2016-02-16 19:14:54
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/artikelliste.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', '/var/customers/webs/strauchyve/derAdvokat/tpl/artikelliste.tpl', 20, false),)), $this); ?>
<h1>Artikelübersicht</h1>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."seiten_incl.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br/><br/>

<table border="0" cellpadding="5" class="contenttable">
<tr align="center">
    <th>Kategorie</th>
    <th>Unterkategorie</th>
    <th>Titel</th>
    <th>Premium</th>
    <th>Erstellt.</th>
    <th>Aktion</th>
</tr>
<?php $_from = $this->_tpl_vars['artikel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['artikel'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artikel']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['a']):
        $this->_foreach['artikel']['iteration']++;
?>
<tr>
    <td><a href='/derAdvokat/kategorien/<?php echo $this->_tpl_vars['a']['kat_id']; ?>
' target='_blank'><?php echo $this->_tpl_vars['cat'][$this->_tpl_vars['a']['kat_id']]; ?>
</a></td>
    <td><a href='/derAdvokat/kategorien/<?php echo $this->_tpl_vars['a']['kat_id']; ?>
/unterkategorien/<?php echo $this->_tpl_vars['a']['ukat_id']; ?>
' target='_blank'><?php echo $this->_tpl_vars['cat'][$this->_tpl_vars['a']['ukat_id']]; ?>
</a></td>
    <td><a href='/derAdvokat/artikelview/<?php echo $this->_tpl_vars['a']['id']; ?>
' target='_blank'><?php echo $this->_tpl_vars['a']['titel']; ?>
</a></td>
    <td><?php if ($this->_tpl_vars['a']['premium'] == @ARTICLE_PREMIUM): ?>Premium<?php endif; ?></td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['a']['date_created'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</td>
    <td align="right">
    <a href='index.php?task=artikel&amp;kat_id=<?php echo $this->_tpl_vars['a']['kat_id']; ?>
&amp;art_id=<?php echo $this->_tpl_vars['a']['id']; ?>
&amp;act=edit'>Bearbeiten</a>
    <a href='index.php?task=artikeladmin&amp;art_id=<?php echo $this->_tpl_vars['a']['id']; ?>
&amp;act=del'>L&ouml;schen</a>
    </td>
</tr>
<tr>
    <td colspan="6"><hr /></td>
</tr>
<?php endforeach; else: ?><tr><td colspan="5">Keine Artikel vorhanden.</td></tr>
<?php endif; unset($_from); ?>
</table>
<br/><br/>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@SMARTY_TEMPLATE_DIR)."seiten_incl.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>