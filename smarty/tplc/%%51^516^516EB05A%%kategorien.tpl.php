<?php /* Smarty version 2.6.18, created on 2014-07-18 20:54:53
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/kategorien.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/var/customers/webs/strauchyve/derAdvokat/tpl/kategorien.tpl', 10, false),)), $this); ?>
<h1><?php echo $this->_tpl_vars['kategorie']; ?>
</h1>
<div class="contenttable"><b>Nachfolgende Beiträge sind popul&auml;rwissenschaftlich verfasst und als Orientierung für Personen gedacht,
die &uuml;ber keine juristische Ausbildung verfügen. Die Beitr&auml;ge erheben weder einen Anspruch auf Vollständigkeit der besprochenen Inhalte, noch ist hiermit eine konkrete rechtliche Auskunft verbunden. Weitere rechtliche Hinweise zur Nutzung dieses Rechtsportals finden Sie im Impressum.
</b></div>
<br />
<div class="contenttable">
<h3>Themen</h3>
<ul>
<?php $_from = $this->_tpl_vars['unterkategorien']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['unterkategorien'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['unterkategorien']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['a']):
        $this->_foreach['unterkategorien']['iteration']++;
?>
<li><a href="/derAdvokat/kategorien/<?php echo ((is_array($_tmp=$this->_tpl_vars['a']['parent_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/unterkategorien/<?php echo ((is_array($_tmp=$this->_tpl_vars['a']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['a']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
<?php endforeach; else: ?><li>Keine Beitr&auml;ge vorhanden.</li>
<?php endif; unset($_from); ?>
</ul>
</div>