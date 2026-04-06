# GameHub

GameHub je jednoduchá webová hra běžícící na serverovém jazyce PHP s databází MySQL.
Specificky je to hub, který obsahuje několik malých her, které jsou napojené na databázi kde jsou veškeré potřebné informace a data jako jsou otázky, úkoly atd.

## Features

- Zapamatování jména hráčů po dobu celé relace
- Náhodný výběr, kde nikdy jedna věc není dvakrát za sebou
- Hub, který napojuje na ostatní hry

## Prerequisites

- Lokální server: **WampServer**, **XAMPP** (pro Windows).
- Alternativně: **Docker** s obrazy pro MySQL, PHP a Adminer (pro Linux/macOS).
- Verze PHP: **8.0+**.

## Installation

Instalace se liší dle toho co používáte za systém.

1. **Serverové aplikace jako WampServer**

   - Do složky www se nahraje složka Source
   - Poté je potřeba vytvořit databázi přes systém který používáte jako je Adminer nebo jiný v MySQL s názvem GameHub.
   - Poté je potřeba nahrát tabulky databáze do umístění kde se nachází daná databáze.
   - Pak je potřeba vytvoření nového uživatele který má oprávnění číst a brát data z databáze a z tabulek
   - Pak se musí upravit soubor `db_connect.php` ve kterém se nachází potřebné požadavky pro propojení s databází
     (Nachází se ve: `./Source/code`)
   - Poté je potřeba otevřít localhost na kterém vám běží váš server a tam najít a otevřít Source/index.php v prohlížeči

2. **Docker (Linux)**

    - Pro použití dockeru je potřeba nainstalovat do něj PHP, MySQL a Adminer
    - Veškeré tyto věci se nainstalují př aplikování jednoho příkazu 
    >[!IMPORTANT]
    >Jde o dočasné řešení a nebo to může být využito jako vlastní funkce, ale bacha na databázi, základně používá root s heslem 0000 což je bezpečnostní riziko
    ```
    sudo docker network create php-server
    # MySQL
    sudo docker run -d \
        --network php-server \
        --name mysql \
        -v "$HOME/web-server/db":/var/lib/mysql \
        -e MYSQL_ROOT_PASSWORD=0000 \
        -e MYSQL_DATABASE=test \
        mysql:8.0
    # Adminer
    sudo docker run -d \
        --network php-server \
        --name adminer \
        -p 8081:8080 \
        adminer
    # PHP
    sudo docker run -d \
        --network php-server \
        --name php \
        -p 8080:80 \
        -v "$HOME/web-server/www":/var/www/html \
        -e MYSQL_HOST=mysql \
        php:apache
    sudo docker exec php sh -c "docker-php-ext-install pdo_mysql && apache2ctl restart" > /dev/null
    ```
    - Tento příkaz nainstaluje vše potřebné a zároveň spustí v dockeru network php-server
    - Po té je důležité se přihlásit do Adminer nacházející se na [http://localhost:8081](http://localhost:8081)
    - Tam vytvořit databázi GameHub a do ní vložit tabulky ze složky db
    - Poté do složky www, která se nachází `./home/(USER)/web-server/www/` vložit složku Source
    - Daná aplikace se pak nachází na: [http://localhost:8080/Source/index.php](http://localhost:8080/Source/index.php)
