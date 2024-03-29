{if strlen($mutterschutz)}

<!--MUTTERSCHUTZURLAUB-->
<h1>Mutterschutzurlaub</h1>
<form action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" width="100%" cellpadding="5" class="contenttable">
{if strlen($entbindungsdatum_error)}
<tr>
	<td colspan="2" class="fehlermeldung">{$entbindungsdatum_error}</td>
</tr>
{/if}
<tr>
	<td colspan="2" bgcolor="#9FC6FF"><blockquote><font color="white"><b>Mutterschutzurlaubsrechner</b></font></blockquote></td>
</tr>
<tr>
	<td width="50%" align="right">Entbindungsdatum (TT.MM.JJJJ)</td>
	<td><input type="text" name="entbindungsdatum" value="{$smarty.post.entbindungsdatum}"/></td>
</tr>
<tr>
	<td align="right">Mehrlingsgeburt</td>
	<td width="90"><input type="checkbox" name="mehrlinge" {if $smarty.post.mehrlinge} checked="checked"{/if} /></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="muterschutz" value="Berechnen" /></td>
</tr>
<tr>
	<td colspan="2" align="center">Berechnungen und Hinweise erfolgen ohne Gew&auml;hr.</td>
</tr>
</table>
</form>

{if strlen($vor_berechnung) && !$entbindungsdatum_error}

<h3>Die Folgen</h3>
<div class="contenttable">
<table border="0" width="100%">
<tr>
	<td colspan="2"><b>Die Mutterschutzzeit Ihrer Mitarbeiterin f&uuml;r den oben eingegebenen Entbindungstermin:</b></td>
</tr>	
<tr>
	<td bgcolor="gainsboro">Beginn:</td>
	<td bgcolor="gainsboro">Ende</td>
</tr>
<tr>
	<td>{$back_berechnung[0]}.{$back_monat_ausgabe}.{$back_berechnung[2]}</td>
	<td>{$vor_berechnung[0]}.{$vor_monat_ausgabe}.{$vor_berechnung[2]}</td>
</tr>
</table>
{/if}
</div>
<br /><hr /><br />
{/if}


<!--GESCHWINDIGKEITSVERSTOSS-->
{if strlen($geschwindigkeit)}
<h1>Bu&szlig;geldrechner - Geschwindigkeitsversto&szlig;</h1>
<form action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" width="100%" cellpadding="5" class="contenttable">
{if strlen($msg_bussgeld)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_bussgeld}</td>
</tr>
{/if}
<tr>
	<td colspan="3" bgcolor="#9FC6FF"><blockquote><font color="white"><b>Bu&szlig;geldrechner f&uuml;r PKW, Kraftrad oder sonstige KFZ bis 3,5 t. nach dem 01.02.2009 au&szlig;erhalb der Probezeit.
	Regelsatz- es k&ouml;nnen sich Abweichungen ergeben (z.B. Widerholungsfall,  Vorsatz, Gef&auml;rdung etc.)</b></font></blockquote></td>
</tr>
<tr>
	<td align="right">Ich bin</td>
	<td>
	<select name="ort">
        <option value="1" {if $smarty.post.ort == 1} selected="selected"{/if}>au&szlig;erhalb</option>
        <option value="2" {if $smarty.post.ort == 2} selected="selected"{/if}>innerhalb</option>
    </select></td>
	<td>geschlossener Ortschaften</td>
</tr>
<tr>
	<td></td>
	<td width="90"><input type="text" name="geschwindigkeit" {if strlen($msg_bussgeld)}class="error"{/if} value="{if is_numeric($smarty.post.geschwindigkeit)}{$smarty.post.geschwindigkeit}{/if}" size="11" /></td>
	<td> km/h zu schnell gefahren</td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="bussgeld" value="Berechnen" /></td>
	<td></td>
</tr>
<tr>
	<td colspan="4" align="center">Berechnungen und Hinweise erfolgen ohne Gew&auml;hr.</td>
</tr>
</table>
</form>

{if strlen($bussgeld)}
<h3>Die Folgen</h3>
<div class="contenttable">
<table border="0" width="100%">
<tr>
	<td>Bu&szlig;geld:</td>
	<td width="20"><b>{$bussgeld|number_format:2:',':'.'}</b></td>
	<td>&euro;</td>
</tr>
{if strlen($punkte!=0)}
<tr>
	<td>Punkte in Flensburg:</td>
	<td align="right">{$punkte}</td>
	<td>Punkt{$buchstabe_punkte}</td>
</tr>
{/if}
{if strlen($fahrverbot!=0)}
<tr>
	<td>Fahrverbot:</td>
	<td align="right">{$fahrverbot}</td>
	<td> Monat{$buchstabe_monate}</td>
</tr>
{/if}
{if strlen($bussgeld>=40)}
<tr>
	<td colspan="4"><hr></td>
</tr>
<tr>
	<td>Zus&auml;tzlich ab einem Bu&szlig;geld von 40,- &euro;:</td>
	<td align="right">{20|number_format:2:',':'.'}</td>
	<td>&euro; Verwaltungsgeb&uuml;hr</td>
</tr>
<tr>
	<td></td>
	<td align="right">3,50</td>
	<td>&euro; f&uuml;r die Zusendung des Bu&szlig;geldbescheids</td>
</tr>
{/if}
</table>
{/if}
<br /><hr /><br />
{/if}


<!--ABSTANDSVERSTOSS-->
{if strlen($abstand)}
<h1>Bu&szlig;geldrechner - Abstandsverst&ouml;&szlig;e (Stand: 01.02.2009)</h1>
<form action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" width="100%" cellpadding="5" class="contenttable">
{if strlen($msg_geschwindigkeit_abstand)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_geschwindigkeit_abstand}</td>
</tr>
{/if}
<tr>
	<td colspan="3" bgcolor="#9FC6FF"><blockquote><font color="white"><b>Berechnet wird der Regelsatz des Bußgeldes bei Nichteinhaltung des Abstandes zum vorausfahrenden Fahrzeug . Berechnet werden nur Geschwindigkeiten über 80 km/h.</b></font></blockquote></td>
</tr>
<tr>
	<td align="right" width="300">Mein Abstand zum vorausfahrenden Fahrzeug betrug </td>
	<td><input type="text" name="distance" value="{if is_numeric($smarty.post.distance)}{$smarty.post.distance}{/if}" size="11" /></td>
	<td> Meter</td>
</tr>
<tr>
	<td align="right" width="300">Meine Geschwindigkeit betrug </td>
	<td width="90"><input type="text" name="speed" value="{if is_numeric($smarty.post.speed)}{$smarty.post.speed}{/if}" size="11" /></td>
	<td> km/h</td>
</tr>
<tr>
	<td width="300"></td>
	<td><input type="submit" name="abstand_bussgeld_berechnung" value="Berechnen" /></td>
	<td></td>
</tr>
<tr>
	<td colspan="4" align="center">Berechnungen und Hinweise erfolgen ohne Gew&auml;hr.</td>
</tr>
</table>
</form>

{if strlen($euro)}
<h3>Die Folgen</h3>
<div class="contenttable">
<table border="0" cellpadding="5" width="100%">
<tr>
	<td width="200"></td>
	<td width="200">Geschwindigkeit:</td>
	<td colspan="2">{$smarty.post.speed} Km/h</td>
	<td></td>
</tr>
<tr>
	<td width="200"></td>
	<td width="200">Abstand:</td>
	<td colspan="2">{$smarty.post.distance} Meter</td>
	<td></td>
</tr>
<tr>
	<td width="200"></td>
	<td width="200">Bu&szlig;geld:</td>
	<td width="20"><b>{$euro|number_format:2:',':'.'}</b></td>
	<td>&euro;</td>
</tr>

{if strlen($punkte!=0)}
<tr>
	<td width="200"></td>
	<td width="200">Punkte in Flensburg:</td>
	<td colspan="2">{$punkte}</td>
	<td></td>
</tr>
{/if}
{if strlen($fahrverbot!=0)}
<tr>
	<td width="200"></td>
	<td width="200">Fahrverbot:</td>
	<td colspan="2">{$fahrverbot}</td>
	<td></td>
</tr>
{/if}
{if strlen($bussgeld>=40)}
<tr>
	<td colspan="4"><hr></td>
</tr>
<tr>
	<td width="200"></td>
	<td width="200">Zus&auml;tzlich ab einem Bu&szlig;geld von 40,- &euro;:</td>
	<td align="right">{20|number_format:2:',':'.'}</td>
	<td>&euro; Verwaltungsgeb&uuml;hr</td>
</tr>
<tr>
	<td width="200"></td>
	<td width="200"></td>
	<td align="right">3,50</td>
	<td>&euro; f&uuml;r die Zusendung des Bu&szlig;geldbescheids</td>
</tr>
{/if}
</table>
{/if}
<br /><hr /><br />
{/if}



<!--PROZESSKOSTEN-->
{if strlen($prozesskosten)}
<h1>Prozesskostenrechner</h1>
<form action="{$smarty.server.REQUEST_URI}"  method="post">
<div class="contenttable">
<table border="0" cellpadding="5">
{if strlen($msg_prozesskosten)}
<tr>
	<td class="fehlermeldung" colspan="4">{$msg_prozesskosten}</td>
</tr>
{/if}
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><blockquote><font color="white"><b>Berechnen Sie das Kostenrisiko in der jeweiligen Instanz im Zivilverfahren. Die angegebenen Kosten k&ouml;nnen sich durch Abschluss eines Vergleichs oder durch mehrere Beteiligte auf Seiten einer der Prozessparteien oder durch weitere Beteiligte (Streithelfer) &auml;ndern. Auch die Kosten einer etwaigen Beweiserhebung k&ouml;nnen hier nicht ber&uuml;cksichtigt werden.</b></font></blockquote></td>
</tr>
<tr>
	<td colspan="2" align="right">Streitwert in</td>
	<td colspan="2"><input type="text" name="wert" {if strlen($msg_prozesskosten)}class="error"{/if} value="{if is_numeric($smarty.post.wert)}{$smarty.post.wert}{/if}" size="11" /> &euro;</td>
</tr>
<tr>
	<td style="width: 150px;" align="right"></td>
	<td width="150"><input type="checkbox" name="anwalt1" value="1" {if $smarty.post.anwalt1 == 1 OR $smarty.post.anwalt2 != 2} checked="checked" {/if} /> Kl&auml;ger hat Anwalt</td>
   <td width="20"><input type="checkbox" name="anwalt2" value="2" {if $smarty.post.anwalt2 == 2} checked="checked" {/if} /></td>
   <td>Beklagter hat Anwalt</td>
</tr>
<tr>
	<td style="width: 150px;" align="right"></td>
	<td colspan="3"><input type="checkbox" name="instanz" value="2" {if $smarty.post.instanz == 2} checked="checked" {/if} /> Berufung</td>
</tr>
<tr>
	<td style="width: 150px;"></td>
	<td><input type="submit" name="prozesskosten" value="Berechnen" /></td>
</tr>
<tr>
	<td colspan="4" align="center">Berechnungen und Hinweise erfolgen ohne Gew&auml;hr.</td>
</tr>
</table>
</div>
</form>

{if !strlen($msg_prozesskosten) AND strlen($gesamtpreis)}
<h3>Das Ergebnis der Berechnung</h3>
<div class="contenttable">
<center>
<table border="0">
<tr>
	<td align="center" colspan="4">Ihr Streitwert: <font color="#0A264E">{if isset($smarty.post.wert)}{$wert|number_format:2:',':'.'}{/if} &euro;</font></td>
</tr>
<tr>
	<td align="center" colspan="4">Sie haben die <font color="#0A264E">{$instanz}. Instanz</font>  und <font color="#0A264E">{$anwalt}{if $anwalt == 1} Anwalt{/if} {if $anwalt == 2} Anw&auml;lte{/if}</font> gew&auml;hlt.</td>
</tr>

{if $anwalt == 2}
<tr>
	<td align="center" colspan="4"><b>Kosten der 2. Instanz</b></td>
</tr>
{/if}
<tr>
	<td colspan="4"><hr /></td>
</tr>
<tr>
	<td width="170">Anwaltgeb&uuml;hren NETTO</td>
	<td width="100" align="right"><font color="#0A264E">
            {if $anwalt == 1}
                {$preis_anwalt|number_format:2:',':'.'}
            {else}
                {$preis_anwalt|number_format:2:',':'.'}
            {/if} &euro;</font></td>
            <td width="100"></td>
            <td></td>
</tr>
<tr>
	<td>MwSt. 19%</td>
	<td align="right"><font color="#0A264E">{$mwst|number_format:2:',':'.'} &euro;</font></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>Anwaltsgeb&uuml;hren BRUTTO</td>
	<td></td>
	<td align="right"><font color="#0A264E">{$brutto|number_format:2:',':'.'} &euro;</font></td>
	<td></td>
</tr>
<tr>
	<td>Gerichtkosten</td>
	<td></td>
	<td align="right"><font color="#0A264E">{if $smarty.server.REQUEST_METHOD == 'POST' && strlen($msg) == 0}{$gerichtskosten|number_format:2:',':'.'}{/if} &euro;</font><br />_________ </td>
	<td></td>
</tr>

<tr>
	<td>Gesamtkosten</td>
	<td></td>
	<td align="right"><font color="#0A264E">{if $smarty.server.REQUEST_METHOD == 'POST' && strlen($msg) == 0}{$gesamtpreis|number_format:2:',':'.'}{/if} &euro;</font></td>
	<td></td>
</tr>
</table>
{/if}
{if $smarty.session.login}
</center>
</div>
<br /><hr /><br />
{/if}
{/if}



<!--BEENDIGUNG ARBEITSVERH�LTNISSES-->
{if strlen($arb_geb_kund)}
{if $smarty.session.login}<script language="JavaScript" src="/derAdvokat/js/kundigung.js" type="text/javascript"></script>{/if}
<h1>Beendigungszeitpunkt des Arbeitsverh&auml;ltnisses</h1>
<form>
<table border="0" cellpadding="5" class="contenttable">
<tr>
	<td colspan="3" bgcolor="#9FC6FF"><blockquote><font color="white"><b>Berechnet die gesetzlichen K&uuml;ndigungsfristen des Arbeitgebers gem&auml;&szlig; &sect 622 Abs. 1 und 2 BGB. F&auml;llt das Zugangsdatum der K&uuml;ndigung auf einen Sonn- oder Feiertag, sollte zur Sicherheit der darauffolgende Tag als Zugangsdatum im Rechner eingetragen weden. K&uuml;ndigungsfristen k&ouml;nnen aufgrund von vertraglicher oder tariflicher Vereinbarung (z.B. Vereinbarung einer Probezeit) abweichen. Nach dem Gesetz sind bei der Berechnung der Beschäftigungsdauer Zeiten, die vor der Vollendung des 25. Lebensjahres des Arbeitnehmers liegen, nicht zu ber&uuml;cksichtigen; nach der neusten Rechtsprechung verst&szlig;t dieses nationale Gesetz gegen EU-Recht und darf nicht angewendet werden; ber&uuml;cksichtigt werden daher auch Besch&auml;ftigungszeiten, die vor Vollendung des 25. Lebensjahres des Arbeitsnehmers liegen.</b></font></blockquote></td>
</tr>
<tr>
	<td colspan="3" bgcolor="#9FC6FF"><blockquote><font color="white"><b>Der Rechner beabsichtigt keine Feiertage. Hierdoch kann es zu Verf&auml;lschungen des Ergebnisses kommen.
	
				<ul>
					<li><font color="white" size="2">wenn ein Feiertag auf einen der ersten 3 Werktage des Monats f&auml;llt</font></li>
					<li><font color="white" size="2">und des K&uuml;ndigungszugang ein Werktag sp&auml;ter erfolgt.</font></li>
				</ul></b></font>
				</blockquote>
	
	</td>
</tr>
<tr>
	<td>
		<table>
			<tr>
				<td style="width: 150px;">Seit wann besteht das Arbeitsverh&auml;ltnis?</td>
				<td style="width: 183px;"><input type="text" id="datein" name="datein" value="""></td>
				<td align="left"  width="300"><div id="datein_st">&nbsp;</div></td>
			</tr>
			<tr>
				<td style="width: 150px;">Datum des Zugangs der Kündigung beim Arbeitnehmer:</td>
				<td style="width: 183px;"><input type="text" id="datedec" name="datedec" value="""></td>
				<td align="left"><div id="datedec_st">&nbsp;</div></td>
			</tr>
			
			<tr>
				<td style="width: 150px;">&nbsp;</td>
				<td style="width: 183px;"><input type="button" name="berechnen" value="Berechnen" onclick="calc()"; /></td>
				<td></td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td  align="center">Berechnungen und Hinweise erfolgen ohne Gew&auml;hr.
	
	
	</td>
</tr>

<tr>
	<td align="left">
	<input type="hidden" id="daterez" value="" />
	
	</td>
</tr>
</table>
<div id="divrez" style="display: none;">
<h3>Das Ergebnis der Berechnung</h3>
<div class="contenttable">
<table border="0" cellpadding="5" >
<tr>
	<td><div id="result"></div></td>
</tr>
</table>
</div>
</div>
</form>
<br /><br />
{/if}



{if strlen($vermieter_kund)}

{if $smarty.session.login}<script language="JavaScript" src="/derAdvokat/js/kundigung.js" type="text/javascript"></script>{/if}
<h1>K&uuml;ndigung Wohnraummietverh&auml;ltnis</h1>
<form>
<table border="0" cellpadding="5" class="contenttable">
<tr>
	<td bgcolor="#9FC6FF"><blockquote><font color="white"><b>Berechnet die gesetzlichen K&uuml;ndigungsfristen die der Vermieter gem&auml;&szlig; &sect 573 c BGB
einzuhalten hat. F&auml;llt das Zugangsdatum der K&uuml;ndigung auf einen Sonn- oder Feiertag,
sollte zur Sicherheit der darauf folgende Tag als Zugangsdatum im Rechner eingetragen
werden. K&uuml;ndigungsfristen k&ouml;nnen aufgrund vertraglicher Vereinbarungen abweichen.
</b></font></blockquote></td>
</tr>

<tr>
	<td>
		<table>
			<tr>
				<td style="width: 150px;">Beginn des Mietverh&auml;ltnisses:</td>
				<td style="width: 183px;"><input type="text" id="date_rent_begin" name="date_rent_begin" value="""></td>
				<td align="left" width="300"><div id="date_rent_begin_st">&nbsp;</div></td>
			</tr>
			<tr>
				<td style="width: 150px;">Datum des Zugangs der K&uuml;ndigung:</td>
				<td style="width: 183px;"><input type="text" id="date_rent_in" name="date_rent_in" value="""></td>
				<td align="left"><div id="date_rent_in_st">&nbsp;</div></td>
			</tr>
			
			<tr>
				<td style="width: 150px;">&nbsp;</td>
				<td style="width: 183px;"><input type="button" name="berechnen" value="Berechnen" onclick="rent_calc()"; /></td>
				<td></td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td align="center">Berechnungen und Hinweise erfolgen ohne Gew&auml;hr.
	
	
	</td>
</tr>

<tr>
	<td align="left">
	<input type="hidden" id="date_rent_rez" value="" />
	
	</td>
</tr>
		
</table>
<div id="div_rent_rez" style="display: none;">
<h3>Das Ergebnis der Berechnung</h3>
<div  class="contenttable">
<table border="0" cellpadding="5" >
<tr>
	<td><div id="rent_result"></div></td>
</tr>
</table>
</div>
</div>
</form>
{/if}
