<?php
include 'config.php';
$id=52;
 $filename = $_GET['course_ID'];
    // fetch file to download from database
    $sql = "SELECT * FROM course WHERE course_ID=$id";
    $result = mysqli_query($mysqli, $sql);
    print_r($result);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'resources/' . $file['NCEAC Doc'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('resources/' . $file['NCEAC Doc']));
        readfile('resources/' . $file['NCEAC Doc']);
    }

        /* Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;*/
    



?>