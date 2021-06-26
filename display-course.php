<?php
include 'header.php';
$servername = "localhost";
$user ="root";
$pass = "";
$dbname = "course-repository";
$mysqli = new mysqli($servername, $user, $pass, $dbname);
$teacher = "select * from teacher where user_Name = '".$_SESSION['user']."'";
$teacherID = "";
$teacher_run= mysqli_query($mysqli, $teacher);
while ($row= mysqli_fetch_assoc($teacher_run)) {
    $teacherID = $row['teacher_ID'];
}
//$query= "select * from plant where Plant_ID='".$Plant_ID."'";
$course_Code = $_GET['course_Code'];
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
    <td><?php echo $finaloutlinestring; ?></td></tr>    

    <?php
}
$fetchCourse = "select * from `teacher-course` where `course_ID`='".$courseID."' && `teacher_ID` = '".$teacherID."' ";
$course_run= mysqli_query($mysqli,$fetchCourse);


while ($rowcs= mysqli_fetch_assoc($course_run)) {

    ?>
 
 <tr>
    <td style="width: 15%;">Quiz</td>
    <td>
    Quiz 1<input type="file" required="required" value="<?php echo $rowcs['first_Quiz']; ?>" name="quiz1" accept=".docx" />  
    Quiz 2<input type="file" required="required" value="<?php echo $rowcs['second_Quiz']; ?>" name="quiz2" accept=".docx"/>
    Quiz 3<input type="file" required="required" value="<?php echo $rowcs['three_Quiz']; ?>" name="quiz3" accept=".docx"/></td>    
  </tr>
  <tr>
    <td style="width: 15%;">Assignments</td>
    <td>
    Assignment 1<input type="file" required="required" value="<?php echo $rowcs['first_Assignment']; ?>" name="assignment1" accept=".docx"/>  
    Assignment 2<input type="file" required="required" value="<?php echo $rowcs['second_Assignment']; ?>" name="assignment2" accept=".docx"/>
    Assignment 3<input type="file" required="required" value="<?php echo $rowcs['third_Assignment']; ?>" name="assignment3" accept=".docx"/></td>    
  </tr>

  <tr>
    <td style="width: 15%;">Mid Term</td>
    <td><input type="file"  required="required" name="midterm" value="<?php echo $rowcs['midterm']; ?>" accept=".pdf" /></td></tr> 
    <tr>
    <td style="width: 15%;">Final Term</td>
    <td><input type="file" required="required" name="finalterm" value="<?php echo $rowcs['final_Term']; ?>" accept=".pdf"  /> </td></tr> 
    <tr>
    <td style="width: 15%;">Lab Quiz</td>
    <td><input type="file" required="required" name="labquiz" value="<?php echo $rowcs['lab_Quiz']; ?>" accept=".pdf" /> </td></tr> 
    <tr>
    <td style="width: 15%;">Lab Exam</td>
    <td><input type="file" required="required" name="labexam" value="<?php echo $rowcs['lab_Exam']; ?>" accept=".pdf"  /> </td></tr> 
    <tr>
    <td style="width: 15%;">Lab Manual</td>
    <td><input type="file" required="required" name="labmanual" value="<?php echo $rowcs['lab_Manual']; ?>" accept=".pdf"  /> </td></tr> 
    <tr>
    <td style="width: 15%;">Course Tracking</td>
    <td><input type="file" required="required" name="coursetracking" value="<?php echo $rowcs['course_Tracking']; ?>" accept=".pdf"  /> </td></tr> 
    <tr>
    <td style="width: 15%;">Results</td>
    <td><input type="file" required="required" name="results" value="<?php echo $rowcs['result']; ?>" accept=".pdf, .xlsx"  /> </td></tr> 
  </table>
     <a href="view-enrolled-course.php?<?php echo $code; ?>"> <input type="submit" required="required" class="btn btn-dark bg-dark" name="update_course" value="Update Course"></a>

  </div>
  <?php

}
?>
</body>
</html> 