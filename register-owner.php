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
		register_new_owner($con);
		
	
	}
	else{
		//shows the error
		show_register_owner_form($error);
	}//ends authenticate else
				

}//ends the if statement


//grabs the footer
include "footer.php";
	
?>