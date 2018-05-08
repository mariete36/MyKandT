<?php
/**
 * la page update selectionne une ligne dont on pourra modifier le nom, le genre, l'url, et l'année.
 */
session_start();
require_once "init_db.php";
require_once "includes/functions.php";
if (!isset($_POST['id'])) {
    header('Location:update.php');
    exit();
}
$sql = "SELECT
`title`,
`h1`,
`paragraphe`,
`span-class`,
`span-text`,
`img-alt`,
`img-src`,
`nav-title`,
`slug`
FROM
page
WHERE
id = :id
;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":id", $_POST["id"]);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if (!isset($row['title'])) {
    echo $row["title"];
    header('Location:index.php?error');
    exit();
}
?>

<a href="index.php">index</a>

<div class="update">
    <p>Modify</p>

    <form action="action_update.php" method="POST">
        <input type="hidden"    name='id'           placeholder="id"        value="<?=$_POST["id"]?>">
        <input type="text"      name='title'         placeholder="title"      value="<?=$row["title"]?>">
        <input type="text"      name='h1'        placeholder="h1"     value="<?=$row["h1"]?>">
        <input type="text"    name='paragraphe'         placeholder="paragraphe"      value="<?=$row["paragraphe"]?>">
        <input type="text"    name='span-class'      placeholder="span-class"   value="<?=$row["span-class"]?>">
        <input type="text"      name='span-text'     placeholder="span-text"  value="<?=$row["span-text"]?>">
        <input type="text"      name='img-alt'    placeholder="img-alt"  value="<?=$row["img-alt"]?>">
        <input type="text"      name='img-src'     placeholder="img-src"  value="<?=$row["img-src"]?>">
        <input type="text"      name='nav-title'     placeholder="nav-title"  value="<?=$row["nav-title"]?>">
        <input type="text"      name='slug'     placeholder="slug"  value="<?=$row["slug"]?>">
        <input type="submit">
    </form>
</div>