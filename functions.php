<?php
// include other function sheets
include "FormProcessFunctions.php";
include "HelpFunctions.php";







/////////////////////////////////////echo out all owners//////////////////////////////////////////////////////////////				
/*this function brings up all the post to our feed as well as singles out the users posts for the user feed*/
				//echo out all the owners
				function get_owners($con){
				
				
				//select all the post for this user
				$sql="SELECT * FROM owners  order by OwnerID DESC";
				
				// run the my sqli querry //
				$result=mysqli_query($con,$sql) or die(mysqli_error($con));
				
				
				echo '<div class="large-12 columns">'; //starts container
				echo '<h1>Owners &amp; Patients</h1>';
				while($row=mysqli_fetch_assoc($result)){
				
				$OwnerID=$row['OwnerID'];
				
				
					echo '<div class="panel height">';
					echo '<h1>'.$row["Name"].'</h1>';
					echo '<p>Contact Number: '.$row["ContactNumber"].'</p>';
					$email=get_owners_email($con, $row["OwnerID"]);
					echo '<p>Email: '.$email.'</p>';
					echo '<p>Address: '.$row["Address"].'</p>';
					
					$sql2="SELECT * FROM pets WHERE OwnerID=$OwnerID";
					
					$result2=mysqli_query($con,$sql2) or die(mysqli_error($con));
						/* determine number of rows result set */
					$my_pet_images="";
					$row_cnt = mysqli_num_rows($result2);
					while($row=mysqli_fetch_assoc($result2)){
						$PetID=$row['PetID'];
						$OwnerID=$row['OwnerID'];
						$AvatarName=get_Pet_avatar($con, $PetID);
						$my_pet_images .='<div class="large-3 columns"><a href="pethistory.php?petid='.$PetID.'"><img class="hover" alt="pet" width="150" height="150" src="uploads/'.$AvatarName.'" /></a></div>';
					}//ends result2 while
					
				
					
					if($row_cnt==0){  
						$sil=4;
					}
					if($row_cnt==1){
						$sil=3;
					}
					if($row_cnt==2){
						$sil=2;
					}
					if($row_cnt==3){
						$sil=1;
					}
					if($row_cnt==4){
						$sil=0;
					}
					
					for ($i = 1; $i <= $sil; $i++) { 
							$my_pet_images .='<div class="large-3 columns"><a href="addpet.php?OwnerID='.$OwnerID.'"><img class="hover" alt="addpet" src="uploads/sil.png"></a></div>';
					}
					
					//echo images
					echo $my_pet_images;
					
					echo '</div>';// ends panel
}//ends while
					echo '</div>';//ends div
}//ends function get owners





/////////////////////////////////////echo out all pets//////////////////////////////////////////////////////////////				
/*this function brings up all the post to our feed as well as singles out the users posts for the user feed*/
				//echo out all the posts
				function get_pets($con){
					//if the userpost isset then//
					if(!isset($_GET["userpost"])){
						//echo "hello"; exit;
						//$UserID=get_user_id($con);
					
						//select all the pets for this user
						$sql2="SELECT * FROM pets order by PetID DESC";
					}//end if
					

				// run the my sqli querry //
				$result2=mysqli_query($con,$sql2) or die(mysqli_error($con));
				//echo "hello"; exit;
				while($row=mysqli_fetch_assoc($result2)){
					
				$PetID=$row['PetID'];
				
				
				
					echo '<div class="large-11 large-centered columns"><div class="panel">';
					echo '<h1>'.$row["Name"].'</h1>';
					echo '<p class="LineHeight">ID#: '.$row["PetID"].'</p>';
					echo '<p class="LineHeight">Pet Type: '.$row["PetType"].'</p>';
					echo '<p class="LineHeight">Age: '.$row["Age"].'</p>';
					echo '<p class="LineHeight">Sex: '.$row["Sex"].'</p>';
					echo '<p class="LineHeight">Doctor: '.$row["Doctor"].'</p>';
					$AvatarName=get_pet_avatar($con, $row["PetID"]);
					echo '<p style="text-align:center;" class="avatar LineHeight"><a  href="#" data-featherlight="uploads/'.$AvatarName.'"><img width="227" alt="avatar" src="uploads/'.$AvatarName.'"></a></p>';
					echo '</div></div>';
					}

}//ends function statement


/////////////////////////////////////echo out pet and history//////////////////////////////////////////////////////////////				
/*this function brings up all the post to our feed as well as singles out the users posts for the user feed*/
				//echo out all the posts
				function get_pet_for_history($con, $PetID=""){
					//if the userpost isset then//
					if(isset($_GET["petid"])){
					$PetID=$_GET["petid"];
					
						//select all the pets for this user
						$sql2="SELECT * FROM pets where PetID=$PetID"; 
					}//end if
				

				// run the my sqli querry //
				$result2=mysqli_query($con,$sql2) or die(mysqli_error($con));
				//echo "hello"; exit;
				while($row=mysqli_fetch_assoc($result2)){
				
				
					echo '<div class="large-11 large-centered columns"><div class="panel">';
					echo '<h1>'.$row["Name"].'</h1>';
					echo '<p>ID#: '.$row["PetID"].'</p>';
					echo '<p>Pet Type: '.$row["PetType"].'</p>';
					echo '<p>Age: '.$row["Age"].'</p>';
					echo '<p>Sex: '.$row["Sex"].'</p>';
					echo '<p>Doctor: '.$row["Doctor"].'</p>';
					$AvatarName=get_pet_avatar($con, $row["PetID"]);
					echo '<p style="text-align:center;" class="avatar"><a href="#" data-featherlight="uploads/'.$AvatarName.'"><img class="hover" width="150" height="150" alt="avatar" src="uploads/'.$AvatarName.'"></a></p><br>';
					echo '<a href="updatepet.php?petid='.$PetID.'" class="small orange button radius">Edit Pet Info</a>';
					echo '<a href="updatepetphoto.php?petid='.$PetID.'" class="small yellow button radius">Change Photo</a>';
					echo '<a href="addvisit.php?petid='.$PetID.'" class="small green button radius">Enter Visit Procedure</a>';
			
					get_pets_visits_history($con, $UserID="");
					echo '</div></div>';
					}

}//ends function statement






/////////////////////////////////////echo out procedures//////////////////////////////////////////////////////////////				
/*this function brings up all the post to our feed as well as singles out the users posts for the user feed*/
				//echo out all the posts
				function get_procedures($con){
					//select all the pets for this user
					$sql="SELECT * FROM procedures"; 
				
				// run the my sqli querry //
				$result=mysqli_query($con,$sql) or die(mysqli_error($con));
				//echo "hello"; exit;
				while($row=mysqli_fetch_assoc($result)){
				
				$ProcedureID=$row['ProcedureID'];
				//echo $ProcedureID;
					echo '<div class="large-11 large-centered columns"><div class="panel">';
					echo '<h1>'.$row["ProcedureName"].'</h1>';
					echo '<p>'.$row["Description"].'</p>';
					echo '<p>Cost: '.$row["Cost"].'</p>';
					?>
					<script>
						function ConfirmDelete()
						{
						  var x = confirm("Are you sure you want to delete?");
						  if (x)
							  return true;
						  else
							return false;
						}
					</script>    

					
					<?php
					echo '<a href="deleteprocedure.php?procedureid='.$ProcedureID.'" class="button radius red " Onclick="return ConfirmDelete();">Delete Procedure</a>';
					echo '</div></div>';
					}

}//ends function statement






/////////////////////////////////////echo out all pets visits procedure IDs so that pet historyy can be echoed out//////////////////////////////////////////////////////////////				
/*this function brings up all the pets visits procedure IDs only, those IDs can be used by the get history function*/
				//echo out all the posts
				function get_pets_visits_history($con, $UserID=""){
					//if the userpost isset then//
					if(isset($_GET["petid"])){
						$PetID=$_GET["petid"];
						
						//select all the pets visits for this pet
						$sql2="SELECT * FROM petvisits where PetID=$PetID order by PetID DESC"; 
					}//end if
				


				// run the my sqli querry //
				$result2=mysqli_query($con, $sql2) or die(mysqli_error($con));
				
				//echo mysqli_num_rows($result2); exit;

				while($row=mysqli_fetch_assoc($result2)){
				$UserID=$row["DrID"];
				//echo $UserID; exit;
				$DrName=get_user_name($con, $UserID);
				
				$ProcedureID=$row["ProcedureID"];
				
				$ProcedureName=get_procedure_name($con, $ProcedureID);
				$Sex=get_sex($con, $PetID);
					echo '<hr>';
					echo '<p>Procedure: '.$ProcedureName.'</p>';
					echo '<p>Visit Notes: '.$row["VisitNotes"].'</p>';
					echo '<p>Dr Name: '.$DrName.'</p>';
					echo '<p>Visit Date: '.$row["VisitDate"].'</p>';
					}
}//ends function statement


?>