{if strlen($fehler)}

	<table border="0" width="100%">
	<tr>
		<td width="50"><img src="/derAdvokat/grafik/error.png" alt="Fehler" /></td>
		<td>{$fehler}</td>
	</tr>
	</table>

{/if}


{if strlen($erfolg)}
<table border="0" cellspacing="0" cellpadding="0" width="997">
<tr><td align="center"  style="background-image:url('grafik/erfolgsmeldung_oben.png')" height="5"></td></tr>
<tr>
	<td align="center" style="background-image:url('grafik/erfolgsmeldung_mitte.png')" height="5">

	<table border="0" width="100%">
	<tr>
		<td width="50"><img src="/derAdvokat/grafik/done.png" alt="Erfolg" /></td>
		<td>{$erfolg}</td>
	</tr>
	</table>


		</td>
</tr>
<tr><td align="center"  style="background-image:url('grafik/erfolgsmeldung_unten.png')" height="5"></td></tr>
</table>
{/if}

{if strlen($achtung)}
<table border="0" cellspacing="0" cellpadding="0" width="997">
<tr><td align="center"  style="background-image:url('grafik/erfolgsmeldung_oben.png')" height="5"></td></tr>
<tr>
	<td align="center" style="background-image:url('grafik/erfolgsmeldung_mitte.png')" height="5">

	<table border="0" width="100%">
	<tr>
		<td width="50"><img src="/grafik/achtung.png" alt="Achtung" /></td>
		<td>{$achtung}</td>
	</tr>
	</table>


		</td>
</tr>
<tr><td align="center"  style="background-image:url('grafik/erfolgsmeldung_unten.png')" height="5"></td></tr>
</table>
{/if}