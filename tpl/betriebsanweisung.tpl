<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>
<form action="{$smarty.server.REQUEST_URI}"  method="post">

    <h1>Betriebsanweisung zur Ladegut- und Fahrzeugsicherung</h1>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
        {if strlen($error)}
        <tr>
	        <td colspan="5" class="fehlermeldung">{$error}</td>
        </tr>
        {/if}
        {if strlen($erfolg)}
        <tr>
	        <td colspan="5" class="erfolgsmeldung">{$erfolg}</td>
        </tr>
        {/if}
        <tr>
	        <td>Firma*</td>
	        <td colspan="4"><input type="text" name="firma_name" {if strlen($msg_firma_name)}class="error"{/if} value="{if isset($smarty.post.firma_name)}{$smarty.post.firma_name}{elseif isset($user)}{$user}{/if}" size="44" /></td>
        </tr>        
    </table>
    <br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="betriebsanweisung" value="Ausgabe" /></td>
</tr>
</table>
    <br /><br />
 
</form>