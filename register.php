<?php
//load the header
include "header.php";


//if the form hs been submitted
if(isset($_POST["Submit"]))
{
	// now the form button was pushed lets check for errors
	$error=check_register_form_error();
	if($error==""){
		
		//success
		register_new_user($con);
		
	
	}
	else{
		//shows the error
		show_register_form($error);
	}//ends authenticate else
				

}//ends the if statement
	//first time to see the site and make a profle
	else
	{
		show_register_form();
	}



//grabs the footer
include "footer.php";
	
?>