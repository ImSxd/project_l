<?php
switch($menu){
    case '0' : include_once('./pages/homepage.php'); break;
    case '1' : include_once('./../gen/setting.php'); break;
    default : include_once('./pages/homepage.php'); break;
}