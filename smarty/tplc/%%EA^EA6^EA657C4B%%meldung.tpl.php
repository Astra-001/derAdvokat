<?php /* Smarty version 2.6.18, created on 2019-04-12 16:15:09
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/meldung.tpl */ ?>
<?php if (strlen ( $this->_tpl_vars['fehler'] )): ?>

	<table border="0" width="100%">
	<tr>
		<td width="50"><img src="/derAdvokat/grafik/error.png" alt="Fehler" /></td>
		<td><?php echo $this->_tpl_vars['fehler']; ?>
</td>
	</tr>
	</table>

<?php endif; ?>


<?php if (strlen ( $this->_tpl_vars['erfolg'] )): ?>
<table border="0" cellspacing="0" cellpadding="0" width="997">
<tr><td align="center"  style="background-image:url('grafik/erfolgsmeldung_oben.png')" height="5"></td></tr>
<tr>
	<td align="center" style="background-image:url('grafik/erfolgsmeldung_mitte.png')" height="5">

	<table border="0" width="100%">
	<tr>
		<td width="50"><img src="/derAdvokat/grafik/done.png" alt="Erfolg" /></td>
		<td><?php echo $this->_tpl_vars['erfolg']; ?>
</td>
	</tr>
	</table>


		</td>
</tr>
<tr><td align="center"  style="background-image:url('grafik/erfolgsmeldung_unten.png')" height="5"></td></tr>
</table>
<?php endif; ?>

<?php if (strlen ( $this->_tpl_vars['achtung'] )): ?>
<table border="0" cellspacing="0" cellpadding="0" width="997">
<tr><td align="center"  style="background-image:url('grafik/erfolgsmeldung_oben.png')" height="5"></td></tr>
<tr>
	<td align="center" style="background-image:url('grafik/erfolgsmeldung_mitte.png')" height="5">

	<table border="0" width="100%">
	<tr>
		<td width="50"><img src="/grafik/achtung.png" alt="Achtung" /></td>
		<td><?php echo $this->_tpl_vars['achtung']; ?>
</td>
	</tr>
	</table>


		</td>
</tr>
<tr><td align="center"  style="background-image:url('grafik/erfolgsmeldung_unten.png')" height="5"></td></tr>
</table>
<?php endif; ?>