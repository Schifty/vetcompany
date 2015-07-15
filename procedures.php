<?php
//load the header
include "header.php";

//a submit button has been pressed//
		if(isset($_SESSION["username"])){
			if(isset($_GET["addprocedure"])){
				alert_user("success", "New Procedure Added");
			}
// show user message for successful deletion 
		if(isset($_GET["deleteprocedure"])){
				alert_user("success", "your procedure has been deleted");	
				
		}
?>
<div class="large-4 columns">
<?php
		
			//gets the Dr's avatar
			$AvatarName=get_user_avatar($con);
			echo '<p style="text-align:center;" id="UserAvatar"><a href="#" data-featherlight="uploads/'.$AvatarName.'"><img alt="avatar" src="uploads/'.$AvatarName.'"></a></p>';
			//welcome the user after login
			echo '<p style="text-align:center;" id="WelcomeName">Welcome '.$_SESSION["username"].'</p>';
			?>
			<a href="addprocedure.php" class="button radius green">Add A Procedure</a>
			
</div><!--ends large  4-->

<div class="large-8 columns">
<?php
	//get the pets information thn the pet history//
?>
	<h1>Procedures Information</h1>
<?php
		get_procedures($con);
		
?>
</div>	
<?php
}
else
{
?>
	<div class="large-8 large-centered columns">
<?php
	get_pets($con);
?>
	</div>
<?php
}

//end lrge 8


//grabs the footer
include "footer.php";
	
?>
