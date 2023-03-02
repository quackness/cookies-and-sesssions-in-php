<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'MyCustomSessionHandler.php';

$handler = new MyCustomSessionHandler();
session_set_save_handler($handler);
session_start();

// Check if the user is logged in, if not then redirect him to login page
if ( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ) {
    // print_r($_SESSION);
    // echo "working?";
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PHP Sessions</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="background">
        <div class="container col-md-8">

            <div class="navbar-area text-center">
                <a class="page-scroll" href="dashboard.php">HOME</a>
            </div>

            <div class="text-center">
                <h4 class="title">Use Our Services</h4>
                <p class="text">Stop wasting time and money designing in managing a website that doesn’t get results</p>

                <?php if (isset($_SESSION["username"])) : ?>
                    <p class="title">Thank you <?php echo $_SESSION['username']; ?>, for subscribing.</p>
                    Click here to <a href="logout.php">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>


