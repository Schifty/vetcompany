<?php



////////////////////////////////////////////gets the acti li for nav//////////////////////////////////////////////////////////
/* this php code will  allow for the active class in the nv bar*/

function get_nav_li(){
		$PageName=ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));
		  // echo $PageName; exit;
		   
			if(isset($_SESSION["username"])){
				/*active if pagename is addowner*/
				if($PageName=="Addowner"){
					echo'<ul><li><a href="index.php">Home</a></li>';
					echo'<li><a href="procedures.php" >Procedures</a></li>';
					echo'<li class="active"><a href="addowner.php">Add Owner</a></li>';
	
					}
				/*active if pagename is addprocedure*/
				elseif($PageName=="Addprocedure"){
					echo'<ul><li><a href="index.php">Home</a></li>';
					echo'<li class="active"><a href="procedures.php" >Procedures</a></li>';
					echo'<li><a href="addowner.php">Add Owner</a></li>';
	
					}
					
					/*active if pagename is addpet*/
				elseif($PageName=="Addpet"){
					echo'<ul><li><a href="index.php">Home</a></li>';
					echo'<li><a href="procedures.php" >Procedures</a></li>';
					echo'<li><a href="addowner.php">Add Owner</a></li>';
	
					}
				
					/*active if pagename is pethistory*/
				elseif($PageName=="Pethistory"){
					echo'<ul><li><a href="index.php">Home</a></li>';
					echo'<li><a href="procedures.php" >Procedures</a></li>';
					echo'<li><a href="addowner.php">Add Owner</a></li>';
					
					}
					/*active if pagename is procedures*/
				elseif($PageName=="Procedures"){
					echo'<ul><li><a href="index.php">Home</a></li>';
					echo'<li class="active"><a href="procedures.php" >Procedures</a></li>';
					echo'<li><a href="addowner.php">Add Owner</a></li>';
					
					}
									
					// active for home
					else{ 
						echo'<ul><li class="active"><a href="index.php">Home</a></li>';
						echo'<li><a href="procedures.php" >Procedures</a></li>';
						echo'<li><a href="addowner.php">Add Owner</a></li>';
						
					}//end else
			
				
				echo '<li><a href="logout.php">Log Out</a></li></ul>';	
			}//ends else
				else{
					echo '<ul><li><a href="login.php">Log In</a></li></ul>';
				}//ends else
			
}//ends get nav li

///////////////////////////////////////////////////////////userid///////////////////////////////////////////////////////////
/*gets the user id*/
function get_user_id($con)
{	
					$username=$_SESSION["username"];
					
					$sql='SELECT UserID FROM users where UserName=".$username."';
					 
					$result=mysqli_query($con,$sql) or die(mysqli_error($con));
					$UserID=mysqli_fetch_assoc($result);
					
					return $UserID['UserID'];
					
	
}//end get id
			 
			 
			 
///////////////////////////////////////////////////////////ownerid///////////////////////////////////////////////////////////
/*gets the user id*/
function get_owner_id($con)
{	
					$username=$_SESSION["username"];
					
					$sql='SELECT UserID FROM users where UserName=".$username."';
					 
					$result=mysqli_query($con,$sql) or die(mysqli_error($con));
					$UserID=mysqli_fetch_assoc($result);
					
					return $UserID['UserID'];
					
	
}//end get id
	

///////////////////////////////////////////////////////////ownerid///////////////////////////////////////////////////////////
/*gets the user id*/
function get_pet_id($con)
{	
					
					$sql='SELECT PetID FROM users where UserName=".$username."';
					 
					$result=mysqli_query($con,$sql) or die(mysqli_error($con));
					$UserID=mysqli_fetch_assoc($result);
					
					return $UserID['UserID'];
					
	
}//end get id
	
	///////////////////////////////////////////////////////////doctorid#///////////////////////////////////////////////////////////
/*gets the user id*/
function get_dr_id($con, $DoctorID)
{	
					
					$sql="SELECT UserID FROM users where UserName='".$DoctorID."'";
					
					//echo $sql; exit;
					 
					$result=mysqli_query($con,$sql) or die(mysqli_error($con));
					$UserID=mysqli_fetch_assoc($result);
					
					//print_r($UserID); exit;
					
					return $UserID['UserID'];
					
	
}//end get id
	
	
			 
///////////////////////////////////////////get user avatar //////////////////////////////////////////////////////////////////
/*this function retrieves the user photo*/
function get_user_avatar($con){
   $UserName=$_SESSION["username"];
   $sql="SELECT Avatar FROM `users` WHERE `UserName`='$UserName'" ;
   //echo $sql; exit;
   $result=mysqli_query($con,$sql) or die(mysqli_error($con));
   $row=mysqli_fetch_assoc($result);

   return $row["Avatar"];
	
}//ends function


///////////////////////////////////////////get pet avatar //////////////////////////////////////////////////////////////////
/*this function retrieves the user photo*/
function get_pet_avatar($con, $PetID){
   $sql='SELECT avatar FROM `pets` where PetID='.$PetID;
   $result=mysqli_query($con,$sql) or die(mysqli_error($con));
   $row=mysqli_fetch_assoc($result);

   return $row["avatar"];
	
}//ends function

///////////////////////////////////////////get owners email //////////////////////////////////////////////////////////////////
/*this function retrieves the user photo*/
function get_owners_email($con, $OwnerID){
   $sql='SELECT Email FROM `owners` where OwnerID='.$OwnerID;
   $result=mysqli_query($con,$sql) or die(mysqli_error($con));
   $row=mysqli_fetch_assoc($result);

   return $row["Email"];
	
}//ends function

///////////////////////////////////////////get user email //////////////////////////////////////////////////////////////////
/*this function retrieves the user photo*/
function get_user_email($con, $UserID){
   $sql='SELECT Email FROM `users` where UserID='.$UserID;
   $result=mysqli_query($con,$sql) or die(mysqli_error($con));
   $row=mysqli_fetch_assoc($result);

   return $row["Email"];
	
}//ends function




/////////////////////////////////////////get username/////////////////////////////////////////////////////////////
/*gets the username*/
function get_user_name($con, $UserID)
{	
					$sql='SELECT UserName  FROM users where UserID='.$UserID;
					
					$result=mysqli_query($con,$sql) or die(mysqli_error($con));
					$UserName=mysqli_fetch_assoc($result);
					
					return $UserName['UserName'];
					
	
}//end get username


/////////////////////////////////////////get sex/////////////////////////////////////////////////////////////
/*gets the pets sex*/
function get_sex($con, $PetID)
{	
					$sql='SELECT Sex  FROM pets where PetID='.$PetID;
					
					$result=mysqli_query($con,$sql) or die(mysqli_error($con));
					$Sex=mysqli_fetch_assoc($result);
					//echo $Sex; exit;
					return $Sex['Sex'];
					
	
}//end get username








/////////////////////////////////////////get procedure name/////////////////////////////////////////////////////////////
/*gets the procedure name*/
function get_procedure_name($con, $ProcedureID)
{	
					$sql='SELECT ProcedureName FROM procedures where ProcedureID='.$ProcedureID;
					
					$result=mysqli_query($con,$sql) or die(mysqli_error($con));
					$ProcedureName=mysqli_fetch_assoc($result);
					
					//print_r($ProcedureName);
					
					return $ProcedureName['ProcedureName'];
					
	
}//end get procedure name




?>