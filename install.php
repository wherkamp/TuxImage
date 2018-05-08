<?php
/**
 * Created by PhpStorm.
 * User: wyatt
 * Date: 5/8/2018
 * Time: 2:50 PM
 */
include 'common.php';
$conn->query("CREATE TABLE `images` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` TEXT NOT NULL,
	`identifykey` TEXT NOT NULL,
	`file-path` TEXT NOT NULL,
	`description` TEXT NOT NULL,
	`time` TIMESTAMP NOT NULL,
	`public` TEXT NOT NULL,
	`type` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);
");
echo mysqli_error($conn);

echo 'delete the index.php!';