<?php
include 'header.php';
include 'config.php';
session_start();
if($_SESSION['user']==""){
echo "<script type='text/javascript'> 
 alert('Please login to for to complete this process'); 
 </script>";"";
 header('location:userlogin.php');
}
$courses = "select * from course";
$executec  = mysqli_query($mysqli, $courses);

$sessions = "select * from session";
$executes  = mysqli_query($mysqli, $sessions);

$batchesb = "select * from batch";
$executeb  = mysqli_query($mysqli, $batchesb);

$teacher = "select * from teacher";
$executet  = mysqli_query($mysqli, $teacher);
$program = "";
$year = "";


$servername = "localhost";
$user ="root";
$pass = "";
$dbname = "course-repository";
$mysqli = new mysqli($servername, $user, $pass, $dbname);

?>


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Course Enrolment</title>
  <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body style="margin-top:20px;">

  <div class="header w-50 bg-dark" style="margin-top: 100px;">
    <h2 >Course Enrollment</h2>
  </div>
   
  <form method="post" class="w-50" enctype="multipart/form-data" action="course_enrolment.php">
    
    <div class="input-group">
      <label>Select Course Title</label><br>
      <select class="bg-light border border-dark col-lg-11 rounded" required="required" name="selected-course">
         <option>Select Course</option>
        <?php 
        if ($executec) {
          while ($row = mysqli_fetch_array($executec)) {
            $courseTitle = $row['course_Title'];
            echo "<option>$courseTitle<br></option>";
          }
        }
         ?>
       
      </select>
    </div>
  
    <div class="input-group">
      <label>Select Batch</label>
     </div>
      <select class="bg-light border border-dark col-lg-11 rounded" required="required" name="selected-batch">
         <option>Select Batch</option>
        <?php 
        if ($executeb) {
          while ($row = mysqli_fetch_array($executeb)) {
            $program = $row['degree_Program'];
            $year = $row['year'];
            $batch = $program . " " . $year;
            echo "<option>$batch<br></option>";
          }
        }
         ?>
       
      </select>
      
    </div>
    <div class="input-group">
      <label>Select Teacher</label><br>
      <select class="bg-light border border-dark col-lg-11 rounded" required="required" name="selected-teacher">
         <option>Select Teacher</option>
        <?php 
        if ($executec) {
          while ($row = mysqli_fetch_array($executet)) {
            $teacher = $row['user_Name'];
            echo "<option>$teacher<br></option>";
          }
        }
         ?>
       
      </select>
    </div>
    
     

     <div class="input-group justify-content-center">
      <input type="submit" class="btn btn-dark bg-dark mt-4 pl-n4" name="enrol_course" value="Enrol Course" style= "margin-left:-45px;">
    </div>  
  </div>

<?php
if(isset($_POST['enrol_course'])){
    $scourse = $_POST['selected-course'];
    $steacher = $_POST['selected-teacher'];
    $sbatch = $_POST['selected-batch'];
    
    $fetchFaculty = "select * from teacher where user_Name ='".$steacher."'";
    $executeft  = mysqli_query($mysqli, $fetchFaculty);
    if ($executeft) {
       
          while ($row = mysqli_fetch_array($executeft)) {
            $teacherID = $row['teacher_ID'];
            //echo "teacher ID: ".$teacherID;
          }}
    
    $fetchCourse = "select * from course where course_Title = '".$scourse."'";
    $executefc  = mysqli_query($mysqli, $fetchCourse);
    if ($executefc) {
        
          while ($row = mysqli_fetch_array($executefc)) {
            $courseID = $row['Course_ID'];
            //echo "course ID: ".$courseID;
          }}
    $fetchBatch = "select * from batch where year = '".$year."' && degree_Program = '".$program."'";
   $executefb  = mysqli_query($mysqli, $fetchBatch);
    if ($executefb) {
          while ($row = mysqli_fetch_array($executefb)) {
            $batchID = $row['Batch_ID'];
            //echo "batch ID: ".$batchID;
          }}
    
    
    
$insert = "insert into `teacher-course` ( `teacher_ID`, `course_ID`, `batch`, `session_ID`) VALUES ('$teacherID', '$courseID', '$batchID', '6')";
$execute  = mysqli_query($mysqli, $insert);
 header('location:facultyhome.php');
}
?>
</body>
</html> 