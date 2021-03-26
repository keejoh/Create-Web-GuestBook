<?php

if (isset($_POST['viewbook'])) {
    $guestBook_query = "SELECT * from visitors";
    echo $guestBook_query;
}
