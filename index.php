<?php
require_once "includes/init_db.php";
/**
 * @ref http://php.net/manual/fr/function.http-response-code.php
 */
// gestion de la page par defaut (pas de param page= dans l'url
// gestion de la page appelee (param page=)
// gestion de l'affichage de la page par defaut si la page appelee n'existe pas (avec le status 404 http)
define('APP_DEFAULT_PAGE', 'les-teletubbies');
// la page par defaut n'existe pas, horreur, malheur
$pageKey = $_GET['page'] ?? APP_DEFAULT_PAGE;

$sql = "SELECT
    `id`
      FROM
    `page`
      WHERE
    slug = :slug
    ;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":slug", $pageKey);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if ($row===false){
    $pageKey=APP_DEFAULT_PAGE;
    http_response_code(404);
}

include "includes/header.php";


$sql = "SELECT
    `title`,
    `h1`,
    `paragraphe`,
    `span-class`,
    `span-text`,
    `img-alt`,
    `img-src`,
    `nav-title`
      FROM
    `page`
      WHERE
    slug = :slug
    ;";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":slug", $pageKey);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<div class="container theme-showcase" role="main">
    <div class="jumbotron">
        <h1><?=$row['h1']?></h1>
        <p><?=$row['paragraphe']?></p>
        <span class="label <?=$row['span-class']?>"><?=$row['span-text']?></span>
    </div>
    <img class="img-thumbnail" alt="<?=$row['img-alt']?>" src="img/<?=$row['img-src']?>" data-holder-rendered="true">
</div>
<?php
include "includes/footer.php";
?>
