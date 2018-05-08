<?php
/**
 * Created by PhpStorm.
 * User: wyatt
 * Date: 5/8/2018
 * Time: 2:14 PM
 */
include 'common/config.php';
$config = new config();
include 'common/conn.php';
define('ROOT', $config->baseURl);
function genRandomCode(int $size)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $size; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}