<?php
//load the header
include "header.php";


	//if the form hs been submitted
	if(isset($_POST["Submit"]))
	{
	//success
	site_search($con);
	}//ends the if statement
	
	else
	{
	//shows the add procedure form
	show_site_search_form();
	}//ends else


//load the header
include "footer.php";
?>