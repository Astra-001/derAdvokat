<div class="contenttable">
<table border="0" cellpadding="5">
<tr>
	<td width="30"><a href="/derAdvokat/kategorien/{$artikel.kat_id}/unterkategorien/{$artikel.ukat_id}"><img src="/derAdvokat/grafik/pfail_back.png" alt="zur&uuml;ck in Newsletter Men&uuml;" border="no"/></a></td>
	<td><img src="/derAdvokat/grafik/printer_icon.png" alt="Drucken" title="Drucken" style="cursor: pointer;" onclick="window.print();" /></td>
</tr>
</table>
</div>
<h2>{$artikel.titel|escape}</h2>

<table border="0"  cellpadding="5" class="contenttable">
<tr>
    <td colspan="2">
    {if strlen($artikel.bild_name)}
    <div id='content_bild'>
        <img src="/derAdvokat/bilder/main_{$artikel.bild_name}" alt="Bild" />
    </div>
    {/if}
    <span style="color:#0A264E">{$artikel.content}</span>
    </td>
</tr>
{if $smarty.session.user.status == $smarty.const.STATUS_ADMIN}
<tr>
    <td colspan="2"><hr /></td>
</tr>
<tr>
    <td width="300">Erstellt: {$artikel.date_created|date_format:"%d.%m.%Y %H:%M"}<br />
        Dieser Artikel ist im Bereich: {if $artikel.premium==1} &Ouml;ffentlich{elseif $artikel.premium==2}Premium{/if}
   </td>
    <td align="center">

  <table border="0">
    <tr>
        <td><a href='/derAdvokat/index.php?task=artikel&amp;kat_id={$artikel.kat_id}&amp;art_id={$artikel.id}&amp;act=edit'>Bearbeiten</a></td>
    </tr>
    <tr>
        <td><a href='/derAdvokat/index.php?task=kategorien&amp;kat_id={$artikel.kat_id}&amp;task=unterkategorien&amp;ukat_id={$artikel.ukat_id}&amp;art_id={$artikel.id}&amp;act=del'>L&ouml;schen</a></td>
    </tr>
    <tr>
        <td>{if $artikel.status==0}<a href='/derAdvokat/index.php?task=artikelview&amp;art_id={$artikel.id}&amp;act=lock'>Sperren{/if}
        {if $artikel.status==1}<a href='/derAdvokat/index.php?task=artikelview&amp;art_id={$artikel.id}&amp;act=unlock'><span style="color:red;">Entsperren</span>{/if}</a></td>
    </tr>
    </table>

  </td>
</tr>
{/if}
</table>