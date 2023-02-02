<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>
<form action="{$smarty.server.REQUEST_URI}"  method="post">
{if !is_numeric($bs_drei)}
    {if strlen($error)}
	    <div class="fehlermeldung">{$error}</div>
    {/if}

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
{/if}



{if is_numeric($bs_drei)}
    <h1>Abmahnung wegen: {$art}</h1>
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
    <h3>Allgemeine Angaben</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
        <tr>
	        <td width="170">Datum des Versto&szlig;es*<br/> ggf. Uhrzeit</td>
	        <td width="150"><input type="text" name="datum_verstoss" {if isset($smarty.post.datum_verstoss)}value="{if isset($smarty.post.datum_verstoss)}{$smarty.post.datum_verstoss}{elseif isset($datum_verstoss)}{$datum_verstoss}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} /></td>
          	<td>{if $bs_drei!=1}um <input type="text" name="zeit_verstoss"   {if isset($smarty.post.zeit_verstoss)}value="{if isset($smarty.post.zeit_verstoss)}{$smarty.post.zeit_verstoss}{elseif isset($zeit_verstoss)}{$zeit_verstoss}{/if}"{else}value="HH:MM" onfocus="this.value = ''"{/if} /> Uhr <img src="../grafik/frage.png" onmouseover="Tip('z.B. die Zeit regul&auml;rer Arbeitsbeginn. ')" onmouseout="UnTip()" alt="Uhrzeit des Versto&szlig;es" />{/if}</td>
        </tr>
        <tr>
	        <td>Datum der Anh&ouml;rung:*</td>
	        <td colspan="2"><input type="text" name="anhorungs_datum"  {if isset($smarty.post.anhorungs_datum)}value="{if isset($smarty.post.anhorungs_datum)}{$smarty.post.anhorungs_datum}{elseif isset($anhorungs_datum)}{$anhorungs_datum}{/if}"{else}value="TT.MM.JJJJ   HH:MM" onfocus="this.value = ''"{/if} /></td>
        </tr>
    </table>
    <br /><br />
    
   {if $bs_drei==1}
    <table border="0" cellpadding="5" class="contenttable" width="100%">
    <tr>
	    <td width="170">Uhrzeit des Erscheinens am fraglichen Tag: </td>
	    <td><input type="text" name="ersch_tag" {if isset($smarty.post.ersch_tag)}value="{if isset($smarty.post.ersch_tag)}{$smarty.post.ersch_tag}{elseif isset($ersch_tag)}{$ersch_tag}{/if}"{else}value="HH:MM" onfocus="this.value = ''"{/if} /> Uhr</td>
    </tr>
    <tr>
	    <td width="170">Regul&auml;rer Beginn der Arbeitszeit:</td>
	    <td><input type="text" name="reg_arb_beginn"  {if isset($smarty.post.reg_arb_beginn)}value="{if isset($smarty.post.reg_arb_beginn)}{$smarty.post.reg_arb_beginn}{elseif isset($reg_arb_beginn)}{$reg_arb_beginn}{/if}"{else}value="HH:MM" onfocus="this.value = ''"{/if} /> Uhr</td>
    </tr>
    </table><br /><br />
    {/if}

    {if $bs_drei==2}
    <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">weitere Fehlzeiten: </td>
	    <td width="150"><input type="text" name="fehlzeiten1" {if isset($smarty.post.fehlzeiten1)}value="{if isset($smarty.post.fehlzeiten1)}{$smarty.post.fehlzeiten1}{elseif isset($fehlzeiten1)}{$fehlzeiten1}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} /></td>
      	<td>um <input type="text" name="zeit_fehlzeiten1"   {if isset($smarty.post.zeit_fehlzeiten1)}value="{if isset($smarty.post.zeit_fehlzeiten1)}{$smarty.post.zeit_fehlzeiten1}{elseif isset($zeit_fehlzeiten1)}{$zeit_fehlzeiten1}{/if}"{else}value="HH:MM" onfocus="this.value = ''"{/if} /> Uhr</td>
    </tr>
    <tr>
	    <td></td>
	    <td width="150"><input type="text" name="fehlzeiten2" {if isset($smarty.post.fehlzeiten2)}value="{if isset($smarty.post.fehlzeiten2)}{$smarty.post.fehlzeiten2}{elseif isset($fehlzeiten2)}{$fehlzeiten2}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} /></td>
      	<td>um <input type="text" name="zeit_fehlzeiten2"   {if isset($smarty.post.zeit_fehlzeiten2)}value="{if isset($smarty.post.zeit_fehlzeiten2)}{$smarty.post.zeit_fehlzeiten2}{elseif isset($zeit_fehlzeiten2)}{$zeit_fehlzeiten2}{/if}"{else}value="HH:MM" onfocus="this.value = ''"{/if} /> Uhr</td>
    </tr>
    </table><br /><br />
    {/if}

    {if $bs_drei==4}
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">Info &uuml;ber Verbot der Internetnutzung* </td>
	    <td><input type="radio" name="privat_internet" value="1" {if $smarty.post.privat_internet == 1} checked {/if} /> an Mitarbeiter ausgeh&auml;ndigt<br />
      <input type="radio" name="privat_internet" value="2" {if $smarty.post.privat_internet == 2} checked {/if} /> h&auml;ngt im Betrieb aus</td>
    </tr>
    <tr>
	    <td width="170">Dauer des Versto&szlig;es in Minuten*</td>
	    <td><input type="text" name="dauer_in_min" value="{if isset($smarty.post.dauer_in_min)}{$smarty.post.dauer_in_min}{elseif isset($dauer_in_min)}{$dauer_in_min}{/if}" /></td>
    </tr>
    </table><br /><br />
    {/if}

    {if $bs_drei==5}
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">Nebent&auml;tigkeit als: </td>
	    <td><input type="text" name="neben_tagig" value="{if isset($smarty.post.neben_tagig)}{$smarty.post.neben_tagig}{elseif isset($neben_tagig)}{$neben_tagig}{/if}" /></td>
    </tr>
    </table><br /><br />
    {/if}

    {if $bs_drei==6}
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">Bereich in dem geraucht wurde: </td>
	    <td><input type="text" name="rauch_verbot" value="{if isset($smarty.post.rauch_verbot)}{$smarty.post.rauch_verbot}{elseif isset($rauch_verbot)}{$rauch_verbot}{/if}" /></td>
    </tr>
    </table><br /><br />
    {/if}

    {if $bs_drei==7}
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">&Uuml;berschreitung in Minuten: </td>
	    <td><input type="text" name="uber_in_min" value="{if isset($smarty.post.uber_in_min)}{$smarty.post.uber_in_min}{elseif isset($uber_in_min)}{$uber_in_min}{/if}" /></td>
    </tr>
    <tr>
	    <td width="170">Regul&auml;re Dauer der Pause in Minuten:</td>
	    <td><input type="text" name="pause_dauer"  value="{if isset($smarty.post.pause_dauer)}{$smarty.post.pause_dauer}{elseif isset($pause_dauer)}{$pause_dauer}{/if}" /></td>
    </tr>
    </table><br /><br />
    {/if}

    {if $bs_drei==9}
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">Anrede des Beleidigten: </td>
	    <td><input type="radio" name="beleid_anrede" value="1" {if $smarty.post.beleid_anrede == 1} checked {/if} /> Herr<br />
      <input type="radio" name="beleid_anrede" value="2" {if $smarty.post.beleid_anrede == 2} checked {/if} /> Frau</td>
    </tr>
    <tr>
	    <td width="170">Name des Beleidigten</td>
	    <td><input type="text" name="beleid_name" value="{if isset($smarty.post.beleid_name)}{$smarty.post.beleid_name}{elseif isset($beleid_name)}{$beleid_name}{/if}" /></td>
    </tr>
    <tr>
	    <td width="170">Beleidigende Bezeichnung (verwendetes Wort)</td>
	    <td><input type="text" name="beleid_wort" value="{if isset($smarty.post.beleid_wort)}{$smarty.post.beleid_wort}{elseif isset($beleid_wort)}{$beleid_wort}{/if}" /></td>
    </tr>
    </table><br /><br />
    {/if}


    {if $bs_drei==10}
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">Einsatzort:*</td>
	    <td><textarea name="einsatzort" cols="38" rows="3" >{if !is_numeric($smarty.post.einsatzort)}{$smarty.post.einsatzort}{/if}</textarea><img src="../grafik/frage.png" onmouseover="Tip('z.B. auf dem Bauvorhaben, in der Kommissionierung,<br /> bei dem Kunden, auf der Route nach Frankfurt, etc. ')" onmouseout="UnTip()" alt="Einsatzort" /></td>
    </tr>
    <tr>
	    <td width="170">T&auml;tigkeit:*</td>
	    <td><textarea name="tatigkeit" cols="38" rows="3" >{if !is_numeric($smarty.post.tatigkeit)}{$smarty.post.tatigkeit}{/if}</textarea><img src="../grafik/frage.png" onmouseover="Tip('z.B. Fliesenleger, Packer, Au&szlig;endienstmitarbeiter, Fahrer, etc. ')" onmouseout="UnTip()" alt="T&auml;tigkeit" /></td>
    </tr>
    <tr>
	    <td width="170">normales Leistungsspektrum:*</td>
	    <td><textarea name="normal_leistung" cols="38" rows="3" >{if !is_numeric($smarty.post.normal_leistung)}{$smarty.post.normal_leistung}{/if}</textarea><img src="../grafik/frage.png" onmouseover="Tip('z.B. 30qm Fliesen in 8 Arbeitsstunden mit sauberen Fugen zu verlegen<br/>-25 Pakete pro Stunde fehlerfrei zu packen<br/>-ein h&ouml;fliches Auftretten gegen&uuml;ber Kunden zu zeigen<br/>-ohne Stau die Route in 2,5 Stunden zu fahren, etc. ')" onmouseout="UnTip()" alt="normales Leistungsspektrum" /></td>
    </tr>
    <tr>
	    <td width="170">Art der Schlechtleistung:*</td>
	    <td><textarea name="schlecht_leistung" cols="38" rows="3" >{if !is_numeric($smarty.post.schlecht_leistung)}{$smarty.post.schlecht_leistung}{/if}</textarea><img src="../grafik/frage.png" onmouseover="Tip('z.B. lediglich 20 qm Fliesen verlegt und mit unsauberen Fugen<br/>-lediglich 18 Pakete packten und hiervon 7 mit falschen Waren<br/>-den Kunden als entscheidungsfaul bezeichneten<br/>-f&uuml;r die Route 4 Stunden ben&ouml;tigten, obwohl kein Stau herrschte, etc. ')" onmouseout="UnTip()" alt="Art der Schlechtleistung" /></td>
    </tr>
    </table><br /><br />
    {/if}

    {if $bs_drei==11}
      <table border="0" width="100%" cellpadding="5" class="contenttable">
    <tr>
	    <td width="170">falls weitere Fehlzeiten: </td>
	    <td width="150"><input type="text" name="fehlzeiten1" {if isset($smarty.post.fehlzeiten1)}value="{if isset($smarty.post.fehlzeiten1)}{$smarty.post.fehlzeiten1}{elseif isset($fehlzeiten1)}{$fehlzeiten1}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} /></td>
      <td>um <input type="text" name="zeit_fehlzeiten1"   {if isset($smarty.post.zeit_fehlzeiten1)}value="{if isset($smarty.post.zeit_fehlzeiten1)}{$smarty.post.zeit_fehlzeiten1}{elseif isset($zeit_fehlzeiten1)}{$zeit_fehlzeiten1}{/if}"{else}value="HH:MM" onfocus="this.value = ''"{/if} /> Uhr</td>
    </tr>
    <tr>
	    <td width="170"></td>
	    <td width="150"><input type="text" name="fehlzeiten2" {if isset($smarty.post.fehlzeiten2)}value="{if isset($smarty.post.fehlzeiten2)}{$smarty.post.fehlzeiten2}{elseif isset($fehlzeiten2)}{$fehlzeiten2}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} /></td>
      <td>um <input type="text" name="zeit_fehlzeiten2"   {if isset($smarty.post.zeit_fehlzeiten2)}value="{if isset($smarty.post.zeit_fehlzeiten2)}{$smarty.post.zeit_fehlzeiten2}{elseif isset($zeit_fehlzeiten2)}{$zeit_fehlzeiten2}{/if}"{else}value="HH:MM" onfocus="this.value = ''"{/if} /> Uhr</td>
    </tr>
    </table><br /><br />
    {/if}
    <table border="0" class="contenttable" cellpadding="5" width="100%">
          <tr>
	           <td align="right"><input type="hidden" name="versteckt" value="{$bs_drei}"  /><input type="hidden" name="versteckt_art" value="{$art}"  /><input type="submit" name="sent_pdf" value="Ausgabe" /></td>
        </tr>
</table>
{/if}
</form>