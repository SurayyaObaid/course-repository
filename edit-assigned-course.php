<?php
include 'header.php';
include 'config.php';
$servername = "localhost";
$user ="root";
$pass = "";
$dbname = "course-repository";
$mysqli = new mysqli($servername, $user, $pass, $dbname);

//$query= "select * from plant where Plant_ID='".$Plant_ID."'";
$course_Code = $_GET['course_Code'];
$coursetitle = "";
$courseID = "";
$query = "select * from course where course_Code='".$course_Code."'";
$query_run= mysqli_query($mysqli,$query);
       
while ($row= mysqli_fetch_assoc($query_run)) {
    $courseID = $row['Course_ID'];
    $code = $row['course_Code'];
    $title = $row['course_Title'];
    $finaloutlinestring = $row['course_Outline'];
    $credit = $row['creadit_Hours'];
    $coursetitle = $row['course_Title'];
    
    
?>
<body style="justify-content: center; padding-left: 80px; margin-top: 100px;">
<hr class="m-4" style="width: 90%; margin-top: 100px; align-content: center; ">
  <div class="container col-lg-11 m-3 ml-4">

    <h3>Course Information</h3>
  <table class="table table-striped">
    <tr>
    <td style="width: 15%;">Course Title</td>
    <td><?php echo $title;?></td>
</tr>
<tr>
    <td style="width: 8%;">Course Code</td>
    <td><?php echo $code; ?></td>
  </tr>
    <td style="width: 8%;">Credit Hours</td>
  <td><?php echo $credit; ?></td>

<tr>
    <td style="width: 15%;">Course Outline</td>
    <td><?php echo $finaloutlinestring; }?></td></tr>    
 <form method="post" class="w-50" enctype="multipart/form-data" action="edit-assigned-course.php?course_Code=<?php echo $course_Code; ?>">

 <tr>
    <td style="width: 15%;">Quiz</td>
    <td>
    Quiz 1<input type="file" required="required" name="quiz1" accept=".docx" />  
    Quiz 2<input type="file" required="required" name="quiz2" accept=".docx"/>
    Quiz 3<input type="file" required="required" name="quiz3" accept=".docx"/></td>    
  </tr>
  <tr>
    <td style="width: 15%;">Assignments</td>
    <td>
    Assignment 1<input type="file" required="required" name="assignment1" accept=".docx"/>  
    Assignment 2<input type="file" required="required" name="assignment2" accept=".docx"/>
    Assignment 3<input type="file" required="required" name="assignment3" accept=".docx"/></td>    
  </tr>

  <tr>
    <td style="width: 15%;">Mid Term</td>
    <td><input type="file"  required="required" name="midterm" accept=".pdf" /></td></tr> 
    <tr>
    <td style="width: 15%;">Final Term</td>
    <td><input type="file" required="required" name="finalterm" accept=".pdf"  /> </td></tr> 
    <tr>
    <td style="width: 15%;">Lab Quiz</td>
    <td><input type="file" required="required" name="labquiz" accept=".pdf" /> </td></tr> 
    <tr>
    <td style="width: 15%;">Lab Exam</td>
    <td><input type="file" required="required" name="labexam"accept=".pdf"  /> </td></tr> 
    <tr>
    <td style="width: 15%;">Lab Manual</td>
    <td><input type="file" required="required" name="labmanual" accept=".pdf"  /> </td></tr> 
    <tr>
    <td style="width: 15%;">Course Tracking</td>
    <td><input type="file" required="required" name="coursetracking" accept=".pdf"  /> </td></tr> 
    <tr>
    <td style="width: 15%;">Results</td>
    <td><input type="file" required="required" name="results" accept=".pdf, .xlsx"  /> </td></tr> 
  </table>
     <a href="view-assigned-course.php?<?php echo $code; ?>"> <input type="submit" required="required" class="btn btn-dark bg-dark" name="update_course" value="Update Course"></a>

  </div>
<?php


if (isset($_POST['update_course'])) {
 

$quiz1 = $_FILES['quiz1']['name']; $quiz1 = $coursetitle . '_Quiz1'. '.docx';
$quiz2 = $_FILES['quiz2']['name']; $quiz2 = $coursetitle . '_Quiz2'. '.docx';
$quiz3 = $_FILES['quiz3']['name']; $quiz3 = $coursetitle . '_Quiz3'. '.docx';

$assignment1 = $_FILES['assignment1']['name']; $assignment1 = $coursetitle . '_Assignment1'. '.docx';
$assignment2 = $_FILES['assignment2']['name']; $assignment2 = $coursetitle . '_Assignment2'. '.docx';
$assignment3 = $_FILES['assignment3']['name']; $assignment3 = $coursetitle . '_Assignment3'. '.docx';

$midterm = $_FILES['midterm']['name']; $midterm = $coursetitle . '_Midterm'. '.pdf';
$finalterm = $_FILES['finalterm']['name']; $finalterm = $coursetitle . '_Finalterm'. '.pdf';
$results =  $_FILES['results']['name']; $results = $coursetitle . '_Results'. '.xlsx';
$labmanual = $_FILES['labmanual']['name']; $labmanual = $coursetitle . '_LabManual'. '.pdf';
$labexam = $_FILES['labexam']['name']; $labexam = $coursetitle . '_LabExam'. '.pdf';
$labquiz = $_FILES['labquiz']['name']; $labquiz = $coursetitle . '_LabQuiz'. '.pdf';
$coursetracking = $_FILES['coursetracking']['name']; $coursetracking = $coursetitle . '_CourseTracking'. '.pdf';


$update = "UPDATE `teacher-course` SET `first_Quiz`='".$quiz1."',`second_Quiz`='".$quiz2."',`third_Quiz`='".$quiz3."',`first_Assignment`='".$assignment1."',`second_Assignment`='".$assignment2."',`third_Assignment`='".$assignment3."',`midterm`='".$midterm."',`lab_Quiz`='".$labquiz."',`lab_Exam`='".$labexam."',`lab_Manual`='".$labmanual."',`course_Tracking`='".$coursetracking."',`final_Term`='".$finalterm."',`result`='".$results."' WHERE course_ID = '".$courseID."'";

$execute  = mysqli_query($mysqli, $update);

if ($execute) {
    move_uploaded_file($_FILES['quiz1']['tmp_name'], $coursetitle.'/'.$quiz1);
    move_uploaded_file($_FILES['quiz2']['tmp_name'], $coursetitle.'/'.$quiz2);
    move_uploaded_file($_FILES['quiz3']['tmp_name'], $coursetitle.'/'.$quiz3);
    move_uploaded_file($_FILES['assignment1']['tmp_name'], $coursetitle.'/'.$assignment1);
    move_uploaded_file($_FILES['assignment2']['tmp_name'], $coursetitle.'/'.$assignment2);
    move_uploaded_file($_FILES['assignment3']['tmp_name'], $coursetitle.'/'.$assignment3);
    move_uploaded_file($_FILES['midterm']['tmp_name'],  $coursetitle.'/'.$midterm);
    move_uploaded_file($_FILES['finalterm']['tmp_name'],  $coursetitle.'/'.$finalterm);
    move_uploaded_file($_FILES['results']['tmp_name'],  $coursetitle.'/'.$results);
    move_uploaded_file($_FILES['labmanual']['tmp_name'],  $coursetitle.'/'.$labmanual);
    move_uploaded_file($_FILES['labquiz']['tmp_name'],  $coursetitle.'/'.$labquiz);
    move_uploaded_file($_FILES['labexam']['tmp_name'],  $coursetitle.'/'.$labexam);
    move_uploaded_file($_FILES['coursetracking']['tmp_name'],  $coursetitle.'/'.$coursetracking);
    echo "<script>alert('Course Inserted')</script>";
                }
                else{
                  echo mysqli_error($mysqli)  ;
                }


}
?>
</form>
</body>
</html> 