<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
﻿<h1>Neuen Benutzer anlegen</h1>
<table border="0" width="100%">
<tr>
	<td>
<form name="registration" action="{$smarty.server.REQUEST_URI}"  method="post">
<table border="0" cellpadding="5" class="contenttable" width="100%">
{if strlen($error)}
<tr>
	<td colspan="4" class="fehlermeldung">{$error}</td>
</tr>
{/if}
{if strlen($erfolg)}
<tr>
	<td colspan="4" class="erfolgsmeldung">{$erfolg}</td>
</tr>
{/if}
<tr>
	<td colspan="4" height="30" bgcolor="#9FC6FF"><b>Zu Person</b></td>
</tr>
<tr>
	<td>Anrede</td>
	<td colspan="3"><select name="geschlecht" onchange="check_registration()">
        <option value="1" {if $smarty.post.geschlecht == 1} selected="selected"{/if} {if $user.geschlecht == 1} selected="selected"{/if}>Herr</option>
        <option value="2" {if $smarty.post.geschlecht == 2} selected="selected"{/if} {if $user.geschlecht == 2} selected="selected"{/if}>Frau</option>
        <option value="3" {if $smarty.post.geschlecht == 3} selected="selected"{/if} {if $user.geschlecht == 3} selected="selected"{/if}>Firma</option>
    </select></td>
</tr>
<tr>
	<td>Titel</td>
	<td colspan="3"><input type="text" name="titel"  value="{if isset($smarty.post.titel)}{$smarty.post.titel}{elseif isset($user.titel)}{$user.titel}{/if}" size="50" /></td>
</tr>
<tr>
	<td>Vorname</td>
	<td colspan="3"><input type="text" name="vorname" {if strlen($msg_vorname)}class="error"{/if} value="{if isset($smarty.post.vorname)}{$smarty.post.vorname}{elseif isset($user.vorname)}{$user.vorname}{/if}" size="50" /></td>
</tr>
<tr>
	<td>Nachname</td>
	<td colspan="3"><input type="text" name="name" {if strlen($msg_name)}class="error"{/if} value="{if isset($smarty.post.name)}{$smarty.post.name}{elseif isset($user.name)}{$user.name}{/if}" size="50" /></td>
</tr>
<tr>
	<td>Empf&auml;ngerart<br/>(legen Sie fest... Als Empf&auml;nger,<br/> zu welcher Gruppe geh&ouml;rt diese Person?)</td>
	<td colspan="3"><select name="empf_art"">
        <option value="1" {if $smarty.get.act == edit AND $user.empfanger_art==1} selected="selected" {/if}>Sonstige</option>
        <option value="2" {if $smarty.get.act == edit AND $user.empfanger_art==2} selected="selected" {/if}>Kosmetikhersteller</option>
        <option value="3" {if $smarty.get.act == edit AND $user.empfanger_art==3} selected="selected" {/if}>Vermieter</option>
    </select></td>
</tr>
<tr>
	<td colspan="4" height="30" bgcolor="#9FC6FF"><b>Firmen Daten</b></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="firma_name" value="{if isset($smarty.post.firma_name)}{$smarty.post.firma_name}{elseif isset($user.firma_name)}{$user.firma_name}{/if}" size="50" /></td>
</tr>
<tr>
	<td>ggf. vertretten durch</td>
	<td colspan="3"><input type="text" name="vertreter" value="{if isset($smarty.post.vertreter)}{$smarty.post.vertreter}{elseif isset($user.vertreter)}{$user.vertreter}{/if}" size="50" /></td>
</tr>
<tr>
	<td colspan="4" align="center" height="30"><b>Kontakt Daten</b></td>
</tr>
<tr>
	<td>Email</td>
	<td colspan="3"><input type="text" name="email" {if strlen($msg_mail)}class="error"{/if} value="{if isset($smarty.post.email)}{$smarty.post.email}{elseif isset($user.email)}{$user.email}{/if}" size="50" /></td>
</tr>
<tr>
	<td>Telefon</td>
	<td colspan="3"><input type="text" name="tel" value="{if isset($smarty.post.tel)}{$smarty.post.tel}{elseif isset($user.tel)}{$user.tel}{/if}" size="50" /></td>
</tr>
<tr>
	<td>Fax</td>
	<td colspan="3"><input type="text" name="fax" value="{if isset($smarty.post.fax)}{$smarty.post.fax}{elseif isset($user.fax)}{$user.fax}{/if}" size="50" /></td>
</tr>
<tr>
	<td colspan="4" height="30" bgcolor="#9FC6FF"><b>Anschrift</b></td>
</tr>
<tr>
	<td>Stra&szlig;e</td>
	<td colspan="3"><input type="text" name="strasse"  value="{if isset($smarty.post.strasse)}{$smarty.post.strasse}{elseif isset($user.strasse)}{$user.strasse}{/if}" size="50" /></td>
</tr>
<tr>
	<td>Postleitzahl</td>
	<td><input type="text" name="plz"  value="{if isset($smarty.post.plz)}{$smarty.post.plz}{elseif isset($user.plz)}{$user.plz}{/if}" size="7" /></td>
	<td>Ort</td>
	<td><input type="text" name="ort"  value="{if isset($smarty.post.ort)}{$smarty.post.ort}{elseif isset($user.ort)}{$user.ort}{/if}" size="27" /></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="sent" value="Speichern" /></td>
</tr>
</table>
</form></td></tr>
</table>
<script type="text/javascript">
    /* <![CDATA[ */
check_registration();
    /* ]]> */
    </script>