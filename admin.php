<?php
/**
 * Created by PhpStorm.
 * User: Marie
 * Date: 08/05/2018
 * Time: 18:45
 */
// CONNECT TO SERVER AND DATABASE AND GET DATA
require_once "init_db.php";
require_once "includes/functions.php";

$sql = "SELECT
                    `id`,
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
                    `page`
                ;";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_admin.css">
    <title>Document</title>
</head>

<body class="body">
<div class="container">
    <a class="index" href="index.php">Retour</a>

    <div class="read">
        <table class="table">
            <tr>
                <th class="th">ID</th>
                <th class="th">Title</th>
                <th class="th">h1</th>
                <th class="th">Paragraphe</th>
                <th class="th">span-class</th>
                <th class="th">span-text</th>
                <th class="th">img-alt</th>
                <th class="th">img-src</th>
                <th class="th">nav-title</th>
                <th class="th">slug</th>
                <th class="th">Modify/</br>Delete</th>
            </tr>
            <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                    <td class="td" ><?=$row["id"]?></td>
                    <td class="td" ><?=$row["title"]?></td>
                    <td class="td" ><?=$row["h1"]?></td>
                    <td class="td" ><?=$row["paragraphe"]?></td>
                    <td class="td" ><?=$row["span-class"]?></td>
                    <td class="td" ><?=$row["span-text"]?></td>
                    <td class="td" ><?=$row["img-alt"]?></td>
                    <td class="td" ><?=$row["img-src"]?></td>
                    <td class="td" ><?=$row["nav-title"]?></td>
                    <td class="td" ><?=$row["slug"]?></td>
                    <td class="modifyLink deleteButton td">
                        <form action="update.php" method="POST">
                            <input type="hidden" name="id" value="<?=$row["id"]?>">
                            <input class="modifybtn" type="submit" value="Modify">
                        </form>

                        <form action="action_delete.php" method="POST">
                            <input type="hidden" name="id" value="<?=$row["id"]?>">
                            <input class="deletebtn" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endwhile;?>

        </table>
    </div>
    <div class="flex">
        <a class="addLink" href="add.php">Add</a>
    </div>
</body>
</html>