<form action="{$smarty.server.REQUEST_URI}"  method="post">
    <table border="0" width="400" cellpadding="5"  class="contenttable">
	{if strlen($msg_erfolg)}
	<tr>
		<td colspan="3" class="erfolgsmeldung">{$msg_erfolg}</td>
	</tr>
	{/if}
    {if strlen($msg_fehler)}
	<tr>
		<td colspan="3" class="fehlermeldung">{$msg_fehler}</td>
	</tr>
	{/if}
	<tr>
		<td colspan="2">Bitte schreiben Sie uns Ihr E-Mail, unter welchen Sie bei uns angemeldet waren.
Nach dem Sie abgesendet haben, erhalten Sie ein E-Mail von uns,
mit Zugangscode auf die eingegebene E-Mail Adresse.</td>
	</tr>
    <tr>
        <td align="right"><label for="email">E-Mail:</label></td>
        <td><input name="email" id="email" type="text" size="35" /></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="new_pass" value="Passwort zusenden" /></td>
    </tr>
    </table>
</form>