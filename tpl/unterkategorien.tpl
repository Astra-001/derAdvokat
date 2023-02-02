<div class="contenttable">
<a href="/derAdvokat/kategorien/{$smarty.get.kat_id}"><img src="/derAdvokat/grafik/pfail_back.png" alt="Zur&uuml;ck" border="no" name="back" onmouseover="javascript:document.back.src='/derAdvokat/grafik/pfail_back_on.png';" onmouseout="javascript:document.back.src='/derAdvokat/grafik/pfail_back.png';"/></a>
</div>

<h1>{$kategorie}</h1>
<div class="contenttable">
<h3>Artikelliste</h3>
<ul>
{foreach from=$artikel item=a name=artikel}
<li><a href="/derAdvokat/artikelview/{$a.id|escape}">{$a.titel|escape}</a></li>
{foreachelse}<li>Keine Beitr&auml;ge vorhanden.</li>
{/foreach}
</ul>
</div>