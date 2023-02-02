{foreach from=$newsletter_vorschau item=nv name=newsletter_vorschau}
<input type="hidden" name="nl_id" value="{$nv.id}"/>
<table border="0">
<tr>
	<td width="100%" align="right"> 
	{if $nv.logo_typ==1}<img src="/derAdvokat/grafik/logo_typ_deradvokat.png" alt="derAdvokat"/>{/if}
	{if $nv.logo_typ==2}<img src="/derAdvokat/grafik/logo_typ_kanzlei_strauch.png" alt="Kanzlei Strauch"/>{/if}
	{if $nv.logo_typ==3}<img src="/derAdvokat/grafik/logo_typ_icada.png" alt="Kanzlei Strauch"/>{/if}</td>
</tr>
{if $nv.logo_typ==2}
<tr>
	<td height="10"></td>
</tr>	
<tr>
	<td bgcolor="#0A264E" height="5"></td>
</tr>
<tr>
	<td height="10"></td>
</tr>
{/if}	
<tr>
	<td><b><font color="#993300" size="4">{$nv.titel}</font></b></td>
</tr>
<tr>
	<td>{if strlen($nv.bild_name)}
		<div id="content_bild">
        <img src="/derAdvokat/newsletter_bilder/main_{$nv.bild_name}" alt="Bild" />
    </div>{/if}{$nv.content}
    </td>
</tr>
<tr>
	<td></td>
</tr>
{if $newsletter_artikeln_id==true}
<tr>
	<td bgcolor="#0A264E"><font color="white"><b>Diese{if $anz_artikeln==1}r{/if} Artikel k&ouml;nnte{if $anz_artikeln>=2}n{/if} Sie auch interessieren:</b></font></td>
</tr>
{/if}
	{foreach from=$newsletter_artikeln_id item=na name=newsletter_artikeln_id}
	<tr>
		<td height="25">
		<a href="/derAdvokat/artikelview/{$na.artikel_id}" target="_blank"><b><font color="#0A264E">{$newsletter_artikeln[$na.artikel_id]}</font></b></a><br/>
		</td>
	</tr>
	{/foreach}
{if $nv.logo_typ==1}	
<tr>
	<td bgcolor="#0A264E" height="14"><a href="http://www.deradvokat.de/derAdvokat/login" target="_blank"><font color="white"><b>Zum Premiumbereich</b></font></a></td>
</tr>
{/if}

{if $nv.logo_typ==2}	
<tr>
	<td height="10"></td>
</tr>
<tr>
	<td bgcolor="#0A264E" height="5"></td>
</tr>
<tr>
	<td height="10"></td>
</tr>
{/if}

<tr>
	<td><br/>Mit freundlichen Gr&uuml;&szlig;en<br/>{if $nv.logo_typ!=3}<img src="/derAdvokat/grafik/unterschrift.jpg" alt="Unterschrift" /><br/> Yves Strauch<br/>Rechtsanwalt{/if}</td>
</tr>

{if $nv.logo_typ==2}	
<tr>
	<td height="10"></td>
</tr>
<tr>
	<td><hr></td>
</tr>
<tr>
	<td height="10"></td>
</tr>
{/if}

<tr>
	<td>
	<table border="0">
	<tr><td width="5" bgcolor="#0A264E"></td>
		<td width="300"><b>Wir sind f&uuml;r Sie da</b><br/><br/>Haben Sie Fragen?<br/>Dann rufen Sie uns an:<br/>{if $nv.logo_typ!=3} 0211 / 466193{else if} 0211 / 15947928 {/if}<br/><br/>Mo.-Fr. 09-16 Uhr</td>
		<td width="5" bgcolor="#0A264E"></td>
		<td style="vertical-align:top;"><b>Anschrift</b><br/><br/>{if $nv.logo_typ!=3}Kanzlei Strauch<br/>Schwerinstraße 49<br/>40476 Düsseldorf{else if}ICADA e.V. <br/>vertreten durch den Geschäftsführer Dr. R. Brunke<br/>Rosenstr. 34<br/>40479 Düsseldorf{/if}</td>
	</tr>
	<tr>
		<td height="30" colspan="4"></td>		
	</tr>
	<tr>
		<td width="5" bgcolor="#0A264E"></td>
		<td><b>Sie m&ouml;chten keine weiteren Informationen<br/> per E-Mail erhalten?</b><br/><br/>
		Dann senden Sie eine E-Mail an:<br/><br/>
		{if $nv.logo_typ==1 && $nv.logo_typ==2}<a href="mailto:{$smarty.const.EMAIL}?subject=Newsletter Abmeldung">{$smarty.const.EMAIL}</a>{else if}<a href="mailto:'mail@icada.eu'?subject=Newsletter Abmeldung">mail@icada.eu{/if}</td>
		<td width="5" {if $nv.logo_typ!=3} bgcolor="#0A264E">{/if}</td>
		<td style="vertical-align:top;">{if $nv.logo_typ==1}<b>Sie ben&ouml;tigen neue Zugangsdaten?</b><br/><br/>Bitte klicken sie <a href="mailto:{$mail}?subject=Neue Zugangsdaten">hier</a><br/><br/>{/if}
		{if $nv.logo_typ==2}Besuchen Sie unser Rechtsportal<br/><br/><a href="http://www.deradvokat.de/deradvokat/">www.derAdvokat.de</a><br/><br/>{/if}</td>
	</tr>	
	</table></td>
</tr>
<tr>
	<td><hr/></td>
</tr>
<tr>
	<td align="center">
	<table border="0">
	<tr><td>{if $nv.logo_typ!=3}<a href="http://www.deradvokat.de/derAdvokat/impressum" target="_blank">Impressum</a> |{else if}<a href="http://http://www.icada.eu/impressum.html" target="_blank">Impressum</a> |{/if}
        {if $nv.logo_typ!=3}<a href="http://www.deradvokat.de/derAdvokat/kontakt" target="_blank">Kontakt</a> |{else if}<a href="http://www.icada.eu/component/option,com_dfcontact/Itemid,100/" target="_blank">Kontakt</a> |{/if}
        {if $nv.logo_typ!=3}<a href="http://www.deradvokat.de/derAdvokat/agb" target="_blank">AGB</a> |{/if}</td>
	</tr>
	</table></td>
</tr>
			
</table>	
{/foreach}