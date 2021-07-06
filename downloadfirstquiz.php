<?php
include 'config.php';
$id= $_GET['assigned_ID'];
$title = "";
$courseID="";
    // fetch file to download from database
    $sql = "SELECT * FROM `teacher-course` WHERE assigned_ID='".$id."'";

    $result = mysqli_query($mysqli, $sql);
    
    $file = mysqli_fetch_assoc($result);
    while ($row=mysqli_fetch_assoc($result)) {
        $courseID = $row['course_ID'];
    }
    $coursequery = "SELECT * FROM course WHERE Course_ID = '".$courseID."'";
        $courseresult= mysqli_query($mysqli, $coursequery);
        while ($rowc = mysqli_fetch_assoc($courseresult)) {
            $title = $rowc['course_Title'];
            }
    $filepath = 'resources/'.$title.'/' . $file['first_Quiz'];
    echo "string".$filepath;

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('resources/'.$title.'/' . $file['first_Quiz']));
        readfile('resources/'.$title.'/' . $file['first_Quiz']);}

        /* Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;*/
    



?>