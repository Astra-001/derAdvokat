<!--<script type="text/javascript" src="/derAdvokat/js/monitoring.js"></script>  -->
<script type="text/javascript" src="/derAdvokat/js/checkbox_markierung.js"></script>
{include file="`$smarty.const.SMARTY_TEMPLATE_DIR`seiten_incl.tpl"}
<br/><br/>
<form action="{$smarty.server.REQUEST_URI}" name="userliste_form" method="post">

<div id="user_liste">

<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td><h1>Aktivit&auml;ten nicht registrierter Besuchern</h1></td>
</tr>

{if $logsArray[0]}
<tr>
	<td><input type="submit" name="log_entfernen" value="Entfernen"/></td>
</tr>
<tr>
	<td><input type="checkbox" name="all_select" value="" onclick="enable_checkbox()"/>- Alle ausw&auml;hlen</td>
</tr>
{/if}

<tr>
	<td>

		{literal}
		<script type="text/javascript">
		function set_visible_del(id)
		{
			document.getElementById('del_button_' + id).style.visibility = "visible";
		    document.getElementById('del_button_' + id).style.display = "block";
		}
		function set_unvisible_del(id)
		{
			document.getElementById('del_button_' + id).style.visibility = "hidden";
		    document.getElementById('del_button_' + id).style.display = "none";
		}
		</script>
		{/literal}

		{if $logsArray[$u.id][0].uid==0}
		<!-- GAST MONITORING -->
		<div id="gast_container">
		<div style="height:auto;max-height:200px;overflow-y:scroll;">
		{foreach from=$logsArray[0] item=l name=logsArray}

		<table border="0" width="100%" cellpadding="5" class="contenttable" style="margin-bottom:10px;" onmouseover="set_visible_del({$l.id});" onmouseout="set_unvisible_del({$l.id});">
		<tr>
			<td colspan="4" bgcolor="#0a264e">{include file="`$smarty.const.SMARTY_TEMPLATE_DIR`log_module.tpl"}</td>
		</tr>
		<tr height="30">
		<td width="30"><input type="checkbox" name="log[]" value="{$l.id}"/></td>
			<td>


			{$l.useragent}


			</td>
			<td width="110">{if $smarty.session.user.letzte_anmeldung<=$l.timestamp}<font color="red">{$l.timestamp|date_format:"%d.%m.%Y %H:%M"}</font>{else}{$l.timestamp|date_format:"%d.%m.%Y %H:%M"}{/if}</td>
			<td width="20"><div id="del_button_{$l.id}"  style="display:none;visibility:hidden;"><a href="index.php?task=userliste&amp;execute=delete&amp;id={$l.id}{if $smarty.get.page}&amp;page={$smarty.get.page}{/if}"><img src="/derAdvokat/grafik/del_button.png" alt="Delete" border="no"/></a></div></td>
		</tr>
		</table>
		{foreachelse}
		Keine Aufzeichnungen vorhanden
		{/foreach}
		</div>
		</div>

		{/if}

	</td>
</tr>
</table>
<br/><br/>

<h1>Mitgliederliste </h1>

sortiert nach <select onchange="javascript:document.userliste_form.submit();" name="mitglieder_sort">
        <option value="1" {if $smarty.post.mitglieder_sort == 1} selected="selected" {/if}>- Mitglieder ID -</option>
        <option value="2" {if $smarty.post.mitglieder_sort == 2} selected="selected" {/if}>- zuletzt angemeldet -</option>
    </select><br/><br/>

<table border="0" cellpadding="5" class="contenttable" width="100%">

{foreach from=$user item=u name=user}
<tr>
	<td>ID</td>
	<td>{$u.id}</td>
	<td align="right">{if $u.geschlecht==1}Herr{/if} {if $u.geschlecht==2} Frau {/if} {if $u.geschlecht==3} Firma {/if}</td>
	<td>{if $u.geschlecht!=3}{$u.vorname} {$u.name} {/if}{if $u.geschlecht==3} {$u.firma_name}{/if}</td>
	<td>{if $u.status!=$smarty.const.STATUS_ADMIN}<a href='index.php?task=userliste&amp;act=del&amp;id={$u.id}{if $smarty.get.page}&amp;page={$smarty.get.page}{/if}'>L&ouml;schen</a>{/if}</td>
</tr>
<tr>
	<td>Logins</td>
	<td>{$u.logins}</td>
	<td align="right">E-Mail</td>
	<td><a href="mailto:{$u.email}?subject=www.derAdvokat.de%20Kanzlei-Strauch">{$u.email}</a></td>
	<td>{if $u.status!=$smarty.const.STATUS_ADMIN}<a href='index.php?task=userliste&amp;act=edit&amp;id={$u.id}{if $smarty.get.page}&amp;page={$smarty.get.page}{/if}'>Bearbeiten</a>{/if}</td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td align="right">Empf&auml;nger Gruppe</td>
	<td>{if $u.empfanger_art==0}Nicht gesetzt{/if}{if $u.empfanger_art==1}Sonstige{/if}{if $u.empfanger_art==2}Kosmetikhersteller{/if}{if $u.empfanger_art==3}Vermieter{/if}</td>
	<td>{if $u.status==$smarty.const.STATUS_ACTIVE_AGB}<a href='index.php?task=userliste&amp;act=lock&amp;id={$u.id}{if $smarty.get.page}&amp;page={$smarty.get.page}{/if}'>Sperren</a>{/if}
	{if $u.status==$smarty.const.STATUS_DISABLED}<a href='index.php?task=userliste&amp;act=unlock&amp;id={$u.id}{if $smarty.get.page}&amp;page={$smarty.get.page}{/if}'><font color="red">Entsperren</font></a>{/if}</td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td align="right">Letzte Anmeldung</td>
	<td>{if $smarty.session.user.letzte_anmeldung<$u.letzte_anmeldung}<font color="red">{$u.letzte_anmeldung|date_format:"%d.%m.%Y %H:%M"}</font>{else}{$u.letzte_anmeldung|date_format:"%d.%m.%Y %H:%M"}{/if}</td>
	<td></td><!-- && $u.status!=$smarty.const.STATUS_ADMIN  -->
</tr>
<tr>
	<td></td>
	<td></td>
	<td align="right">Reg.Datum</td>
	<td>{$u.registrationsdatum|date_format:"%d.%m.%Y"}</td>
	<td></td>
</tr>
{if $logsArray[$u.id]}
<tr>
	<td><input type="submit" name="log_entfernen" value="Entfernen"/></td>
</tr>
<tr>
	<td><input type="checkbox" name="all_mitglieder_log_select" value="" onclick="enable_mitglieder_checkbox()"/>- Alle ausw&auml;hlen</td>
</tr>
{/if}
<tr>
	<td colspan="5">

		{include file="`$smarty.const.SMARTY_TEMPLATE_DIR`log.tpl"}

	</td>
</tr>
<tr>
	<td colspan="5"><hr /></td>
</tr>
{foreachelse}<tr><td>Keine Mitglieder vorhanden.</td></tr>
{/foreach}
</table>
</div>

</form>
<br/><br/>
{include file="`$smarty.const.SMARTY_TEMPLATE_DIR`seiten_incl.tpl"}