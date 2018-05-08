<?php
/**
 * Created by PhpStorm.
 * User: wyatt
 * Date: 5/8/2018
 * Time: 3:08 PM
 */
include 'common.php';
session_start();
if ($_SESSION['applicationID'] == $config->apiKey) {
    if ($_POST['pin'] == $config->pin) {
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

            $expensions = array("jpeg", "jpg", "png", "gif");
            if (in_array($file_ext, $expensions) === false) {

            }

            if (empty($errors) == true) {
                $id = genRandomCode(6);
                $filePath = "images/" . $id . "." . str_replace("images/", "", $file_type);
                $prepared = mysqli_prepare($conn, "INSERT INTO `images` (`name`,`identifykey`,`file-path`,`description`,`time`,`public`,`type`) VALUES (?,?,?,?,?,?,?);");
                echo mysqli_error($conn);
                $prepared->bind_param('sssssss' . $name, $idM, $path, $description, $time, $public, $type);
                $name = $_POST['name'];
                $idM = $id;
                $path = $filePath;
                $description = $_POST['description'];
                $time = date("Y-m-d H:i:s");
                $public = $_POST['public'];
                $type = $file_type;
                $prepared->execute();
                move_uploaded_file($file_tmp, $filePath);
                header("Location: " . ROOT . "/i/" . $id);

            } else {
                print_r($errors);
            }
        } else {
            echo "Not set";
        }
    } else {
        header("Location: " . ROOT . "/error/PIN");
    }
} else {
    header("Location: " . ROOT . "/error/APIKEY");

}
session_destroy();


