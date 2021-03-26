<?php

$lastName = $_POST['lastName'];
if (empty($lastName))
    $lastName_error = "Last Name is required";

$firstName = $_POST['firstName'];
if (empty($firstName))
    $firstName_error = "First Name is required";

if (!empty($lastName_error) || !empty($firstName_error))
    $inputError = true;

//===========================================================================
if ($inputError == false) {

    //Name Query:
    $addName = "INSERT INTO visitors (LastName, FirstName)";
    $addName .= "VALUES ('$lastName', '$firstName')";

    if ( !( $result = $dbConnection->query($addName) ) ) {
        print( "<p>Could not execute name query!</p>" );
        die( $dbConnection->error . "</body></html>" );
    } else {
        echo "<h2>Visitors table was successfully updated</h2>";
    }

    $displayForm = false;
    echo "<p><a href=\"exam1p2.php\">Sign again?</a></p>\n";

}

