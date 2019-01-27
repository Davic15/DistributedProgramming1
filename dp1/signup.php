<?php
require_once 'header.php';

echo <<<_END
  <script>
    function checkUser1(user)
    {
      if (user.value == '')
      {
        O('info').innerHTML = ''
        return
      }
      
      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")
      
      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              O('info').innerHTML = this.responseText
      }
      request.send(params)
    }
    
    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>
  <div class='main'><h3>Please enter your details to sign up</h3>
_END;

$error = $user = $pass = $repass = "";
if (isset($_SESSION['user'])) 
{
    destroySession();
}

if (isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $repass = sanitizeString($_POST['repass']);
    
    if ($user == "" || $pass == "" || $repass == "")
    {
        $error = "Not all fields were entered<br><br>";
    }
    else
    {
        if (!checkEmailAddress($user))
        {
            $error = "The Email typed is not valid.<br><br>";
        }
        else
        {
            if (checkPasswordSpecial($pass)==FALSE || checkPasswordSpecial($repass)==FALSE)
            {
                $error = "The password or retype password doesn't contain any special character.<br><br>";
            }
            else
            {
                if ($pass != $repass)
                {
                    $error = "Both passwords are not the same. Please try again.<br><br>";
                }
                else 
                {
                    $result = queryMysql("SELECT * FROM user WHERE user='$user'");
                    if ($result->num_rows)
                    {
                        $error = "That username already exists<br><br>";
                    }
                    else
                    {
                        queryMysql("INSERT INTO user VALUES('$user', '$pass')");
                        //die("<h4>Account created</h4>Please Log in.<br><br>");
                        
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
}

echo <<<_END
    <form method='post' action='signup.php'>$error
    <span class='fieldname'>Username</span>
    <input type='text' maxlength='30' name='user' value='$user'
      onBlur='checkUser(this)' title='Type a valid email.'><span id='info'></span><br>
    
    <span class='fieldname'>Password</span>
    <input type='password' maxlength='30' name='pass'
      value='$pass' title='Type a password with at least two special characters.'><br>

    <span class='fieldname'>Re type password</span>
    <input type='password' maxlength='30' name='repass'
    value='$repass' title='Re-type a password with at least two special characters.'>
    <br>
_END;
?>
	<br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Sign up' title='Click to send your information to sign up.'>
    </form></div><br>
  </body>
</html>
