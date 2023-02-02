<?php /* Smarty version 2.6.18, created on 2014-07-19 03:30:57
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/artikelview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/var/customers/webs/strauchyve/derAdvokat/tpl/artikelview.tpl', 9, false),array('modifier', 'date_format', '/var/customers/webs/strauchyve/derAdvokat/tpl/artikelview.tpl', 27, false),)), $this); ?>
<div class="contenttable">
<table border="0" cellpadding="5">
<tr>
	<td width="30"><a href="/derAdvokat/kategorien/<?php echo $this->_tpl_vars['artikel']['kat_id']; ?>
/unterkategorien/<?php echo $this->_tpl_vars['artikel']['ukat_id']; ?>
"><img src="/derAdvokat/grafik/pfail_back.png" alt="zur&uuml;ck in Newsletter Men&uuml;" border="no"/></a></td>
	<td><img src="/derAdvokat/grafik/printer_icon.png" alt="Drucken" title="Drucken" style="cursor: pointer;" onclick="window.print();" /></td>
</tr>
</table>
</div>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['artikel']['titel'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>

<table border="0"  cellpadding="5" class="contenttable">
<tr>
    <td colspan="2">
    <?php if (strlen ( $this->_tpl_vars['artikel']['bild_name'] )): ?>
    <div id='content_bild'>
        <img src="/derAdvokat/bilder/main_<?php echo $this->_tpl_vars['artikel']['bild_name']; ?>
" alt="Bild" />
    </div>
    <?php endif; ?>
    <span style="color:#0A264E"><?php echo $this->_tpl_vars['artikel']['content']; ?>
</span>
    </td>
</tr>
<?php if ($_SESSION['user']['status'] == @STATUS_ADMIN): ?>
<tr>
    <td colspan="2"><hr /></td>
</tr>
<tr>
    <td width="300">Erstellt: <?php echo ((is_array($_tmp=$this->_tpl_vars['artikel']['date_created'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
<br />
        Dieser Artikel ist im Bereich: <?php if ($this->_tpl_vars['artikel']['premium'] == 1): ?> &Ouml;ffentlich<?php elseif ($this->_tpl_vars['artikel']['premium'] == 2): ?>Premium<?php endif; ?>
   </td>
    <td align="center">

  <table border="0">
    <tr>
        <td><a href='/derAdvokat/index.php?task=artikel&amp;kat_id=<?php echo $this->_tpl_vars['artikel']['kat_id']; ?>
&amp;art_id=<?php echo $this->_tpl_vars['artikel']['id']; ?>
&amp;act=edit'>Bearbeiten</a></td>
    </tr>
    <tr>
        <td><a href='/derAdvokat/index.php?task=kategorien&amp;kat_id=<?php echo $this->_tpl_vars['artikel']['kat_id']; ?>
&amp;task=unterkategorien&amp;ukat_id=<?php echo $this->_tpl_vars['artikel']['ukat_id']; ?>
&amp;art_id=<?php echo $this->_tpl_vars['artikel']['id']; ?>
&amp;act=del'>L&ouml;schen</a></td>
    </tr>
    <tr>
        <td><?php if ($this->_tpl_vars['artikel']['status'] == 0): ?><a href='/derAdvokat/index.php?task=artikelview&amp;art_id=<?php echo $this->_tpl_vars['artikel']['id']; ?>
&amp;act=lock'>Sperren<?php endif; ?>
        <?php if ($this->_tpl_vars['artikel']['status'] == 1): ?><a href='/derAdvokat/index.php?task=artikelview&amp;art_id=<?php echo $this->_tpl_vars['artikel']['id']; ?>
&amp;act=unlock'><span style="color:red;">Entsperren</span><?php endif; ?></a></td>
    </tr>
    </table>

  </td>
</tr>
<?php endif; ?>
</table>