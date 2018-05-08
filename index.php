<?php
/**
 * Created by PhpStorm.
 * User: wyatt
 * Date: 5/8/2018
 * Time: 2:38 PM
 */
include 'common.php';
session_start();
$_SESSION['applicationID'] = $config->apiKey;


if (isset($_GET['image'])) {
    if (isset($_GET['embed'])) {
        $prepared = mysqli_prepare($conn, "SELECT * FROM `images` WHERE identifykey=? LIMIT 1");
        $prepared->bind_param('i', $id);
        $id = $_GET['countdown'];
        $prepared->execute();
        $result = $prepared->get_result();
        if ($result != null) {
            if (mysqli_num_rows($result) >= 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    header("Content-type: " . row['type']);
                    $filename = ROOT . "/" . $row['file-path'];
                    $handle = fopen($filename, "rb");
                    $contents = fread($handle, filesize($filename));
                    fclose($handle);
                    echo $contents;
                }
            } else {
                include '404.php';
            }
        } else {
            include '404.php';
        }
    } else {
        $prepared = mysqli_prepare($conn, "SELECT * FROM `images` WHERE identifykey=? LIMIT 1");
        $prepared->bind_param('s', $id);
        $id = $_GET['image'];
        $prepared->execute();
        $result = $prepared->get_result();
        var_dump($result);
        if ($result != null) {
            if (mysqli_num_rows($result) >= 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<img src"' . ROOT . "/" . $row['file-path'] . ">";
                }
            } else {``
                include '404.php';
            }
        } else {
            include '404.php';
        }
    }
} else {
    $page = file_get_contents(ROOT . "/public/upload.html");
    $error = "";
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "pin") {
            $error = '<div class="alert alert-warning" role="alert">
              <strong>Incorrect Pin</strong> 
            </div>';
        }
    }
    $page = str_replace("{root}", ROOT, $page);
    $page = str_replace("{error}", $error, $page);
    if ($config->pin == '0') {
        $removeScript = "<script>
var element = document.getElementById('no-pin');
element.style.display='none';
</script>";
        $page = str_replace("{hide}", $removeScript, $page);
    } else {
        $page = str_replace("{hide}", "", $page);
    }
    echo $page;
}
