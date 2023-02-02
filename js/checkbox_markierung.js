function enable_checkbox()
{
	if(document.userliste_form.all_select.checked ==true)
	{
		container = document.getElementById('gast_container');
		
	    elements = container.getElementsByTagName('input');
	
	    for (i = 0; i < elements.length; i++)
	    {
	        elements[i].checked = true;
	    }
	}
	else
	{
		container = document.getElementById('gast_container');
		
	    elements = container.getElementsByTagName('input');
	
	    for (i = 0; i < elements.length; i++)
	    {
	        elements[i].checked = false;
	    }
	}
}
function enable_mitglieder_checkbox()
{
	if(document.userliste_form.all_mitglieder_log_select.checked ==true)
	{
		container = document.getElementById('user_container');
		
	    elements = container.getElementsByTagName('input');
	
	    for (i = 0; i < elements.length; i++)
	    {
	        elements[i].checked = true;
	    }
	}
	else
	{
		container = document.getElementById('user_container');
		
	    elements = container.getElementsByTagName('input');
	
	    for (i = 0; i < elements.length; i++)
	    {
	        elements[i].checked = false;
	    }
	}
}