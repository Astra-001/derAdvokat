<?php /* Smarty version 2.6.18, created on 2014-07-18 20:06:51
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/mail_pass.tpl */ ?>
Sehr geehrte<?php if ($this->_tpl_vars['geschlecht'] == 1): ?>r Herr<?php endif; ?> <?php if ($this->_tpl_vars['geschlecht'] == 2): ?> Frau <?php endif; ?>
<?php echo $this->_tpl_vars['titel']; ?>
 <?php echo $this->_tpl_vars['vorname']; ?>
 <?php echo $this->_tpl_vars['name']; ?>
,

Sie haben erfolgreich Ihr Passwort geändert.

Ihre Zugangsdaten:
----------------------------------------
Benutzername: <?php echo $this->_tpl_vars['email']; ?>

Ihr Passwort: <?php echo $this->_tpl_vars['passwort']; ?>

----------------------------------------

Mit freundlichen Grüßen.
Kanzlei Strauch
