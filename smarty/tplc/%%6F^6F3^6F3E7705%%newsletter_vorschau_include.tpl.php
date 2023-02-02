<?php /* Smarty version 2.6.18, created on 2019-02-08 16:01:31
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/newsletter_vorschau_include.tpl */ ?>
<?php $_from = $this->_tpl_vars['newsletter_vorschau']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['newsletter_vorschau'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['newsletter_vorschau']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nv']):
        $this->_foreach['newsletter_vorschau']['iteration']++;
?>
<input type="hidden" name="nl_id" value="<?php echo $this->_tpl_vars['nv']['id']; ?>
"/>
<table border="0">
<tr>
	<td width="100%" align="right"> 
	<?php if ($this->_tpl_vars['nv']['logo_typ'] == 1): ?><img src="/derAdvokat/grafik/logo_typ_deradvokat.png" alt="derAdvokat"/><?php endif; ?>
	<?php if ($this->_tpl_vars['nv']['logo_typ'] == 2): ?><img src="/derAdvokat/grafik/logo_typ_kanzlei_strauch.png" alt="Kanzlei Strauch"/><?php endif; ?>
	<?php if ($this->_tpl_vars['nv']['logo_typ'] == 3): ?><img src="/derAdvokat/grafik/logo_typ_icada.png" alt="Kanzlei Strauch"/><?php endif; ?></td>
</tr>
<?php if ($this->_tpl_vars['nv']['logo_typ'] == 2): ?>
<tr>
	<td height="10"></td>
</tr>	
<tr>
	<td bgcolor="#0A264E" height="5"></td>
</tr>
<tr>
	<td height="10"></td>
</tr>
<?php endif; ?>	
<tr>
	<td><b><font color="#993300" size="4"><?php echo $this->_tpl_vars['nv']['titel']; ?>
</font></b></td>
</tr>
<tr>
	<td><?php if (strlen ( $this->_tpl_vars['nv']['bild_name'] )): ?>
		<div id="content_bild">
        <img src="/derAdvokat/newsletter_bilder/main_<?php echo $this->_tpl_vars['nv']['bild_name']; ?>
" alt="Bild" />
    </div><?php endif; ?><?php echo $this->_tpl_vars['nv']['content']; ?>

    </td>
</tr>
<tr>
	<td></td>
</tr>
<?php if ($this->_tpl_vars['newsletter_artikeln_id'] == true): ?>
<tr>
	<td bgcolor="#0A264E"><font color="white"><b>Diese<?php if ($this->_tpl_vars['anz_artikeln'] == 1): ?>r<?php endif; ?> Artikel k&ouml;nnte<?php if ($this->_tpl_vars['anz_artikeln'] >= 2): ?>n<?php endif; ?> Sie auch interessieren:</b></font></td>
</tr>
<?php endif; ?>
	<?php $_from = $this->_tpl_vars['newsletter_artikeln_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['newsletter_artikeln_id'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['newsletter_artikeln_id']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['na']):
        $this->_foreach['newsletter_artikeln_id']['iteration']++;
?>
	<tr>
		<td height="25">
		<a href="/derAdvokat/artikelview/<?php echo $this->_tpl_vars['na']['artikel_id']; ?>
" target="_blank"><b><font color="#0A264E"><?php echo $this->_tpl_vars['newsletter_artikeln'][$this->_tpl_vars['na']['artikel_id']]; ?>
</font></b></a><br/>
		</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['nv']['logo_typ'] == 1): ?>	
<tr>
	<td bgcolor="#0A264E" height="14"><a href="http://www.deradvokat.de/derAdvokat/login" target="_blank"><font color="white"><b>Zum Premiumbereich</b></font></a></td>
</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['nv']['logo_typ'] == 2): ?>	
<tr>
	<td height="10"></td>
</tr>
<tr>
	<td bgcolor="#0A264E" height="5"></td>
</tr>
<tr>
	<td height="10"></td>
</tr>
<?php endif; ?>

<tr>
	<td><br/>Mit freundlichen Gr&uuml;&szlig;en<br/><?php if ($this->_tpl_vars['nv']['logo_typ'] != 3): ?><img src="/derAdvokat/grafik/unterschrift.jpg" alt="Unterschrift" /><br/> Yves Strauch<br/>Rechtsanwalt<?php endif; ?></td>
</tr>

<?php if ($this->_tpl_vars['nv']['logo_typ'] == 2): ?>	
<tr>
	<td height="10"></td>
</tr>
<tr>
	<td><hr></td>
</tr>
<tr>
	<td height="10"></td>
</tr>
<?php endif; ?>

<tr>
	<td>
	<table border="0">
	<tr><td width="5" bgcolor="#0A264E"></td>
		<td width="300"><b>Wir sind f&uuml;r Sie da</b><br/><br/>Haben Sie Fragen?<br/>Dann rufen Sie uns an:<br/><?php if ($this->_tpl_vars['nv']['logo_typ'] != 3): ?> 0211 / 466193<?php else: ?> 0211 / 15947928 <?php endif; ?><br/><br/>Mo.-Fr. 09-16 Uhr</td>
		<td width="5" bgcolor="#0A264E"></td>
		<td style="vertical-align:top;"><b>Anschrift</b><br/><br/><?php if ($this->_tpl_vars['nv']['logo_typ'] != 3): ?>Kanzlei Strauch<br/>Schwerinstraße 49<br/>40476 Düsseldorf<?php else: ?>ICADA e.V. <br/>vertreten durch den Geschäftsführer Dr. R. Brunke<br/>Rosenstr. 34<br/>40479 Düsseldorf<?php endif; ?></td>
	</tr>
	<tr>
		<td height="30" colspan="4"></td>		
	</tr>
	<tr>
		<td width="5" bgcolor="#0A264E"></td>
		<td><b>Sie m&ouml;chten keine weiteren Informationen<br/> per E-Mail erhalten?</b><br/><br/>
		Dann senden Sie eine E-Mail an:<br/><br/>
		<?php if ($this->_tpl_vars['nv']['logo_typ'] == 1 && $this->_tpl_vars['nv']['logo_typ'] == 2): ?><a href="mailto:<?php echo @EMAIL; ?>
?subject=Newsletter Abmeldung"><?php echo @EMAIL; ?>
</a><?php else: ?><a href="mailto:'mail@icada.eu'?subject=Newsletter Abmeldung">mail@icada.eu<?php endif; ?></td>
		<td width="5" <?php if ($this->_tpl_vars['nv']['logo_typ'] != 3): ?> bgcolor="#0A264E"><?php endif; ?></td>
		<td style="vertical-align:top;"><?php if ($this->_tpl_vars['nv']['logo_typ'] == 1): ?><b>Sie ben&ouml;tigen neue Zugangsdaten?</b><br/><br/>Bitte klicken sie <a href="mailto:<?php echo $this->_tpl_vars['mail']; ?>
?subject=Neue Zugangsdaten">hier</a><br/><br/><?php endif; ?>
		<?php if ($this->_tpl_vars['nv']['logo_typ'] == 2): ?>Besuchen Sie unser Rechtsportal<br/><br/><a href="http://www.deradvokat.de/deradvokat/">www.derAdvokat.de</a><br/><br/><?php endif; ?></td>
	</tr>	
	</table></td>
</tr>
<tr>
	<td><hr/></td>
</tr>
<tr>
	<td align="center">
	<table border="0">
	<tr><td><?php if ($this->_tpl_vars['nv']['logo_typ'] != 3): ?><a href="http://www.deradvokat.de/derAdvokat/impressum" target="_blank">Impressum</a> |<?php else: ?><a href="http://http://www.icada.eu/impressum.html" target="_blank">Impressum</a> |<?php endif; ?>
        <?php if ($this->_tpl_vars['nv']['logo_typ'] != 3): ?><a href="http://www.deradvokat.de/derAdvokat/kontakt" target="_blank">Kontakt</a> |<?php else: ?><a href="http://www.icada.eu/component/option,com_dfcontact/Itemid,100/" target="_blank">Kontakt</a> |<?php endif; ?>
        <?php if ($this->_tpl_vars['nv']['logo_typ'] != 3): ?><a href="http://www.deradvokat.de/derAdvokat/agb" target="_blank">AGB</a> |<?php endif; ?></td>
	</tr>
	</table></td>
</tr>
			
</table>	
<?php endforeach; endif; unset($_from); ?>