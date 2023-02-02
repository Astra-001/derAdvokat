<script type="text/javascript" src="/derAdvokat/js/dyn_felder.js"></script>
<h1>Lohnherstellungsvertrag</h1>

<form name="lohnherstellungsvertrag" action="{$smarty.server.REQUEST_URI}"  method="post">

<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Ihre Daten</b></font></td>
</tr>
{if strlen($msg_eigene_daten)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_eigene_daten}</td>
</tr>
{/if}
<tr>
	<td width="170">Anrede</td>
	<td width="60"><select name="geschlecht" onchange="eigene_daten_eing_form_check()">
        <option value="1" {if $smarty.post.geschlecht == 1} selected="selected" {/if}>Herr</option>
        <option value="2" {if $smarty.post.geschlecht == 2} selected="selected" {/if}>Frau</option>
        <option value="3" {if $smarty.post.geschlecht == 3} selected="selected" {/if}>Firma</option>
    </select></td>
    <td align="right" width="57">ggf. Titel</td>
	<td colspan="3"><input type="text" name="titel" value="{if $titel}{$titel}{else}{$smarty.post.titel}{/if}" /></td>
</tr>
<tr>
	<td>Nachname*</td>
	<td colspan="3"><input type="text" name="name" value="{$name}" size="44" /></td>
</tr>
<tr>
	<td>Vorname <br />(bei nat&uuml;rlicher Person)</td>
	<td colspan="3"><input type="text" name="vorname" value="{$vorname}" size="44" /></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="firma_name" value="{$firma_name}" size="44" /></td>
</tr>
<tr>
	<td>ggf. vertreten durch</td>
	<td colspan="3"><input type="text" name="vertreter" value="{if $vertreter}{$vertreter}{else}{$smarty.post.vertreter}{/if}" size="44" /></td>
</tr>
<tr>
	<td>Stra&szlig;e und Hausnummer*</td>
	<td colspan="3"><input type="text" name="strasse"  value="{$strasse}" size="44" /></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td width="57"><input type="text" name="plz"  value="{$plz}" size="5"  maxlength="5" /></td>
	<td align="right">Ort*</td>
	<td><input type="text" name="ort"  value="{$ort}" /></td>
</tr>
</table>
<br />
<table border="0" cellpadding="5" class="contenttable" width="100%">
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Daten des Vertragspartners</b></font></td>
</tr>
{if strlen($msg_vertragspartner)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_vertragspartner}</td>
</tr>
{/if}
<tr>
	<td width="170">Wer ist der Vertragspartner?</td>
	<td><input type="radio" name="person" value="1" {if $smarty.post.person == 1} checked="checked" {/if} /><br/>Auftraggeber</td>
	<td colspan="2"><input type="radio" name="person" value="2" {if $smarty.post.person == 2} checked="checked" {/if} /><br/>Auftragnehmer</td>
</tr>
<tr>
	<td>Anrede*</td>
	<td colspan="1" width="55"><select name="ex_anrede" onchange="eigene_daten_eing_form_check()">
        <option value="1" {if $smarty.post.ex_anrede == 1} selected="selected"{/if}>Herr</option>
        <option value="2" {if $smarty.post.ex_anrede == 2} selected="selected"{/if}>Frau</option>
        <option value="3" {if $smarty.post.ex_anrede == 3} selected="selected"{/if}>Firma</option>
    </select></td>
    <td align="right" width="57">ggf. Titel</td>
    <td><input type="text" name="ex_titel" value="{if isset($smarty.post.ex_titel)}{$smarty.post.ex_titel}{/if}" /></td>
</tr>
<tr>
	<td>Nachname*</td>
	<td colspan="3"><input type="text" name="ex_name" {if strlen($msg_name)}class="error"{/if} value="{if isset($smarty.post.ex_name)}{$smarty.post.ex_name}{/if}" size="44" /></td>
</tr>
<tr>
	<td>Vorname*</td>
	<td colspan="3"><input type="text" name="ex_vorname" {if strlen($msg_vorname)}class="error"{/if} value="{if isset($smarty.post.ex_vorname)}{$smarty.post.ex_vorname}{/if}" size="44" /></td>
</tr>
<tr>
	<td>ggf. vertreten durch</td>
	<td colspan="3"><input type="text" name="ex_vertreter" {if strlen($msg_vertreter)}class="error"{/if} value="{if isset($smarty.post.ex_vertreter)}{$smarty.post.ex_vertreter}{/if}" size="44" /></td>
</tr>
<tr>
	<td>Firmenname</td>
	<td colspan="3"><input type="text" name="ex_firmen_name" {if strlen($msg_firmen_name)}class="error"{/if} value="{if isset($smarty.post.ex_firmen_name)}{$smarty.post.ex_firmen_name}{/if}" size="44" /></td>
</tr>
<tr>
	<td>Stra&szlig;e und Hausnummer*</td>
	<td colspan="3"><input type="text" name="ex_strasse" {if strlen($msg_strasse)}class="error"{/if} value="{if isset($smarty.post.ex_strasse)}{$smarty.post.ex_strasse}{/if}" size="44" /></td>
</tr>
<tr>
	<td>Postleitzahl*</td>
	<td width="57"><input type="text" name="ex_plz" {if strlen($msg_plz)}class="error"{/if} value="{if isset($smarty.post.ex_plz)}{$smarty.post.ex_plz}{/if}" size="5" maxlength="5" /></td>
	<td align="right">Ort*</td>
	<td><input type="text" name="ex_ort" {if strlen($msg_ort)}class="error"{/if} value="{if isset($smarty.post.ex_ort)}{$smarty.post.ex_ort}{/if}" /></td>
</tr>
</table>
<br />
<br />

<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Allgemeine Vertragsangaben</b></font></td>
</tr>
<tr>
	<td width="340">Wer entwickelt das Produkt?</td>
	<td><select name="produktentwiklungsaufnahme">
        <option value="1" {if $smarty.post.produktentwiklungsaufnahme == 1} selected="selected"{/if}>Auftraggeber</option>
        <option value="2" {if $smarty.post.produktentwiklungsaufnahme == 2} selected="selected"{/if}>Aufgragnehmer</option>
    </select></td>
</tr>
<tr>
	<td width="340">Darf der Auftragnehmer die Lohnherstellung auch durch Dritte vornehmen lassen?</td>
	<td><select name="aufgaben_durch_dritte">
        <option value="1" {if $smarty.post.aufgaben_durch_dritte == 1} selected="selected"{/if}>Ja</option>
        <option value="2" {if $smarty.post.aufgaben_durch_dritte == 2} selected="selected"{/if}>Nein</option>
    </select></td>
</tr>	
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Dokumentation</b></font></td>
</tr>
<tr>
	<td width="340">Auftragnehmer muss alle Dokumente dem Auftraggeber &uuml;bergeben</td>
	<td><input type="radio" name="dokumentation_ubergabe" value="1" {if $smarty.post.dokumentation_ubergabe != 2} checked="checked" {/if} /></td>
</tr>
<tr>
	<td width="340">Dokumente mit Betriebsgeheimnissen des Auftragnehmers sind hiervon ausgenommen</td>
	<td><input type="radio" name="dokumentation_ubergabe" value="2" {if $smarty.post.dokumentation_ubergabe == 2} checked="checked" {/if} /></td>
</tr>
<tr>
	<td width="340">Die Dokumentation zu den gesetzlich erforderlichen Produktinformationen liegt in dem Pflichtenbereich des</td>
	<td><select name="produktinformation">
        <option value="1" {if $smarty.post.produktinformation == 1} selected="selected"{/if}>Auftragnehmers</option>
        <option value="2" {if $smarty.post.produktinformation == 2} selected="selected"{/if}>Auftraggebers</option>
    </select></td>
</tr>
<tr>
	<td width="340">Die Mitteilungs- und Berichtspflichten an die zust&auml;ndigen Beh&ouml;rden sind von dem</td>
	<td><select name="behordenpflicht">
        <option value="1" {if $smarty.post.behordenpflicht == 1} selected="selected"{/if}>Auftragnehmer</option>
        <option value="2" {if $smarty.post.behordenpflicht == 2} selected="selected"{/if}>Auftraggeber</option>
    </select> wahrzunehmen.</td>
</tr>
<tr>
	<td width="340">Das Mindesthaltbarkeitsdatum des Produktes wird vom</td>
	<td><select name="produkthaltbarkeit">
        <option value="1" {if $smarty.post.produkthaltbarkeit == 1} selected="selected"{/if}>Auftragnehmer</option>
        <option value="2" {if $smarty.post.produkthaltbarkeit == 2} selected="selected"{/if}>Auftraggeber</option>
    </select> vorgegeben.</td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Einkauf der zu verwendenden Stoffe</b></font></td>
</tr>
{if strlen($msg_rohstoffe_einkauf)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_rohstoffe_einkauf}</td>
</tr>
{/if}
<tr>
	<td width="340">Auftraggeber stellt die Rohstoffe (oder beauftragt Dritte, die dann bei Auftragnehmer anliefern)</td>
	<td><input type="radio" name="rohstoffe_einkauf" value="1" {if $smarty.post.rohstoffe_einkauf == 1} checked="checked" {/if} /></td>
</tr>
<tr>
	<td width="340">Auftragnehmer stellt alle Rohstoffe (bzw. ordert diese bei Dritten)</td>
	<td><input type="radio" name="rohstoffe_einkauf" value="2" {if $smarty.post.rohstoffe_einkauf == 2} checked="checked" {/if} /></td>
</tr>
<tr>
	<td width="340">Auftragnehmer und Auftraggeber stellen jeweils einen Teil der Rohstoffe</td>
	<td><input type="radio" name="rohstoffe_einkauf" value="3" {if $smarty.post.rohstoffe_einkauf == 3} checked="checked" {/if} /></td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Verpackung / Bef&uuml;llung</b></font></td>
</tr>
{if strlen($msg_verpackung)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_verpackung}</td>
</tr>
{/if}
<tr>
	<td width="340">Verpackung ist Sache des Auftraggebers</td>
	<td><input type="radio" name="verpackung" value="1" {if $smarty.post.verpackung == 1} checked="checked" {/if}  onclick="check_verpackung()"/></td>
</tr>
<tr>
	<td width="340">Auftragnehmer nimmt (ggf. zum Teil) Verpackung vor</td>
	<td><input type="radio" name="verpackung" value="2" {if $smarty.post.verpackung == 2} checked="checked" {/if}  onclick="check_verpackung()"/></td>
</tr>
<tr>
	<td width="340"></td>
	<td>
	
	<table border="0" width="100%">
	<tr>
		<td bgcolor="gainsboro">Der Auftragnehmer nimmt folgende Verpackungsschritte vor: </td>
	</tr>
	<tr>
		<td><br/><br/>
		
			<input type="checkbox" name="verpackungsschritte_abfuellen" value="abfuellen" {if $smarty.post.verpackungsschritte_abfuellen==abfuellen} checked="checked" {/if} /> - Abf&uuml;llen<br/><br/>
			<input type="checkbox" name="verpackungsschritte_verschliessen" value="verschliessen" {if $smarty.post.verpackungsschritte_verschliessen==verschliessen} checked="checked" {/if} /> - Verschlie&szlig;en<br/><br/>
			<input type="checkbox" name="verpackungsschritte_etiketieren" value="etiketieren" {if $smarty.post.verpackungsschritte_etiketieren==etiketieren} checked="checked" {/if} /> - Etikettieren<br/><br/>
			<input type="checkbox" name="verpackungsschritte_kennziefern" value="kennziefern" {if $smarty.post.verpackungsschritte_kennziefern==kennziefern} checked="checked" {/if} /> - Versehen mit Kennziffern<br/><br/>

				</td>
	</tr>
	</table>
	
	</td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Lieferung / Gefahr&uuml;bergang
</b></font></td>
</tr>
{if strlen($msg_lieferung)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_lieferung}</td>
</tr>
{/if}	
<tr>
	<td width="340" class="contenttable">Auftragnehmer liefert an Firmensitz des Auftraggebers</td>
	<td class="contenttable">
	
	<table border="0" width="100%">
	<tr>
		<td style="vertical-align:top;"><input type="radio" name="lieferung" value="1" {if $smarty.post.lieferung == 1} checked="checked" {/if} onchange="check_lieferung_gefahrubergang()" /></td>
		<td> - Der Auftragnehmer tr&auml;gt das diesbez&uuml;gliche Versendungsrisiko. Sollte der Auftraggeber eine Lieferung zu einem anderen Ort w&uuml;nschen, &uuml;bernimmt der Auftraggeber das Versendungsrisiko, sofern die Parteien keine andere Vereinbarung getroffen haben.</td>
	</tr>
	<tr>
		<td style="vertical-align:top;"><input type="radio" name="lieferung" value="2" {if $smarty.post.lieferung == 2} checked="checked" {/if} onchange="check_lieferung_gefahrubergang()" /></td>
		<td> - Der Aufgragsgeber tr&auml;gt das diesbez&uuml;gliche Versendungsrisiko</td>
	</tr>
	</table>
	
	</td>	
</tr>
<tr>
	<td width="340" class="contenttable">Auftraggeber holt das Produkt ab (bzw. l&auml;sst abholen)</td>
	<td class="contenttable">
	
	<table border="0" width="100%">
	<tr>
		<td style="vertical-align:top;"><input type="radio" name="lieferung" value="3" {if $smarty.post.lieferung == 3} checked="checked" {/if} onclick="check_lieferung_gefahrubergang()" /></td>
		<td> - an einem in Deutschland befindlichen und vom Auftragnehmer benannten Ort </td>
	</tr>
	<tr>
		<td style="vertical-align:top;"><input type="radio" name="lieferung" value="4" {if $smarty.post.lieferung == 4} checked="checked" {/if} onclick="check_lieferung_gefahrubergang()" /></td>
		<td> - an dem Firmensitz des Auftragnehmers</td>
	</tr>
	<tr>
		<td style="vertical-align:top;"><input type="radio" name="lieferung" value="5" {if $smarty.post.lieferung == 5} checked="checked" {/if} onclick="check_lieferung_gefahrubergang()" /></td>
		<td> - an dem Herstellungsort des Produktes</td>
	</tr>
	</table>
	
		</td>	
</tr>
<tr>
	<td width="340" class="contenttable"></td>
	<td class="contenttable"><input type="radio" name="lieferung" value="6" onclick="check_lieferung_gefahrubergang()" /> Auswahl aufheben</td>
</tr>




	
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Haftung</b></font></td>
</tr>	
{if strlen($msg_haftung)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_haftung}</td>
</tr>
{/if}
<tr>
	<td colspan="2">Der Auftragnehmer haftet dem Auftraggeber im Falle des Verschuldens f&uuml;r</td>
</tr>
<tr>
	<td colspan="2"><br/>
	
	<input type="checkbox" name="haftung_gewinn" value="gewinn" {if $smarty.post.haftung_gewinn == gewinn} checked="checked" {/if} /> - entgangenen Gewinn<br/><br/>
	<input type="checkbox" name="haftung_ruckruf" value="ruckruf" {if $smarty.post.haftung_ruckruf == ruckruf} checked="checked" {/if} /> - Kosten von R&uuml;ckrufaktionen<br/><br/>
	<input type="checkbox" name="haftung_geldbuss" value="geldbuss" {if $smarty.post.haftung_geldbuss == geldbuss} checked="checked" {/if} /> - Geldbu&szlig;en<br/><br/>
	<input type="checkbox" name="haftung_gutachter" value="gutachter" {if $smarty.post.haftung_gutachter == gutachter} checked="checked" {/if} /> - Gutachterkosten<br/><br/>
	
	</td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Beendigung</b></font></td>
</tr>
{if strlen($msg_beendigung)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_beendigung}</td>
</tr>
{/if}
<tr>
	<td colspan="2">Die K&uuml;ndigungsfrist betr&auml;gt <input type="text" name="frist" value="{$smarty.post.frist}" maxlength = "2" size="2"/> Monate</td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Schlussbestimmungen</b></font></td>
</tr>
{if strlen($msg_anlagen)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_anlagen}</td>
</tr>
{/if}
<tr>
	<td colspan="2">folgende Anlagen sind Bestandteil des Vertrages:</td>
</tr>
<tr>
	<td colspan="2">
	<br/>
	
		<input type="checkbox" name="anlage_1" value="1" {if $smarty.post.anlage_1 == 1} checked="checked" {/if} /> - in der Anlage 1 - Produktspezifikation und die zu verwendeten Rohstoffe sowie das zu verwendende Verpackungsmaterial<br/><br/>
		<input type="checkbox" name="anlage_2" value="2" {if $smarty.post.anlage_2 == 2} checked="checked" {/if} /> - in der Anlage 2 - die Preise und ggf. Staffellisten<br/><br/>
		<input type="checkbox" name="anlage_3" value="3" {if $smarty.post.anlage_3 == 3} checked="checked" {/if} /> - in der Anlage 3 - Abgrenzung der Verantwortlichkeiten<br/><br/>
		<input type="checkbox" name="anlage_4" value="4" {if $smarty.post.anlage_4 == 4} checked="checked" {/if} /> - in der Anlage 4 - Qualit&auml;tsanforderungen sowie die Qualit&auml;tskontroll- und Pr&uuml;fma&szlig;nahmen<br/><br/>
		<input type="checkbox" name="anlage_5" value="5" {if $smarty.post.anlage_5 == 5} checked="checked" {/if} /> - in der Anlage 5 - Umgang mit Restmaterialien<br/><br/>
	
	</td>
</tr>
<tr>
	<td colspan="4" bgcolor="#9FC6FF"><font color="white"><b>Gerichtsstand</b></font></td>
</tr>
{if strlen($msg_gerichtstand)}
<tr>
	<td colspan="4" class="fehlermeldung">{$msg_gerichtstand}</td>
</tr>
{/if}
<tr>
	<td colspan="2">Als Gerichtsstand wird vereinbart der Sitz des:</td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="beklagten" {if $smarty.post.beklagten} checked="checked"{/if}/> jeweils Beklagten</td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="auftraggeber" {if $smarty.post.auftraggeber} checked="checked"{/if}/> Auftraggeber</td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="auftragnehmer" {if $smarty.post.auftragnehmer} checked="checked"{/if}/> Auftragnehmer</td>
</tr>
</table>




	
<br />
<br />
<table border="0" width="100%" cellpadding="5" class="contenttable">
<tr>
	<td align="right" style="padding:10px;"><input type="submit" name="lohnherstellungsvertrag" value="Ausgabe" /></td>
</tr>
</table>

</form>
<script type="text/javascript">
    /* <![CDATA[ */
eigene_daten_eing_form_check();
    /* ]]> */
    </script>
    
    <script type="text/javascript">
    /* <![CDATA[ */
check_lieferung_gefahrubergang();
    /* ]]> */
    </script>
    
        <script type="text/javascript">
    /* <![CDATA[ */
check_verpackung();
    /* ]]> */
    </script>

