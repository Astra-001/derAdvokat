<?php /* Smarty version 2.6.18, created on 2014-12-05 13:38:19
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/dienstfahrzeug_vertrag.tpl */ ?>
<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>Vertrag &uuml;ber die Nutzung eines Dienstfahrzeugs</h1>
<form name="dienstfahrzeug" action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td colspan="4" align="center">
<?php if (strlen ( $this->_tpl_vars['msg_erfolg'] )): ?>
    <span class="erfolgsmeldung"><?php echo $this->_tpl_vars['msg_erfolg']; ?>
</span>
<?php endif; ?>
<?php if (strlen ( $this->_tpl_vars['msg_fehler'] )): ?>
    <span class="fehlermeldung"><?php echo $this->_tpl_vars['msg_fehler']; ?>
</span>
<?php endif; ?>
	</td>
</tr>
<tr>
    <td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Arbeitgebers</b></font></td>
</tr>
<tr>
    <td width="170">Anrede</td>
    <td width="60"><select name="geschlecht" onchange="check_form_dienst()">
        <option value="1" <?php if ($_POST['geschlecht'] == 1): ?> selected="selected" <?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['geschlecht'] == 2): ?> selected="selected" <?php endif; ?>>Frau</option>
        <option value="3" <?php if ($_POST['geschlecht'] == 3): ?> selected="selected" <?php endif; ?>>Firma</option>
    </select></td>
    <td width="57" align="right">ggf. Titel</td>
    <td colspan="3"><input type="text" name="titel" value="<?php echo $this->_tpl_vars['titel']; ?>
" /></td>
</tr>
<tr>
    <td>Nachname*</td>
    <td colspan="3"><input type="text" name="name" value="<?php echo $this->_tpl_vars['name']; ?>
" size="44" /></td>
</tr>
<tr>
    <td>Vorname <br />(bei nat&uuml;rlicher Person)</td>
    <td colspan="3"><input type="text" name="vorname" value="<?php echo $this->_tpl_vars['vorname']; ?>
" size="44" /></td>
</tr>
<tr>
    <td>ggf. vertreten durch</td>
    <td colspan="3"><input type="text" name="vertreter" value="<?php echo $this->_tpl_vars['vertreter']; ?>
" size="44" /></td>
</tr>
<tr>
    <td>Firmenname</td>
    <td colspan="3"><input type="text" name="firma_name" value="<?php echo $this->_tpl_vars['firma_name']; ?>
" size="44" /></td>
</tr>
<tr>
    <td>Stra&szlig;e und Hausnummer*</td>
    <td colspan="3"><input type="text" name="strasse"  value="<?php echo $this->_tpl_vars['strasse']; ?>
" size="44" /></td>
</tr>
<tr>
    <td>Postleitzahl*</td>
    <td width="57"><input type="text" name="plz"  value="<?php echo $this->_tpl_vars['plz']; ?>
" size="5" maxlength="5" /></td>
    <td align="right">Ort*</td>
    <td><input type="text" name="ort"  value="<?php echo $this->_tpl_vars['ort']; ?>
" /></td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<?php if (strlen ( $this->_tpl_vars['msg'] )): ?>
<tr>
    <td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
    <td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Mitarbeiters</b></font></td>
</tr>
<tr>
    <td width="170">Anrede*</td>
    <td  width="60"><select name="ex_anrede">
        <option value="1" <?php if ($_POST['ex_anrede'] == 1): ?> selected="selected"<?php endif; ?>>Herr</option>
        <option value="2" <?php if ($_POST['ex_anrede'] == 2): ?> selected="selected"<?php endif; ?>>Frau</option>
    </select></td>
    <td align="right" width="57">ggf. Titel</td>
    <td><input type="text" name="ex_titel" value="<?php if (isset ( $_POST['ex_titel'] )): ?><?php echo $_POST['ex_titel']; ?>
<?php endif; ?>" /></td>
</tr>
<tr>
    <td>Nachname*</td>
    <td colspan="3"><input type="text" name="ex_name" <?php if (strlen ( $this->_tpl_vars['msg_name'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_name'] )): ?><?php echo $_POST['ex_name']; ?>
<?php endif; ?>" size="44" /></td>
</tr>
<tr>
    <td>Vorname*</td>
    <td colspan="3"><input type="text" name="ex_vorname" <?php if (strlen ( $this->_tpl_vars['msg_vorname'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_vorname'] )): ?><?php echo $_POST['ex_vorname']; ?>
<?php endif; ?>" size="44" /></td>
</tr>
<tr>
    <td>Stra&szlig;e und Hausnummer*</td>
    <td colspan="3"><input type="text" name="ex_strasse" <?php if (strlen ( $this->_tpl_vars['msg_strasse'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_strasse'] )): ?><?php echo $_POST['ex_strasse']; ?>
<?php endif; ?>" size="44" /></td>
</tr>
<tr>
    <td>Postleitzahl*</td>
    <td width="57"><input type="text" name="ex_plz" <?php if (strlen ( $this->_tpl_vars['msg_plz'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_plz'] )): ?><?php echo $_POST['ex_plz']; ?>
<?php endif; ?>" size="5" maxlength="5" /></td>
    <td align="right">Ort*</td>
    <td><input type="text" name="ex_ort" <?php if (strlen ( $this->_tpl_vars['msg_ort'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['ex_ort'] )): ?><?php echo $_POST['ex_ort']; ?>
<?php endif; ?>" /></td>
</tr>
</table>
<br />
   <table border="0" width="100%" cellpadding="5" class="contenttable">
<?php if (strlen ( $this->_tpl_vars['msg_dar'] )): ?>
<tr>
    <td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_dar']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
    <td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Fahrzeugs</b></font></td>
</tr>
<tr>
    <td width="170">Marke*</td>
    <td colspan="3"><input type="text" name="marke" <?php if (strlen ( $this->_tpl_vars['msg_marke'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['marke'] )): ?><?php echo $_POST['marke']; ?>
<?php endif; ?>" size="20" /></td>
</tr>
<tr>
    <td>Typ*</td>
    <td colspan="3"><input type="text" name="typ" <?php if (strlen ( $this->_tpl_vars['msg_typ'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['typ'] )): ?><?php echo $_POST['typ']; ?>
<?php endif; ?>" size="10" /></td>
</tr>
<tr>
    <td>Amtliches Kennzeichen*</td>
    <td colspan="3"><input type="text" name="kennzeichen" <?php if (strlen ( $this->_tpl_vars['msg_kennzeichen'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['kennzeichen'] )): ?><?php echo $_POST['kennzeichen']; ?>
<?php endif; ?>" size="10" /></td>
</tr></table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<?php if (strlen ( $this->_tpl_vars['msg_dar_priv'] )): ?>
<tr>
    <td colspan="4" class="fehlermeldung"><?php echo $this->_tpl_vars['msg_dar_priv']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
    <td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Privatfahrten</b></font></td>
</tr>
<tr>
  <td rowspan="3">Erlaubnis</td>
  <td><input type="radio" name="erlaubnis" value="1" <?php if ($_POST['erlaubnis'] == 1): ?> checked="checked" <?php endif; ?> onclick="check_dienstfahrzeug()" />Nicht erlaubt</td>
  <td></td>
</tr>
<tr>
  <td><input type="radio" name="erlaubnis" value="2" <?php if ($_POST['erlaubnis'] == 2): ?> checked="checked" <?php endif; ?> onclick="check_dienstfahrzeug()" />Genehmigung der Gesch&auml;ftsleitung notwendig</td>
  <td></td>
</tr>  
<tr>
  <td><input type="radio" name="erlaubnis" value="3" <?php if ($_POST['erlaubnis'] == 3): ?> checked="checked" <?php endif; ?> onclick="check_dienstfahrzeug()" />Erlaubt</td>
  <td></td>
</tr>
<tr>
	<td colspan="3"><hr /></td>
</tr>
<tr>
  <td rowspan="3">Zuzahlung f&uuml;r Privatfahrten</td>
  <td><input type="radio" name="zuzahlung" value="1" onclick="check_dienstfahrzeug()" <?php if ($_POST['zuzahlung'] == 1): ?> checked="checked" <?php else: ?> checked="checked"  <?php endif; ?> />Keine Zuzahlung</td>
  <td></td>
</tr>
<tr>
  <td><input type="radio" name="zuzahlung" value="2" <?php if ($_POST['zuzahlung'] == 2): ?> checked="checked" <?php endif; ?> onclick="check_dienstfahrzeug()" />Zahlung einer Kilometerpauschale in Höhe von </td>
  <td><input type="text" name="km_pauschale_summe" <?php if (strlen ( $this->_tpl_vars['msg_km_pauschale_summe'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['km_pauschale_summe'] )): ?><?php echo $_POST['km_pauschale_summe']; ?>
<?php endif; ?>" size="10" /> Euro</td>
</tr>
<tr>
  <td><input type="radio" name="zuzahlung" value="3" <?php if ($_POST['zuzahlung'] == 3): ?> checked="checked" <?php endif; ?> onclick="check_dienstfahrzeug()" />Zahlung einer Monatspauschale in Höhe von </td>
  <td><input type="text" name="monats_pauschale_summe" <?php if (strlen ( $this->_tpl_vars['msg_monats_pauschale_summe'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['monats_pauschale_summe'] )): ?><?php echo $_POST['monats_pauschale_summe']; ?>
<?php endif; ?>" size="10" /> Euro</td>
</tr>
</table>
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
    <td align="right" style="padding:10px;"><input type="submit" name="dienstfahrzeug" value="Ausgabe" /></td>
</tr>
</table>
</form>

<script type="text/javascript">
    /* <![CDATA[ */
check_dienstfahrzeug();
    /* ]]> */
    </script>
    
    <script type="text/javascript">
    /* <![CDATA[ */
check_form_dienst();
    /* ]]> */
    </script>