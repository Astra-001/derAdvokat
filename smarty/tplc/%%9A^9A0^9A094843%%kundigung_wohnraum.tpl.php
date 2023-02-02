<?php /* Smarty version 2.6.18, created on 2021-02-10 13:32:48
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/kundigung_wohnraum.tpl */ ?>
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

    <h1>Kündigung Wohnraum</h1>
    <table border="0" cellpadding="5" class="contenttable" width="100%">
    <tr>
        <td colspan="2"  bgcolor="#9FC6FF"><font color="white"><b>K&uuml;ndigung:</b></font></td>
    </tr>
    <tr>
      <td width="10"><input type="radio" name="kundigung" value="1" /></td>
      <td>Kündigung eines Wohnraums wegen Eigenbedarfs des Vermieters</td>
    </tr>
    <tr>
      <td><input type="radio" name="kundigung" value="2" /></td>
      <td>Kündigung von Wohnraum wegen Eigenbedarfs eines Verwandten</td>
    </tr>

    <tr>
        <td colspan="2"><input type="submit" name="sent" value="Weiter" /></td>
    </tr>
    </table>
<?php endif; ?>



<?php if (is_numeric ( $this->_tpl_vars['bs_drei'] )): ?>
    <h1><?php echo $this->_tpl_vars['art']; ?>
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
        <td>
    <table cellpadding="0" cellspacing="0">
    <tr>

            <td width="181">Ort:</td>
            <td><input type="text" name="sp_ort" size="44"  value="<?php if (isset ( $_POST['sp_ort'] )): ?><?php echo $_POST['sp_ort']; ?>
<?php elseif (isset ( $this->_tpl_vars['sp_ort'] )): ?><?php echo $this->_tpl_vars['sp_ort']; ?>
<?php endif; ?>" /><br /><br /></td>

        </tr>
    <tr>
            <td width="181">Straße:</td>
            <td ><input type="text" name="sp_strasse" size="44"  value="<?php if (isset ( $_POST['sp_strasse'] )): ?><?php echo $_POST['sp_strasse']; ?>
<?php elseif (isset ( $this->_tpl_vars['sp_strasse'] )): ?><?php echo $this->_tpl_vars['sp_strasse']; ?>
<?php endif; ?>" /><br /><br /></td>

        </tr>
    </table>
    <table cellpadding="0" cellspacing="0">
        <tr>
        <td width="181">Hausnummer:</td>
        <td width="70"><input style="width:60px" type="text" name="sp_hausnum"  value="<?php if (isset ( $_POST['sp_hausnum'] )): ?><?php echo $_POST['sp_hausnum']; ?>
<?php elseif (isset ( $this->_tpl_vars['sp_hausnum'] )): ?><?php echo $this->_tpl_vars['sp_hausnum']; ?>
<?php endif; ?>" /></td>
        <td width="130">Wohnungnummer:</td>
        <td width="60"><input style="width:60px" type="text" name="sp_wohnnum"  value="<?php if (isset ( $_POST['sp_wohnnum'] )): ?><?php echo $_POST['sp_wohnnum']; ?>
<?php elseif (isset ( $this->_tpl_vars['sp_wohnnum'] )): ?><?php echo $this->_tpl_vars['sp_wohnnum']; ?>
<?php endif; ?>" /></td>
        </tr>
    </table>
    <br /><br /><br />
    <table cellpadding="0" cellspacing="0">
        <tr>
        <td width="181">Datum des Mietvertrages:</td>
        <td width="150"><input type="text"  id="date_rent_begin_in" name="date_rent_begin_in"  <?php if (isset ( $_POST['date_rent_begin_in'] )): ?>value="<?php if (isset ( $_POST['date_rent_begin_in'] )): ?><?php echo $_POST['date_rent_begin_in']; ?>
<?php elseif (isset ( $this->_tpl_vars['date_rent_begin_in'] )): ?><?php echo $this->_tpl_vars['date_rent_begin_in']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> /></td>
        <td align="left"><div id="date_rent_begin_in_st"></div></td>
        </tr>
    </table>
    <br />
    <table cellpadding="0" cellspacing="0">
        <tr>
        <td width="181">Beginn des Mietverhältnisses:</td>
        <td width="150"><input type="text"  id="date_rent_begin" name="date_rent_begin"  <?php if (isset ( $_POST['date_rent_begin'] )): ?>value="<?php if (isset ( $_POST['date_rent_begin'] )): ?><?php echo $_POST['date_rent_begin']; ?>
<?php elseif (isset ( $this->_tpl_vars['date_rent_begin'] )): ?><?php echo $this->_tpl_vars['date_rent_begin']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> /></td>
        <td align="left"><div id="date_rent_begin_st"></div></td>
        </tr>
    </table>
    <br />
     <table cellpadding="0" cellspacing="0">
         <tr>
         <td width="181">Zugangsdatum der K&uuml;ndigung beim Mieter:</td>
         <td width="150"><input type="text" name="date_rent_in" id="date_rent_in"  <?php if (isset ( $_POST['date_rent_in'] )): ?>value="<?php if (isset ( $_POST['date_rent_in'] )): ?><?php echo $_POST['date_rent_in']; ?>
<?php elseif (isset ( $this->_tpl_vars['date_rent_in'] )): ?><?php echo $this->_tpl_vars['date_rent_in']; ?>
<?php endif; ?>"<?php else: ?>value="TT.MM.JJJJ" onfocus="this.value = ''"<?php endif; ?> /></td>
         <td align="left"><div id="date_rent_in_st"></div></td>
         </tr>
     </table>
    <br />
    <table cellpadding="0" cellspacing="0" width="450">
        <tr>
        <td align="center"><input type="button" onclick="rent_calc();" value="Berechnen" /></td>
        </tr>
    </table>

    </td>
    </tr>
    </table>
    <h3>Angabe des K&uuml;ndigungsrechners</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
        <tr>
            <td><div id="rent_result"></div>
        <input type="hidden" name="date_rent_rez" value="<?php if (isset ( $_POST['date_rent_rez'] )): ?><?php echo $_POST['date_rent_rez']; ?>
<?php elseif (isset ( $this->_tpl_vars['date_rent_rez'] )): ?><?php echo $this->_tpl_vars['date_rent_rez']; ?>
<?php endif; ?>"  id="date_rent_rez" />

        </td>
        </tr>
    </table>
    <?php if (( $this->_tpl_vars['bs_drei'] == 2 )): ?>
    <h3>Verwandten</h3> <a onclick="addverw();">Verwandten [+]</a>
    <div id="verwandten">

    <?php if (count ( $_POST['verwand'] )): ?>
        <?php $_from = $_POST['verwand']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

        <div id="id<?php echo $this->_tpl_vars['key']; ?>
">
            <?php if ($this->_tpl_vars['key'] != 0): ?><br /><?php endif; ?>
            <table border="0" width="100%" cellpadding="5" class="contenttable">
            <tr>
                <td>
                <a onclick="deleteverw('<?php echo $this->_tpl_vars['key']; ?>
')" style="color: red;">L&ouml;schen</a>
                <table  cellpadding="0" cellspacing="0">
                    <tr>
                    <td width="170" align="left">Anrede</td><td align="left"><select name="verwand[]"><option value="1" <?php if (item == 1): ?>selected<?php endif; ?>>Herr</option><option value="2" <?php if (item == 2): ?>selected<?php endif; ?>>Frau</option></select><br /><br /></td>
                    </tr>
                    <tr>
                    <td width="170" align="left">Name</td><td align="left"><input class="inputbox" type="text" name="verwname[]"  style="width:340px;" value="<?php echo $_POST['verwname'][$this->_tpl_vars['key']]; ?>
" /><br /><br /></td>
                    </tr>
                    <tr>
                    <td width="170" align="left">Verwandtschaftsverhältnis</td><td width="360" align="left"><input style="width:340px;" type="text" name="verwshaft[]" value="<?php echo $_POST['verwshaft'][$this->_tpl_vars['key']]; ?>
" /><br /><br /></td>

                    </tr>
                    <tr>
                    <td colspan="2">
                        Eigenbedarfsgründe formulieren:<br />
                        <textarea name="verwform[]" cols="61" rows="3"><?php echo $_POST['verwform'][$this->_tpl_vars['key']]; ?>
</textarea><img src="../grafik/frage.png" onmouseover="Tip('Herr ... und seine zukünftige Ehefrau leben bisher bei<br />ihren jeweiligen Eltern. Sie haben jedoch den Wunsch,<br />einen gemeinsamen Haushalt zu gründen.<br /><br />Darüber hinaus wünscht das zukünftige Ehepaar zwei<br />gemeinsame Kinder und benötigt daher eine Wohnung<br />mit ausreichenden Wohnraum und der Möglichkeit zwei<br />Kinderzimmer einzurichten. Die von Ihnen bewohnte<br />Wohnung erfüllt diese Anforderungen.<br /><br />Die von Ihnen bewohnte Wohnung hat darüber hinaus<br />das geringste Mietpreisniveau der von mir vermieteten<br />Wohnungen.')" onmouseout="UnTip()" alt="" />
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <div id="id0">
        <table border="0" width="100%" cellpadding="5" class="contenttable">
        <tr>
            <td>
            <a onclick="deleteverw('0')" style="color: red;">L&ouml;schen</a>
            <table cellpadding="0" cellspacing="0">
                <tr>
                <td width="170" align="left">Anrede</td><td align="left"><select name="verwand[]"><option value="1">Herr</option><option value="2">Frau</option></select><br /><br /></td>
                </tr>
                <tr>
                <td width="170" align="left">Name</td><td align="left"><input class="inputbox" type="text" name="verwname[]"  style="width:340px;" value="" /><br /><br /></td>
                </tr>
                <tr>
                <td width="170" align="left">Verwandtschaftsverhältnis</td><td align="left"><input style="width:340px;" type="text" name="verwshaft[]" value="" /><br /><br /></td>

                </tr>
                <tr>
                <td colspan="2">
                    Eigenbedarfsgründe formulieren:
                    <textarea name="verwform[]" cols="61" rows="3"></textarea><img src="../grafik/frage.png" onmouseover="Tip('Herr ... und seine zukünftige Ehefrau leben bisher bei<br />ihren jeweiligen Eltern. Sie haben jedoch den Wunsch,<br />einen gemeinsamen Haushalt zu gründen.<br /><br />Darüber hinaus wünscht das zukünftige Ehepaar zwei<br />gemeinsame Kinder und benötigt daher eine Wohnung<br />mit ausreichenden Wohnraum und der Möglichkeit zwei<br />Kinderzimmer einzurichten. Die von Ihnen bewohnte<br />Wohnung erfüllt diese Anforderungen.<br /><br />Die von Ihnen bewohnte Wohnung hat darüber hinaus<br />das geringste Mietpreisniveau der von mir vermieteten<br />Wohnungen.')" onmouseout="UnTip()" alt="" />
                </td>
                </tr>
            </table>
            </td>
        </tr>
        </table>
    </div>
    <?php endif; ?>
    </div>
    <?php endif; ?>
    <?php if (( $this->_tpl_vars['bs_drei'] == 1 )): ?>
    <h3>Eigenbedarfsgründe formulieren</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
        <td>
        <textarea name="eigendarf_form" cols="67" rows="3"><?php if (! is_numeric ( $_POST['eigendarf_form'] )): ?><?php echo $_POST['eigendarf_form']; ?>
<?php endif; ?></textarea><img src="../grafik/frage.png" onmouseover="Tip('Ich lebe bisher in einer 35 qm großen Wohnung. Meine<br />Freundin und ich haben jedoch den Wunsch, einen<br />gemeinsamen Haushalt zu gründen. Die von Ihnen<br />bewohnte Wohnung hat eine Quadratmeterzahl von 90<br />und ist daher für einen gemeinsamen Haushalt sehr<br />geeignet. Da meine Freundin noch bei Ex-Mann lebt,<br />müssen wir uns eine neue Wohnung suchen.<br /><br />Die von Ihnen bewohnte Wohnung hat darüber hinaus<br />das geringste Mietpreisniveau der von mir vermieteten<br />Wohnungen.')" onmouseout="UnTip()" alt="" />
        </td>
    </tr>
    </table>
    <?php endif; ?>



    <br /><br />
  <script type="text/javascript">rent_calc();</script>
    <table border="0" class="contenttable" cellpadding="5" width="100%">
          <tr>
               <td align="right" style="padding:10px;"><input type="hidden" name="versteckt" value="<?php echo $this->_tpl_vars['bs_drei']; ?>
"  /><input type="hidden" name="versteckt_art" value="<?php echo $this->_tpl_vars['art']; ?>
"  /><input type="submit" name="sent_pdf" value="Ausgabe" /></td>
        </tr>
</table>
<?php endif; ?>
</form>