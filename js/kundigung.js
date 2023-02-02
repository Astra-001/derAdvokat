
var easter = Array();
function makeRequest(url) {
    var http_request = false;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
	http_request = new XMLHttpRequest();
	if (http_request.overrideMimeType) {
	    http_request.overrideMimeType('text/xml');
	}
    } else if (window.ActiveXObject) { // IE
	try {
	    http_request = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
	    try {
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	    } catch (e) {}
	}
    }
    if (!http_request) {
	
	return false;
    }
    http_request.onreadystatechange = function() { 
		    var eastrerPer = new Date(http_request.responseText);
		    easter[eastrerPer.getFullYear()] = eastrerPer.getDate()+'.'+(eastrerPer.getMonth()+1);
		    };
    http_request.open('GET', url, true);
    http_request.send(null);
}
/*
   *Function make right format from dd.mm.yyyy to m/d/yyyy/
   */
    function makedate(time) {
        var arr = time.split('.');
        
        if ((parseInt(arr[0], 10) < 10)) arr[0] = '0' + parseInt(arr[0], 10).toString();
        if ((parseInt(arr[1], 10) < 10)) arr[1] = '0' + parseInt(arr[1], 10).toString();
        time = arr[1] + '/' + arr[0] + '/' + arr[2];
        
        return time;
    }
  /*
   *Function check data
   **/
    function check(id){
       var div = document.getElementById(id+'_st');
       var myDate = document.getElementById(id).value;
       d = myDate;
       myDate = makedate(myDate);
       var converted = Date.parse(myDate);
       var newDate = new Date(converted);
       var newMonth = newDate.getMonth()+1;
        if (newMonth < 10) newMonth = '0'+newMonth;
       var newDay = newDate.getDate();
       if (newDay < 10) newDay = '0'+newDay;
       var newYear = newDate.getFullYear();
       var date = newMonth+'/'+newDay+'/'+newYear;
       if (date==myDate) { div.innerHTML = '';return converted; } else
       if (d) div.innerHTML = '<font color="red">Falsch eingegebenes Datum</font>';
       if (!d) div.innerHTML = '';
       return 0;
       
    }
    
    /*
     *Found data for dismiss
     */
    function founddata(years, time, obj)
    {
        var rezday = 0;
        var rezmonth = 0;
        var rezyear = 0;
        var date = new Date(time);
        // < 2 Years
	if (years<2) {
            date.setDate(date.getDate()+28);
            rezday = date.getDate();
            if (rezday < 15 ) rezday = 15;
            else if (rezday < 31 ) {
                var month = date.getMonth();
                while (month==date.getMonth()) { date.setDate(date.getDate()+1);rezday++;}
                date.setDate(date.getDate()-1);
                rezday--;
            }
        }
        //** < 2 Years
        // > 2 Years
        else { 
            if (years < 5) date.setMonth(date.getMonth()+1);           
            else if (years < 8) date.setMonth(date.getMonth()+2);
            else if (years < 10) date.setMonth(date.getMonth()+3);
            else if (years < 12) date.setMonth(date.getMonth()+4);
            else if (years < 15) date.setMonth(date.getMonth()+5);
            else if (years < 20) date.setMonth(date.getMonth()+6);
            else date.setMonth(date.getMonth()+7);
            rezday = date.getDate();
            var month = date.getMonth();
            while (month==date.getMonth()) { date.setDate(date.getDate()+1);rezday++;}
            date.setDate(date.getDate()-1);
            rezday--;
        }
        //** > 2 Years
        
        rezmonth = date.getMonth()+1;
        if (rezmonth<10) rezmonth = '0' + rezmonth;
        rezyear = date.getFullYear();
        obj.innerHTML += '<br /><b>Beendigungszeitpunkt des Arbeitsverhältnis:</b> '+rezday+'.'+rezmonth+'.'+rezyear+'.';
	var inp = document.getElementById('daterez').value = rezday+'.'+rezmonth+'.'+rezyear;
    }
    /*
     *Function onsubmit Form
     */
    function calc() {
        var div = document.getElementById('result');
	var inp = document.getElementById('daterez');
        var f1 = check('datein');
        var f2 = check('datedec');
		var divr = document.getElementById('divrez');
				if (divr) divr.style.cssText = 'display: block';
        if (f1 && f2) {
            if (f1 > f2) div.innerHTML ='<font color="red">Die Kündigungsfristdatum ist früherer als der Beginn der Arbeitsverhältnisse selbst. Geben Sie bitte das richtige  Kündigungsdatum.</font>';
            else {
				
				founddata(mycount(f1, f2, 1, div), f2, div);
				
			}
            
        } else { div.innerHTML='';inp.value='';}
      
    }
    
    
	function is_holiday(date)
	{
		var day = date.getDate();
		var month = date.getMonth()+1;
		var perev = day+'.'+month;
		var year = date.getFullYear();
		
		if (!easter[year]) {
		   makeRequest('http://www.deradvokat.de/derAdvokat/js/easter.php?year='+year);
		}
		if (date.getDay() == 0) return 1;
		if (perev==easter[year]) return 1;
		if (perev=='1.1') return 1; 
		if (perev=='6.1') return 1; 
		 
		if (perev=='1.5') return 1; 
		if (perev=='21.5') return 1;
		if (perev=='1.6') return 1; 
		if (perev=='11.6') return 1;
		if (perev=='15.8') return 1;
		if (perev=='3.10') return 1;
		if (perev=='31.10') return 1;
		if (perev=='11.11') return 1;
		if (perev=='18.11') return 1;
		if (perev=='25.12') return 1;
		if (perev=='26.12') return 1;
		return 0;
	}
    /*
     *Function count of years and months between to times in milisec from 01/01/1970
     *time - first time
     *obj - object for result
     **/
    function is_workday(time)
    {
		var n = 0;
		var date = new Date(time);
		var date_temp = new Date(time);
		date_temp.setDate(1);
		while (is_holiday(date_temp)) date_temp.setDate(date_temp.getDate() + 1);
		n++;
		while ((date_temp < date)&&(n < 4)) {
			date_temp.setDate(date_temp.getDate() + 1);
			if (!is_holiday(date_temp)) n++;
		}
		if (n <= 3) return 1;
		return 0;
    }
    
    function mycount(time1, time2, type,  obj)
    {
		var years = 0;
		var months = 0;
		var date1 = new Date(time1);
		var date2 = new Date(time2);
		date2.setDate(date2.getDate()+1);
		obj.innerHTML='';
		while (Date.parse(date1) < Date.parse(date2)) { date1.setYear(date1.getFullYear()+1);years++;}
		if (Date.parse(date1) != Date.parse(date2)) {
			years--;
			date1.setYear(date1.getFullYear()-1);
			while (Date.parse(date1) < Date.parse(date2)) { date1.setMonth(date1.getMonth()+1);months++;}
		}
		if (Date.parse(date1) != Date.parse(date2)) months--;
		
		if (type) {
			var jahr="Jahr";
			var monat="Monat";
			if (years>1) jahr+='e';
			if (years>0) jahr = years+' '+jahr; else jahr='';
			if (months>1) monat+='e';
			if (months>0) monat = months+' '+monat; else monat='';
			obj.innerHTML = '<b>Dauer des Arbeitsverhältnisses:</b> '+jahr+' '+monat+'.';
		}
		return years;
    }
    /*
     *Found data for dismiss
     */
    function found_rent_end_date(time, time2)
    {
        var rezday = 0;
        var rezmonth = 0;
        var rezyear = 0;
		var date = new Date(time);
		var years = mycount(time2, time, 0, document.getElementById('rent_result'));
		date.setMonth(date.getMonth() + 2)
        if (!is_workday(date)) date.setMonth(date.getMonth() + 1);
		if (years >= 5) date.setMonth(date.getMonth() + 3);
		if (years >= 8) date.setMonth(date.getMonth() + 3);
		date.setDate(28);
        var month = date.getMonth();
        while (month==date.getMonth()) date.setDate(date.getDate()+1);
		date.setDate(date.getDate()-1);
		//while (is_holiday(date)) date.setDate(date.getDate()-1);
        return date;
    }
    /*
     *Function onsubmit Form
     */
    function rent_calc() {
        var div = document.getElementById('rent_result');
		var inp = document.getElementById('date_rent_rez');
        var f1 = check('date_rent_in');
		var f_begin = check('date_rent_begin');
	var divr = document.getElementById('div_rent_rez');
			if (divr) divr.style.cssText = 'display: block';
        if (f1 && f_begin) {
			if (f1 < f_begin) {
				div.innerHTML = '<font color="red">Beendigungszeitpunkt ist früherer als der Beginn des Mietverhältnisses selbst. Geben Sie bitte das richtige Beendigungszeitpunkt.</font>';
				return ;
			}
			var rez = found_rent_end_date(f1, f_begin);
			var rezdate = rez.getDate();
			if (rezdate < 10) rezdate = '0'+rezdate;
			var rezmonth = rez.getMonth()+1;
			if (rezmonth < 10) rezmonth = '0'+rezmonth;
			var rezyear = rez.getFullYear();
			div.innerHTML += '<b>Beendigungszeitpunkt des Mietverhältnisses:</b> '+rezdate+'.'+rezmonth+'.'+rezyear+'.';
			inp.value = rezdate+'.'+rezmonth+'.'+rezyear;    
        } else {
			div.innerHTML='';
			inp.value='';
		}
      
    }
    

var it=0;
  function deleteverw( id) {
    var d = document.getElementById('verwandten');
    var olddiv = document.getElementById('id'+id);
    d.removeChild(olddiv);
  }

  function addverw( id, pic ) {
    it++;
    img = document.getElementById('verwandten');
    var div = document.createElement('div');
    div.id = 'id'+it;
    div.innerHTML = '<table border="0" width="550"><tr><td width="100" align="center"><select name="verwand[]"><option value="1">Herr</option><option value="2">Frau</option></select></td><td width="200" align="center"><input class="inputbox" type="text" name="verwname[]"  style="width:190px;" value="" /><br /><td width="180" align="center"><input style="width:170px;" type="text" name="verwshaft[]" value="" /></td><td width="50" align="center"><a onclick=\'deleteverw('+it+')\'>Delete</a></td></tr></table>';
    img.appendChild(div);
    }

  