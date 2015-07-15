<?php
// Always need the sessions start at the top //
session_start();
?>
<!DOCTYPE html>
<html>
	<body>
		<?php
		//unsets the session//
		//unset($_SESSION["username"]); 
		
		//session destroy destroys the session
		session_destroy();	
		header('Location: http://localhost/VetCompany/index.php');
		?>
				
	</body>
</html>