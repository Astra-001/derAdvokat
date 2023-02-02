<?php /* Smarty version 2.6.18, created on 2016-03-17 22:18:51
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/alarmplan.tpl */ ?>
<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">

<?php if ($this->_tpl_vars['show_tab']): ?>
    <h1>Angaben zum Standort des jeweiligen Alarmplans</h1>
    <input type="hidden" name="name_ersthelfer" value="<?php echo $_POST['name_ersthelfer']; ?>
" size="44" />
    <input type="hidden" name="artz" value="<?php echo $_POST['artz']; ?>
" size="44" />
    <input type="hidden" name="tel_artz" value="<?php echo $_POST['tel_artz']; ?>
" size="44" />
    <input type="hidden" name="krankenhaus" value="<?php echo $_POST['krankenhaus']; ?>
" size="44" />
    <input type="hidden" name="tel_krankenhaus" value="<?php echo $_POST['tel_krankenhaus']; ?>
" size="44" />
    <input type="hidden" name="sicherheits_beauftragter" value="<?php echo $_POST['sicherheits_beauftragter']; ?>
" size="44" />

    <table border="0" width="100%" cellpadding="5" class="contenttable">
        <?php if (strlen ( $this->_tpl_vars['error'] )): ?>
        <tr>
	        <td colspan="5" class="fehlermeldung"><?php echo $this->_tpl_vars['error']; ?>
</td>
        </tr>
        <?php endif; ?>
        <?php if (strlen ( $this->_tpl_vars['erfolg'] )): ?>
        <tr>
	        <td colspan="5" class="erfolgsmeldung"><?php echo $this->_tpl_vars['erfolg']; ?>
</td>
        </tr>
        <?php endif; ?>

        <tr>
	        <td>8.	Standort f&uuml;r den der Alarmplan gilt:*</td>
	        <td colspan="4"><input type="text" name="standort_alarmplan" <?php if (strlen ( $this->_tpl_vars['msg_standort_alarmplan'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['standort_alarmplan'] )): ?><?php echo $_POST['standort_alarmplan']; ?>
<?php endif; ?>" size="44" /></td>
        </tr>
        <tr>
	        <td>9.	Ort des n&auml;chsten Feuerl&ouml;schers von hier:*</td>
	        <td colspan="4"><input type="text" name="ort_feuerloescher" <?php if (strlen ( $this->_tpl_vars['msg_ort_feuerloescher'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ort_feuerloescher'] )): ?><?php echo $_POST['ort_feuerloescher']; ?>
<?php endif; ?>" size="44" /></td>
        </tr>
        <tr>
	        <td>10.	Ort des nächsten Verbandskasten von hier:*</td>
	        <td colspan="4"><input type="text" name="verbandskasten" <?php if (strlen ( $this->_tpl_vars['msg_verbandskasten'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['verbandskasten'] )): ?><?php echo $_POST['verbandskasten']; ?>
<?php endif; ?>" size="44" /></td>
        </tr>
       <tr>
	        <td>11.	Sammelplatz au&szlig;erhalb des Geb&auml;udes im Brandfall:*</td>
	        <td colspan="4"><input type="text" name="sammelplatz" <?php if (strlen ( $this->_tpl_vars['msg_sammelplatz'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['sammelplatz'] )): ?><?php echo $_POST['sammelplatz']; ?>
<?php endif; ?>" size="44" /></td>
        </tr>
</table>
    <br />
    <table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="alarmplan" value="Ausgabe" /></td>
</tr>
</table>

    <br />
<?php endif; ?>

<?php if (! $this->_tpl_vars['show_tab']): ?>
<h1>Allgemeinen Angaben, die f&uuml;r alle Alarmpl&auml;ne gelten, die in dem Betrieb ausgeh&auml;ngt werden.</h1>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
        <?php if (strlen ( $this->_tpl_vars['error'] )): ?>
        <tr>
	        <td colspan="5" class="fehlermeldung"><?php echo $this->_tpl_vars['error']; ?>
</td>
        </tr>
        <?php endif; ?>
        <?php if (strlen ( $this->_tpl_vars['erfolg'] )): ?>
        <tr>
	        <td colspan="5" class="erfolgsmeldung"><?php echo $this->_tpl_vars['erfolg']; ?>
</td>
        </tr>
        <?php endif; ?>
        <tr>
	        <td>1. Firma*</td>
	        <td colspan="4"><input type="text" name="firma_name" <?php if (strlen ( $this->_tpl_vars['msg_firma_name'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['firma_name'] )): ?><?php echo $_POST['firma_name']; ?>
<?php elseif (isset ( $this->_tpl_vars['user'] )): ?><?php echo $this->_tpl_vars['user']; ?>
<?php endif; ?>" size="44" /></td>
        </tr>
        <tr>
	        <td>2.	Name des/der Ersthelfer(s) – Sanit&auml;tsbeauftragte(r):*</td>
	        <td colspan="4"><input type="text" name="name_ersthelfer" <?php if (strlen ( $this->_tpl_vars['msg_name_ersthelfer'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['name_ersthelfer'] )): ?><?php echo $_POST['name_ersthelfer']; ?>
<?php endif; ?>" size="44" />
	        </td>
        </tr>
        <tr>
	        <td>3.	N&auml;chster Arzt:*</td>
	        <td colspan="4"><input type="text" name="artz" <?php if (strlen ( $this->_tpl_vars['msg_artz'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['artz'] )): ?><?php echo $_POST['artz']; ?>
<?php endif; ?>" size="44" />
	        </td>
        </tr>
        <tr>
	        <td>4.	Telefonnummer des n&auml;chsten Arztes:*</td>
	        <td colspan="4"><input type="text" name="tel_artz" <?php if (strlen ( $this->_tpl_vars['msg_tel_artz'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['tel_artz'] )): ?><?php echo $_POST['tel_artz']; ?>
<?php endif; ?>" size="44" />
	        </td>
        </tr>
        <tr>
	        <td>5.	N&auml;chstes Krankenhaus:*</td>
	        <td colspan="4"><input type="text" name="krankenhaus" <?php if (strlen ( $this->_tpl_vars['msg_krankenhaus'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['krankenhaus'] )): ?><?php echo $_POST['krankenhaus']; ?>
<?php endif; ?>" size="44" />
	        </td>
        </tr>
        <tr>
	        <td>6.	Telefonnummer des n&auml;chsten Krankenhauses:*</td>
	        <td colspan="4"><input type="text" name="tel_krankenhaus" <?php if (strlen ( $this->_tpl_vars['msg_tel_krankenhaus'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['tel_krankenhaus'] )): ?><?php echo $_POST['tel_krankenhaus']; ?>
<?php endif; ?>" size="44" />
	        </td>
        </tr>
        <tr>
	        <td>7. Betrieblicher Sicherheitsbeauftragter:*</td>
	        <td colspan="4"><input type="text" name="sicherheits_beauftragter" <?php if (strlen ( $this->_tpl_vars['msg_sicherheits_beauftragter'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['sicherheits_beauftragter'] )): ?><?php echo $_POST['sicherheits_beauftragter']; ?>
<?php endif; ?>" size="44" />
	        </td>
        </tr>
    </table>
    <br />

<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="alarmplan" value="Weiter" /></td>
</tr>
</table>
<?php endif; ?>
    <br /><br />

</form>