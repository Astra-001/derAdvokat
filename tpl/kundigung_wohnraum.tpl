<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/kundigung.js" type="text/javascript"></script>

<form action="{$smarty.server.REQUEST_URI}"  method="post">
{if !is_numeric($bs_drei)}
    {if strlen($error)}
        <div class="fehlermeldung">{$error}</div>
    {/if}

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
{/if}



{if is_numeric($bs_drei)}
    <h1>{$art}</h1>
    <h3>Personenbezogene Angaben</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
        {if strlen($error_pdf)}
        <tr>
            <td colspan="5" class="fehlermeldung">{$error_pdf}</td>
        </tr>
        {/if}
        {if strlen($erfolg)}
        <tr>
            <td colspan="5" class="erfolgsmeldung">{$erfolg}</td>
        </tr>
        {/if}
        <tr>
            <td width="170">Anrede</td>
            <td width="57">
                <select name="geschlecht">
                    <option value="1" {if $smarty.post.geschlecht == 1}{elseif $user.geschlecht==1} selected="selected"{/if}>Herr</option>
                    <option value="2" {if $smarty.post.geschlecht == 2}{elseif $user.geschlecht==2} selected="selected"{/if}>Frau</option>
                </select>
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Vorname*</td>
            <td colspan="4"><input type="text" name="vorname" {if strlen($msg_vorname)}class="error"{/if} value="{if isset($smarty.post.vorname)}{$smarty.post.vorname}{elseif isset($user.vorname)}{$user.vorname}{/if}" size="44" /></td>
        </tr>
        <tr>
            <td>Nachname*</td>
            <td colspan="4"><input type="text" name="name" {if strlen($msg_name)}class="error"{/if} value="{if isset($smarty.post.name)}{$smarty.post.name}{elseif isset($user.name)}{$user.name}{/if}" size="44" /></td>
        </tr>
        <tr>
            <td>Stra&szlig;e und Hausnummer*</td>
            <td colspan="4"><input type="text" name="strasse"  value="{if isset($smarty.post.strasse)}{$smarty.post.strasse}{elseif isset($strasse)}{$strasse}{/if}" size="44" /></td>
        </tr>
        <tr>
            <td>Postleitzahl*</td>
            <td width="57"><input type="text" name="plz" value="{if isset($smarty.post.plz)}{$smarty.post.plz}{elseif isset($plz)}{$plz}{/if}" size="5" maxlength="5" /></td>
            <td width="57" align="right">Ort*</td>
            <td><input type="text" name="ort" value="{if isset($smarty.post.ort)}{$smarty.post.ort}{elseif isset($ort)}{$ort}{/if}" /></td>
        </tr>
    </table>
    <h3>Spezielle Angaben</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
        <td>
    <table cellpadding="0" cellspacing="0">
    <tr>

            <td width="181">Ort:</td>
            <td><input type="text" name="sp_ort" size="44"  value="{if isset($smarty.post.sp_ort)}{$smarty.post.sp_ort}{elseif isset($sp_ort)}{$sp_ort}{/if}" /><br /><br /></td>

        </tr>
    <tr>
            <td width="181">Straße:</td>
            <td ><input type="text" name="sp_strasse" size="44"  value="{if isset($smarty.post.sp_strasse)}{$smarty.post.sp_strasse}{elseif isset($sp_strasse)}{$sp_strasse}{/if}" /><br /><br /></td>

        </tr>
    </table>
    <table cellpadding="0" cellspacing="0">
        <tr>
        <td width="181">Hausnummer:</td>
        <td width="70"><input style="width:60px" type="text" name="sp_hausnum"  value="{if isset($smarty.post.sp_hausnum)}{$smarty.post.sp_hausnum}{elseif isset($sp_hausnum)}{$sp_hausnum}{/if}" /></td>
        <td width="130">Wohnungnummer:</td>
        <td width="60"><input style="width:60px" type="text" name="sp_wohnnum"  value="{if isset($smarty.post.sp_wohnnum)}{$smarty.post.sp_wohnnum}{elseif isset($sp_wohnnum)}{$sp_wohnnum}{/if}" /></td>
        </tr>
    </table>
    <br /><br /><br />
    <table cellpadding="0" cellspacing="0">
        <tr>
        <td width="181">Datum des Mietvertrages:</td>
        <td width="150"><input type="text"  id="date_rent_begin_in" name="date_rent_begin_in"  {if isset($smarty.post.date_rent_begin_in)}value="{if isset($smarty.post.date_rent_begin_in)}{$smarty.post.date_rent_begin_in}{elseif isset($date_rent_begin_in)}{$date_rent_begin_in}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} /></td>
        <td align="left"><div id="date_rent_begin_in_st"></div></td>
        </tr>
    </table>
    <br />
    <table cellpadding="0" cellspacing="0">
        <tr>
        <td width="181">Beginn des Mietverhältnisses:</td>
        <td width="150"><input type="text"  id="date_rent_begin" name="date_rent_begin"  {if isset($smarty.post.date_rent_begin)}value="{if isset($smarty.post.date_rent_begin)}{$smarty.post.date_rent_begin}{elseif isset($date_rent_begin)}{$date_rent_begin}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} /></td>
        <td align="left"><div id="date_rent_begin_st"></div></td>
        </tr>
    </table>
    <br />
     <table cellpadding="0" cellspacing="0">
         <tr>
         <td width="181">Zugangsdatum der K&uuml;ndigung beim Mieter:</td>
         <td width="150"><input type="text" name="date_rent_in" id="date_rent_in"  {if isset($smarty.post.date_rent_in)}value="{if isset($smarty.post.date_rent_in)}{$smarty.post.date_rent_in}{elseif isset($date_rent_in)}{$date_rent_in}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} /></td>
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
        <input type="hidden" name="date_rent_rez" value="{if isset($smarty.post.date_rent_rez)}{$smarty.post.date_rent_rez}{elseif isset($date_rent_rez)}{$date_rent_rez}{/if}"  id="date_rent_rez" />

        </td>
        </tr>
    </table>
    {if ($bs_drei==2)}
    <h3>Verwandten</h3> <a onclick="addverw();">Verwandten [+]</a>
    <div id="verwandten">

    {if count($smarty.post.verwand)}
        {foreach item=item key=key from=$smarty.post.verwand}

        <div id="id{$key}">
            {if $key!=0}<br />{/if}
            <table border="0" width="100%" cellpadding="5" class="contenttable">
            <tr>
                <td>
                <a onclick="deleteverw('{$key}')" style="color: red;">L&ouml;schen</a>
                <table  cellpadding="0" cellspacing="0">
                    <tr>
                    <td width="170" align="left">Anrede</td><td align="left"><select name="verwand[]"><option value="1" {if item==1}selected{/if}>Herr</option><option value="2" {if item==2}selected{/if}>Frau</option></select><br /><br /></td>
                    </tr>
                    <tr>
                    <td width="170" align="left">Name</td><td align="left"><input class="inputbox" type="text" name="verwname[]"  style="width:340px;" value="{$smarty.post.verwname[$key]}" /><br /><br /></td>
                    </tr>
                    <tr>
                    <td width="170" align="left">Verwandtschaftsverhältnis</td><td width="360" align="left"><input style="width:340px;" type="text" name="verwshaft[]" value="{$smarty.post.verwshaft[$key]}" /><br /><br /></td>

                    </tr>
                    <tr>
                    <td colspan="2">
                        Eigenbedarfsgründe formulieren:<br />
                        <textarea name="verwform[]" cols="61" rows="3">{$smarty.post.verwform[$key]}</textarea><img src="../grafik/frage.png" onmouseover="Tip('Herr ... und seine zukünftige Ehefrau leben bisher bei<br />ihren jeweiligen Eltern. Sie haben jedoch den Wunsch,<br />einen gemeinsamen Haushalt zu gründen.<br /><br />Darüber hinaus wünscht das zukünftige Ehepaar zwei<br />gemeinsame Kinder und benötigt daher eine Wohnung<br />mit ausreichenden Wohnraum und der Möglichkeit zwei<br />Kinderzimmer einzurichten. Die von Ihnen bewohnte<br />Wohnung erfüllt diese Anforderungen.<br /><br />Die von Ihnen bewohnte Wohnung hat darüber hinaus<br />das geringste Mietpreisniveau der von mir vermieteten<br />Wohnungen.')" onmouseout="UnTip()" alt="" />
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </div>
        {/foreach}
    {else}
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
    {/if}
    </div>
    {/if}
    {if ($bs_drei==1)}
    <h3>Eigenbedarfsgründe formulieren</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
        <td>
        <textarea name="eigendarf_form" cols="67" rows="3">{if !is_numeric($smarty.post.eigendarf_form)}{$smarty.post.eigendarf_form}{/if}</textarea><img src="../grafik/frage.png" onmouseover="Tip('Ich lebe bisher in einer 35 qm großen Wohnung. Meine<br />Freundin und ich haben jedoch den Wunsch, einen<br />gemeinsamen Haushalt zu gründen. Die von Ihnen<br />bewohnte Wohnung hat eine Quadratmeterzahl von 90<br />und ist daher für einen gemeinsamen Haushalt sehr<br />geeignet. Da meine Freundin noch bei Ex-Mann lebt,<br />müssen wir uns eine neue Wohnung suchen.<br /><br />Die von Ihnen bewohnte Wohnung hat darüber hinaus<br />das geringste Mietpreisniveau der von mir vermieteten<br />Wohnungen.')" onmouseout="UnTip()" alt="" />
        </td>
    </tr>
    </table>
    {/if}



    <br /><br />
  <script type="text/javascript">rent_calc();</script>
    <table border="0" class="contenttable" cellpadding="5" width="100%">
          <tr>
               <td align="right" style="padding:10px;"><input type="hidden" name="versteckt" value="{$bs_drei}"  /><input type="hidden" name="versteckt_art" value="{$art}"  /><input type="submit" name="sent_pdf" value="Ausgabe" /></td>
        </tr>
</table>
{/if}
</form>