<!DOCTYPE html>

<!-- Create a functioning form so people can register for a visitor log -->

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Signing the Guest Book</title>
    <style type = "text/css">
        label  { width: 5em; float: left; }
        .error {
            color: #ff0000;
            font-weight: bold;
            border: 0px none;
        }
    </style>
</head>
<body>

<?php

require_once 'login.php';

$displayForm = true;
$inputError = false;

// Connect to MySQL Server
$dbConnection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

//Check the status of the connection:
if ($dbConnection->connect_error) {
    die( "Could not connect to the database server: " .
        $dbConnection->connect_error  . " " . $dbConnection->connect_errno .
        "</body></html>" );
}
//===========================================================================

$firstName = "";
$firstName_error="";
$lastName="";
$lastName_error="";

//===========================================================================
if (isset($_POST['signbook'])) {
    // allows user to add entries to visitors table
    if(!@include("addop.php"))
        die ("Couldn't open a required file, 'addop.php'");
    else
        require_once 'addop.php';
}

//===========================================================================
if (isset($_POST['viewbook'])) {
    // allows user to view guestbook
    if(!@include("guestbook.php"))
        die ("Couldn't open a required file, 'guestbook.php'");
    else
        require_once 'guestbook.php';
}
//===========================================================================

if ($displayForm) {

    ?>

    <h2><b>Enter your name to sign the guest book:</b></h2>
    <form method="post" action="addop.php">
        <p>Last Name:</p>
        <p><input type="text" name="lastName" size="40" value="<?php echo $lastName; ?>">
            &nbsp;<input type="text" id="lName_error" class="error" size="40" value="<?php echo $lastName_error; ?>">
        </p>
        <p>
        <p>First Name:</p>
        <p><input type="text" name="firstName" size="40" value="<?php echo $firstName; ?>">
            &nbsp;<input type="text" id="fName_error" class="error" size="40" value="<?php echo $firstName_error; ?>">
        </p>
        <input type="Submit" name="signbook" value="Sign Book"/>&nbsp;&nbsp;
        <input type="Submit" name="viewbook" value="View Guestbook"/>&nbsp;&nbsp;
        </p>
    </form>

    <?php
}
	?>

</body>
</html>