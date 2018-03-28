
<?php
/**
 * ce fichier permet de se connecter à la base de données mysql
 * $conn = new PDO(dsn: 'database;server', username: 'mysqlusername', password:'mysqlpass');
 */
try {
    $conn = new PDO('mysql:dbname=KandT;host=localhost', 'root', 'root');
} catch (PDOException $exception) {
    die($exception->getMessage());
}

