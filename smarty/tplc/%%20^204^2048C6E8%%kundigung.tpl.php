<?php /* Smarty version 2.6.18, created on 2015-04-24 11:48:40
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/kundigung.tpl */ ?>
<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/kundigung.js" type="text/javascript"></script>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">
<?php if (! is_numeric ( $this->_tpl_vars['bs_drei'] )): ?>
    <?php if (strlen ( $this->_tpl_vars['error'] )): ?>
	    <div class="fehlermeldung"><?php echo $this->_tpl_vars['error']; ?>
</div>
    <?php endif; ?>

    <h1>K&uuml;ndigung</h1>
    <table border="0" cellpadding="5" class="contenttable" width="100%">
    <tr>
        <td colspan="2"  bgcolor="#9FC6FF"><font color="white"><b>K&uuml;ndigung:</b></font></td>
    </tr>
    <tr>
      <td width="10"><input type="radio" name="kundigung" value="1" /></td>
      <td>Au&szlig;erordentlich</td>
    </tr>
    <tr>
      <td><input type="radio" name="kundigung" value="2" /></td>
      <td>Ordentlich mit Freistellung</td>
    </tr>
    <tr>
      <td><input type="radio" name="kundigung" value="3" /></td>
      <td>Ordentlich ohne Freistellung</td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="sent" value="Weiter" /></td>
    </tr>
    </table>
<?php endif; ?>



<?php if (is_numeric ( $this->_tpl_vars['bs_drei'] )): ?>
    <h1>K&uuml;ndigung, <?php echo $this->_tpl_vars['art']; ?>
</h1>
    <h3>Personenbezogene Angaben</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
        <?php if (strlen ( $this->_tpl_vars['error_pdf'] )): ?>
        <tr>
	        <td colspan="5" class="fehlermeldung"><?php echo $this->_tpl_vars['error_pdf']; ?>
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
	        <td width="170">Anrede</td>
	        <td width="57">
                <select name="geschlecht">
                    <option value="1" <?php if ($_POST['geschlecht'] == 1): ?><?php elseif ($this->_tpl_vars['user']['geschlecht'] == 1): ?> selected="selected"<?php endif; ?>>Herr</option>
                    <option value="2" <?php if ($_POST['geschlecht'] == 2): ?><?php elseif ($this->_tpl_vars['user']['geschlecht'] == 2): ?> selected="selected"<?php endif; ?>>Frau</option>
                </select>
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
	        <td>Vorname*</td>
	        <td colspan="4"><input type="text" name="vorname" <?php if (strlen ( $this->_tpl_vars['msg_vorname'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['vorname'] )): ?><?php echo $_POST['vorname']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['vorname'] )): ?><?php echo $this->_tpl_vars['user']['vorname']; ?>
<?php endif; ?>" size="44" /></td>
        </tr>
        <tr>
	        <td>Nachname*</td>
	        <td colspan="4"><input type="text" name="name" <?php if (strlen ( $this->_tpl_vars['msg_name'] )): ?>class="error"<?php endif; ?> value="<?php if (isset ( $_POST['name'] )): ?><?php echo $_POST['name']; ?>
<?php elseif (isset ( $this->_tpl_vars['user']['name'] )): ?><?php echo $this->_tpl_vars['user']['name']; ?>
<?php endif; ?>" size="44" /></td>
        </tr>
        <tr>
	        <td>Stra&szlig;e und Hausnummer*</td>
	        <td colspan="4"><input type="text" name="strasse"  value="<?php if (isset ( $_POST['strasse'] )): ?><?php echo $_POST['strasse']; ?>
<?php elseif (isset ( $this->_tpl_vars['strasse'] )): ?><?php echo $this->_tpl_vars['strasse']; ?>
<?php endif; ?>" size="44" /></td>
        </tr>
        <tr>
	        <td>Postleitzahl*</td>
	        <td width="57"><input type="text" name="plz" value="<?php if (isset ( $_POST['plz'] )): ?><?php echo $_POST['plz']; ?>
<?php elseif (isset ( $this->_tpl_vars['plz'] )): ?><?php echo $this->_tpl_vars['plz']; ?>
<?php endif; ?>" size="5" maxlength="5" /></td>
	        <td width="57" align="right">Ort*</td>
	        <td><input type="text" name="ort" value="<?php if (isset ( $_POST['ort'] )): ?><?php echo $_POST['ort']; ?>
<?php elseif (isset ( $this->_tpl_vars['ort'] )): ?><?php echo $this->_tpl_vars['ort']; ?>
<?php endif; ?>" /></td>
        </tr>
    </table>
    <h3>Spezielle Angaben</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
        <tr>
	        <td width="170">Beginn des Arbeitsverh&auml;ltnisses:</td>
	        <td width="150"><input type="text" id="datein" name="datum_begin"  <?php if (isset ( $_POST['datum_begin'] )): ?>value="<?php if (isset ( $_POST['datum_begin'] )): ?><?php echo $_POST['datum_begin']; ?>
<?php elseif (isset ( $this->_tpl_vars['datum_begin'] )): ?><?php echo $this->_tpl_vars['datum_begin']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?>/></td>
          	<td align="left"><div id="datein_st"></div></td>
        </tr>
        <tr>
	        <td>Datum des Zugangs der K&uuml;ndigung beim Arbeitnehmer:</td>
	        <td><input type="text" name="datum_zugangs" id="datedec"  <?php if (isset ( $_POST['datum_zugangs'] )): ?>value="<?php if (isset ( $_POST['datum_zugangs'] )): ?><?php echo $_POST['datum_zugangs']; ?>
<?php elseif (isset ( $this->_tpl_vars['datum_zugangs'] )): ?><?php echo $this->_tpl_vars['datum_zugangs']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> /></td>
		<td align="left"><div id="datedec_st"></div></td>
        </tr>
	<tr>
		<td></td>
		<td align="center"><input type="button" onclick="calc();" value="Berechnen" /></td>
		<td></td>
	</tr>
    </table>
    <h3>Angabe des K&uuml;ndigungsrechners</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
        <tr>
	        <td><div id="result"></div>
		<input type="hidden" id="daterez" name="daterez" value="<?php if (isset ( $_POST['daterez'] )): ?><?php echo $_POST['daterez']; ?>
<?php elseif (isset ( $this->_tpl_vars['daterez'] )): ?><?php echo $this->_tpl_vars['daterez']; ?>
<?php endif; ?>" />
		</td>
        </tr>
    </table>
    <br /><br />
  <script type="text/javascript">calc();</script>
    <table border="0" class="contenttable" cellpadding="5" width="100%">
          <tr>
	           <td align="right"><input type="hidden" name="versteckt" value="<?php echo $this->_tpl_vars['bs_drei']; ?>
"  /><input type="hidden" name="versteckt_art" value="<?php echo $this->_tpl_vars['art']; ?>
"  /><input type="submit" name="sent_pdf" value="Ausgabe" /></td>
        </tr>
</table>
<?php endif; ?>
</form>