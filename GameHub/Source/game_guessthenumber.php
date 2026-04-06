<?php
    session_start();
    include "code/functions.php";
    include "code/db_connect.php";
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles.css">
    <title>SilverkoGameHub</title>
</head>



<body>
    <header>
        <h1>Guess The Number</h1>
    </header>


    <main>
    <?php
        # Deklarace
        $reset = false;
        $first_play = false;
        if(isset($_POST["play"])){
            $_SESSION["play"] = true;
            $_SESSION["player_name01"] = $_POST["player_name01"];
            $_SESSION["player_name02"] = $_POST["player_name02"];
        }
        $play = $_SESSION["play"] ?? false;
        $_SESSION["guess1"] = $_POST["guess1"] ?? 0;
        $_SESSION["guess2"] = $_POST["guess2"] ?? 0;
        


        # Reset hry
        if(isset($_POST["reset"])){$reset = true;}
        if($reset == true){session_destroy();}


        # Kontrola zda se jedná o první hru
        if(isset($_POST["first_play"])){$first_play = $_POST["first_play"];}


        # Hození kostkami
        $hod1 = rand(1,6);
        $hod2 = rand(1,6);
        $hod3 = rand(1,6);
        $celkem = $hod1 + $hod2 + $hod3;


        # Logika výherce a proherce
        $guessp1 = abs($celkem - $_SESSION["guess1"]);
        $guessp2 = abs($celkem - $_SESSION["guess2"]);

        $remiza = false;
        if($guessp1 < $guessp2){
            $vyherce = $_SESSION["player_name01"] . " -> tipnul/a " . $_SESSION["guess1"];
            $proherce =  $_SESSION["player_name02"] . " -> tipnul/a " . $_SESSION["guess2"];
        }elseif($guessp1 > $guessp2){
            $proherce = $_SESSION["player_name01"] . " -> tipnul/a " . $_SESSION["guess1"];
            $vyherce =  $_SESSION["player_name02"] . " -> tipnul/a " . $_SESSION["guess2"];
        }else{
            $remiza = true;
            $proherce = "nikdo";
            $vyherce = "nikdo";
        }


        # Logika úkolu
        $_SESSION["preQst"] = $_SESSION["preQst"] ?? null; # Zabezpečení prvního spuštění nedefinované proměnné
        $dbDCount = $pdo->query("SELECT COUNT(*) FROM UkolChill")->fetchColumn(); # nastavý max hodnotu
        $_SESSION["preQst"] = randFromLastAndMaxNum($_SESSION["preQst"], $dbDCount); # random hodnota od 1 do max

        $stmt = $pdo->prepare("SELECT * FROM UkolChill WHERE ID = ?");
        $stmt->execute([$_SESSION["preQst"]]);
        $ukol = $stmt->fetch();





        # Hra
        if($play == false || $reset == true){
            # Formulář pro zadání jmén hráčů
            echo "<section><h2>Zadej jména hráčů</h2>";
            echo "<form method='post'>";
            echo "<label for='player_name01'>Jméno hráče 1: </label>";
            echo "<input type='text' name='player_name01' placeholder='Zadej jméno hráče' class='text_input' required><br>";
            echo "<label type='label' for='player_name02'>Jméno hráče 2: </label>";
            echo "<input type='text' name='player_name02' placeholder='Zadej jméno hráče' class='text_input' required><br><br>";
            echo "<input type='submit' name='play' value='Play game' class='button'>";
            echo "<input type='hidden' name='first_play' value='true'>";
            echo "</form>";
            # Jak hrát hru
            echo "</section>";
            echo "<section><br><h2>Jak hrát hru</h2>";
            echo "<p>Hráči se snaží uhodnout hodnotu která padne při příštím kole na kostce. Ten kdo se přiblíží nejvíce vyhrává a ten kdo prohrál plní úkol. Pokud nastane remíza ani jeden zvás úkol neplní.</p>";
            echo "<p>Pokud hráči je vysloveně extrémně nepříjemné úkol plnit tak ho nenuťte ho plnit.</p>";
            echo "</section>";
        }else{
            if($first_play != true){
                echo "<div class='form_div'>";
                echo "<div>";
                echo "<p>Hod 1: <b>$hod1</b></p>";
                echo "<p class='margin-top'>Hod 2: <b>$hod2</b></p>";
                echo "<p class='margin-top'>Hod 3: <b>$hod3</b></p>";
                echo "<p>Celkem: <b>$celkem</b></p>";
                echo "</div>";
                echo "<div>";
                if(!$remiza){
                    echo "<p>Výherce: <b><span style='color:green'>$vyherce</span></b><br>";
                    echo "Proherce: <b><span style='color:red'>$proherce</span></b></p>";
                    # Úkol pro proherce
                    echo "<p>Úkol pro proherce: ",$ukol['Ukol'],"</p>";
                }else{echo "<p><b>REMÍZA</b></p>";}
            }
            echo "</div>";
            echo "</div>";


            # Výpis hráčového čísla a jména
            echo "<section>";
            echo "<form method='post'>";
            echo "<br><label for='guess1'><b>$_SESSION[player_name01]</b>, zadej svůj tip: </label>";
            echo "<input type='number' name='guess1' placeholder='Zadej číslo' class='text_input' required><br>";
            echo "<label for='guess2'><b>$_SESSION[player_name02]</b>, zadej svůj tip: </label>";
            echo "<input type='number' name='guess2' placeholder='Zadej číslo' class='text_input' required><br><br>";
            echo "<input type='submit' name='submit_guess' value='Odeslat tipy' class='button'>";
            echo "</form>";

            if($first_play != true){
                #RESET button
                echo "<form method='post'>";
                echo "<input type='submit' name='reset' value='Reset game' class='button'>";
                echo "</form>";
            }
        }
    ?>
        <form method="post" action="index.php" class="margin_topdown">
            <input type="submit" class="button" value="Zpět do menu">
        </form>
    </main>


    <footer>
    </footer>
</body>
</html>