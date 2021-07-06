<?php
//include 'header.php';
include 'config.php';
session_start();

$courses = "select * from course where status = 0";
$executec  = mysqli_query($mysqli, $courses);

$sessions = "select * from session";
$executes  = mysqli_query($mysqli, $sessions);

$batchesb = "select * from batch";
$executeb  = mysqli_query($mysqli, $batchesb);

$teacher = "select * from teacher";
$executet  = mysqli_query($mysqli, $teacher);
$program = "";
$year = "";
$courseID="";
$coursecode="";
?>


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Course Enrolment</title>
  <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body style="margin-top:20px;">

  <div class="header w-50 bg-dark justify-content-center" style="margin-top: 100px;">
    <h2 >Course Enrollment</h2>
  </div>
   
  <form method="post" class="w-50 justify-content-center" enctype="multipart/form-data" action="course_enrolment.php">
    <center>
    
    <div class="input-group">
      <label>Select Course Title</label><br><br>
      <select class="bg-light border border-dark col-lg-11 rounded" required="required" name="selected-course">
         <option></option>
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
         <option></option>
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
      
    </div><br>
    <div class="input-group">
      <label>Select Teacher</label><br><br>
      <select class="bg-light border border-dark col-lg-11 rounded" required="required" name="selected-teacher">
         <option></option>
        <?php 
        if ($executec) {
          while ($row = mysqli_fetch_array($executet)) {
            $teacher = $row['user_Name'];
            echo "<option>$teacher<br></option>";
          }
        }
         ?>
       
      </select>
      
    

<?php
if(isset($_POST['enrol_course'])){
    $scourse = $_POST['selected-course'];
    $steacher = $_POST['selected-teacher'];
    $sbatch = $_POST['selected-batch'];
    if ($scourse == "" || $steacher == "" || $sbatch =="") {
      echo "Incomplete information!";
    }
    
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
        
          while ($newrow = mysqli_fetch_array($executefc)) {
            $courseID = $newrow['Course_ID'];
            $coursecode = $newrow['course_Code'];
          }}
  $fetchBatch = "select * from batch where year = '".$year."' && degree_Program = '".$program."'";
  $executefb  = mysqli_query($mysqli, $fetchBatch);
    if ($executefb) {
          while ($row = mysqli_fetch_array($executefb)) {
            $batchID = $row['Batch_ID'];
            //echo "batch ID: ".$batchID;
          }}}
?>
  
    <div class="input-group justify-content-center">
       <a class="btn btn-dark bg-dark" href="view-assigned-course.php<?php echo $coursecode; ?>">
      <input type="submit" class="bg-dark " name="enrol_course" value="Assign Course" ></a>
    </div>  

  </div>
    </div>
</body>
</html> 