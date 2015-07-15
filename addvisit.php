<?php
//load the header
include "header.php";


	//if the form hs been submitted
	if(isset($_POST["Submit"]))
	{
		// now the form button was pushed lets check for errors
		$error=check_add_visit_form_error();
		if($error==""){
			if(isset($_POST["PetID"])){
				$PetID=$_POST["PetID"];
			//success
			add_new_visit($con, $PetID);
			}
		
		}
		else{
			//shows the error
			show_add_visit_form($error);
		}//ends authenticate else
					

	}//ends the if statement
	
	else
	{
	 // show user message for successful registration 
		if(isset($_GET["addprocedure"])){
				alert_user("success", "your visit has been registered!");	
				
		}
		//shows the add procedure form
		show_add_visit_form($con);
	}//ends else


//load the header
include "footer.php";
?>