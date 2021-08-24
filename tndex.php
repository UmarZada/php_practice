<?php
session_start();
if(isset($_SESSION['email']))
{
    echo '<h1>welcome to' .$_SESSION  ['email']. '</h1>';
    echo '<h4><a href="logout.php">logout</a> </h4>';
}
else
{
    echo '<h1>access denied</h1>';
    //header('location:Sign_in.php');
}

?>