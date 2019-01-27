<?php
    session_start();
    /* Check inactivity after some minutes. (start)*/
    /* I set the value in minutes and inside the if statement I
     * convert it in seconds. */
    $expireAfter = 2;                  
    if(isset($_SESSION['last_action']))
    {
        $secondsInactive = time() - $_SESSION['last_action'];
        $expireAfterSeconds = $expireAfter * 60;
        if ($secondsInactive >= $expireAfterSeconds)
        {
            session_unset();
            session_destroy();
        }
    }
    /*Check inactivity after some minutes. (end) */
    
    echo "<!DOCTYPE html>\n<html><head>";
    require_once 'functions.php';
    $userstr = ' (Guest)';
    if (isset($_SESSION['user']))
    {
        $user     = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr  = " ($user)";
        $_SESSION['last_action'] = time();
    }
    else
    {
        $loggedin = FALSE;
    }
    echo "<title>$appname$userstr</title><link rel='stylesheet' "   .
    "href='styles.css' type='text/css'>"                            .
    "</head><body><center><canvas id='logo' width='624' "           .
    "height='96'>$appname</canvas></center>"                        .
    "<div class='appname'>$appname$userstr</div>"                   .
    "<script src='javascript.js'></script>";
    
    if ($loggedin)
    {
        echo "<br ><ul class='menu'>" .
            "<li><a href='map.php?view=$user'>Home</a></li>"    .
            "<li><a href='map.php'>Location</a></li>"           .
            "<li><a href='logout.php'>Log out</a></li></ul><br>";
    }
    else
    {
        echo ("<br><ul class='menu'>"                              .
            "<li><a href='index.php'>Home</a></li>"                .
            "<li><a href='signup.php'>Sign up</a></li>"            .
            "<li><a href='login.php'>Log in</a></li></ul><br>"     .
            "<span class='info'>&#8658; You must be logged in to " .
            "view this page.</span><br><br>");
    }
?>    