<?php
include 'header.php';
include 'config.php';
$a = 22;
$b = $_GET['Course_ID'];
//$b = 45;
$teacherID = "";
$courseID = "";
$title = "";
$teacher = "";
$credit = "";
$batch = "";
$assignedcourse = "";

$fetchteacher = "select * from teacher where user_Name = '".$_SESSION['user']."'";
$runft = mysqli_query($mysqli,$fetchteacher);
while ($rowft = mysqli_fetch_array($runft)) {
    $teacherID = $rowft['teacher_ID'];
    $teacher = $rowft['user_Name'];
}

$fetchassignedcourse = "select * from `teacher-course` where teacher_ID = '".$teacherID."' && course_ID ='".$b."'";
$run = mysqli_query($mysqli,$fetchassignedcourse);
while ($rowafc = mysqli_fetch_array($run)) {
    print_r($rowafc) ;
    $assignedcourse = $rowafc['assigned_ID'];
    $batchID = $rowafc['batch'];
    $fetchbatch = "select * from batch where Batch_ID= '".$batchID."'";
    $runfb = mysqli_query($mysqli, $fetchbatch);
    while ($rowfb = mysqli_fetch_array($runfb)) {
        $batch = $rowfb['degree_Program']." ".$rowfb['year'];
    }

$fetchcourse = "select * from course where course_ID = '".$b."'";
$runfc = mysqli_query($mysqli,$fetchcourse);
while ($rowfc = mysqli_fetch_array($runfc)) {
    $courseID = $rowfc['Course_ID'];
    $title = $rowfc['course_Title'];
    $credit = $rowfc['creadit_Hours'];

?>
<body style="justify-content: center; padding-left: 80px; margin-top: 10px;">
<hr class="m-4" style="width: 90%; margin-top: 100px; align-content: center; ">
  <div class="container col-lg-11 m-3 ml-4">

    
   <div class="row col-lg-12"> 
    <h3>Course Information</h3>&nbsp &nbsp &nbsp
    <a href="edit-assigned-course.php?course_Code=<?php echo $rowfc['course_Code'];?>"><img href="edit-assigned-course.php?course_Code=<?php echo $rowfc['course_Code'];?>" src="img/edit.png" style="width: 25px; height: 25px;"></a></div>
<?php } ?>
  <table class="table table-striped">
    <tr>
    <td style="width: 15%;">Course Title</td>
    <td><?php echo $title;?></td>
    </tr>
    <tr>
    <td style="width: 15%;">Course Instructor</td>
    <td><?php echo $teacher;?></td>
    </tr>
    <tr>
    <td style="width: 15%;">Credit hours</td>
    <td><?php echo $credit; ?></td>
    </tr>
    <tr>
    <td style="width: 15%;">Batch</td>
    <td><?php echo $batch;?></td>
    </tr>
    <tr>
    <td style="width: 15%;">Quiz 1</td>
    <td>
        <?php 
        if ($rowafc['first_Quiz'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['first_Quiz'];?></td>
    </tr>
    <tr>
    <td style="width: 15%;">Quiz 2</td>
    <td>
        <?php 
        if ($rowafc['second_Quiz'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['first_Quiz'];?>
    </td>
    </tr>
    <tr>
    <td style="width: 15%;">Quiz 3</td>
    <td>
        <?php 
        if ($rowafc['third_Quiz'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['third_Quiz'];?>
    </td>
    </tr>
    <tr>
    <td style="width: 15%;">Assignment 1</td>
    <td>
        <?php 
        if ($rowafc['first_Assignment'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['first_Assignment'];?>
    </td>
    </tr>
    <tr>
    <td style="width: 15%;">Assignment 2</td>
    <td>
        <?php 
        if ($rowafc['second_Assignment'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['second_Assignment'];?>
    </td>
    </tr>
    <tr>
    <td style="width: 15%;">Assignment 3</td>
    <td>
        <?php 
        if ($rowafc['third_Assignment'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['third_Assignment'];?>
    </td>
    </tr>
    <tr>
    <td style="width: 15%;">Lab Quiz</td>
    <td>
        <?php 
        if ($rowafc['lab_Quiz'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['lab_Quiz'];?>
    </td>
    </tr>
    <tr>
    <td style="width: 15%;">Mid Term</td>
    <td>
        <?php 
        if ($rowafc['midterm'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['midterm'];?>
    </td>
    </tr>
    <tr>
    <td style="width: 15%;">Final Term</td>
    <td>
        <?php 
        if ($rowafc['final_Term'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['final_Term'];?>
    </td>
    </tr>
    <tr>
    <td style="width: 15%;">Lab Manual  </td>
    <td>
        <?php 
        if ($rowafc['lab_Manual'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['lab_Manual'];?>
    </td>
    </tr>
    <tr>
    <td style="width: 15%;">Course Tracking</td>
    <td>
        <?php 
        if ($rowafc['course_Tracking'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['course_Tracking'];?>
    </td>
    </tr>
    <tr>
    <td style="width: 15%;">Results</td>
    <td>
        <?php 
        if ($rowafc['result'] == "") {
            echo "File not uploaded";
        }
        echo $rowafc['result'];?>
    </td>
    </tr>
    

<?php
}

?>