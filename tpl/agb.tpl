<h1>AGB f&uuml;r das Rechtsportal &bdquo;derAdvokat&ldquo; Premium/Login Bereich</h1>
{if $smarty.session.user.status == $smarty.const.STATUS_ACTIVE}
<form action="{$smarty.server.REQUEST_URI}"  method="post">

<table border="0" cellpadding="5" class="contenttable">
<tr>
	<td>{include file="`$smarty.const.SMARTY_TEMPLATE_DIR`agb_text.tpl"}</td>
</tr>
<tr>
	<td><input type="submit" name="agb_sent" value="Akzeptieren" /><input type="submit" name="agb_ablehnung" value="Ablehnen" /></td>
</tr>
</table>

</form>
{else}
<table border="0" cellpadding="5" class="contenttable">
<tr>
	<td>{include file="`$smarty.const.SMARTY_TEMPLATE_DIR`agb_text.tpl"}</td>
</tr>
</table>
{/if}