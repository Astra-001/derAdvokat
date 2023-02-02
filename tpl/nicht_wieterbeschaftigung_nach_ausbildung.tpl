<script language="JavaScript" src="/derAdvokat/js/wz_tooltip.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_followscroll.js" type="text/javascript"></script>
<script language="JavaScript" src="/derAdvokat/js/tip_centerwindow.js" type="text/javascript"></script>
<form action="{$smarty.server.REQUEST_URI}"  method="post">

    <h1>Nichtweiterbeschäftigung nach der Ausbildung</h1>
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
	        <td width="170">Anrede</td>
	        <td width="57">
                <select name="geschlecht">
                    <option value="1" {if $smarty.post.geschlecht == 1}{elseif $user.geschlecht==1} selected="selected"{/if}>Herr</option>
                    <option value="2" {if $smarty.post.geschlecht == 2}{elseif $user.geschlecht==2} selected="selected"{/if}>Frau</option>
                </select>
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
	        <td>Vorname*</td>
	        <td colspan="4"><input type="text" name="vorname" {if strlen($msg_vorname)}class="error"{/if} value="{if isset($smarty.post.vorname)}{$smarty.post.vorname}{elseif isset($user.vorname)}{$user.vorname}{/if}" size="44" /></td>
        </tr>
        <tr>
	        <td>Nachname*</td>
	        <td colspan="4"><input type="text" name="name" {if strlen($msg_name)}class="error"{/if} value="{if isset($smarty.post.name)}{$smarty.post.name}{elseif isset($user.name)}{$user.name}{/if}" size="44" /></td>
        </tr>
        <tr>
	        <td>Stra&szlig;e und Hausnummer*</td>
	        <td colspan="4"><input type="text" name="strasse"  value="{if isset($smarty.post.strasse)}{$smarty.post.strasse}{elseif isset($strasse)}{$strasse}{/if}" size="44" /></td>
        </tr>
        <tr>
	        <td>Postleitzahl*</td>
	        <td width="57"><input type="text" name="plz" value="{if isset($smarty.post.plz)}{$smarty.post.plz}{elseif isset($plz)}{$plz}{/if}" size="5" maxlength="5" /></td>
	        <td width="57" align="right">Ort*</td>
	        <td><input type="text" name="ort" value="{if isset($smarty.post.ort)}{$smarty.post.ort}{elseif isset($ort)}{$ort}{/if}" /></td>
        </tr>
    </table>
    <h3>Allgemeine Angaben</h3>
    <table border="0" width="100%" cellpadding="5" class="contenttable">
        <tr>
	        <td width="170">Datum der Abschlussprüfung</td>
	        <td width="150"><input type="text" name="abschluss_prufung" {if isset($smarty.post.abschluss_prufung)}value="{if isset($smarty.post.abschluss_prufung)}{$smarty.post.abschluss_prufung}{elseif isset($abschluss_prufung)}{$abschluss_prufung}{/if}"{else}value="TT.MM.JJJJ" onfocus="this.value = ''"{/if} /></td>
          	<td></td>
        </tr>
    </table>
    <br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="nicht_wieterbeschaftigung_nach_ausbildung" value="Ausgabe" /></td>
</tr>
</table>
    <br /><br />
 
</form>