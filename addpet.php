<?php
//load the header
include "header.php";


//if the form hs been submitted
if(isset($_POST["Submit"]))
{
	// now the form button was pushed lets check for errors
	$error=check_add_pet_form_error();
	if($error==""){
		
		//success
		add_new_pet($con);
		
	
	}
	else{
		//shows the error
		show_add_pet_form($error);
	}//ends authenticate else
				

}//ends the if statement
	//first time to see the site and make a profle
	else
	{
		show_add_pet_form();
	}


//load the header
include "footer.php";
?>