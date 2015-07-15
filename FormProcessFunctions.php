<?php
///////////////////////////////////////////////register new user/////////////////////////////////////////////////////////////////////////
/*this function registers new users and enters them into the user table*/
function register_new_user($con)
{
	
	//get the name
	$Name=mysqli_real_escape_string($con, trim($_POST["Name"]));
	//get the usernme
	$UserName=mysqli_real_escape_string($con, trim($_POST["UserName"]));
	//get the user id password
	$Password=mysqli_real_escape_string($con, trim($_POST["Password"]));
	//get the user email
	$Email=mysqli_real_escape_string($con, trim($_POST["Email"]));
	

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

	}//ends else

	
	//build the sql statement
	$FileName=basename( $_FILES["fileToUpload"]["name"]);
	
	$sql='INSERT INTO `users` (`UserName`, `Password`, `Name`, `Email`, `Avatar`)
	VALUES ( "'.$UserName.'", "'.sha1("$Password").'", "'.$Name.'", "'.$Email.'", "'.$FileName.'")';

	//run the querry
	$result=mysqli_query($con, $sql) or die(mysqli_error($con));
	//redirecct to homepage with flag variables
	header("location:http://localhost/VetCompany/login.php?registeruser=1");
	
}//ends first if



///////////////////////////////////////////////add new owner /////////////////////////////////////////////////////////////////////////
/*this function registers new users and enters them into the user table*/
function add_new_owner($con)
{   
    //get the usernme
	$UserName=mysqli_real_escape_string($con, trim($_POST["UserName"]));
	//get the user id password
	$Password=mysqli_real_escape_string($con, trim($_POST["Password"]));
	//get the name
	$Name=mysqli_real_escape_string($con, trim($_POST["Name"]));
	//get the user contact number
	$ContactNumber=mysqli_real_escape_string($con, trim($_POST["ContactNumber"]));
	//get the user email
	$Email=mysqli_real_escape_string($con, trim($_POST["Email"]));
	//get the user address
	$Address=mysqli_real_escape_string($con, trim($_POST["Address"]));

	$sql2='INSERT INTO `vet`.`owners` (`UserName`, `Password`, `Name`, `ContactNumber`, `Email`, `Address`)
	VALUES ( "'.$UserName.'", "'.sha1("$Password").'", "'.$Name.'", "'.$ContactNumber.'", "'.$Email.'", "'.$Address.'")';

	//run the querry
	$result=mysqli_query($con, $sql2) or die(mysqli_error($con));
	//redirecct to homepage with flag variables
	header("location:http://localhost/VetCompany/index.php?registerowner=1");
	
}//ends first if


	

///////////////////////////////////////////////show add owner form/////////////////////////////////////////////////////////////////////////
/*this function brings up the regster form if the submit has not been pushed*/

function show_add_owner_form($error="")
{	
	//check to see if the error message is empty//
	if($error!=""){
		alert_user("alert", $error);
	}
	
?>
	<div class="bgcolor">
		<form action="addowner.php" method="POST" enctype="multipart/form-data">
			<p>Please enter all the information below aout the pet owner! </p>
			
			
			<br>
			UserName:<input type="text" name="UserName">
			<br>
			Password:<input type="text" name="Password">
			<br>
			Name:<input type="text" name="Name">
			<br>
			Contact Number:<input type="text" name="ContactNumber">
			<br>
			Email:<input type="text" name="Email">
			<br>
			Address:<input type="text" name="Address">
			<br><br>
			<input type="submit" name="Submit" value="Submit">
		</form> 
	</div>
<?php	
	
	
}//end register form





///////////////////////////////////////////////add new pet/////////////////////////////////////////////////////////////////////////
/*this function registers new users and enters them into the user table*/
function add_new_pet($con)
{
	//get the onwerid
	$OwnerID=mysqli_real_escape_string($con, trim($_POST["OwnerID"]));
	//get the pettype
	$PetType=mysqli_real_escape_string($con, trim($_POST["PetType"]));
	//get the name
	$Name=mysqli_real_escape_string($con, trim($_POST["Name"]));
	//get the age
	$Age=mysqli_real_escape_string($con, trim($_POST["Age"]));
	//get the sex
	$Sex=mysqli_real_escape_string($con, trim($_POST["Sex"]));
	//get the user id password
	$DoctorName=mysqli_real_escape_string($con, trim($_POST["DoctorName"]));


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

	}//ends else

	
	
	//build the sql statement
	$DoctorName=$_SESSION["username"];
	$FileName=basename( $_FILES["fileToUpload"]["name"]);
	
	$sql='INSERT INTO `pets` (`OwnerID`, `PetType`, `Name`, `Age`, `Sex`, `Doctor`, `Avatar`)
	VALUES ( "'.$OwnerID.'", "'.$PetType.'", "'.$Name.'", "'.$Age.'", "'.$Sex.'", "'.$DoctorName.'", "'.$FileName.'")';

	//run the querry
	$result=mysqli_query($con, $sql) or die(mysqli_error($con));
	//redirecct to homepage with flag variables
	header("location:http://localhost/VetCompany/index.php?addpet=1");
	
}//ends first if




///////////////////////////////////////////////update pet/////////////////////////////////////////////////////////////////////////
/*this function updates pets info and enters them into the pets table*/
function update_pet($con)
{   

	//get the pettype
	$PetType=mysqli_real_escape_string($con, trim($_POST["PetType"]));
	//get the name
	$Name=mysqli_real_escape_string($con, trim($_POST["Name"]));
	//get the age
	$Age=mysqli_real_escape_string($con, trim($_POST["Age"]));
	//get the sex
	$Sex=mysqli_real_escape_string($con, trim($_POST["Sex"]));
	//tke petid from the hidden field
	$PetID=$_POST["PetID"];
	

	
	
	//build the sql statement
	$DoctorName=$_SESSION["username"];


	

	
	//if the userpost isset then//
	
	$sql='UPDATE pets SET PetType =  "'.$PetType.'", Name = "'.$Name.'", Age = "'.$Age.'", Sex = "'.$Sex.'" WHERE PetID = "'.$PetID.'"';
	//echo $sql; exit;
	//run the querry
	$result=mysqli_query($con, $sql) or die(mysqli_error($con));
	//redirecct to homepage with flag variables
	header("location:http://localhost/VetCompany/pethistory.php?petid=".$PetID."&updatepet=1");
	
}//ends first if



///////////////////////////////////////////////show update pet form/////////////////////////////////////////////////////////////////////////
/*this function brings up the add pet form*/

function show_update_pet_form($con,$error="")
{	
	//check to see if the error message is empty//
	if($error!=""){
		alert_user("alert", $error);
	}
	if(isset($_GET["petid"])){
		$PetID=$_GET["petid"];
		
		$sql="SELECT * FROM pets WHERE PetID=$PetID";
		// run the my sqli querry //
		$result=mysqli_query($con,$sql) or die(mysqli_error($con));
		while($row=mysqli_fetch_assoc($result)){
				
		$PetType=$row['PetType'];
		$Name=$row['Name'];
		$Age=$row['Age'];
		$Sex=$row['Sex'];
	
?>
	<div class="UpdatePetForm">
		<form action="updatepet.php" method="POST" enctype="multipart/form-data">
			<p>Please enter your pets information below! </p>

			Pet Type:<input type="text" name="PetType" value="<?php echo $PetType; ?>">
			<br>
			Name:<input type="text" name="Name" value="<?php echo $Name; ?>">
			<br>
			Age:<input type="text" name="Age" value="<?php echo $Age; ?>">
			<br>
			Sex:<input type="text" name="Sex" value="<?php echo $Sex; ?>">
			<input type="hidden" name="PetID" value="<?php echo $PetID; ?>">
			<br>
			
			<input type="submit" name="Submit" value="Submit">
		</form> 
	</div>
<?php	
		}//ends the while loop
	}//ends if isset get petid	
}//end register form



///////////////////////////////////////////////////////check update pet form error////////////////////////////////////////////////////////////////////
/*this function takes an error string and outputs a the 
for with the error string, Has 1 parameter called error,
the default value of error is blank which means if the programer
 does not enter the value then the error wil be "" and
 the  form will still pop up still
*/

function check_update_pet_form_error()
{
	
	$error="";
		
			//checks for special characters
			//$Name=filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
				
					//if($Name!=$_POST["Name"]){
					
						//$error.="Please remove the special characters from your name<br><br>";
					//}//ends if error
					
				//else{
						//checks for a duplicate name
					//if(check_if_pet_name_exists()){
						//$error.="That Username already exists!<br><br>";
						//}//ends if duplicate
				//}//ends specil characters test
					

		
					
		
			
			return $error;
}//ends error check


///////////////////////////////////////////////update pet photo/////////////////////////////////////////////////////////////////////////
/*this function updates pets info and enters them into the pets table*/
function update_pet_photo($con)
{   

	
	//tke petid from the hidden field
	$PetID=$_POST["PetID"];
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

	}//ends else

	
	
	//build the sql statement
	$DoctorName=$_SESSION["username"];

	$FileName=basename( $_FILES["fileToUpload"]["name"]);
	

	
	//if the userpost isset then//
	
	$sql='UPDATE pets SET Avatar = "'.$FileName.'" WHERE PetID = "'.$PetID.'"';
	//echo $sql; exit;
	//run the querry
	$result=mysqli_query($con, $sql) or die(mysqli_error($con));
	//redirecct to homepage with flag variables
	header("location:http://localhost/VetCompany/pethistory.php?petid=".$PetID."&updatepetphoto=1");
	
}//ends first if



///////////////////////////////////////////////show update pet photo form/////////////////////////////////////////////////////////////////////////
/*this function brings up the add pet form*/

function show_update_pet_photo_form($con,$error="")
{	
	//check to see if the error message is empty//
	if($error!=""){
		alert_user("alert", $error);
	}
	if(isset($_GET["petid"])){
		$PetID=$_GET["petid"];
		
		$sql="SELECT * FROM pets WHERE PetID=$PetID";
		// run the my sqli querry //
		$result=mysqli_query($con,$sql) or die(mysqli_error($con));
		while($row=mysqli_fetch_assoc($result)){
				
		$PetType=$row['PetType'];
		$Name=$row['Name'];
		$Age=$row['Age'];
		$Sex=$row['Sex'];
	
?>
	<div class="UpdatePetForm">
		<form action="updatepetphoto.php" method="POST" enctype="multipart/form-data">

			<input type="hidden" name="PetID" value="<?php echo $PetID; ?>">
			<br>
			
			Select image to upload <br> 150px by 150px recommended :<input type="file" name="fileToUpload" id="fileToUpload">
			<br><br>
			<input type="submit" name="Submit" value="Submit">
		</form> 
	</div>
<?php	
		}//ends the while loop
	}//ends if isset get petid	
}//end register form



///////////////////////////////////////////////////////check update pet form error////////////////////////////////////////////////////////////////////
/*this function takes an error string and outputs a the 
for with the error string, Has 1 parameter called error,
the default value of error is blank which means if the programer
 does not enter the value then the error wil be "" and
 the  form will still pop up still
*/

function check_update_pet_photo_form_error()
{
	
	$error="";
		
			//checks for special characters
			//$Name=filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
				
					//if($Name!=$_POST["Name"]){
					
						//$error.="Please remove the special characters from your name<br><br>";
					//}//ends if error
					
				//else{
						//checks for a duplicate name
					//if(check_if_pet_name_exists()){
						//$error.="That Username already exists!<br><br>";
						//}//ends if duplicate
				//}//ends specil characters test
					

		
					
		
			
			return $error;
}//ends error check








///////////////////////////////////////////////////////check register user form error////////////////////////////////////////////////////////////////////
/*this function takes an error string and outputs a the 
for with the error string, Has 1 parameter called error,
the default vale of error is blank which means if the programer
 does not enter the value then the error wil be "" and
 the  form will still pop up still
*/

function check_register_form_error()
{
	
	$error="";
			if(empty($_POST["UserName"])){
				$error.="Please Enter A Username!<br><br>";
			}
			else{
			//checks for special characters
			$UserName=filter_var($_POST["UserName"], FILTER_SANITIZE_STRING);
				
					if($UserName!=$_POST["UserName"]){
					
						$error.="Please remove the special characters from your username<br><br>";
					}//ends if error
					
					else{
						//checks for a duplicate name
						if(check_if_username_exists()){
							$error.="That Username already exists!<br><br>";
						}//ends if duplicate
					}//ends specil characters test
					
			}//ends not empty else
				
			if(empty($_POST["Password"])){
				$error.="Please Enter A Password!<br><br>";
			}
			
			if(empty($_POST["Name"])){
				$error.="Please Enter A name!<br><br>";
			}
			else{//sanitize the name
			$Name=filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
				if($Name!=$_POST["Name"]){
					$error.="Please remove the special characters from your name<br><br>";
				}//ends if error
				
				
			}
			if(empty($_POST["ContactNumber"])){
				$error.="Please Enter A Contact Number!<br><br>";
			}
			if(empty($_POST["Email"])){
				$error.="Please Enter an email!<br><br>";
			} //an email is entered
			else{
				//removes all the illegal characters
				$Email = filter_var($_POST["Email"], FILTER_SANITIZE_EMAIL);
				if($Email!=$_POST["Email"]){
					$error.="please enter an email with out special characters<br><br>";
				}//ends if
				else{
					// Validate e-mail
					if (!filter_var($Email, FILTER_VALIDATE_EMAIL) === true) {
						$error.="Your Email was not a valid email address<br><br>";
							}
				}//ends  validate else
			}
			if(empty($_POST["Address"])){
				$error.="Please Enter An address!<br><br>";
			}
			return $error;
}//ends error check






///////////////////////////////////////////////////////check add owner form error////////////////////////////////////////////////////////////////////
/*this function takes an error string and outputs a the 
for with the error string, Has 1 parameter called error,
the default value of error is blank which means if the programer
 does not enter the value then the error wil be "" and
 the  form will still pop up still
*/

function check_add_owner_form_error()
{
	
	$error="";
			if(empty($_POST["UserName"])){
				$error.="Please Enter A Username!<br><br>";
			}
			else{
			//checks for special characters
			$UserName=filter_var($_POST["UserName"], FILTER_SANITIZE_STRING);
				
					if($UserName!=$_POST["UserName"]){
					
						$error.="Please remove the special characters from your username<br><br>";
					}//ends if error
					
					else{
						//checks for a duplicate name
						if(check_if_username_exists()){
							$error.="That Username already exists!<br><br>";
						}//ends if duplicate
					}//ends specil characters test
					
			}//ends not empty else
				
			if(empty($_POST["Password"])){
				$error.="Please Enter A Password!<br><br>";
			}
			
			if(empty($_POST["Name"])){
				$error.="Please Enter A name!<br><br>";
			}
			else{//sanitize the name
			$Name=filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
				if($Name!=$_POST["Name"]){
					$error.="Please remove the special characters from your name<br><br>";
				}//ends if error
				
				
			}
			if(empty($_POST["ContactNumber"])){
				$error.="Please Enter A Contact Number!<br><br>";
			}
			if(empty($_POST["Email"])){
				$error.="Please Enter an email!<br><br>";
			} //an email is entered
			else{
				//removes all the illegal characters
				$Email = filter_var($_POST["Email"], FILTER_SANITIZE_EMAIL);
				if($Email!=$_POST["Email"]){
					$error.="please enter an email with out special characters<br><br>";
				}//ends if
				else{
					// Validate e-mail
					if (!filter_var($Email, FILTER_VALIDATE_EMAIL) === true) {
						$error.="Your Email was not a valid email address<br><br>";
							}
				}//ends  validate else
			}
			if(empty($_POST["Address"])){
				$error.="Please Enter An address!<br><br>";
			}
			return $error;
}//ends error check



	

///////////////////////////////////////////////show register user form/////////////////////////////////////////////////////////////////////////
/*this function brings up the regster form if the submit has not been pushed*/

function show_register_form($error="")
{	
	//check to see if the error message is empty//
	if($error!=""){
		alert_user("alert", $error);
	}
	
?>
	<div class="bgcolor">
		<form action="register.php" method="POST" enctype="multipart/form-data">
			<p>Please enter your name, username, password and email . Passwords are Case sensitive! </p>
			Username:<input type="text" name="UserName">
			<br>
			Name:<input type="text" name="Name">
			<br>
			Password:<input type="password" name="Password">
			<br>
			Email:<input type="text" name="Email">
			Select image to upload:<input type="file" name="fileToUpload" id="fileToUpload">
			<br><br>
			<input type="submit" name="Submit" value="Submit">
		</form> 
	</div>
<?php	
	
	
}//end register form

///////////////////////////////////////////////show add pet form/////////////////////////////////////////////////////////////////////////
/*this function brings up the add pet form*/

function show_add_pet_form($error="")
{	
	//check to see if the error message is empty//
	if($error!=""){
		alert_user("alert", $error);
	}
	
?>
	<div class="AddPetForm">
		<form action="addpet.php" method="POST" enctype="multipart/form-data">
			<p>Please enter your name, username, password and email . Passwords are Case sensitive! </p>
			<input type="hidden" value="<?php echo $_GET["OwnerID"];?>" name="OwnerID">
			Pet Type:<input type="text" name="PetType">
			<br>
			Name:<input type="text" name="Name">
			<br>
			Age:<input type="text" name="Age">
			<br>
			Sex:<input type="text" name="Sex">
			Select image to upload <br> 150px by 150px recommended :<input type="file" name="fileToUpload" id="fileToUpload">
			<br><br>
			<br><br>
			<input type="submit" name="Submit" value="Submit">
		</form> 
	</div>
<?php	
	
	
}//end register form




///////////////////////////////////////////////////////check add pet form error////////////////////////////////////////////////////////////////////
/*this function takes an error string and outputs a the 
for with the error string, Has 1 parameter called error,
the default value of error is blank which means if the programer
 does not enter the value then the error wil be "" and
 the  form will still pop up still
*/

function check_add_pet_form_error()
{
	
	$error="";
			if(empty($_POST["PetType"])){
				$error.="Please Enter A pet type!<br><br>";
			}
			else{
			//checks for special characters
			$Name=filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
				
					if($Name!=$_POST["Name"]){
					
						$error.="Please remove the special characters from your username<br><br>";
					}//ends if error
					
					else{
						//checks for a duplicate name
						if(check_if_pet_name_exists()){
							$error.="That Username already exists!<br><br>";
						}//ends if duplicate
					}//ends specil characters test
					
			}//ends not empty else
				
			if(empty($_POST["Age"])){
				$error.="Please Enter An age!<br><br>";
			}
			
				
			
			if(empty($_POST["Sex"])){
				$error.="Please Enter A sex!<br><br>";
			}
			
			return $error;
}//ends error check







///////////////////////////////////////////check duplicate username exists function//////////////////////////////////////////////////////
/* this function checks the database to make sure the username does not already exst int he function */
function check_if_username_exists(){
	//connect to the database// 
	include "connect_db.php";
	$UserName=$_POST["UserName"];
	$sql="SELECT UserName FROM `users` WHERE UserName='$UserName'";
	//run the query
	$result=mysqli_query($con,$sql) or die(mysqli_error($con));

	// Return the number of rows in result set make sure the customer username does not exist
	$rowcount=mysqli_num_rows($result);
		if($rowcount==1){
			return true;
			}
		else{
			return false;
			}
}//ends function

//////////////////////////////////////////check duplicate petname exists function//////////////////////////////////////////////////////
/* this function checks the database to make sure the petname does not already exst int he function */
function check_if_pet_name_exists(){
	//connect to the database// 
	include "connect_db.php";
	$Name=$_POST["Name"];
	$sql="SELECT Name FROM `pets` WHERE Name='$Name'";
	//run the query
	$result=mysqli_query($con,$sql) or die(mysqli_error($con));

	// Return the number of rows in result set make sure the customer username does not exist
	$rowcount=mysqli_num_rows($result);
		if($rowcount==1){
			return true;
			}
		else{
			return false;
			}
}//ends function

//////////////////////////////////////////check duplicate procedure exists function//////////////////////////////////////////////////////
/* this function checks the database to make sure the petname does not already exst int he function */
function check_if_procedure_name_exists(){
	//connect to the database// 
	include "connect_db.php";
	$ProcedureName=$_POST["ProcedureName"];
	$sql="SELECT ProcedureName FROM `procedures` WHERE ProcedureName='$ProcedureName'";
	//run the query
	$result=mysqli_query($con,$sql) or die(mysqli_error($con));

	// Return the number of rows in result set make sure the customer username does not exist
	$rowcount=mysqli_num_rows($result);
		if($rowcount==1){
			return true;
			}
		else{
			return false;
			}
}//ends function

///////////////////////////////////////////////login form/////////////////////////////////////////////////////////////////////////
/*this function brings up the login form if the submit has not been pushed*/

function show_login_form($error="")
{	
	//check to see if the error message is empty//
	if($error!=""){
		alert_user("alert", $error);
	}
	
?>
	<div class="bgcolor">
	<?php // show user message for successful registration 
	if(isset($_GET["registeruser"])){
								alert_user("success", "your profile has been registered! Please Login");	
								}
	
	?>
		<form action="login.php" method="POST">
			<p>Please enter your username and password. Passwords are Case sensitive!</p>
			Username:<input type="text" name="username">
			<br>
			Password:<input type="password" name="password">
			<br><br>
			<input type="submit" name="Submit" value="Submit">
		</form> 
	</div>
<?php	
	
	
}//end login form


///////////////////////////////////////////////////////check login form error////////////////////////////////////////////////////////////////////
/*this function takes an error string and outputs a the 
for with the error string, Has 1 parameter called error,
the default vale of error is blank which means if the programer
 does not enter the value then the error wil be "" and
 the  form will still pop up still
*/

function check_login_form_error()
{
	$error="";
			if(empty($_POST["username"])){
				$error.="Please Enter A Username!<br><br>";
			}
			if(empty($_POST["password"])){
				$error.="Please Enter A Password!<br><br>";
			}
			return $error;
}//ends error check

///////////////////////////////////////////////////////check addpost form error////////////////////////////////////////////////////////////////////
/*this function takes an error string and outputs a the 
for with the error string, Has 1 parameter called error,
the default vale of error is blank which means if the programer
 does not enter the value then the error wil be "" and
 the  form will still pop up still
*/

function check_addpost_form_error()
{
	$error="";
			if(empty($_POST["PostTitle"])){
				$error.="Please Enter A Title!<br><br>";
			}
			if(empty($_POST["PostContent"])){
				$error.="Please Enter Some Content!<br><br>";
			}
			return $error;
}//ends error check







////////////////////////////////////////////////////authenticate user//////////////////////////////////////////////////////////////////////
// this function authenticates the user and returns  true or false

function authenticate_user($con)
{
				//Get super global form values and put them into variables
				$username=mysqli_real_escape_string($con, trim($_POST["username"]));
				$password=mysqli_real_escape_string($con, trim($_POST["password"]));

				//build our SQL Statement with the username and password
				$sql="SELECT * FROM users WHERE password=SHA1('$password') and userName='$username'";


				// run the my sqli querry //
				$result=mysqli_query($con,$sql) or die(mysqli_error($con));

				// Return the number of rows in result set make sure the customer has logged an account and only 1
				$rowcount=mysqli_num_rows($result);
				
					if($rowcount==1){
						return true;
					}
					else{
						return false;
					}
}


////////////////////////////////////////////////alerts function//////////////////////////////////////////////////////////////
/*this the function for the colored alert box messages
type is the color of the box or message type success, warning, failurre
(string)type:"success" or "failure"
*/

function alert_user($type, $message){
	//sucessful post alert box
	if($type=="success"){
	echo'<div data-alert class="alert-box success radius">';
	echo $message;
	echo'<a href="#" class="close">&times;</a>';
	echo'</div>';	
}
else{
	//fail post alert box
	if($type=="alert"){
	echo'<div data-alert class="alert-box alert radius">';
	echo $message;
	echo'<a href="#" class="close">&times;</a>';
	echo'</div>';	
	
}}
}//ends function









///////////////////////////////////////////////add new procedure /////////////////////////////////////////////////////////////////////////
/*this function registers new procedures and enters them into the user table*/
function add_new_procedure($con)
{   
	//get the user email
	$ProceuredName=mysqli_real_escape_string($con, trim($_POST["ProcedureName"]));
	//get the user email
	$Description=mysqli_real_escape_string($con, trim($_POST["Description"]));
	//get the user address
	$Cost=mysqli_real_escape_string($con, trim($_POST["Cost"]));

	$sql2='INSERT INTO `vet`.`procedures` (`ProcedureName`, `Description`, `Cost`)
	VALUES ( "'.$ProceuredName.'", "'.$Description.'", "'.$Cost.'")';
	//echo $sql2; exit;
	//run the querry
	$result=mysqli_query($con, $sql2) or die(mysqli_error($con));
	//redirecct to homepage with flag variables
	header("location:http://localhost/VetCompany/procedures.php?addprocedure=1");
	
}//ends first if




///////////////////////////////////////////////show add procedure form/////////////////////////////////////////////////////////////////////////
/*this function brings up the regsiter procedure form*/

function show_add_procedure_form($error="")
{	
	//check to see if the error message is empty//
	if($error!=""){
		alert_user("alert", $error);
	}
	
?>
	<div class="bgcolor">
		<form action="addprocedure.php" method="POST" enctype="multipart/form-data">
			<p>Please enter all the information below about the procedure! </p>
			
			
			<br>
			Procedure Name:<input type="text" name="ProcedureName">
			<br>
			Description:<input type="text" name="Description">
			<br>
			Cost:<input type="text" name="Cost">
			<br><br>
			<input type="submit" name="Submit" value="Submit">
		</form> 
	</div>
<?php	
	
	
}//end register form







///////////////////////////////////////////////////////check add procedure form error////////////////////////////////////////////////////////////////////
/*this function takes an error string and outputs a the 
for with the error string, Has 1 parameter called error,
the default value of error is blank which means if the programer
 does not enter the value then the error wil be "" and
 the  form will still pop up still
*/

function check_add_procedure_form_error()
{
	
	$error="";
			if(empty($_POST["ProcedureName"])){
				$error.="Please Enter A Procedure name!<br><br>";
			}
			else{
			//checks for special characters
			$ProcedureName=filter_var($_POST["ProcedureName"], FILTER_SANITIZE_STRING);
				
					if($ProcedureName!=$_POST["ProcedureName"]){
					
						$error.="Please remove the special characters from your procedure name<br><br>";
					}//ends if error
					
					else{
						//checks for a duplicate name
						if(check_if_procedure_name_exists()){
							$error.="That procedure name already exists!<br><br>";
						}//ends if duplicate
					}//ends specil characters test
					
			}//ends not empty else
				
			if(empty($_POST["Description"])){
				$error.="Please Enter A Description!<br><br>";
			}
			else{//sanitize the name
			$Description=filter_var($_POST["Description"], FILTER_SANITIZE_STRING);
				if($Description!=$_POST["Description"]){
					$error.="Please remove the special characters from your Description<br><br>";
				}//ends if error	
			}
			
			if(empty($_POST["Cost"])){
				$error.="Please Enter A Cost!<br><br>";
			}
			else{
				//removes all the illegal characters
				$Cost = filter_var($_POST["Cost"], FILTER_SANITIZE_EMAIL);
				if($Cost!=$_POST["Cost"]){
					$error.="please enter an email with out special characters<br><br>";
				}//ends if
			}
	
			return $error;
}//ends error check



///////////////////////////////////////////////delete a procedure /////////////////////////////////////////////////////////////////////////
/*this function deletes procedures fro the the procedures table*/
function delete_Procedure($con)	
{
//gt the procedure for deleting
$ProcedureID=$_GET["procedureid"];
//echo $ProcedureID; exit;
//run the statement	
$sql='DELETE FROM `procedures` WHERE ProcedureID='.$ProcedureID;

//execute query
mysqli_query($con, $sql) or die(mysqli_error($con));


//header redirect
header("location:http://localhost/VetCompany/procedures.php?deleteprocedure=1");		

}//ends function





///////////////////////////////////////////////add new visit/////////////////////////////////////////////////////////////////////////
/*this function registers new procedures and enters them into the user table*/
function add_new_visit($con, $PetID)
{   
	//get the  procedure
	$ProcedureID=$_POST["ProcedureID"];
	//get the user description
	$VisitNotes=$_POST["VisitNotes"];
	//get the user DoctorID
	$DoctorID=$_POST["DoctorID"];
	//get the id number with this function
	$DrID=get_dr_id($con, $DoctorID);
	//get the petid
	$PetID=$_POST["PetID"];

	$sql2='INSERT INTO `vet`.`petvisits` (`ProcedureID`, `PetID`, `VisitNotes`, `DrID`)
	VALUES ( "'.$ProcedureID.'", "'.$PetID.'", "'.$VisitNotes.'", "'.$DrID.'")';
	//echo $sql2; exit;
	//run the querry
	$result=mysqli_query($con, $sql2) or die(mysqli_error($con));
	//redirecct to homepage with flag variables
	header("location:http://localhost/VetCompany/pethistory.php?petid=$PetID&addvisit=1");
	
}//ends fi











///////////////////////////////////////////////////////check add visit form error////////////////////////////////////////////////////////////////////
/*this function takes an error string and outputs a the 
for with the error string, Has 1 parameter called error,
the default value of error is blank which means if the programer
 does not enter the value then the error wil be "" and
 the  form will still pop up still
*/

function check_add_visit_form_error()
{
	
	$error="";
		
			//checks for special characters
			//$Name=filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
				
					//if($Name!=$_POST["Name"]){
					
						//$error.="Please remove the special characters from your name<br><br>";
					//}//ends if error
					
				//else{
						//checks for a duplicate name
					//if(check_if_pet_name_exists()){
						//$error.="That Username already exists!<br><br>";
						//}//ends if duplicate
				//}//ends specil characters test
					

		
					
		
			
			return $error;
}//ends error check

///////////////////////////////////////////////show add Visit form/////////////////////////////////////////////////////////////////////////
/*this function brings up the addd a visit form*/

function show_add_visit_form($con, $error="")
{	

//global $con;

	//check to see if the error message is empty//
	if($error!=""){
		alert_user("alert", $error);
	}
	$sql="SELECT * from Procedures order by ProcedureID DESC";
	
	
	$result=mysqli_query($con,$sql) or die(mysqli_error($con));
						/* determine number of rows result set */

	
    ?>
	<div class="AddVisit">
		<form action="addvisit.php" method="POST" enctype="form-data">
			<p>Please enter all the information below about the visit! </p>
			
			
			<br>
			Procedure Name:<?php echo "<select name='ProcedureID'>";	
					while($row=mysqli_fetch_assoc($result)){
						$ProcedureID=$row['ProcedureID'];
						$ProcedureName=$row['ProcedureName'];
						
						?><option value="<?php echo $ProcedureID ?>"><?php echo $ProcedureName ;
					}//ends result while
					echo "</select>";
					?>
			<br>
			<?php $PetID=$_GET["petid"]; ?>
			<input type="hidden" name="PetID" value="<?php echo $PetID; ?>">
			
			<?php if(isset($_SESSION["username"])){
			$DoctorID=$_SESSION["username"];
			?>
			<input type="hidden" name="DoctorID" value="<?php echo $DoctorID; ?>">
			<?php
			}
			?>
			Visit Notes:<input type="text" name="VisitNotes">
			<br><br>
			<input type="submit" name="Submit" value="Submit">
		</form> 
	</div>
	
<?php	
	
}//end register form



///////////////////////////////////////////////show site serch field/////////////////////////////////////////////////////////////////////////
/*this function brings up the regsiter procedure form*/

function site_search_form($con)
{
	
	

	
	
	

$Search=$_GET["Search"];

$sql="SELECT * FROM `owners` WHERE `Name` LIKE '$Search'";

$result=mysqli_query($con,$sql) or die(mysqli_error($con));

echo '$result';
	
}//end register form




///////////////////////////////////////////////show site serch field/////////////////////////////////////////////////////////////////////////
/*this function brings up the regsiter procedure form*/

function show_site_search_form($con)
{

	
?>
	<!-- HTML for SEARCH BAR -->

		<form id="tfnewsearch" method="get" action="http://www.google.com">
		        <input type="text" id="tfq2b" class="tftextinput2" name="q" size="21" maxlength="120" value="Search for owner by name"><input type="submit" value=">" class="tfbutton2">
		</form>
		<div class="tfclear"></div>
	
	
<?php	
	
	
}//end register form


	

