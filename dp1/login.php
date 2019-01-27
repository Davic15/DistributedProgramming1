<?php
require_once 'header.php';
echo "<div class='main'><h3>Please enter your details to log in</h3>";
$error = $user = $pass = "";

if (isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == "")
    {
        $error = "Not all fields were entered.<br><br>";
    }
    else
    {
        if (!checkEmailAddress($user))
        {
            $error = "The Email typed is not valid.<br><br>";
        }
        else
        {
            if (checkPasswordSpecial($pass)==FALSE)
            {
                $error = "The password doesn't contain any special character.<br><br>";
            }
            else 
            {
                $result = queryMySQL("SELECT user,password FROM user
                                      WHERE user='$user' AND password='$pass'");
                    
                if ($result->num_rows == 0)
                {
                    $error = "<span class='error'>Username/Password
                    invalid</span><br><br>";
                }
                else
                {
                    $_SESSION['user'] = $user;
                    $_SESSION['pass'] = $pass;
                    $_SESSION['last_action'] = time();
                    header("Refresh:2; map.php");
                    die("You are now logged in. Please <a href='map.php?view=$user'>" .
                        "click here</a> to continue or wait 2 seconds to redirect you.<br><br>");
                 }
            }
        }
    }
}

echo <<<_END
    <form method='post' action='login.php'>$error
    <span class='fieldname'>Username</span><input type='text'
      maxlength='30' name='user' value='$user' title = "Type your username (email)."><br>
    <span class='fieldname'>Password</span><input type='password'
      maxlength='30' name='pass' value='$pass' title = "Type your password.">
_END;
?>

    <br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Login' title="Click to send your information to log in.">
    </form><br></div>
  </body>
</html>
