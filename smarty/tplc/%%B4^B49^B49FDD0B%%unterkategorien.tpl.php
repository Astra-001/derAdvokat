<?php /* Smarty version 2.6.18, created on 2014-07-19 20:59:21
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/unterkategorien.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(['plugins' => [['modifier', 'escape', '/var/customers/webs/strauchyve/derAdvokat/tpl/unterkategorien.tpl', 10, false]]], $this); ?>
<div class="contenttable">
<a href="/derAdvokat/kategorien/<?php echo $_GET['kat_id']; ?>
"><img src="/derAdvokat/grafik/pfail_back.png" alt="Zur&uuml;ck" border="no" name="back" onmouseover="javascript:document.back.src='/derAdvokat/grafik/pfail_back_on.png';" onmouseout="javascript:document.back.src='/derAdvokat/grafik/pfail_back.png';"/></a>
</div>

<h1><?php echo $this->_tpl_vars['kategorie']; ?>
</h1>
<div class="contenttable">
<h3>Artikelliste</h3>
<ul>
<?php $_from = $this->_tpl_vars['artikel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['artikel'] = ['total' => is_countable($_from) ? count($_from) : 0, 'iteration' => 0];
if ($this->_foreach['artikel']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['a']):
        $this->_foreach['artikel']['iteration']++;
?>
<li><a href="/derAdvokat/artikelview/<?php echo ((is_array($_tmp=$this->_tpl_vars['a']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['a']['titel'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
<?php endforeach; else: ?><li>Keine Beitr&auml;ge vorhanden.</li>
<?php endif; unset($_from); ?>
</ul>
</div>
