<div style="position:relative;top:100px;">
<form action="{$smarty.server.REQUEST_URI}"  method="post">
    <table border="0" cellpadding="5" class="contenttable">
    {if strlen($msg)}
	<tr>
		<td colspan="3" class="fehlermeldung">{$msg}</td>
	</tr>
	{/if}
    <tr>
        <td width="100"><label for="email">E-Mail:</label></td>
        <td width="100"><input name="email" id="email" type="text" size="35" style="width: 250px;" /></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><label for="passwort">Passwort:</label></td>
        <td><input name="passwort" id="passwort" type="password" size="35" style="width: 250px;" /></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
            <input type="submit" name="login" value="Login" />
            <span style="float: right; display: block;">
                <a href="../derAdvokat/index.php?task=new_pass">Passwort vergessen</a>
            </span>
        </td>
        <td>&nbsp;</td>
    </tr>
    </table>
</form>
</div>