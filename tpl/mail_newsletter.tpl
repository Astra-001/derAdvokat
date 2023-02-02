<basefont face="arial" />
<style>
{literal}
table, div, span, td {
    font-family: Verdana;
    font-size: 11px;
}
a, a:link, a:visited {
    color:gray;
    text-decoration:none;
    font:  Verdana;
    font-size: 11px;
}
a:hover, a:active, a:focus {
    color:red;
    text-decoration:none;
}
{/literal}
</style>
<body bgcolor="#ffffff" style="background-color: #ffffff; font-family: arial; text-align: justify;">
<center>
<table border="0" cellpadding="0" cellspacing="0" width="30%" style="border: 0px solid navy; background-color: white;border-color:white;">
<tr>
    <td width="100%" align="right"> 
    {if $nv.logo_typ==1}<img src="cid:logo_typ_deradvokat" alt="derAdvokat"/>{/if}
    {if $nv.logo_typ==2}<img src="cid:logo_typ_kanzlei_strauch" alt="Kanzlei Strauch"/>{/if}
    {if $nv.logo_typ==3}<img src="cid:logo_typ_icada" alt="Kanzlei Strauch"/>{/if}</td>
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
    <td><b><font color="#993300" size="3" style="padding-left:5px;">{$nv.titel}</font></b></td>
</tr>
<tr>
	<td height="10"></td>
</tr>	
<tr>
    <td>
    {if strlen($nv.bild_name)}
        <div id="content_bild">
        <img align="left" hspace="5" src="cid:{$nv.bild_name}" alt="Bild" />
        </div>
    {/if}
    <div style="text-align: justify;">
    {$nv.content}<br/>
    </div>
    </td>
</tr>
<tr>
    <td></td>
</tr>
{if is_array($artikel)}
<tr>
    <td bgcolor="#0A264E" style="padding:5px" height="10"><font color="white"><b>Diese{if count($artikel)==1}r{/if} Artikel k&ouml;nnte{if count($artikel)>1}n{/if} Sie auch interessieren:</b></font></td>
</tr>
{/if}

    {foreach from=$artikel item=na name=newsletter_artikeln_id}
    <small>
    <tr>
    <td height="25">
    <a href="http://www.deradvokat.de/derAdvokat/artikelview/{$na.id}" target="_blank"><b><font color="#0A264E">{$na.titel}</font></b></a>
    </td>
    </tr>
    </small>
    {/foreach}

{if $nv.logo_typ==1}
<tr>
    <td bgcolor="#0A264E"  {if $nv.logo_typ!=3}style="padding:5px"{else if}style="padding:10px"{/if}>{if $nv.logo_typ!=3}<a href="http://www.deradvokat.de/derAdvokat/login" target="_blank"><font color="white"><b>Zum Premiumbereich</b></font></a>{/if}</td>
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
    <td><br/>Mit freundlichen Gr&uuml;&szlig;en<br/>{if $nv.logo_typ!=3}<img src="cid:unterschrift" alt="Unterschrift" /><br/> Yves Strauch<br/>Rechtsanwalt{/if}</td>
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
        <td width="300"><b><font color="gray">Wir sind f&uuml;r Sie da</b><br/><br/>Haben Sie Fragen?<br/>Dann rufen Sie uns an:<br/>Tel.:{if $nv.logo_typ!=3} 0211 / 466193{else if} 0211 / 15947928{/if} <br/><br/>Mo.-Fr. 09-16 Uhr</font></td>
        <td width="5" bgcolor="#0A264E"></td>
        <td style="vertical-align:top;"><b><font color="gray">Anschrift</b><br/><br/>{if $nv.logo_typ!=3}Kanzlei Strauch<br/>Schwerinstra&szlig;e 49<br/>40476 D&uuml;sseldorf{else if}ICADA e.V. <br/>vertreten durch den Gesch&auml;ftsf&uuml;hrer Dr. R. Brunke<br/>Rosenstr. 34<br/>40479 D&uuml;sseldorf{/if}</font></td>
    </tr>
    <tr>
        <td height="30" colspan="4"></td>        
    </tr>
    <tr>
        <td width="5" bgcolor="#0A264E"></td>
        <td><font color="gray"><b>Sie m&ouml;chten keine weiteren Informationen<br/> per E-Mail erhalten?</b><br/><br/>
        Dann senden Sie eine E-Mail an:<br/><br/>
        {if $nv.logo_typ!=3}<a href="mailto:{$smarty.const.EMAIL}?subject=Newsletter Abmeldung">{$smarty.const.EMAIL}</a>{else if}<a href="mailto:'mail@icada.eu'?subject=Newsletter Abmeldung">mail@icada.eu{/if}</a>font></td>
        <td width="5"{if $nv.logo_typ!=3} bgcolor="#0A264E">{/if}</td>
        <td style="vertical-align:top;"><font color="gray">{if $nv.logo_typ==1}<b>Sie ben&ouml;tigen neue Zugangsdaten?</b><br/><br/>Bitte klicken sie <a href="mailto:{$mail}?subject=Neue Zugangsdaten">hier</a><br/><br/>{/if}
        {if $nv.logo_typ==2}Besuchen Sie unser Rechtsportal<br/><br/><a href="http://www.deradvokat.de/deradvokat/">www.derAdvokat.de</a><br/><br/>{/if}</font></td>
    </tr>    
    </table>
    
    </td>
</tr>
<tr>
    <td><hr/></td>
</tr>
<tr>
    <td style="text-align: center;">
    <center><small>
        {if $nv.logo_typ!=3}<a href="http://www.deradvokat.de/derAdvokat/impressum" target="_blank">Impressum</a> |{else if}<a href="http://http://www.icada.eu/impressum.html" target="_blank">Impressum</a> |{/if}
        {if $nv.logo_typ!=3}<a href="http://www.deradvokat.de/derAdvokat/kontakt" target="_blank">Kontakt</a> |{else if}<a href="http://www.icada.eu/component/option,com_dfcontact/Itemid,100/" target="_blank">Kontakt</a> |{/if}
        {if $nv.logo_typ!=3}<a href="http://www.deradvokat.de/derAdvokat/agb" target="_blank">AGB</a> |{/if}
    </small></center>
    </td>
</tr>
            
</table>    
</center>
</body>