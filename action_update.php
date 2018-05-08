<?php
require_once "init_db.php";
if (!isset($_POST['title']) || !isset($_POST['h1']) || !isset($_POST['paragraphe']) || $_POST['span-class']==="" || $_POST['span-text']==="" || $_POST['img-alt']==="" || $_POST['img-src']==="" || $_POST['nav-title']==="" || $_POST['slug']==="") {
    header('Location: ../admin.php?error_input');
    exit();
}
// selectionne ine ligne de la table pour en modifier le nom le genre et l'année
$sql = "UPDATE
      `page`
SET
   `title` = :title,
   `h1` = :h1,
   `paragraphe` = :paragraphe,
   `span-class` = :spanclass,
   `span-text` = :spantext,
   `img-alt` = :imgalt,
   `img-src` = :imgsrc,
   `nav-title` = :navtitle,
   `slug` = :slug
WHERE
   id = :id
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