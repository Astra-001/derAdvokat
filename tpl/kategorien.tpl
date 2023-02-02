<h1>{$kategorie}</h1>
<div class="contenttable"><b>Nachfolgende Beiträge sind popul&auml;rwissenschaftlich verfasst und als Orientierung für Personen gedacht,
die &uuml;ber keine juristische Ausbildung verfügen. Die Beitr&auml;ge erheben weder einen Anspruch auf Vollständigkeit der besprochenen Inhalte, noch ist hiermit eine konkrete rechtliche Auskunft verbunden. Weitere rechtliche Hinweise zur Nutzung dieses Rechtsportals finden Sie im Impressum.
</b></div>
<br />
<div class="contenttable">
<h3>Themen</h3>
<ul>
{foreach from=$unterkategorien item=a name=unterkategorien}
<li><a href="/derAdvokat/kategorien/{$a.parent_id|escape}/unterkategorien/{$a.id|escape}">{$a.name|escape}</a></li>
{foreachelse}<li>Keine Beitr&auml;ge vorhanden.</li>
{/foreach}
</ul>
</div>