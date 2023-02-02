<?php /* Smarty version 2.6.18, created on 2014-07-21 14:43:27
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/abmahnung.tpl */ ?>
<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>
"  method="post">
<?php if (! is_numeric ( $this->_tpl_vars['bs_drei'] )): ?>
    <?php if (strlen ( $this->_tpl_vars['error'] )): ?>
	    <div class="fehlermeldung"><?php echo $this->_tpl_vars['error']; ?>
</div>
    <?php endif; ?>

    <h1>Abmahnung</h1>
    <table border="0" cellpadding="5" class="contenttable" width="100%">
    <tr>
        <td colspan="4"  bgcolor="#9FC6FF"><font color="white"><b>Abmahnung wegen</b></font></td>
    </tr>
    <tr>
      <td><input type="radio" name="abmahnung" value="1" /></td>
      <td>Zusp&auml;tkommens</td>
      <td><input type="radio" name="abmahnung" value="2" /></td>
      <td>Fehlens in der Berufschule</td>
    </tr>
    <tr>
      <td><input type="radio" name="abmahnung" value="3" /></td>
      <td>Anzeigepflichtverletzung</td>
      <td><input type="radio" name="abmahnung" value="4" /></td>
      <td>privater Internetnutzung</td>
    </tr>
    <tr>
	    <td><input type="radio" name="abmahnung" value="5" /></td>
      <td>unerlaubter Nebent&auml;tigkeit</td>
      <td><input type="radio" name="abmahnung" value="6" /></td>
      <td>Versto&szlig; gegen das Rauchverbot</td>
    </tr>
    <tr>
      <td><input type="radio" name="abmahnung" value="7" /></td>
      <td>&Uuml;berschreitung der Pause</td>
      <td><input type="radio" name="abmahnung" value="8" /></td>
      <td>Versto&szlig; gegen das Alkoholverbot</td>
    </tr>
    <tr>
      <td><input type="radio" name="abmahnung" value="9" /></td>
      <td>Beleidigung</td>
      <td><input type="radio" name="abmahnung" value="10" /></td>
      <td>Schlechtleistung</td>
    </tr>
    <tr>
      <td><input type="radio" name="abmahnung" value="11" /></td>
      <td>unentschuldigten Fehlens</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
	    <td colspan="4"><input type="submit" name="sent" value="Weiter" /></td>
    </tr>
    </table>
<?php endif; ?>



<?php if (is_numeric ( $this->_tpl_vars['bs_drei'] )): ?>
    <h1>Abmahnung wegen: <?php echo $this->_tpl_vars['art']; ?>
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
    <h3>Allgemeine Angaben</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
        <tr>
	        <td width="170">Datum des Versto&szlig;es*<br/> ggf. Uhrzeit</td>
	        <td width="150"><input type="text" name="datum_verstoss" <?php if (isset ( $_POST['datum_verstoss'] )): ?>value="<?php if (isset ( $_POST['datum_verstoss'] )): ?><?php echo $_POST['datum_verstoss']; ?>
<?php elseif (isset ( $this->_tpl_vars['datum_verstoss'] )): ?><?php echo $this->_tpl_vars['datum_verstoss']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> /></td>
          	<td><?php if ($this->_tpl_vars['bs_drei'] != 1): ?>um <input type="text" name="zeit_verstoss"   <?php if (isset ( $_POST['zeit_verstoss'] )): ?>value="<?php if (isset ( $_POST['zeit_verstoss'] )): ?><?php echo $_POST['zeit_verstoss']; ?>
<?php elseif (isset ( $this->_tpl_vars['zeit_verstoss'] )): ?><?php echo $this->_tpl_vars['zeit_verstoss']; ?>
<?php endif; ?>"<?php else: ?>value="HH:MM" onfocus="this.value = ''"<?php endif; ?> /> Uhr <img src="../grafik/frage.png" onmouseover="Tip('z.B. die Zeit regul&auml;rer Arbeitsbeginn. ')" onmouseout="UnTip()" alt="Uhrzeit des Versto&szlig;es" /><?php endif; ?></td>
        </tr>
        <tr>
	        <td>Datum der Anh&ouml;rung:*</td>
	        <td colspan="2"><input type="text" name="anhorungs_datum"  <?php if (isset ( $_POST['anhorungs_datum'] )): ?>value="<?php if (isset ( $_POST['anhorungs_datum'] )): ?><?php echo $_POST['anhorungs_datum']; ?>
<?php elseif (isset ( $this->_tpl_vars['anhorungs_datum'] )): ?><?php echo $this->_tpl_vars['anhorungs_datum']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ   HH:MM" onfocus="this.value = ''"<?php endif; ?> /></td>
        </tr>
    </table>
    <br /><br />
    
   <?php if ($this->_tpl_vars['bs_drei'] == 1): ?>
    <table border="0" cellpadding="5" class="contenttable" width="100%">
    <tr>
	    <td width="170">Uhrzeit des Erscheinens am fraglichen Tag: </td>
	    <td><input type="text" name="ersch_tag" <?php if (isset ( $_POST['ersch_tag'] )): ?>value="<?php if (isset ( $_POST['ersch_tag'] )): ?><?php echo $_POST['ersch_tag']; ?>
<?php elseif (isset ( $this->_tpl_vars['ersch_tag'] )): ?><?php echo $this->_tpl_vars['ersch_tag']; ?>
<?php endif; ?>"<?php else: ?>value="HH:MM" onfocus="this.value = ''"<?php endif; ?> /> Uhr</td>
    </tr>
    <tr>
	    <td width="170">Regul&auml;rer Beginn der Arbeitszeit:</td>
	    <td><input type="text" name="reg_arb_beginn"  <?php if (isset ( $_POST['reg_arb_beginn'] )): ?>value="<?php if (isset ( $_POST['reg_arb_beginn'] )): ?><?php echo $_POST['reg_arb_beginn']; ?>
<?php elseif (isset ( $this->_tpl_vars['reg_arb_beginn'] )): ?><?php echo $this->_tpl_vars['reg_arb_beginn']; ?>
<?php endif; ?>"<?php else: ?>value="HH:MM" onfocus="this.value = ''"<?php endif; ?> /> Uhr</td>
    </tr>
    </table><br /><br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['bs_drei'] == 2): ?>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">weitere Fehlzeiten: </td>
	    <td width="150"><input type="text" name="fehlzeiten1" <?php if (isset ( $_POST['fehlzeiten1'] )): ?>value="<?php if (isset ( $_POST['fehlzeiten1'] )): ?><?php echo $_POST['fehlzeiten1']; ?>
<?php elseif (isset ( $this->_tpl_vars['fehlzeiten1'] )): ?><?php echo $this->_tpl_vars['fehlzeiten1']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> /></td>
      	<td>um <input type="text" name="zeit_fehlzeiten1"   <?php if (isset ( $_POST['zeit_fehlzeiten1'] )): ?>value="<?php if (isset ( $_POST['zeit_fehlzeiten1'] )): ?><?php echo $_POST['zeit_fehlzeiten1']; ?>
<?php elseif (isset ( $this->_tpl_vars['zeit_fehlzeiten1'] )): ?><?php echo $this->_tpl_vars['zeit_fehlzeiten1']; ?>
<?php endif; ?>"<?php else: ?>value="HH:MM" onfocus="this.value = ''"<?php endif; ?> /> Uhr</td>
    </tr>
    <tr>
	    <td></td>
	    <td width="150"><input type="text" name="fehlzeiten2" <?php if (isset ( $_POST['fehlzeiten2'] )): ?>value="<?php if (isset ( $_POST['fehlzeiten2'] )): ?><?php echo $_POST['fehlzeiten2']; ?>
<?php elseif (isset ( $this->_tpl_vars['fehlzeiten2'] )): ?><?php echo $this->_tpl_vars['fehlzeiten2']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> /></td>
      	<td>um <input type="text" name="zeit_fehlzeiten2"   <?php if (isset ( $_POST['zeit_fehlzeiten2'] )): ?>value="<?php if (isset ( $_POST['zeit_fehlzeiten2'] )): ?><?php echo $_POST['zeit_fehlzeiten2']; ?>
<?php elseif (isset ( $this->_tpl_vars['zeit_fehlzeiten2'] )): ?><?php echo $this->_tpl_vars['zeit_fehlzeiten2']; ?>
<?php endif; ?>"<?php else: ?>value="HH:MM" onfocus="this.value = ''"<?php endif; ?> /> Uhr</td>
    </tr>
    </table><br /><br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['bs_drei'] == 4): ?>
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">Info &uuml;ber Verbot der Internetnutzung* </td>
	    <td><input type="radio" name="privat_internet" value="1" <?php if ($_POST['privat_internet'] == 1): ?> checked <?php endif; ?> /> an Mitarbeiter ausgeh&auml;ndigt<br />
      <input type="radio" name="privat_internet" value="2" <?php if ($_POST['privat_internet'] == 2): ?> checked <?php endif; ?> /> h&auml;ngt im Betrieb aus</td>
    </tr>
    <tr>
	    <td width="170">Dauer des Versto&szlig;es in Minuten*</td>
	    <td><input type="text" name="dauer_in_min" value="<?php if (isset ( $_POST['dauer_in_min'] )): ?><?php echo $_POST['dauer_in_min']; ?>
<?php elseif (isset ( $this->_tpl_vars['dauer_in_min'] )): ?><?php echo $this->_tpl_vars['dauer_in_min']; ?>
<?php endif; ?>" /></td>
    </tr>
    </table><br /><br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['bs_drei'] == 5): ?>
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">Nebent&auml;tigkeit als: </td>
	    <td><input type="text" name="neben_tagig" value="<?php if (isset ( $_POST['neben_tagig'] )): ?><?php echo $_POST['neben_tagig']; ?>
<?php elseif (isset ( $this->_tpl_vars['neben_tagig'] )): ?><?php echo $this->_tpl_vars['neben_tagig']; ?>
<?php endif; ?>" /></td>
    </tr>
    </table><br /><br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['bs_drei'] == 6): ?>
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">Bereich in dem geraucht wurde: </td>
	    <td><input type="text" name="rauch_verbot" value="<?php if (isset ( $_POST['rauch_verbot'] )): ?><?php echo $_POST['rauch_verbot']; ?>
<?php elseif (isset ( $this->_tpl_vars['rauch_verbot'] )): ?><?php echo $this->_tpl_vars['rauch_verbot']; ?>
<?php endif; ?>" /></td>
    </tr>
    </table><br /><br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['bs_drei'] == 7): ?>
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">&Uuml;berschreitung in Minuten: </td>
	    <td><input type="text" name="uber_in_min" value="<?php if (isset ( $_POST['uber_in_min'] )): ?><?php echo $_POST['uber_in_min']; ?>
<?php elseif (isset ( $this->_tpl_vars['uber_in_min'] )): ?><?php echo $this->_tpl_vars['uber_in_min']; ?>
<?php endif; ?>" /></td>
    </tr>
    <tr>
	    <td width="170">Regul&auml;re Dauer der Pause in Minuten:</td>
	    <td><input type="text" name="pause_dauer"  value="<?php if (isset ( $_POST['pause_dauer'] )): ?><?php echo $_POST['pause_dauer']; ?>
<?php elseif (isset ( $this->_tpl_vars['pause_dauer'] )): ?><?php echo $this->_tpl_vars['pause_dauer']; ?>
<?php endif; ?>" /></td>
    </tr>
    </table><br /><br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['bs_drei'] == 9): ?>
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">Anrede des Beleidigten: </td>
	    <td><input type="radio" name="beleid_anrede" value="1" <?php if ($_POST['beleid_anrede'] == 1): ?> checked <?php endif; ?> /> Herr<br />
      <input type="radio" name="beleid_anrede" value="2" <?php if ($_POST['beleid_anrede'] == 2): ?> checked <?php endif; ?> /> Frau</td>
    </tr>
    <tr>
	    <td width="170">Name des Beleidigten</td>
	    <td><input type="text" name="beleid_name" value="<?php if (isset ( $_POST['beleid_name'] )): ?><?php echo $_POST['beleid_name']; ?>
<?php elseif (isset ( $this->_tpl_vars['beleid_name'] )): ?><?php echo $this->_tpl_vars['beleid_name']; ?>
<?php endif; ?>" /></td>
    </tr>
    <tr>
	    <td width="170">Beleidigende Bezeichnung (verwendetes Wort)</td>
	    <td><input type="text" name="beleid_wort" value="<?php if (isset ( $_POST['beleid_wort'] )): ?><?php echo $_POST['beleid_wort']; ?>
<?php elseif (isset ( $this->_tpl_vars['beleid_wort'] )): ?><?php echo $this->_tpl_vars['beleid_wort']; ?>
<?php endif; ?>" /></td>
    </tr>
    </table><br /><br />
    <?php endif; ?>


    <?php if ($this->_tpl_vars['bs_drei'] == 10): ?>
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">Einsatzort:*</td>
	    <td><textarea name="einsatzort" cols="38" rows="3" ><?php if (! is_numeric ( $_POST['einsatzort'] )): ?><?php echo $_POST['einsatzort']; ?>
<?php endif; ?></textarea><img src="../grafik/frage.png" onmouseover="Tip('z.B. auf dem Bauvorhaben, in der Kommissionierung,<br /> bei dem Kunden, auf der Route nach Frankfurt, etc. ')" onmouseout="UnTip()" alt="Einsatzort" /></td>
    </tr>
    <tr>
	    <td width="170">T&auml;tigkeit:*</td>
	    <td><textarea name="tatigkeit" cols="38" rows="3" ><?php if (! is_numeric ( $_POST['tatigkeit'] )): ?><?php echo $_POST['tatigkeit']; ?>
<?php endif; ?></textarea><img src="../grafik/frage.png" onmouseover="Tip('z.B. Fliesenleger, Packer, Au&szlig;endienstmitarbeiter, Fahrer, etc. ')" onmouseout="UnTip()" alt="T&auml;tigkeit" /></td>
    </tr>
    <tr>
	    <td width="170">normales Leistungsspektrum:*</td>
	    <td><textarea name="normal_leistung" cols="38" rows="3" ><?php if (! is_numeric ( $_POST['normal_leistung'] )): ?><?php echo $_POST['normal_leistung']; ?>
<?php endif; ?></textarea><img src="../grafik/frage.png" onmouseover="Tip('z.B. 30qm Fliesen in 8 Arbeitsstunden mit sauberen Fugen zu verlegen<br/>-25 Pakete pro Stunde fehlerfrei zu packen<br/>-ein h&ouml;fliches Auftretten gegen&uuml;ber Kunden zu zeigen<br/>-ohne Stau die Route in 2,5 Stunden zu fahren, etc. ')" onmouseout="UnTip()" alt="normales Leistungsspektrum" /></td>
    </tr>
    <tr>
	    <td width="170">Art der Schlechtleistung:*</td>
	    <td><textarea name="schlecht_leistung" cols="38" rows="3" ><?php if (! is_numeric ( $_POST['schlecht_leistung'] )): ?><?php echo $_POST['schlecht_leistung']; ?>
<?php endif; ?></textarea><img src="../grafik/frage.png" onmouseover="Tip('z.B. lediglich 20 qm Fliesen verlegt und mit unsauberen Fugen<br/>-lediglich 18 Pakete packten und hiervon 7 mit falschen Waren<br/>-den Kunden als entscheidungsfaul bezeichneten<br/>-f&uuml;r die Route 4 Stunden ben&ouml;tigten, obwohl kein Stau herrschte, etc. ')" onmouseout="UnTip()" alt="Art der Schlechtleistung" /></td>
    </tr>
    </table><br /><br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['bs_drei'] == 11): ?>
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">falls weitere Fehlzeiten: </td>
	    <td width="150"><input type="text" name="fehlzeiten1" <?php if (isset ( $_POST['fehlzeiten1'] )): ?>value="<?php if (isset ( $_POST['fehlzeiten1'] )): ?><?php echo $_POST['fehlzeiten1']; ?>
<?php elseif (isset ( $this->_tpl_vars['fehlzeiten1'] )): ?><?php echo $this->_tpl_vars['fehlzeiten1']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> /></td>
      <td>um <input type="text" name="zeit_fehlzeiten1"   <?php if (isset ( $_POST['zeit_fehlzeiten1'] )): ?>value="<?php if (isset ( $_POST['zeit_fehlzeiten1'] )): ?><?php echo $_POST['zeit_fehlzeiten1']; ?>
<?php elseif (isset ( $this->_tpl_vars['zeit_fehlzeiten1'] )): ?><?php echo $this->_tpl_vars['zeit_fehlzeiten1']; ?>
<?php endif; ?>"<?php else: ?>value="HH:MM" onfocus="this.value = ''"<?php endif; ?> /> Uhr</td>
    </tr>
    <tr>
	    <td width="170"></td>
	    <td width="150"><input type="text" name="fehlzeiten2" <?php if (isset ( $_POST['fehlzeiten2'] )): ?>value="<?php if (isset ( $_POST['fehlzeiten2'] )): ?><?php echo $_POST['fehlzeiten2']; ?>
<?php elseif (isset ( $this->_tpl_vars['fehlzeiten2'] )): ?><?php echo $this->_tpl_vars['fehlzeiten2']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> /></td>
      <td>um <input type="text" name="zeit_fehlzeiten2"   <?php if (isset ( $_POST['zeit_fehlzeiten2'] )): ?>value="<?php if (isset ( $_POST['zeit_fehlzeiten2'] )): ?><?php echo $_POST['zeit_fehlzeiten2']; ?>
<?php elseif (isset ( $this->_tpl_vars['zeit_fehlzeiten2'] )): ?><?php echo $this->_tpl_vars['zeit_fehlzeiten2']; ?>
<?php endif; ?>"<?php else: ?>value="HH:MM" onfocus="this.value = ''"<?php endif; ?> /> Uhr</td>
    </tr>
    </table><br /><br />
    <?php endif; ?>
    <table border="0" class="contenttable" cellpadding="5" width="100%">
          <tr>
	           <td align="right"><input type="hidden" name="versteckt" value="<?php echo $this->_tpl_vars['bs_drei']; ?>
"  /><input type="hidden" name="versteckt_art" value="<?php echo $this->_tpl_vars['art']; ?>
"  /><input type="submit" name="sent_pdf" value="Ausgabe" /></td>
        </tr>
</table>
<?php endif; ?>
</form>