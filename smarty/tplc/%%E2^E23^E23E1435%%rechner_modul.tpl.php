<?php /* Smarty version 2.6.18, created on 2014-09-19 10:16:37
         compiled from /var/customers/webs/strauchyve/derAdvokat/tpl/rechner_modul.tpl */ ?>
<h1>Rechnermodul</h1>
<div class="contenttable">
<!-- <blockquote><b>Folgende Rechner stehen Ihnen im &ouml;ffentlichen Bereich des Rechtsportals zur Verf&uuml;gung. </b></blockquote></div><br/>

<div class="contenttable">
<table border="0">
<tr>
    <td>
        <ul>
            <li style="color:white">Allgemein</li>
	            <li style="list-style: none;">
	                <ul>
	                    <li style="color:white"><a href="/derAdvokat/rechnermodul/allgemein/prozesskosten">Prozesskostenrechner</a></li>
	                </ul>
	        </li>
            <li style="color:white">Verkehrsrecht</li>
            <li style="list-style: none;">
	                <ul>
	                    <li style="color:white"><a href="/derAdvokat/rechnermodul/verkehrsrecht/geschwindigkeit">Bu&szlig;geldrechner - Geschwindigkeitsversto&szlig;</a></li>
	                    <li style="color:white"><a href="/derAdvokat/rechnermodul/verkehrsrecht/abstand">Bu&szlig;geldrechner - Abstandsversto&szlig;</a></li>
	                </ul>
	        </li>
        </ul>
    </td>
</tr>
</table>
</div>
<br/><br/> -->


<div class="contenttable">
<blockquote><b>Folgende Rechner stehen Ihnen im Premiumbereich des Rechtsportals zur Verf&uuml;gung.</b></blockquote></div><br/>

<div class="contenttable">
<table border="0">
<tr>
    <td>
        <ul>
            <li style="color:white">Arbeitsrecht</li>
            <li style="list-style: none;">
	                <ul>
	                    <li style="color:white"><?php if ($_SESSION['user']): ?><a href="/derAdvokat/rechnermodul/arbeitsrecht/arb_geb_kund"><?php endif; ?>K&uuml;ndigungsfristenrechner - Arbeitgeberk&uuml;ndigung</a></li>
	                    <li style="color:white"><?php if ($_SESSION['user']): ?><a href="/derAdvokat/rechnermodul/arbeitsrecht/mutterschutz"><?php endif; ?>Mutterschutzurlaubsrechner</a></li>
	                </ul>
	        </li>
            <li style="color:white">Mietrecht</li>
            <li style="list-style: none;">
	                <ul>
	                    <li style="color:white"><?php if ($_SESSION['user']): ?><a href="/derAdvokat/rechnermodul/mietrecht/vermieter_kund"><?php endif; ?>K&uuml;ndigungsfristenrechner - Vermieterk&uuml;ndigung</a></li>
	                </ul>
	        </li>
        </ul>
    </td>
</tr>
</table>
</div>