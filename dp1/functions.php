<?php
/*
 * Name:        Franklin David
 * Surname:     Macias Avellan
 * Student ID:  217594
 * Subject:     Distributed Programming 1
 * */

    $dbhost = 'localhost';
    $dbname = 'dp1';
    $dbuser = 'root';
    $dbpass = '';
    $appname = ' - Locations - ';

/******************************************************************/
    /* Check if JavaScript is enabled or not
     * If JavaScript is not enabled the noscript tag are executed
     * and redirect to the error page.
     * */
echo <<<_END
    <noscript>
      <meta http-equiv=refresh content='0; url=error.php'>
    </noscript>
_END;
/******************************************************************/

/******************************************************************/
    /* Check if cookies are enabled or not.
     * I set a cookie and check if the cookie exist or not
     *  On error case the user is redirect to error.php*/
    setcookie('testcookie', "dp1");
    if (!isset($_COOKIE['testcookie']))
    {
        /*Cookies are not enabled and the user is redirect to error.php*/
        header("Location: https://localhost/dp1/error.php");
    }
/******************************************************************/

/******************************************************************/    
    /* Force HTTPS in the whole site.*/
    if ($_SERVER["HTTPS"] != "on")
    {
        header("Location: https://" .$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        exit();
    }
/******************************************************************/
        
    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($connection->connect_errno) die($connection->connect_error);
    function createTable($name, $query)
    {
        queryMsql("CREATE TABLE IF NOT EXIST $name($query)");
        echo "Table '$name' created or already exists.<br>";
    }
    
    function queryMysql($query)
    {
        global $connection;
        $result = $connection->query($query);
        if(!$result) die($connection->error);
        return $result;
    }
    
    function destroySession()
    {
        $_SESSION = array();
        if (session_id() != "" || isset($_COOKIE[session_name()]))
        {
            setcookie(session_name(), '', time()-2592000, '/');
        }
        session_destroy();
    }
    
    function sanitizeString($var)
    {
        global $connection;
        $var = strip_tags($var);
        $var = htmlentities($var);
        $var = stripslashes($var);
        return $connection->real_escape_string($var);
    }
    
    function checkEmailAddress($var)
    {
        $check = 0;
        $var = filter_var($var, FILTER_SANITIZE_EMAIL);
        if(filter_var($var, FILTER_VALIDATE_EMAIL))
        {
            $check = TRUE;
        }
        else 
        {
            $check =  FALSE;
        }
        return $check;
    }
    
    function checkPasswordSpecial($var)
    {   
        $counter = 0;
        $val = 0;
        $pattern = '/[^a-zA-Z\d]/';
        $counter = preg_match_all($pattern, html_entity_decode($var, ENT_QUOTES, 'UTF-8'));
        //echo $counter;
        if ($counter >= 2)
        {
            $val = TRUE;
        }
        else
        {
            $val = FALSE;
        }
        return $val;
    }