<?php
// 1. Parametry připojení
$host    = 'mysql';                 // Název kontejneru v Docker síti
$db      = 'GameHub';               // Název databáze z vašeho Admineru
$user    = 'root';                  // Uživatel
$pass    = '0000';                  // Heslo z vaší Bash funkce
$charset = 'utf8mb4';               // Znaková sada pro správnou češtinu

// 2. DSN (Data Source Name) - Adresa pro ovladač
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// 3. Konfigurace chování PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Vyhazuje chyby jako výjimky
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Vrací data jako asociativní pole
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Používá skutečné prepared statements
];

try {
    // Vytvoření instance PDO (Propojení probíhá zde)
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Pokud se nepodaří připojit, skript skončí chybou
    die("Chyba připojení k databázi: " . $e->getMessage());
}