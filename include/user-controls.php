<?php

require('include/sessionStart.php');

    if(empty ($_SESSION)){
        require('include/notLoggedIn.php');
    } else{
        require('include/Nav.php');
    }

?>