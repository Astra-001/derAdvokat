<?php /* Smarty version 2.6.18, created on 2014-07-21 16:35:18
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/kontakt.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(['plugins' => [['modifier', 'escape', '/var/customers/webs/strauchyve/derAdvokat/tpl/kontakt.tpl', 14, false]]], $this); ?>
<h1>Kontaktformular</h1>
<?php if ($_REQUEST['act'] == 'send' && ! strlen ( $this->_tpl_vars['msg'] )): ?>
<div class="contenttable">Vielen Dank,<br />
wir haben Ihre Anfrage erhalten. Sie erhalten von uns schnellstm&ouml;glich eine Antwort.
</div>
<?php else: ?>
<?php if ($_REQUEST['act'] == 'send' && strlen ( $this->_tpl_vars['msg'] )): ?>
<div class="contenttable"><?php echo $this->_tpl_vars['msg']; ?>
</div><br />
<?php endif; ?>
<div class="contentbox">
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>
">
    <input type="hidden" name="act" value="send" />
  <label>Vor- und Nachname:<br />
  <input type="text" name="kontakt_name" value="<?php if (strlen ( $_REQUEST['kontakt_name'] )): ?><?php echo ((is_array($_tmp=$_REQUEST['kontakt_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$_SESSION['user']['vorname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$_SESSION['user']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" /><br />
  </label><br />
  <label>E-Mail:<br />
  <input type="text" name="kontakt_email" value="<?php echo $_SESSION['user']['email']; ?>
"  />
  </label><br /><br />
  <label>Telefon:<br />
  <input type="text" name="kontakt_telefon" value="<?php if (strlen ( $_REQUEST['kontakt_telefon'] )): ?><?php echo ((is_array($_tmp=$_REQUEST['kontakt_telefon'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$_SESSION['user']['tel'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" />
  </label>

  <br /><br />
  <label>Ihre Nachricht:<br />
  <textarea name="kontakt_nachricht" cols="50" rows="8" id="nachricht"><?php echo $_REQUEST['nachricht']; ?>
</textarea>
  </label><br /><br />
  <input name="save" type="submit" value="Senden" />
</form>
</div>
<?php endif; ?>
