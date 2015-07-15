<?php
//load the header
include "header.php";


//if the form hs been submitted
if(isset($_POST["Submit"]))
{
	// now the form button was pushed lets check for errors
	$error=check_login_form_error();
	if($error=="")	
	{
			// we are error free now we cn authenticate the user and make sure its a true user	
			if(authenticate_user($con)){
				$_SESSION["username"]=trim($_POST["username"]);
					echo'<a class="logintool" href="logOut.php">';
					echo'Log Out  '.$_SESSION["username"];
					echo'</a><div>';//ends logout tool
					
				//refresh the page so the session start logs in and shows the logout wth having to refresh//
				header("location:http://localhost/VetCompany/index.php");
				exit;
				
			}//ends authenticate if
			else{
				
				show_login_form("Username or Password is not valid!");
			}//ends authenticate else
				

	}
	else
	{
		show_login_form($error);
	}
}//ends the if statement





// else first time to see the site
else
{
	show_login_form();	
	?><a href="/VetCompany/register.php">Register User</a><?php
}//ends the else statement


//grabs the footer
include "footer.php";
	
?>