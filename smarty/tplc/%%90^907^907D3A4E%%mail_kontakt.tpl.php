<?php /* Smarty version 2.6.18, created on 2014-11-25 03:56:46
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/mail_kontakt.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(['plugins' => [['modifier', 'date_format', '/var/customers/webs/strauchyve/derAdvokat/tpl/mail_kontakt.tpl', 1, false]]], $this); ?>
Nachricht von <?php echo $_REQUEST['kontakt_name']; ?>
 am  <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M:%S")); ?>


<?php echo $_REQUEST['kontakt_nachricht']; ?>


<?php if (mb_strlen ( $_REQUEST['kontakt_nachricht'] )): ?>Email: <?php echo $_REQUEST['kontakt_nachricht']; ?>
<?php endif; ?>

<?php if (mb_strlen ( $_REQUEST['kontakt_telefon'] )): ?>Telefon: <?php echo $_REQUEST['kontakt_telefon']; ?>
<?php endif; ?>
