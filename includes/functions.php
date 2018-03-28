<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 28/02/2018
 * Time: 12:42
 */
/**
 * generates nav LI element
 * @param string $page page name with .php at the end
 * @param string $linkText text that goes in the link (d'uhhhh)
 */

function li($linkText, $page, $activePage)
{
    $active = "";
    if($page === $activePage){
        $active = ' class="active"';
    }
    ?>
    <li<?=$active?>><a href="?page=<?=$page?>"><?=$linkText?></a></li>
    <?php
}
