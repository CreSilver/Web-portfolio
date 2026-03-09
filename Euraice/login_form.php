<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-eqiuiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Learn to use AI correctly with Euraice. Join our courses to master AI skills.">
        <meta name="author" content="SSilverko">

        <?php include 'data_included.php';?>
        <link rel="stylesheet" href="style_rl_form.css">
        
        <title><?php echo $web_name; ?> - Log in</title>
    </head>
    <body>
        <!-- Site background -->
        <img src="image/background01.png" alt="background" class="sitebackground">


        <header>
            <div>
                <a href="index.php"><img src="image/logo.svg" alt="logo" class="logo"></a>
                <h3>&nbsp;<?php echo $web_name; ?></h3>
            </div>
        </header>


        <main>
            <!-- Log in form -->
            <section class="section">
                <article class="article" id="login">
                    <h1>Log in</h1>
                    <form method="post">
                        <label for="name">Username:</label><br>
                        <input type="text" id="name" name="name" required><br><br>
                        <label for="email">E-mail adress:</label><br>
                        <input type="email" id="email" name="email" required><br><br>
                        <label for="Password">Password</label><br>
                        <input type="Password" id="password" name="password" required><br><br>
                        <button type="submit">Log in</button>
                    </form>
                    <p>You still do not have an account? <a href="register_form.php">Register now</a></p>
                </article>
            </section>
        </main>

        
        <!-- Footer -->
        <footer>
            <section>
                <article><a href="#">Terms of service</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Back to site</a></article>
                <article><div></div></article>
                <article>&copy; <?php echo date("Y")." ".$web_name ?>. All rights reserved.</article>
            </section>
        </footer>
    </body>
</html>