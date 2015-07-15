<?php
//load the header
include "header.php";


//if the form hs been submitted
if(isset($_POST["Submit"]))		
{
	

	// now the form button was pushed lets check for errors
	$error=check_update_pet_form_error();
	if($error==""){
		//if the userpost isset then//
		update_pet_photo($con);
		}
	

	else{
		//shows the error
	show_update_pet_photo_form($error);
	}//ends authenticate else
				

}//ends the if statement
	//shows the update pet form
	else
	{
		
		show_update_pet_photo_form($con);
	}


//load the header
include "footer.php";
?>