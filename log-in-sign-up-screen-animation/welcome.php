
<?php
session_start();
    if ($_SESSION['loggedin']==0){
        echo "you are not logged in, please login to continue";
        header( "refresh:2;url=login.php" );
    }

?>

<p>peep!</p>

<h1> Peep means done redirecting</h1>