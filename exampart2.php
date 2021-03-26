<!DOCTYPE html>

<!-- exampart2.php main functions together -->
<!-- Allows insert operation into the visitors table and redisplays the original form -->
<!-- Using the mysqli API - Object Oriented Style -->
<!-- Html section for exampart2.php sets css for corresponding parts -->
<html>
	<head>
		<meta charset = "utf-8">
			<title>Search Results</title>
			<style type = "text/css">
         body  { font-family: sans-serif;
                 } 
         table { background-color: lightblue; 
                 border-collapse: collapse; 
                 border: 1px solid gray; }
         td    { padding: 5px; }
         tr:nth-child(odd) {
                 background-color: white; }
			</style>
		</head>
		<body>
	<?php
	//php section of exampart2.php
	//sets a variable to hold first name and last name from html section of the code
	  $firstName = ($_POST['fname']);
	  $lastName = ($_POST['lname']);
	//set variable $displayform to true so form is redisplayed.
	  $displayform = TRUE;
	//checks if the form has been submitted before running the php section of the code
	if (isset($_POST['sendNames'])) {
	//validates that a first name and last name has been submitted to the form	
	  if (empty($firstName) or empty($lastName)){
		echo 'You must enter a first and last name';

	  }
	//if entries are present for first name and last name runs the following php to work with the database
	  else{
	     require_once 'login.php'; 
         //Connect to MySQL Server: create a new object named $dbConnection
		 $dbConnection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
		 
		 //Check the status of the connection:
		 
		 if ($dbConnection->connect_error) { //-> specifies a property of an Object
		 //If connect_error (a property of the $dbConnection object) has a value then an error happened
		
			die( "Could not connect to the database server: " . 
				"Error no." . $dbConnection->connect_error .
					"</body>
</html>" );

		}
      // Build a a query to insert values into the visitors table

      $query = "INSERT INTO visitors (FirstName, Lastname )";
      $query .= "VALUES ('$firstName' ,'$lastName' )";
      //checks that the query was able to properly run and executes if able to run
      if ( !( $result = $dbConnection->query($query) ) ) {
         print( "<p>Could not execute query!</p>" );
         die( $dbConnection->error . "</body>
</html>" );
      } else
		echo "<h1>Database successfully updated.</h1>";
	  }		 // end if

 	}
	//redisplays form
 if($displayform){     
	  ?>
	<!-- Main section of HTML that displays the correct form for guests to add their names to the visitors table -->
			<h1>Enter your name to sign the guest book</h1>
			<form method = "post" action = "exampart2.php">
				<div>
					<label>First name:</label> 
					<input type = "text" name = "fname">
					</div>
					<div>
						<label>Last name:</label>
						<input type = "text" name = "lname">
						</div>
					</p>
					<br/>
					<p>
						<input type = "submit" name="sendNames" value = "Submit">
						</p>
						<p>
						<!-- provides a link to another php file that will display all guests stored in the visitors table -->
							<a href="showAllGuests.php"> Show Guests </a>
						</p>
					</form>
				</body>
				<?php
 }
 ?>
			</html>