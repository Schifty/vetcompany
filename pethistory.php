<?php
//load the header
include "header.php";

//a submit button has been pressed//
		if(isset($_SESSION["username"])){
			if(isset($_GET["addvisit"])){
				alert_user("success", "your visit has been registered!");	
				
			}
		
		// show user message for successful pet update 
		if(isset($_GET["updatepet"])){
				alert_user("success", "your pet profile has been updated!");	
				
		}
		
		// show user message for successful pet update 
		if(isset($_GET["updatepetphoto"])){
				alert_user("success", "your pet profile picture has been updated!");	
				
		}
?>
<div class="large-4 columns">
<?php
		
			//gets the Dr's avatar
			$AvatarName=get_user_avatar($con);
			echo '<p style="text-align:center;" id="UserAvatar"><a href="#" data-featherlight="uploads/'.$AvatarName.'"><img alt="avatar" src="uploads/'.$AvatarName.'"></a></p>';
			//welcome the user after login
			echo '<p style="text-align:center;" id="WelcomeName">Welcome '.$_SESSION["username"].'</p>';

?></div><!--ends large  4-->

<div class="large-8 columns">
<?php
	
		//get the pets information thn the pet history//
?>

	<h1>Medical History</h1>
<?php
		get_pet_for_history($con, $PetID="");
		
?>
</div>	
<?php
}
else
{
?>
	<div class="large-8 large-centered columns">
<?php
	 // show user message for successful registration 
		if(isset($_GET["updatepet"])){
				alert_user("success", "your pet has been updated!");	
				
		}
	get_pets($con);
?>
	</div>
<?php
}

//end lrge 8


//grabs the footer
include "footer.php";
	
?>
