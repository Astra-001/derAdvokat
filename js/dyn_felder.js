function eigene_daten_eing_form_check()
{
	/*lohnherstellungsvertrag->*/
	if(document.lohnherstellungsvertrag.geschlecht.value == 1 || document.lohnherstellungsvertrag.geschlecht.value == 2) {
		document.lohnherstellungsvertrag.vertreter.disabled=true;
        document.lohnherstellungsvertrag.vertreter.style.backgroundColor = "#CFCFCF";

        document.lohnherstellungsvertrag.firma_name.disabled=true;
		document.lohnherstellungsvertrag.firma_name.style.backgroundColor = "#CFCFCF";

        document.lohnherstellungsvertrag.titel.disabled=false;
		document.lohnherstellungsvertrag.titel.style.backgroundColor = "transparent";

        document.lohnherstellungsvertrag.name.disabled=false;
		document.lohnherstellungsvertrag.name.style.backgroundColor = "transparent";

        document.lohnherstellungsvertrag.vorname.disabled=false;
		document.lohnherstellungsvertrag.vorname.style.backgroundColor = "transparent";
	}
	if(document.lohnherstellungsvertrag.geschlecht.value==3) {
        document.lohnherstellungsvertrag.vertreter.disabled=false;
		document.lohnherstellungsvertrag.vertreter.style.backgroundColor = "transparent";
        document.lohnherstellungsvertrag.firma_name.disabled=false;
		document.lohnherstellungsvertrag.firma_name.style.backgroundColor = "transparent";
        document.lohnherstellungsvertrag.titel.disabled=true;
		document.lohnherstellungsvertrag.titel.style.backgroundColor = "#CFCFCF";
        document.lohnherstellungsvertrag.name.disabled=true;
		document.lohnherstellungsvertrag.name.style.backgroundColor = "#CFCFCF";
        document.lohnherstellungsvertrag.vorname.disabled=true;
		document.lohnherstellungsvertrag.vorname.style.backgroundColor = "#CFCFCF";
	}

	if(document.lohnherstellungsvertrag.ex_anrede.value == 1 || document.lohnherstellungsvertrag.ex_anrede.value == 2) {
        document.lohnherstellungsvertrag.ex_vertreter.disabled=true;
		document.lohnherstellungsvertrag.ex_vertreter.style.backgroundColor = "#CFCFCF";
        document.lohnherstellungsvertrag.ex_firmen_name.disabled=true;
		document.lohnherstellungsvertrag.ex_firmen_name.style.backgroundColor = "#CFCFCF";
        document.lohnherstellungsvertrag.ex_titel.disabled=false;
		document.lohnherstellungsvertrag.ex_titel.style.backgroundColor = "transparent";
        document.lohnherstellungsvertrag.ex_name.disabled=false;
		document.lohnherstellungsvertrag.ex_name.style.backgroundColor = "transparent";
        document.lohnherstellungsvertrag.ex_vorname.disabled=false;
		document.lohnherstellungsvertrag.ex_vorname.style.backgroundColor = "transparent";

	}
	if(document.lohnherstellungsvertrag.ex_anrede.value==3)
	{
        document.lohnherstellungsvertrag.ex_vertreter.disabled=false;
		document.lohnherstellungsvertrag.ex_vertreter.style.backgroundColor = "transparent";
        document.lohnherstellungsvertrag.ex_firmen_name.disabled=false;
		document.lohnherstellungsvertrag.ex_firmen_name.style.backgroundColor = "transparent";
        document.lohnherstellungsvertrag.ex_titel.disabled=true;
		document.lohnherstellungsvertrag.ex_titel.style.backgroundColor = "#CFCFCF";
        document.lohnherstellungsvertrag.ex_name.disabled=true;
		document.lohnherstellungsvertrag.ex_name.style.backgroundColor = "#CFCFCF";
        document.lohnherstellungsvertrag.ex_vorname.disabled=true;
		document.lohnherstellungsvertrag.ex_vorname.style.backgroundColor = "#CFCFCF";
	}
}

function check_registration()
{
	/*alert(document.registration.geschlecht.value);*/
	/*Anstellungsvertrag Allgemein und Anstellungsvertrag Aussendienst, Anstellungsvertrag Aushilfe->*/
	if(document.registration.geschlecht.value == 1 || document.registration.geschlecht.value == 2) 
	{
		document.registration.vertreter.disabled=true;
        document.registration.vertreter.style.backgroundColor = "#CFCFCF";

        document.registration.firma_name.disabled=true;
		document.registration.firma_name.style.backgroundColor = "#CFCFCF";

        document.registration.titel.disabled=false;
		document.registration.titel.style.backgroundColor = "transparent";

        document.registration.name.disabled=false;
		document.registration.name.style.backgroundColor = "transparent";

        document.registration.vorname.disabled=false;
		document.registration.vorname.style.backgroundColor = "transparent";
	}
	if(document.registration.geschlecht.value==3) {
        document.registration.vertreter.disabled=false;
		document.registration.vertreter.style.backgroundColor = "transparent";
        document.registration.firma_name.disabled=false;
		document.registration.firma_name.style.backgroundColor = "transparent";
        document.registration.titel.disabled=true;
		document.registration.titel.style.backgroundColor = "#CFCFCF";
        document.registration.name.disabled=true;
		document.registration.name.style.backgroundColor = "#CFCFCF";
        document.registration.vorname.disabled=true;
		document.registration.vorname.style.backgroundColor = "#CFCFCF";
	}
}
function check_form_dienst()/* Userdaten check*/
{
	/*Vertrag über die Nutzung eines Dienstfahrzeugs->*/
	if(document.dienstfahrzeug.geschlecht.value == 1 || document.dienstfahrzeug.geschlecht.value == 2) {
		document.dienstfahrzeug.vertreter.disabled=true;
        document.dienstfahrzeug.vertreter.style.backgroundColor = "#CFCFCF";

        document.dienstfahrzeug.firma_name.disabled=true;
		document.dienstfahrzeug.firma_name.style.backgroundColor = "#CFCFCF";

        document.dienstfahrzeug.titel.disabled=false;
		document.dienstfahrzeug.titel.style.backgroundColor = "transparent";

        document.dienstfahrzeug.name.disabled=false;
		document.dienstfahrzeug.name.style.backgroundColor = "transparent";

        document.dienstfahrzeug.vorname.disabled=false;
		document.dienstfahrzeug.vorname.style.backgroundColor = "transparent";
	}
	if(document.dienstfahrzeug.geschlecht.value==3) {
        document.dienstfahrzeug.vertreter.disabled=false;
		document.dienstfahrzeug.vertreter.style.backgroundColor = "transparent";
        document.dienstfahrzeug.firma_name.disabled=false;
		document.dienstfahrzeug.firma_name.style.backgroundColor = "transparent";
        document.dienstfahrzeug.titel.disabled=true;
		document.dienstfahrzeug.titel.style.backgroundColor = "#CFCFCF";
        document.dienstfahrzeug.name.disabled=true;
		document.dienstfahrzeug.name.style.backgroundColor = "#CFCFCF";
        document.dienstfahrzeug.vorname.disabled=true;
		document.dienstfahrzeug.vorname.style.backgroundColor = "#CFCFCF";
	}

	if(document.dienstfahrzeug.ex_anrede.value == 1 || document.dienstfahrzeug.ex_anrede.value == 2) {
        document.dienstfahrzeug.ex_vertreter.disabled=true;
		document.dienstfahrzeug.ex_vertreter.style.backgroundColor = "#CFCFCF";
        document.dienstfahrzeug.ex_firmen_name.disabled=true;
		document.dienstfahrzeug.ex_firmen_name.style.backgroundColor = "#CFCFCF";
        document.dienstfahrzeug.ex_titel.disabled=false;
		document.dienstfahrzeug.ex_titel.style.backgroundColor = "transparent";
        document.dienstfahrzeug.ex_name.disabled=false;
		document.dienstfahrzeug.ex_name.style.backgroundColor = "transparent";
        document.dienstfahrzeug.ex_vorname.disabled=false;
		document.dienstfahrzeug.ex_vorname.style.backgroundColor = "transparent";

	}
	if(document.dienstfahrzeug.ex_anrede.value==3)
	{
        document.dienstfahrzeug.ex_vertreter.disabled=false;
		document.dienstfahrzeug.ex_vertreter.style.backgroundColor = "transparent";
        document.dienstfahrzeug.ex_firmen_name.disabled=false;
		document.dienstfahrzeug.ex_firmen_name.style.backgroundColor = "transparent";
        document.dienstfahrzeug.ex_titel.disabled=true;
		document.dienstfahrzeug.ex_titel.style.backgroundColor = "#CFCFCF";
        document.dienstfahrzeug.ex_name.disabled=true;
		document.dienstfahrzeug.ex_name.style.backgroundColor = "#CFCFCF";
        document.dienstfahrzeug.ex_vorname.disabled=true;
		document.dienstfahrzeug.ex_vorname.style.backgroundColor = "#CFCFCF";
	}
}

function check_dienstfahrzeug() /*Pauschalen check*/
{
	/*alert(document.dienstfahrzeug.zuzahlung.length);*/
	for(i=0;i<document.dienstfahrzeug.zuzahlung.length;i++)
	{
		if(document.dienstfahrzeug.zuzahlung[0].checked)
		{
			document.dienstfahrzeug.km_pauschale_summe.disabled=true;
			document.dienstfahrzeug.km_pauschale_summe.style.backgroundColor = "#CFCFCF";
	        document.dienstfahrzeug.monats_pauschale_summe.disabled=true;
			document.dienstfahrzeug.monats_pauschale_summe.style.backgroundColor = "#CFCFCF";
		}
		if(document.dienstfahrzeug.zuzahlung[1].checked)
		{
			document.dienstfahrzeug.km_pauschale_summe.disabled=false;
			document.dienstfahrzeug.km_pauschale_summe.style.backgroundColor = "transparent";
	        document.dienstfahrzeug.monats_pauschale_summe.disabled=true;
			document.dienstfahrzeug.monats_pauschale_summe.style.backgroundColor = "#CFCFCF";
		}
		if(document.dienstfahrzeug.zuzahlung[2].checked)
		{
			document.dienstfahrzeug.km_pauschale_summe.disabled=true;
			document.dienstfahrzeug.km_pauschale_summe.style.backgroundColor = "#CFCFCF";
	        document.dienstfahrzeug.monats_pauschale_summe.disabled=false;
			document.dienstfahrzeug.monats_pauschale_summe.style.backgroundColor = "transparent";
		}
	}
	for(i=0;i<document.dienstfahrzeug.erlaubnis.length;i++)
	{
		if(document.dienstfahrzeug.erlaubnis[0].checked)
		{
			document.dienstfahrzeug.zuzahlung[0].disabled=true;
			document.dienstfahrzeug.zuzahlung[1].disabled=true;
			document.dienstfahrzeug.zuzahlung[2].disabled=true;
			
			document.dienstfahrzeug.km_pauschale_summe.disabled=true;
			document.dienstfahrzeug.km_pauschale_summe.style.backgroundColor = "#CFCFCF";
	        document.dienstfahrzeug.monats_pauschale_summe.disabled=true;
			document.dienstfahrzeug.monats_pauschale_summe.style.backgroundColor = "#CFCFCF";
		}
		if(document.dienstfahrzeug.erlaubnis[1].checked || document.dienstfahrzeug.erlaubnis[2].checked)
		{
			document.dienstfahrzeug.zuzahlung[0].disabled=false;
			document.dienstfahrzeug.zuzahlung[1].disabled=false;
			document.dienstfahrzeug.zuzahlung[2].disabled=false;
		}
	}
}
function check()
{
	/*Bürgschaftserklärung*/
	if(document.burg_erkl_eigen_dat.geschlecht.value == 1 || document.burg_erkl_eigen_dat.geschlecht.value == 2) {
		document.burg_erkl_eigen_dat.vertreter.disabled=true;
        document.burg_erkl_eigen_dat.vertreter.style.backgroundColor = "#CFCFCF";

        document.burg_erkl_eigen_dat.firma_name.disabled=true;
		document.burg_erkl_eigen_dat.firma_name.style.backgroundColor = "#CFCFCF";

        document.burg_erkl_eigen_dat.titel.disabled=false;
		document.burg_erkl_eigen_dat.titel.style.backgroundColor = "transparent";

        document.burg_erkl_eigen_dat.name.disabled=false;
		document.burg_erkl_eigen_dat.name.style.backgroundColor = "transparent";

        document.burg_erkl_eigen_dat.vorname.disabled=false;
		document.burg_erkl_eigen_dat.vorname.style.backgroundColor = "transparent";
	}
	if(document.burg_erkl_eigen_dat.geschlecht.value==3) {
        document.burg_erkl_eigen_dat.vertreter.disabled=false;
		document.burg_erkl_eigen_dat.vertreter.style.backgroundColor = "transparent";
        document.burg_erkl_eigen_dat.firma_name.disabled=false;
		document.burg_erkl_eigen_dat.firma_name.style.backgroundColor = "transparent";
        document.burg_erkl_eigen_dat.titel.disabled=true;
		document.burg_erkl_eigen_dat.titel.style.backgroundColor = "#CFCFCF";
        document.burg_erkl_eigen_dat.name.disabled=true;
		document.burg_erkl_eigen_dat.name.style.backgroundColor = "#CFCFCF";
        document.burg_erkl_eigen_dat.vorname.disabled=true;
		document.burg_erkl_eigen_dat.vorname.style.backgroundColor = "#CFCFCF";
	}

	if(document.burg_erkl_eigen_dat.ex_anrede.value == 1 || document.burg_erkl_eigen_dat.ex_anrede.value == 2) {
        document.burg_erkl_eigen_dat.ex_vertreter.disabled=true;
		document.burg_erkl_eigen_dat.ex_vertreter.style.backgroundColor = "#CFCFCF";
        document.burg_erkl_eigen_dat.ex_firmen_name.disabled=true;
		document.burg_erkl_eigen_dat.ex_firmen_name.style.backgroundColor = "#CFCFCF";
        document.burg_erkl_eigen_dat.ex_titel.disabled=false;
		document.burg_erkl_eigen_dat.ex_titel.style.backgroundColor = "transparent";
        document.burg_erkl_eigen_dat.ex_name.disabled=false;
		document.burg_erkl_eigen_dat.ex_name.style.backgroundColor = "transparent";
        document.burg_erkl_eigen_dat.ex_vorname.disabled=false;
		document.burg_erkl_eigen_dat.ex_vorname.style.backgroundColor = "transparent";

	}
	if(document.burg_erkl_eigen_dat.ex_anrede.value==3)
	{
        document.burg_erkl_eigen_dat.ex_vertreter.disabled=false;
		document.burg_erkl_eigen_dat.ex_vertreter.style.backgroundColor = "transparent";
        document.burg_erkl_eigen_dat.ex_firmen_name.disabled=false;
		document.burg_erkl_eigen_dat.ex_firmen_name.style.backgroundColor = "transparent";
        document.burg_erkl_eigen_dat.ex_titel.disabled=true;
		document.burg_erkl_eigen_dat.ex_titel.style.backgroundColor = "#CFCFCF";
        document.burg_erkl_eigen_dat.ex_name.disabled=true;
		document.burg_erkl_eigen_dat.ex_name.style.backgroundColor = "#CFCFCF";
        document.burg_erkl_eigen_dat.ex_vorname.disabled=true;
		document.burg_erkl_eigen_dat.ex_vorname.style.backgroundColor = "#CFCFCF";
	}
}
function check_anstellung()
{
	/*Anstellungsvertrag Allgemein und Anstellungsvertrag Aussendienst, Anstellungsvertrag Aushilfe->*/
	if(document.anstellung.geschlecht.value == 1 || document.anstellung.geschlecht.value == 2) {
		document.anstellung.vertreter.disabled=true;
        document.anstellung.vertreter.style.backgroundColor = "#CFCFCF";

        document.anstellung.firma_name.disabled=true;
		document.anstellung.firma_name.style.backgroundColor = "#CFCFCF";

        document.anstellung.titel.disabled=false;
		document.anstellung.titel.style.backgroundColor = "transparent";

        document.anstellung.name.disabled=false;
		document.anstellung.name.style.backgroundColor = "transparent";

        document.anstellung.vorname.disabled=false;
		document.anstellung.vorname.style.backgroundColor = "transparent";
	}
	if(document.anstellung.geschlecht.value==3) {
        document.anstellung.vertreter.disabled=false;
		document.anstellung.vertreter.style.backgroundColor = "transparent";
        document.anstellung.firma_name.disabled=false;
		document.anstellung.firma_name.style.backgroundColor = "transparent";
        document.anstellung.titel.disabled=true;
		document.anstellung.titel.style.backgroundColor = "#CFCFCF";
        document.anstellung.name.disabled=true;
		document.anstellung.name.style.backgroundColor = "#CFCFCF";
        document.anstellung.vorname.disabled=true;
		document.anstellung.vorname.style.backgroundColor = "#CFCFCF";
	}

	if(document.anstellung.ex_anrede.value == 1 || document.anstellung.ex_anrede.value == 2) {
        document.anstellung.ex_vertreter.disabled=true;
		document.anstellung.ex_vertreter.style.backgroundColor = "#CFCFCF";
        document.anstellung.ex_firmen_name.disabled=true;
		document.anstellung.ex_firmen_name.style.backgroundColor = "#CFCFCF";
        document.anstellung.ex_titel.disabled=false;
		document.anstellung.ex_titel.style.backgroundColor = "transparent";
        document.anstellung.ex_name.disabled=false;
		document.anstellung.ex_name.style.backgroundColor = "transparent";
        document.anstellung.ex_vorname.disabled=false;
		document.anstellung.ex_vorname.style.backgroundColor = "transparent";

	}
	if(document.anstellung.ex_anrede.value==3)
	{
        document.anstellung.ex_vertreter.disabled=false;
		document.anstellung.ex_vertreter.style.backgroundColor = "transparent";
        document.anstellung.ex_firmen_name.disabled=false;
		document.anstellung.ex_firmen_name.style.backgroundColor = "transparent";
        document.anstellung.ex_titel.disabled=true;
		document.anstellung.ex_titel.style.backgroundColor = "#CFCFCF";
        document.anstellung.ex_name.disabled=true;
		document.anstellung.ex_name.style.backgroundColor = "#CFCFCF";
        document.anstellung.ex_vorname.disabled=true;
		document.anstellung.ex_vorname.style.backgroundColor = "#CFCFCF";
	}
}
function check_anstellung_vergutung_ad() /*Vergütung Pauschalen check*/
{
	/*alert(document.anstellung.reisekosten.length);*/
	for(i=0;i<document.anstellung.reisekosten.length;i++)
	{
		if(document.anstellung.reisekosten[0].checked)
		{
			document.anstellung.verpflegung.disabled=false;
			document.anstellung.verpflegung.style.backgroundColor = "transparent";
	        document.anstellung.ubernachtung.disabled=false;
			document.anstellung.ubernachtung.style.backgroundColor = "transparent";
		}
		if(document.anstellung.reisekosten[1].checked)
		{
			document.anstellung.verpflegung.disabled=true;
			document.anstellung.verpflegung.style.backgroundColor = "#CFCFCF";
	        document.anstellung.ubernachtung.disabled=true;
			document.anstellung.ubernachtung.style.backgroundColor = "#CFCFCF";
		}
	}	
}
function check_anstellung_arbeitsstunden_aushilfe() /*Arbeitsstunden Arbeitsvertrag Aushilfe*/
{
	/*alert(document.anstellung.art_vergutung.length);*/
	for(i=0;i<document.anstellung.art_vergutung.length;i++)
	{
		if(document.anstellung.art_vergutung[0].checked)
		{
			document.anstellung.gehalt_monats_brutto.disabled=false;
			document.anstellung.gehalt_monats_brutto.style.backgroundColor = "transparent";
	        document.anstellung.gehalt_stunden_brutto.disabled=true;
			document.anstellung.gehalt_stunden_brutto.style.backgroundColor = "#CFCFCF";
		}
		if(document.anstellung.art_vergutung[1].checked)
		{
			document.anstellung.gehalt_monats_brutto.disabled=true;
			document.anstellung.gehalt_monats_brutto.style.backgroundColor = "#CFCFCF";
	        document.anstellung.gehalt_stunden_brutto.disabled=false;
			document.anstellung.gehalt_stunden_brutto.style.backgroundColor = "transparent";
		}
	}	
}
function check_sicherungsgut() /*Darlehen.php*/
{
	/*alert(document.darlehen.sicherheit.length);*/
	for(i=0;i<document.darlehen.sicherungs_gut.length;i++)
	{
		if(document.darlehen.sicherungs_gut[0].checked)
		{
			document.darlehen.sicherheit_gut.disabled=false;
			document.darlehen.sicherheit_gut.style.backgroundColor = "transparent";
			
			document.darlehen.sicherheit_hohe.disabled=false;
			document.darlehen.sicherheit_hohe.style.backgroundColor = "transparent";
		}
		if(document.darlehen.sicherungs_gut[1].checked)
		{
			document.darlehen.sicherheit_gut.disabled=true;
			document.darlehen.sicherheit_gut.style.backgroundColor = "#CFCFCF";
			
			document.darlehen.sicherheit_hohe.disabled=true;
			document.darlehen.sicherheit_hohe.style.backgroundColor = "#CFCFCF";
		}
	}	
}
function disable_artikeln_checkbox() /*NEWSLETTER.TPL*/
{
	if(document.upload.keine_artikeln)
	{
		
		container = document.getElementById('artikelubersicht');

	    elements = container.getElementsByTagName('input');

	    for (i = 0; i < elements.length; i++)
	    {
	        elements[i].disabled=true;
	    }
	}
}
function check_verpackung() /*burg_erkl_eigen_dat.php*/
{
	for(i=0;i<document.lohnherstellungsvertrag.verpackung.length;i++)
	{
		if(document.lohnherstellungsvertrag.verpackung[0].checked)
		{
			document.lohnherstellungsvertrag.verpackungsschritte_abfuellen.disabled=true;
			document.lohnherstellungsvertrag.verpackungsschritte_verschliessen.disabled=true;
			document.lohnherstellungsvertrag.verpackungsschritte_etiketieren.disabled=true;
			document.lohnherstellungsvertrag.verpackungsschritte_kennziefern.disabled=true;
		}
		if(document.lohnherstellungsvertrag.verpackung[1].checked)
		{
			document.lohnherstellungsvertrag.verpackungsschritte_abfuellen.disabled=false;
			document.lohnherstellungsvertrag.verpackungsschritte_verschliessen.disabled=false;
			document.lohnherstellungsvertrag.verpackungsschritte_etiketieren.disabled=false;
			document.lohnherstellungsvertrag.verpackungsschritte_kennziefern.disabled=false;
		}		
	}	
}
function check_lieferung_gefahrubergang() /*burg_erkl_eigen_dat.php*/
{
	for(i=0;i<document.lohnherstellungsvertrag.lieferung.length;i++)
	{
		if(document.lohnherstellungsvertrag.lieferung[0].checked || document.lohnherstellungsvertrag.lieferung[1].checked)
		{
			document.lohnherstellungsvertrag.lieferung[2].disabled=true;
			document.lohnherstellungsvertrag.lieferung[3].disabled=true;
			document.lohnherstellungsvertrag.lieferung[4].disabled=true;
		}		
	}	
	for(i=0;i<document.lohnherstellungsvertrag.lieferung.length;i++)
	{
		if(document.lohnherstellungsvertrag.lieferung[2].checked || document.lohnherstellungsvertrag.lieferung[3].checked || document.lohnherstellungsvertrag.lieferung[4].checked)
		{
			document.lohnherstellungsvertrag.lieferung[0].disabled=true;
			document.lohnherstellungsvertrag.lieferung[1].disabled=true;
		}		
	}
	for(i=0;i<document.lohnherstellungsvertrag.lieferung.length;i++)
	{
		if(document.lohnherstellungsvertrag.lieferung[5].checked)
		{
			document.lohnherstellungsvertrag.lieferung[0].disabled=false;
			document.lohnherstellungsvertrag.lieferung[1].disabled=false;
			document.lohnherstellungsvertrag.lieferung[2].disabled=false;
			document.lohnherstellungsvertrag.lieferung[3].disabled=false;
			document.lohnherstellungsvertrag.lieferung[4].disabled=false;
		}		
	}
}
function check_sicherheit() /*Darlehen.php*/
{
	/*alert(document.darlehen.sicherheit.length);*/
	for(i=0;i<document.darlehen.sicherheit.length;i++)
	{
		if(document.darlehen.sicherheit[0].checked)
		{
			/*document.darlehen.sicherheit_beschreibung.disabled=false;
			document.darlehen.sicherheit_beschreibung.style.backgroundColor = "transparent";*/
			
			document.darlehen.sicherungs_gut[0].disabled=false;
			document.darlehen.sicherungs_gut[1].disabled=false;
			
			document.darlehen.sicherheit_gut.disabled=false;
			document.darlehen.sicherheit_gut.style.backgroundColor = "transparent";
			
			document.darlehen.sicherheit_hohe.disabled=false;
			document.darlehen.sicherheit_hohe.style.backgroundColor = "transparent";
			
			document.darlehen.grundschuld[0].disabled=false;
			document.darlehen.grundschuld[1].disabled=false;
			
			document.darlehen.grundschuld_hohe.disabled=false;
			document.darlehen.grundschuld_hohe.style.backgroundColor = "transparent";
			
			document.darlehen.burgschaft[0].disabled=false;
			document.darlehen.burgschaft[1].disabled=false;
			
			document.darlehen.burgschafts_des.disabled=false;
			document.darlehen.burgschafts_des.style.backgroundColor = "transparent";
			
			document.darlehen.burgschafts_hohe.disabled=false;
			document.darlehen.burgschafts_hohe.style.backgroundColor = "transparent";

		}
		if(document.darlehen.sicherheit[1].checked)
		{
			/*document.darlehen.sicherheit_beschreibung.disabled=true;
			document.darlehen.sicherheit_beschreibung.style.backgroundColor = "#CFCFCF";*/

			document.darlehen.sicherungs_gut[0].disabled=true;
			document.darlehen.sicherungs_gut[1].disabled=true;
			
			document.darlehen.sicherheit_gut.disabled=true;
			document.darlehen.sicherheit_gut.style.backgroundColor = "#CFCFCF";
			
			document.darlehen.sicherheit_hohe.disabled=true;
			document.darlehen.sicherheit_hohe.style.backgroundColor = "#CFCFCF";
			
			document.darlehen.grundschuld[0].disabled=true;
			document.darlehen.grundschuld[1].disabled=true;
			
			document.darlehen.grundschuld_hohe.disabled=true;
			document.darlehen.grundschuld_hohe.style.backgroundColor = "#CFCFCF";
			
			document.darlehen.burgschaft[0].disabled=true;
			document.darlehen.burgschaft[1].disabled=true;
			
			document.darlehen.burgschafts_des.disabled=true;
			document.darlehen.burgschafts_des.style.backgroundColor = "#CFCFCF";
			
			document.darlehen.burgschafts_hohe.disabled=true;
			document.darlehen.burgschafts_hohe.style.backgroundColor = "#CFCFCF";

		}
	}	
}
function check_grundschuld() /*Darlehen.php*/
{
	/*alert(document.darlehen.art_vergutung.length);*/
	for(i=0;i<document.darlehen.grundschuld.length;i++)
	{
		if(document.darlehen.grundschuld[0].checked)
		{
			document.darlehen.grundschuld_hohe.disabled=false;
			document.darlehen.grundschuld_hohe.style.backgroundColor = "transparent";
		}
		if(document.darlehen.grundschuld[1].checked)
		{
			document.darlehen.grundschuld_hohe.disabled=true;
			document.darlehen.grundschuld_hohe.style.backgroundColor = "#CFCFCF";
		}
	}	
}
function check_burgschaft() /*Darlehen.php*/
{
	/*alert(document.darlehen.art_vergutung.length);*/
	for(i=0;i<document.darlehen.burgschaft.length;i++)
	{
		if(document.darlehen.burgschaft[0].checked)
		{
			document.darlehen.burgschafts_des.disabled=false;
			document.darlehen.burgschafts_des.style.backgroundColor = "transparent";
			document.darlehen.burgschafts_hohe.disabled=false;
			document.darlehen.burgschafts_hohe.style.backgroundColor = "transparent";
		}
		if(document.darlehen.burgschaft[1].checked)
		{
			document.darlehen.burgschafts_des.disabled=true;
			document.darlehen.burgschafts_des.style.backgroundColor = "#CFCFCF";
			document.darlehen.burgschafts_hohe.disabled=true;
			document.darlehen.burgschafts_hohe.style.backgroundColor = "#CFCFCF";
		}
	}	
}
function check_darlehen()
{
	/*Darlehensvertrag- Firma und Privatperson check*/
	if(document.darlehen.geschlecht.value == 1 || document.darlehen.geschlecht.value == 2) {
		document.darlehen.vertreter.disabled=true;
        document.darlehen.vertreter.style.backgroundColor = "#CFCFCF";

        document.darlehen.firma_name.disabled=true;
		document.darlehen.firma_name.style.backgroundColor = "#CFCFCF";

        document.darlehen.titel.disabled=false;
		document.darlehen.titel.style.backgroundColor = "transparent";

        document.darlehen.name.disabled=false;
		document.darlehen.name.style.backgroundColor = "transparent";

        document.darlehen.vorname.disabled=false;
		document.darlehen.vorname.style.backgroundColor = "transparent";
	}
	if(document.darlehen.geschlecht.value==3) {
        document.darlehen.vertreter.disabled=false;
		document.darlehen.vertreter.style.backgroundColor = "transparent";
        document.darlehen.firma_name.disabled=false;
		document.darlehen.firma_name.style.backgroundColor = "transparent";
        document.darlehen.titel.disabled=true;
		document.darlehen.titel.style.backgroundColor = "#CFCFCF";
        document.darlehen.name.disabled=true;
		document.darlehen.name.style.backgroundColor = "#CFCFCF";
        document.darlehen.vorname.disabled=true;
		document.darlehen.vorname.style.backgroundColor = "#CFCFCF";
	}

	if(document.darlehen.ex_anrede.value == 1 || document.darlehen.ex_anrede.value == 2) {
        document.darlehen.ex_vertreter.disabled=true;
		document.darlehen.ex_vertreter.style.backgroundColor = "#CFCFCF";
        document.darlehen.ex_firmen_name.disabled=true;
		document.darlehen.ex_firmen_name.style.backgroundColor = "#CFCFCF";
        document.darlehen.ex_titel.disabled=false;
		document.darlehen.ex_titel.style.backgroundColor = "transparent";
        document.darlehen.ex_name.disabled=false;
		document.darlehen.ex_name.style.backgroundColor = "transparent";
        document.darlehen.ex_vorname.disabled=false;
		document.darlehen.ex_vorname.style.backgroundColor = "transparent";

	}
	if(document.darlehen.ex_anrede.value==3)
	{
        document.darlehen.ex_vertreter.disabled=false;
		document.darlehen.ex_vertreter.style.backgroundColor = "transparent";
        document.darlehen.ex_firmen_name.disabled=false;
		document.darlehen.ex_firmen_name.style.backgroundColor = "transparent";
        document.darlehen.ex_titel.disabled=true;
		document.darlehen.ex_titel.style.backgroundColor = "#CFCFCF";
        document.darlehen.ex_name.disabled=true;
		document.darlehen.ex_name.style.backgroundColor = "#CFCFCF";
        document.darlehen.ex_vorname.disabled=true;
		document.darlehen.ex_vorname.style.backgroundColor = "#CFCFCF";
	}
}