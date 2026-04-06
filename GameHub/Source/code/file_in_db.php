<?php
require 'db_connect.php'; 

$soubor = 'polozky.txt';


$polozky = file($soubor, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$stmt = $pdo->prepare("INSERT INTO CoBysRadeji (ukol) VALUES (?)");

$pdo->beginTransaction();

foreach ($polozky as $text) {
    $cistyText = trim($text);
    $stmt->execute([$cistyText]);
}

$pdo->commit();

echo "Úspěšně nahráno " . count($polozky) . " položek.";