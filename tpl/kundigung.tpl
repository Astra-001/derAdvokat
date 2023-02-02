<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/kundigung.js" type="text/javascript"></script>

<form action="{$smarty.server.REQUEST_URI}"  method="post">
{if !is_numeric($bs_drei)}
    {if strlen($error)}
	    <div class="fehlermeldung">{$error}</div>
    {/if}

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
{/if}



{if is_numeric($bs_drei)}
    <h1>K&uuml;ndigung, {$art}</h1>
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
	        <td width="170">Beginn des Arbeitsverh&auml;ltnisses:</td>
	        <td width="150"><input type="text" id="datein" name="datum_begin"  {if isset($smarty.post.datum_begin)}value="{if isset($smarty.post.datum_begin)}{$smarty.post.datum_begin}{elseif isset($datum_begin)}{$datum_begin}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if}/></td>
          	<td align="left"><div id="datein_st"></div></td>
        </tr>
        <tr>
	        <td>Datum des Zugangs der K&uuml;ndigung beim Arbeitnehmer:</td>
	        <td><input type="text" name="datum_zugangs" id="datedec"  {if isset($smarty.post.datum_zugangs)}value="{if isset($smarty.post.datum_zugangs)}{$smarty.post.datum_zugangs}{elseif isset($datum_zugangs)}{$datum_zugangs}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} /></td>
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
		<input type="hidden" id="daterez" name="daterez" value="{if isset($smarty.post.daterez)}{$smarty.post.daterez}{elseif isset($daterez)}{$daterez}{/if}" />
		</td>
        </tr>
    </table>
    <br /><br />
  <script type="text/javascript">calc();</script>
    <table border="0" class="contenttable" cellpadding="5" width="100%">
          <tr>
	           <td align="right"><input type="hidden" name="versteckt" value="{$bs_drei}"  /><input type="hidden" name="versteckt_art" value="{$art}"  /><input type="submit" name="sent_pdf" value="Ausgabe" /></td>
        </tr>
</table>
{/if}
</form>