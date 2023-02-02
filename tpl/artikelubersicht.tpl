<h1>Artikel&uuml;bersicht</h1>
<table border="0" cellpadding="5" class="contenttable">
<tr align="center">
    <th>Kategorie</th>
    <th>Unterkategorie</th>
    <th>Titel</th>
    <th>Premium</th>
    <th>Erstellt.</th>
    <th>Aktion</th>
</tr>
{foreach from=$artikel item=a name=artikel}
<tr>
    <td>{$cat[$a.kat_id]}</td>
    <td>{$cat[$a.ukat_id]}</td>
    <td>{$a.titel}</td>
    <td>{if $a.premium == $smarty.const.ARTICLE_PREMIUM}Premium{/if}</td>
    <td>{$a.date_created|date_format:"%d.%m.%Y %H:%M"}</td>
    <td align="right">
    <a href='index.php?task=artikel&amp;kat_id={$a.kat_id}&amp;art_id={$a.id}&amp;act=edit'>Bearbeiten</a>
    <a href='index.php?task=artikeladmin&amp;art_id={$a.id}&amp;act=del'>L&ouml;schen</a>
    </td>
</tr>
<tr>
    <td colspan="6"><hr /></td>
</tr>
{foreachelse}<tr><td colspan="5">Keine Artikel vorhanden.</td></tr>
{/foreach}
</table>