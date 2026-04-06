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
        <h1>Co bys raději</h1>
    </header>


    <main>
        <section>
        <div class="margin_topdown"><?php
        # Výběr otázky
        $_SESSION["preQst"] = $_SESSION["preQst"] ?? null; # Zabezpečení prvního spuštění nedefinované proměnné
        $dbDCount = $pdo->query("SELECT COUNT(*) FROM CoBysRadeji")->fetchColumn(); # nastavý max hodnotu
        $_SESSION["preQst"] = randFromLastAndMaxNum($_SESSION["preQst"], $dbDCount); # random hodnota od 1 do max

        $stmt = $pdo->prepare("SELECT * FROM CoBysRadeji WHERE ID = ?");
        $stmt->execute([$_SESSION["preQst"]]);
        $CBR = $stmt->fetch();

        echo $CBR['ukol']


        ?></div> 
            <form method="post" class="margin_topdown">
                <input type="submit" class="button" value="Další otazka">
            </form>
            <form method="post" action="index.php" class="margin_topdown">
                <input type="submit" class="button" value="Zpět do menu">
            </form>
        </section>
    </main>


    <footer>
    </footer>
</body>
</html>