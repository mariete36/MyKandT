<?php
//commande my sql selectionnant une ligne a supprimer
require_once "init_db.php";
$sql = "DELETE FROM
`page`
WHERE
`id` = :id
;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $_POST['id']);
$stmt->execute();
header('Location: ../admin.php');