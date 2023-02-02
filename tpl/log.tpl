{if $logsArray[$u.id][0].uid==$u.id}
<!-- MITGLIEDERBEZOGENE MONITORING -->
	<div id="user_container">
	<div style="height:auto;max-height:200px;overflow-y:scroll;">

		{foreach from=$logsArray[$u.id] item=l name=logsArray}

		<table border="0" width="100%" cellpadding="5" class="contenttable" style="margin-bottom:10px;" onmouseover="set_visible_del({$l.id});" onmouseout="set_unvisible_del({$l.id});">
		<tr>
			<td colspan="4" bgcolor="#0a264e">{include file="`$smarty.const.SMARTY_TEMPLATE_DIR`log_module.tpl"}</td>
		</tr>
		<tr height="30">
		<td width="30"><input type="checkbox" name="log_mitglieder[]" value="{$l.id}"/></td>
			<td>

			{$l.useragent}

			</td>
			<td width="110">{if $smarty.session.user.letzte_anmeldung<=$l.timestamp}<font color="red">{$l.timestamp|date_format:"%d.%m.%Y %H:%M"}</font>{else}{$l.timestamp|date_format:"%d.%m.%Y %H:%M"}{/if}</td>
			<td width="20"><div id="del_button_{$l.id}"  style="display:none;visibility:hidden;"><a href="index.php?task=userliste&amp;execute=delete&amp;id={$l.id}{if $smarty.get.page}&amp;page={$smarty.get.page}{/if}"><img src="/derAdvokat/grafik/del_button.png" alt="Delete" border="no"/></a></div></td>
		</tr>
		</table>
		{/foreach}

	</div>
	</div>

{/if}