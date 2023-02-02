<table border="0" width="{if !$smarty.get.task}210{else}210{/if}" cellpadding="2">

{foreach from=$kategorien item=k name=kategorien}

<tr>
	<td>&raquo;</td>
    <td height="15"><a href="/derAdvokat/kategorien/{$k.id}">{$k.name}</a></td>
</tr>

{/foreach}

<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/rechnermodul">Rechner</a><br /></td>
</tr>

{if $smarty.session.login}

<tr>
	<td></td>
	<td height="15"></td>
</tr>

<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/vertrag">Vertr&auml;ge</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/arbeitsmodule">Arbeitsmodule</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/formulare">Formulare</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/vortrag">Vortr&auml;ge/Seminare</a><br /></td>
</tr>

{/if}

{if $smarty.session.user.status == $smarty.const.STATUS_ADMIN}

<tr>
	<td></td>
	<td height="15"></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/userliste">Mitgliederliste</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/userliste/add">Registrierung</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/artikeladmin">Artikel&uuml;bersicht</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/artikel">Neuer Artikel</a></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/newsletter_menu">Newsletter</a><br /></td>
</tr>

{/if}

{if $smarty.session.login}
<tr>
	<td>&raquo;</td>
	<td height="15" id="eigene_daten"><a href="/derAdvokat/eigene_daten">Meine Daten</a></td>
</tr>
{/if}

{if $smarty.session.login}

<tr>
	<td></td>
	<td height="15"></td>
</tr>
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/logout">Logout</a><br /></td>
</tr>

{else}

<tr>
	<td></td>
	<td height="15"></td>
</tr>

<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/login">Login</a><br /></td>
</tr>

{/if}

<tr>
	<td></td>
	<td height="15"></td>
</tr>
<!--<tr>
	<td>&raquo;</td>
	<td height="15" id="Kontakt"><a href="/derAdvokat/kontakt">Kontakt</a></td>
</tr>//-->
<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/impressum">Impressum</a></td>
</tr>



{if $smarty.session.login}

<tr>
	<td>&raquo;</td>
	<td height="15"><a href="/derAdvokat/agb"> AGB</a></td>
</tr>

{/if}
</table>