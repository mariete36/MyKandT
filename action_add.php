<?php
require_once "init_db.php";
//Vérifie que les champs ne sont pas vides et renvoie vers la page admin si c'est le cas
if (!isset($_POST['title']) || !isset($_POST['h1']) || !isset($_POST['paragraphe']) || $_POST['span-class']==="" || $_POST['span-text']==="" || $_POST['img-alt']==="" || $_POST['img-src']==="" || $_POST['nav-title']==="" || $_POST['slug']==="") {
    header('Location: ../admin.php?error_input');
    exit();
}
//Commande MySQL
    $sql = "INSERT INTO
                `page`
            ( `id`,
            `title`,
              `h1`,
              `paragraphe`,
              `span-class`,
              `span-text`,
              `img-alt`,
              `img-src`,
              `nav-title`,
              `slug`)
VALUES
(NULL, :title, :h1, :paragraphe ,:spanclass, :spantext, :imgalt, :imgsrc, :navtitle, :slug)
;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $_POST['id']);
$stmt->bindValue(':title', $_POST['title']);
$stmt->bindValue(':h1', $_POST['h1']);
$stmt->bindValue(':paragraphe', $_POST['paragraphe']);
$stmt->bindValue(':spanclass', $_POST['span-class']);
$stmt->bindValue(':spantext', $_POST['span-text']);
$stmt->bindValue(':imgalt', $_POST['img-alt']);
$stmt->bindValue(':imgsrc', $_POST['img-src']);
$stmt->bindValue(':navtitle', $_POST['nav-title']);
$stmt->bindValue(':slug', $_POST['slug']);
$stmt->execute();
header('Location: ../admin.php?id='.$conn->lastInsertId());