<?php
//load the header
include "header.php";

//a submit button has been pressed//
		if(isset($_SESSION["username"])){
			if(isset($_GET["addpet"])){
				alert_user("success", "New Pet Added");
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
	//if the userpost isset then//
	if(!isset($_SESSION["username"])){
		get_pets($con);
		
	}//end if
	else{
		get_owners($con);
	}//ends else
?></div>

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