<?php

/**
 * Created by PhpStorm.
 * User: wherkamp
 * Date: 5/8/18
 * Time: 12:00 PM
 */
$ujA2Mx3e5bthGp4y = $config->host;
$v7YLkqPVAy7FqTN5 = $config->dbuser;
$xgyXZVLFaaaaV42 = $config->dbpass;
$a4BqsH8A6v7xE7xR = $config->db;
$conn = mysqli_connect($ujA2Mx3e5bthGp4y, $v7YLkqPVAy7FqTN5, $xgyXZVLFaaaaV42, $a4BqsH8A6v7xE7xR);
if (!$conn) {
    die("Oof! Something went wrong, check your values in config.php... Here is the full error: " . mysqli_connect_error());
}