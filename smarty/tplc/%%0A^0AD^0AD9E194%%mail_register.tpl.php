<?php /* Smarty version 2.6.18, created on 2017-01-05 16:10:44
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/mail_register.tpl */ ?>
<?php if ($_POST['geschlecht'] != 3): ?>
Sehr geehrte<?php if ($_POST['geschlecht'] == 1): ?>r Herr <?php else: ?> Frau <?php endif; ?>
<?php echo $_POST['titel']; ?>
 <?php echo $_POST['vorname']; ?>
 <?php echo $_POST['name']; ?>
,
<?php endif; ?>
<?php if ($_POST['geschlecht'] == 3): ?>
Sehr geehrte Damen und Herren,
<?php endif; ?>

Sie können sich ab jetzt im Premiumbereich von http://www.deradvokat.de/derAdvokat/login
mit dem unten genannten Passwort anmelden. 

Ich hoffe Sie haben von den dort zur Verfügung gestellten Informationen einen großen Nutzen. 
Für Kritik und Anregungen bin ich stets dankbar.

Ihre Zugangsdaten:
----------------------------------------
Benutzername: <?php echo $_POST['email']; ?>

Ihr Passwort: <?php echo $this->_tpl_vars['passwort']; ?>

----------------------------------------

Das Rechtsportal können Sie auch über unsere Homepage unter http://www.deradvokat.de aufrufen.

Mit freundlichen Grüßen.
Kanzlei Strauch