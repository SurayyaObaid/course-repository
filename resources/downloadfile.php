// Downloads files
<?php

$servername = "localhost";
$user ="root";
$pass = "";
$dbname = "course-repository";
$mysqli = new mysqli($servername, $user, $pass, $dbname);

 $id = 'PP-Assignment-SurayyaObaid.docx';

    // fetch file to download from database
    $sql = "SELECT * FROM course WHERE weekly_Breakup_theory=$id";
    $result = mysqli_query($mysqli, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'resources/' . $file['weekly_Breakup_theory'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('resources/' . $file['weekly_Breakup_theory']));
        readfile('resources/' . $file['weekly_Breakup_theory']);

        /* Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;*/
    }



?>