<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-eqiuiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Learn to use AI correctly with Euraice. Join our courses to master AI skills.">
        <meta name="author" content="SSilverko">

        <?php include 'lib/CheckFormElements.php';?>
        <?php include 'data_included.php';?>
        <?php include 'database.php';?>
        <link rel="stylesheet" href="style_rl_form.css">
        
        <title><?php echo $web_name; ?> - Registration</title>
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
            <?php // Vars declaration
                $offer_id = $_GET['offer_id'];
                $complete_reg = "";
                $reg_progress = 0;               

                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];
                }
                else{
                    $name = "";
                    $email = "";
                    $password = "";
                    $confirm_password = "";
                } 
            // END of vars declaration ?> 


            <section class="section">
                <article class="article" id="register">
                    <h1>Registration</h1>


                    <!-- Registration form -->
                    <form action="<?php echo $complete_reg; ?>" method="post">
                        <!-- Username -->
                        <label for="name">Username:</label><br>
                        <input type="text" name="name" placeholder="ExampleProAinator95" value="<?php echo $name?>" required><br>
                        <?php // Verify - Username is validate 
                            echo "<span style='color:red'>".ValidateUsername($name)."</span><br>";

                            if (!ValidateUsername($name)){
                                echo("<br>");
                            }

                            if(ValidateUsername($name) == "" and $email != ""){
                                $reg_progress = $reg_progress + 1;
                            }
                        ?>


                        <!-- Email -->
                        <label for="email">E-mail adress:</label><br>
                        <input type="text" id="email" name="email" placeholder="youremail@example.com"  value="<?php echo $email?>" required><br>
                        <?php // Verify - Email is validate
                            echo "<span style='color:red'>".ValidateEmail($email)."</span><br>";

                            if(!ValidateEmail($email)){
                                echo ("<br>");
                            }
                                
                            if(ValidateEmail($email) == "" and $email != ""){
                                $reg_progress = $reg_progress + 1;
                            }
                        ?>
                        


                        <!-- Set password -->
                        <label for="password">Password:</label><br>
                        <input type="password" name="password" class="password" value="<?php echo $password?>" required><br>
                        <?php // Verify - is password strong enough
                            if($password == ""){
                                echo ("<label for='password' id='password'>Password should have: <span>Number, small and big words, symbols</span></label><br><br>");
                            } else{
                                echo "<span style='color:red'>".PasswordCheckerSTRICK($password)."</span><br>";
                            }                           
                            
                            if (PasswordCheckerSTRICK($password) == "" and $password != ""){
                                $reg_progress = $reg_progress + 1;
                            }
                        ?>



                        <!-- Second password confirm -->
                        <label for="confirm_password">Confirm password:</label><br> 
                        <input type="password" name="confirm_password" class="password" required><br><br>
                        <?php // Verify if is it true
                            if ($password != $confirm_password) {
                                echo "<span class='psntcr' style='color:red;'>Password is not the same!</span><br>";
                            } else{
                                if ($confirm_password != ""){
                                    $reg_progress = $reg_progress + 1;
                                }else{
                                    echo ("<br>");
                                }   
                            }// END IF



                            echo $reg_progress." ";
                        ?> 



                        <input type="hidden" name="offer_id" value="<?php echo $offer_id; ?>">
                        <button type="submit">Register</button>
                    </form>
                    <!-- END of registration form -->


                    <p>Do you have an account? <a href="login_form.php">Log in</a></p>
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