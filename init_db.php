<?php
/**
 * Created by PhpStorm.
 * User: Marie
 * Date: 08/05/2018
 * Time: 18:32
 */

try {
    $conn = new PDO('mysql:dbname=kandt;host=localhost', 'root', 'oui');
} catch (PDOException $exception) {
    die($exception->getMessage());
}
