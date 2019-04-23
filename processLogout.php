<?php 
    include('include/sessionStart.php');
    
    echo("You are now logged out. Goodbye.");
    
    $_SESSION = array();

    session_destroy();

?>

<a href="index.php">Return to the Home page.</a>