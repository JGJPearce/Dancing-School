<?php
    require("include/db.php");
    require("include/sessionStart.php");

    try{
        if(!isset($_POST['Username']) OR empty($_POST['Username']) OR !is_string($_POST['Username'])) throw new Exception('The Username is missing or not valid.');
        if(!isset($_POST['Password']) OR empty($_POST['Password']) OR !is_string($_POST['Password'])) throw new Exception('The Password is missing or not valid.');
        
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        
        $loggin = $db->query("SELECT Username, Password FROM LoginDetails WHERE Username = '$username' && Password = '$password'");
        
        
        if($loggin->num_rows == 1){
            echo("You are now logged in, Welcome");
            $_SESSION["loggedIn"] = true;  
            $_SESSION["Username"] = $username;
            $_SESSION["Password"] = $password;
        } else {
            echo("These account does not exist");
        }
?> 
        <br/>
        <a href="index.php">Return to the Home page.</a>

<?php
    }
    
    catch(Exception $e){
        echo $e->getMessage();
    }

?>