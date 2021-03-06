<?php
// include other function sheets
include "FormProcessFunctions.php";
include "HelpFunctions.php";





	////////////////////////////////////////add post function/////////////////////////////////////////////////////////
	/*This funcion lets us write a post and post it*/

function add_post($con)
{
	//first sanitize for html special characters//
	$PostTitle=filter_var($_POST["PostTitle"], FILTER_SANITIZE_STRING);			
	$PostContent=filter_var($_POST["PostContent"], FILTER_SANITIZE_STRING);
	
	//get the title
	$PostTitle=mysqli_real_escape_string($con, trim($PostTitle));
	
	//get the content
	$PostContent=mysqli_real_escape_string($con, trim($PostContent));
	
	//get the user id using in the function
	$UserID=get_user_id($con);
	
	//build the sql statement
	$sql='INSERT INTO posts(UserID, PostTitle, PostContent)
	VAlUES  ("'.$UserID.'","'.$PostTitle.'","'.$PostContent.'")';
	
	//run the querry
	$result=mysqli_query($con, $sql) or die(mysqli_error($con));
	
	//redirecct to homepage with flag variables
	header("location:http://localhost/VetCompany/index.php?addpost=1&userpost=1");
	
}//ends function



/////////////////////////////////////echo out all owners//////////////////////////////////////////////////////////////				
/*this function brings up all the post to our feed as well as singles out the users posts for the user feed*/
				//echo out all the owners
				function get_owners($con){
				
				
				//select all the post for this user
				$sql="SELECT * FROM owners  order by OwnerID DESC";
				
				// run the my sqli querry //
				$result=mysqli_query($con,$sql) or die(mysqli_error($con));
				while($row=mysqli_fetch_assoc($result)){
				
				$OwnerID=$row['OwnerID'];
				
				
					echo '<div class="large-12 columns"><div style="height:420px;"class="panel">';
					echo '<h1>'.$row["UserName"].'</h1>';
					echo '<p>'.$row["Name"].'</p>';
					echo '<p>'.$row["ContactNumber"].'</p>';
					$email=get_owners_email($con, $row["OwnerID"]);
					echo '<p>Email:'.$email.'</p>';
					
					
					
					
					$sql2="SELECT * FROM pets WHERE OwnerID=$OwnerID";
					$result2=mysqli_query($con,$sql2) or die(mysqli_error($con));
					
					/* determine number of rows result set */
					$row_cnt = mysqli_num_rows($result);
					echo $row_cnt; exit;
					
					while($row=mysqli_fetch_assoc($result2)){
						$PetID=$row['PetID'];
						$AvatarName=get_Pet_avatar($con, $PetID);
						echo '<div class="img"><a href="#"><img width="125" alt="avatar" src="uploads/'.$AvatarName.'"></a></div>';
					}//ends result2 while
					
					echo '</div></div>';
}//ends while
}//ends function get owners







/////////////////////////////////////echo out all pets//////////////////////////////////////////////////////////////				
/*this function brings up all the post to our feed as well as singles out the users posts for the user feed
				//echo out all the owners
				function get_pets($con){
				
						//select all the post for this user
						$sql="SELECT * FROM pets  order by OwnerID DESC";
						
							

				// run the my sqli querry //
				$result=mysqli_query($con,$sql) or die(mysqli_error($con));
				while($row=mysqli_fetch_assoc($result)){
				
				$PetID=$row['PetID'];
				//$username=get_user_name($con, $OwnerID);

				
					echo '<div class="large-6 large-centered columns"><div class="panel">';
					echo '<p>Pet Type: '.$row["PetType"].'</p>';
					echo '<p>Name: '.$row["Name"].'</p>';
					echo '<p>Age: '.$row["Age"].'</p>';
					echo '<p>Sex: '.$row["Sex"].'</p>';
					echo '</div></div>';
					}

}//ends function statement
*/



/////////////////////////////////////echo out all pets//////////////////////////////////////////////////////////////				
/*this function brings up all the post to our feed as well as singles out the users posts for the user feed*/
				//echo out all the posts
				function get_pets($con, $UserID=""){
					//if the userpost isset then//
					if(isset($_GET["userpost"])){
						//echo "hello"; exit;
						$UserID=get_user_id($con);
					
						//select all the pets for this user
						$sql2="SELECT * FROM pets where Doctor='DrTony' order by PetID DESC"; 
					}//end if
					else{
						$sql2="SELECT * FROM pets order by PetID DESC";
					}
//echo $sql2; exit;

				// run the my sqli querry //
				$result2=mysqli_query($con,$sql2) or die(mysqli_error($con));
				//echo "hello"; exit;
				while($row=mysqli_fetch_assoc($result2)){
					
				$PetID=$row['PetID'];
				$username=get_user_name($con, $PetID);
			
					echo '<div class="large-11 large-centered columns"><div style="width: 135%;" class="panel">';
					echo '<h1>'.$row["Name"].'</h1>';
					echo '<p>ID#: '.$row["PetID"].'</p>';
					echo '<p>Pet Type: '.$row["PetType"].'</p>';
					echo '<p>Age: '.$row["Age"].'</p>';
					echo '<p>Sex: '.$row["Sex"].'</p>';
					echo '<p>Doctor: '.$row["Doctor"].'</p>';
					$AvatarName=get_Pet_avatar($con, $row["PetID"]);
					echo '<p style="text-align:center;" class="avatar"><a href="#" data-featherlight="uploads/'.$AvatarName.'"><img width="227" alt="avatar" src="uploads/'.$AvatarName.'"></a></p>';
					echo '</div></div>';
					}

}//ends function statement

?>