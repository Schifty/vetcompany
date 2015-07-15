<?php
//load the header
include "header.php";


	//if the form hs been submitted
	if(isset($_POST["Submit"]))
	{
		// now the form button was pushed lets check for errors
		$error=check_add_procedure_form_error();
		if($error==""){
			
			//success
			add_new_Procedure($con);
			
		
		}
		else{
			//shows the error
			show_add_procedure_form($error);
		}//ends authenticate else
					

	}//ends the if statement
	
	else
	{
	 // show user message for successful registration 
		if(isset($_GET["addprocedure"])){
				alert_user("success", "your procedure has been registered!");	
				
		}
		//shows the add procedure form
		show_add_procedure_form();
	}//ends else


//load the header
include "footer.php";
?>