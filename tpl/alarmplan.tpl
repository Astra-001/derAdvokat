<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>
<form action="{$smarty.server.REQUEST_URI}"  method="post">

{if $show_tab}
    <h1>Angaben zum Standort des jeweiligen Alarmplans</h1>
    <input type="hidden" name="name_ersthelfer" value="{$smarty.post.name_ersthelfer}" size="44" />
    <input type="hidden" name="artz" value="{$smarty.post.artz}" size="44" />
    <input type="hidden" name="tel_artz" value="{$smarty.post.tel_artz}" size="44" />
    <input type="hidden" name="krankenhaus" value="{$smarty.post.krankenhaus}" size="44" />
    <input type="hidden" name="tel_krankenhaus" value="{$smarty.post.tel_krankenhaus}" size="44" />
    <input type="hidden" name="sicherheits_beauftragter" value="{$smarty.post.sicherheits_beauftragter}" size="44" />

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
	        <td>8.	Standort f&uuml;r den der Alarmplan gilt:*</td>
	        <td colspan="4"><input type="text" name="standort_alarmplan" {if strlen($msg_standort_alarmplan)}class="error"{/if} value="{if isset($smarty.post.standort_alarmplan)}{$smarty.post.standort_alarmplan}{/if}" size="44" /></td>
        </tr>
        <tr>
	        <td>9.	Ort des n&auml;chsten Feuerl&ouml;schers von hier:*</td>
	        <td colspan="4"><input type="text" name="ort_feuerloescher" {if strlen($msg_ort_feuerloescher)}class="error"{/if} value="{if isset($smarty.post.ort_feuerloescher)}{$smarty.post.ort_feuerloescher}{/if}" size="44" /></td>
        </tr>
        <tr>
	        <td>10.	Ort des nächsten Verbandskasten von hier:*</td>
	        <td colspan="4"><input type="text" name="verbandskasten" {if strlen($msg_verbandskasten)}class="error"{/if} value="{if isset($smarty.post.verbandskasten)}{$smarty.post.verbandskasten}{/if}" size="44" /></td>
        </tr>
       <tr>
	        <td>11.	Sammelplatz au&szlig;erhalb des Geb&auml;udes im Brandfall:*</td>
	        <td colspan="4"><input type="text" name="sammelplatz" {if strlen($msg_sammelplatz)}class="error"{/if} value="{if isset($smarty.post.sammelplatz)}{$smarty.post.sammelplatz}{/if}" size="44" /></td>
        </tr>
</table>
    <br />
    <table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="alarmplan" value="Ausgabe" /></td>
</tr>
</table>

    <br />
{/if}

{if !$show_tab}
<h1>Allgemeinen Angaben, die f&uuml;r alle Alarmpl&auml;ne gelten, die in dem Betrieb ausgeh&auml;ngt werden.</h1>
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
	        <td>1. Firma*</td>
	        <td colspan="4"><input type="text" name="firma_name" {if strlen($msg_firma_name)}class="error"{/if} value="{if isset($smarty.post.firma_name)}{$smarty.post.firma_name}{elseif isset($user)}{$user}{/if}" size="44" /></td>
        </tr>
        <tr>
	        <td>2.	Name des/der Ersthelfer(s) – Sanit&auml;tsbeauftragte(r):*</td>
	        <td colspan="4"><input type="text" name="name_ersthelfer" {if strlen($msg_name_ersthelfer)}class="error"{/if} value="{if isset($smarty.post.name_ersthelfer)}{$smarty.post.name_ersthelfer}{/if}" size="44" />
	        </td>
        </tr>
        <tr>
	        <td>3.	N&auml;chster Arzt:*</td>
	        <td colspan="4"><input type="text" name="artz" {if strlen($msg_artz)}class="error"{/if} value="{if isset($smarty.post.artz)}{$smarty.post.artz}{/if}" size="44" />
	        </td>
        </tr>
        <tr>
	        <td>4.	Telefonnummer des n&auml;chsten Arztes:*</td>
	        <td colspan="4"><input type="text" name="tel_artz" {if strlen($msg_tel_artz)}class="error"{/if} value="{if isset($smarty.post.tel_artz)}{$smarty.post.tel_artz}{/if}" size="44" />
	        </td>
        </tr>
        <tr>
	        <td>5.	N&auml;chstes Krankenhaus:*</td>
	        <td colspan="4"><input type="text" name="krankenhaus" {if strlen($msg_krankenhaus)}class="error"{/if} value="{if isset($smarty.post.krankenhaus)}{$smarty.post.krankenhaus}{/if}" size="44" />
	        </td>
        </tr>
        <tr>
	        <td>6.	Telefonnummer des n&auml;chsten Krankenhauses:*</td>
	        <td colspan="4"><input type="text" name="tel_krankenhaus" {if strlen($msg_tel_krankenhaus)}class="error"{/if} value="{if isset($smarty.post.tel_krankenhaus)}{$smarty.post.tel_krankenhaus}{/if}" size="44" />
	        </td>
        </tr>
        <tr>
	        <td>7. Betrieblicher Sicherheitsbeauftragter:*</td>
	        <td colspan="4"><input type="text" name="sicherheits_beauftragter" {if strlen($msg_sicherheits_beauftragter)}class="error"{/if} value="{if isset($smarty.post.sicherheits_beauftragter)}{$smarty.post.sicherheits_beauftragter}{/if}" size="44" />
	        </td>
        </tr>
    </table>
    <br />

<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="alarmplan" value="Weiter" /></td>
</tr>
</table>
{/if}
    <br /><br />

</form>