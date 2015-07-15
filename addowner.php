<?php
//load the header
include "header.php";


//if the form hs been submitted
if(isset($_POST["Submit"]))
{
	// now the form button was pushed lets check for errors
	$error=check_add_owner_form_error();
	if($error==""){
		
		//success
		add_new_owner($con);
		
	
	}
	else{
		//shows the error
		show_add_owner_form($error);
	}//ends authenticate else
				

}//ends the if statement
	//first time to see the site and make a profle
	else
	{
		show_add_owner_form();
	}


//load the header
include "footer.php";
?>