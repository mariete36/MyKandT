<?php
/**
 * Created by PhpStorm.
 * User: Marie
 * Date: 08/05/2018
 * Time: 18:33
 */
require_once "includes/functions.php";
?>

<a href="index.php">Index</a>

<div class="create">
    <p>Add</p>

    <form action="action_add.php" method="post">
        <input type="text"      name='title'         placeholder="title">
        <input type="text"      name='h1'            placeholder="h1">
        <input type="text"      name='paragraphe'    placeholder="paragraphe">
        <input type="text"      name='span-class'    placeholder="span-class">
        <input type="text"      name='span-text'     placeholder="span-text">
        <input type="text"      name='img-alt'       placeholder="img-alt">
        <input type="text"      name="img-src"       placeholder="img-src">
        <input type="text"      name="nav-title"     placeholder="nav-title">
        <input type="text"      name="slug"          placeholder="slug">

        <input type="submit" value="Add">
    </form>
</div>