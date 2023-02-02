<h1>Unterkategorien Verwaltung</h1>
{if $del_message_anzeigen==FALSE}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
{if strlen($msg_fehler)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_fehler}</td>
</tr>
{/if}
<tr>
	<td width="180">Kategorien</td>
	<td><select name="kategorien">
	{foreach from=$kategorien item=k name=kategorien}
        <option value="{$k.id}" {if $kategorien.id == $k.id} selected="selected"{/if}>{$k.name}</option>
    {/foreach}
    </select></td>
</tr>
<tr>
	<td>Neue Unterkategorie eintragen</td>
	<td><input type="text" name="unter_kat_name" value="" size="50" /></td>
</tr>	
<tr>
	<td></td>
	<td><input type="submit" name="eintragen" value="Unterkategorie eintragen" /></td>
</tr>
</table>
</form>
{/if}
<br />

{if $del_message_anzeigen==TRUE}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td bgcolor="red" colspan="2"><font color="white"><b>L&ouml;schen der Unterkategorie</b></font></td>
</tr>
<tr>
	<td colspan="2">Sind Sie sicher dass, Sie diese Unterkategorie - <b>{$unterkategorie}</b> - l&ouml;schen wollen?<br/>Damit werden Sie alle Anzeigen, die zu dieser Unterkategorie geh&ouml;ren- <b>auch unwiederruflich gel&ouml;scht !</b> </td>
</tr>	
<tr>
	<td><input type="submit" name="loeschen" value="Löschung bestägiten" /></td>
	<td align="right"><a href="index.php?task=unterkategorien_verwaltung">zurück zu Unterkategorien Verwaltung</a></td>
</tr>
</table>
<br />
</form>
<br />

<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td bgcolor="red"><font color="white"><b>Artikel die gel&ouml;scht werden</b></font></td>
</tr>
	{foreach from=$show_artikel item=a name=show_artikel}
<tr>
	<td>- {$a.titel}</td>
</tr>	
    {foreachelse}<tr><td>Keine Artikel vorhanden.</td></tr>
{/foreach}
	
</table>
<br />

{/if}

{if $del_message_anzeigen==FALSE}
<form class="navProduktverwaltung" method="get" action="{$smarty.server.REQUEST_URI|escape}" name="sortierung">
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td align="right"><select name="task" onchange="javascript:document.sortierung.submit();">
        <option value="1" {if $smarty.get.task == 1} selected="selected" {/if}>Alle Kategorien</option>
        <option value="2" {if $smarty.get.task == 2} selected="selected" {/if}>Inkasso</option>
        <option value="3" {if $smarty.get.task == 3} selected="selected" {/if}>Mietrecht</option>
        <option value="4" {if $smarty.get.task == 4} selected="selected" {/if}>Gewerblicher Rechtschutz</option>
        <option value="5" {if $smarty.get.task == 5} selected="selected" {/if}>Verkehrsrecht</option>
        <option value="6" {if $smarty.get.task == 6} selected="selected" {/if}>Versicherungsrecht</option>
        <option value="7" {if $smarty.get.task == 7} selected="selected" {/if}>Arbeitsrecht</option>
    </select></td>
</tr>
</table>
</form>
<br/>
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td bgcolor="#9FC6FF"><font color="white"><b>Kategorien</b></font></td>
	<td bgcolor="#9FC6FF"><font color="white"><b>Unterkategorien</b></font></td>
	<td bgcolor="#9FC6FF"><font color="white"><b>Aktion</b></font></td>
</tr>
{foreach from=$unterkategorie item=uk name=unterkategorie}
<tr>
	<td>{$cat[$uk.parent_id]}</td>
	<td>{$uk.name}</td>
	<td><a href='index.php?task=unterkategorien_verwaltung&amp;act=del&amp;id={$uk.id}'>L&ouml;schen</a><br /></td>
</tr>
<tr>
	<td colspan="8"><hr /></td>
</tr>
{foreachelse}<tr><td>Keine Eintr&auml;ge vorhanden.</td></tr>
{/foreach}
</table>
{/if}