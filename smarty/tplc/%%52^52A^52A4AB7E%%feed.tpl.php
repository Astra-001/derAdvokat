<?php /* Smarty version 2.6.18, created on 2014-07-19 09:42:07
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/feed.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(['plugins' => [['modifier', 'date_format', '/var/customers/webs/strauchyve/derAdvokat/tpl/feed.tpl', 9, false], ['modifier', 'escape', '/var/customers/webs/strauchyve/derAdvokat/tpl/feed.tpl', 22, false]]], $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="utf-8"<?php echo '?>'; ?>

<feed xmlns="http://www.w3.org/2005/Atom">
  <title>derAdvokat - Beiträge</title>
  <subtitle>Beiträge aus dem Rechtsportal der Kanzlei Strauch</subtitle>
  <link href="http://www.deradvokat.de/derAdvokat/" />
  <link rel="self" href="http://www.deradvokat.de/derAdvokat/feed.rss" />
  <updated><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%dT%H:%M:%S+01:00") : smarty_modifier_date_format($_tmp, "%Y-%m-%dT%H:%M:%S+01:00")); ?>
</updated>
  <author>
    <name>Kanzlei Strauch</name>
  </author>
  <id>http://www.deradvokat.de/derAdvokat/</id>
  <logo>http://www.deradvokat.de/derAdvokat/grafik/logo_advokat_png.png</logo>

<?php $_from = $this->_tpl_vars['artikel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['artikel'] = ['total' => is_countable($_from) ? count($_from) : 0, 'iteration' => 0];
if ($this->_foreach['artikel']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['a']):
        $this->_foreach['artikel']['iteration']++;
?>
    <entry>
      <title><?php echo $this->_tpl_vars['cat'][$this->_tpl_vars['a']['kat_id']]; ?>
 &gt; <?php echo $this->_tpl_vars['a']['titel']; ?>
</title>
      <link href="http://www.deradvokat.de/derAdvokat/artikelview/<?php echo $this->_tpl_vars['a']['id']; ?>
" />
      <id>http://www.deradvokat.de/derAdvokat/artikelview/<?php echo $this->_tpl_vars['a']['id']; ?>
</id>
      <updated><?php echo ((is_array($_tmp=$this->_tpl_vars['a']['date_created'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%dT%H:%M:%S+01:00") : smarty_modifier_date_format($_tmp, "%Y-%m-%dT%H:%M:%S+01:00")); ?>
</updated>
      <summary><?php echo ((is_array($_tmp=$this->_tpl_vars['a']['text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</summary>
    </entry>
<?php endforeach; endif; unset($_from); ?>

</feed>
