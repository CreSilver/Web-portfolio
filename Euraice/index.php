<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="description" content="Learn to use AI correctly with Euraice. Join our courses to master AI skills.">
        <meta name="author" content="SSilverko">
        <meta property="og:description" content="Learn to use AI correctly with Euraice. Join our courses to master AI skills.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://euraice.com/" />

        <?php include 'data_included.php';?>
        <link rel="stylesheet" href="style_index.css">
        
        <meta property="og:title" content="<?php echo $web_name.' - '.$slogan; ?>">
        <meta property="og:site_name" content="<?php echo $web_name;?>" />
        <title><?php echo $web_name." - ".$slogan; ?></title>
    </head>
    <body>
        <!-- Site background -->
        <img src="image/background01.png" alt="background" class="sitebackground">


        <!-- Header -->
        <header id="header">  
            <!-- Header design and mav menu -->
             <section>
                <article>
                    <div>
                        <a href="index.php"><img src="image/logo.svg" alt="logo" class="logo"></a>
                        <h3>&nbsp;<?php echo $web_name; ?></h3>
                    </div>
                    <button id="navButton">|||</button>
                    <nav id="nav">
                        <ul>
                            <li><a href="login_form.php">Log in</a></li>
                            <li><div></div></li>
                            <li><a href="register_form.php?offer_id=none">Register</a></li>
                        </ul>
                    </nav>
                </article>
             </section>
        </header>


        <!-- Content -->
        <main>
            <!-- Introduce -->
            <section class="intro">
                <article>
                    <h1>Welcome to <?php echo $web_name; ?></h1>
                    <h2><?php echo $slogan; ?></h2>
                    <a href="register_form.php?offer_id=none">Start now</a>
                </article>
            </section>


            <!-- Design transition -->
                <section class="introContainer"><div></div></section>
            <!-- About Euraice -->
            <section class="FirstContainer">
                <article class="container">
                    <h3>About <?php echo $web_name; ?></h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur bibendum justo non orci. Nullam eget nisl. Phasellus et lorem id felis nonummy placerat. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante.</p>
                    <p>Itaque earum rerum hic tenetur a sapiente delectus</p>
                </article>
            </section>


            <!-- What you can learn -->
            <section class="SecondContainer">
                <article class="container">
                    <h3>What we offer</h3>
                    <p>You'll learn how to properly create prompts to get the best posible results.</p>
                    <p>You'll learn how to use AI to make your work easier.</p>
                    <p>You'll discover the bright and dark side of AI.</p>
                    <p>You'll learn the principles of how AI works</p>
                    <p>You'll learn how to easily search for AI tools</p>
                </article>
            </section>


            <!-- Our courses -->
            <section>
                <article class="container">
                    <h3>Our courses</h3>
                    <ul class="offer-list">
                        <li class="offer">
                            <h4><?php echo $of_name[0] ?></h4>
                            <ul class="inside-offer">
                                <li>How to use AI correctly</li>
                                <li>Useful AI and how to find it</li>
                            </ul>
                            <a href="register_form.php?offer_id=<?php echo $of_id[0] ?>"><?php echo ("$price[0] / $pay_by_time[0]") ?></a>
                        </li>
                        <li class="offer">
                            <h4><?php echo $of_name[1] ?></h4>
                            <ul class="inside-offer">
                                <li>How to use AI correctly</li>
                                <li>Useful AI and how to find it</li>
                                <li>Bright and dark side of AI</li>
                            </ul>
                            <a href="register_form.php?offer_id=<?php echo $of_id[1] ?>"><?php echo ("$price[1] / $pay_by_time[1]") ?></a>
                        </li>
                        <li class="offer">
                            <h4><?php echo $of_name[2] ?></h4>
                            <ul class="inside-offer">
                                <li>How to use AI correctly</li>
                                <li>Useful AI and how to find it</li>
                                <li>Bright and dark side of AI</li>
                                <li>How AI works</li>
                            </ul>
                            <a href="register_form.php?offer_id=<?php echo $of_id[2] ?>"><?php echo ("$price[2] / $pay_by_time[2]") ?></a>
                        </li>
                    </ul>
                </article>
            </section>


            <!-- Design transition -->
                <section class="ContactUsContainer"><div></div></section>
            <!-- Contact us -->
            <section class="FirdContainer">
                <article class="container">
                    <h3>Contact Us</h3>
                     <!-- NEED TO CHECK EMAIL ADRESS AND ACTIVATE IT!!! (include/var.php), (ON NEXT LINE!!!) -->
                    <form action="https://formsubmit.co/<?php echo $email ?>" method="POST">
                        <input type="hidden" name="_subject" value="email_sended">
                        <label for="email" class="InputText">Your e-mail adress:</label><br>
                        <input type="email" id="email" name="email" placeholder="E-mail Adress" required><br>
                         <!-- NEED TO CHANGE VALUE TO WEB SITE URL ADRESS!!! (ON NEXT LINE!!!) -->
                        <input type="hidden" name="_next" value="index.php">
                        <label for="text" class="InputText">Your message:</label><br>
                        <textarea type="text" id="text" name="message" placeholder="&nbsp;Here you can write your message." required></textarea><br>
                        <button type="submit" class="form_button">Send</button>
                        <button type="reset" class="form_button">Remove message</button>
                    </form>
                </article>
            </section>
        </main>


        <!-- Footer -->
        <footer>
            <section>
                <article><a href="#">Terms of service</a></article>
                <article><div></div></article>
                <article>&copy; <?php echo date("Y")." ".$web_name ?>. All rights reserved.</article>
            </section>
        </footer>
        <script src="node.js"></script>
    </body>
</html>