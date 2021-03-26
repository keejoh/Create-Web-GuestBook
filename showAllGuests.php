<!DOCTYPE html>

<!-- showAllGuests.php -->
<!-- Query the database to show all visitors -->
<!-- Using the mysqli API - Object Oriented Style -->
<!-- html section of the showAllGuests.php that sets the style for the table to be displayed -->
<html>
   <head>
      <meta charset = "utf-8">
      <title>Search Results</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  text-align: left;
  padding: 8px;
}
th{
	background-color: DarkGrey;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
   </head>
   <body>
   
      <?php
		//php section that queries the database for visitors and subsequently displays them
	
	     require_once 'login.php'; 
         //Connect to MySQL Server: create a new object named $dbConnection
		 $dbConnection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
		 
		 //Check the status of the connection:
		 
		 if ($dbConnection->connect_error) { //-> specifies a property of an Object
		 //If connect_error (a property of the $dbConnection object) has a value then an error happened
			die( "Could not connect to the database server: " . 
				"Error no." . $dbConnection->connect_errno .
					"</body></html>" );

		}
		//builds a query from the visitors table that will get the ID, first name, and last name
         $query = "SELECT visitors.ID, visitors.FirstName, visitors.LastName FROM visitors";

		 // Query the database and store the results in $result if query was successful
			if ( !( $result = $dbConnection->query($query) ) ) 
			{
			echo 
				print( "<p> made it here Could not execute query!</p>" );
				die( $conn->error . "</body></html>" );
			}
		 

      
  
	  ?>
	  <!-- end PHP script -->
      <table>
         <caption>Here are all the guests:  </caption>
	
         <?php
            // Fetch each record in the result set by iterating through each record
			// and print the resulsts/guests in a formatted table 
               print("<table>");
			   print( "<tr>" );
			   print("<th> ID </th>");
			   print("<th> First Name </th>");
			   print("<th> Last Name </th>");
			   print("</tr>");
			while ( $row = $result->fetch_array(MYSQLI_NUM) ) 
            {
			   print("<tr>");
               foreach ( $row as $value )
                  print( "<td>$value</td>" );
				  print( "</tr>" );
			   
			 
            } 
				print("</table>"); 

         ?>
      </table>
	  <!-- Display number of guests so far -->
      <p>There have been 
         <?php print( $result->num_rows) ?> guests.
		 
		 <?php
	  	  //Release the returned data to free mysql resources
		  $result->close();
		  		
		//Close the database connection - free the memory you have been using
		$dbConnection->close();
		 ?> 
	  </p>

   </body>
</html>