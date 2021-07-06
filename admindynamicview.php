<?php

include 'header.php';
include 'config.php';
$fall = "Fall";
$spring = "Spring";
$batch = "";
$a = "";
if($_SESSION['user']==""){
echo "<script type='text/javascript'> 
 alert('Please login to for donation'); 
 </script>";"";
 header('location:userlogin.php');
}
$sessions = "select * from session";
$executes  = mysqli_query($mysqli, $sessions);
 if ($executes) {
          while ($row = mysqli_fetch_array($executes)) {
            $year = $row['year'];
            $semester = $row['semester'];
            if ($semester == 1) {
                $a = " Fall " . $year;
            }
            else{
                $a = " Spring ".$year;

          }
        }
    }
$batchesb = "select * from batch";
$executeb  = mysqli_query($mysqli, $batchesb);
if ($executeb) {
          while ($row = mysqli_fetch_array($executeb)) {
            $program = $row['degree_Program'];
            $year = $row['year'];
            $batch = $program . " " . $year;
          }
        }
?>
<!DOCTYPE html>
<center>
  
                <main>
                    <div class="container-fluid justify-content-center">
                       <main>
                    <div class="container-fluid" style=" margin-left: 150px; margin-top: 80px;">
                       <h1 class="mt-4" style="margin-left: -250px;"><center>Courses for <?php echo $a; ?></center></h1>
                        <br><br>
                       <div class="row">

                            <div class="card mb-4">
                            <div class="card-header" style="float: left;">
                                <a href="TeacherCourse.php" class="btn btn-dark col-lg-2 " name="submit" style="float:right;  font-size:initial">Assign Course</a>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                                <th>Assigned to</th>
                                                <th>Last Modified</th>
                                                <th>Batch</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                            <?php
                                            $teacherID ="";
                                            $tname="";
                                            $count = 1;
                                             //'".$courseID."'
                                            

                                            $assignedCourses = "select * from `teacher-course`";
                                            $executeCourses = mysqli_query($mysqli, $assignedCourses);
                                           if ($executeCourses) {
                                            while ($row = mysqli_fetch_array($executeCourses)) {        
                                                    //'".$courseID."'
                                                    $teacherID = $row['teacher_ID'];
                                                    $loggedteacher = "select * from teacher where teacher_ID  = '".$teacherID."' ";
                                                    $executeTeacher = mysqli_query($mysqli, $loggedteacher);
                                                    while ($rowt = mysqli_fetch_array($executeTeacher)) {
                                              
                                                    $tname = $rowt['user_Name'];

                                                    $fetchcourses = "select * from course where Course_ID = '".$row['course_ID']."'";
                                                    $executeFC = mysqli_query($mysqli, $fetchcourses);
                                                    while ($rowfc = mysqli_fetch_array($executeFC)) {
                                                    ?>
                                                <td><?php  echo $count; $count++; ?></td>
                                                <td><?php echo $rowfc['course_Code']; ?></td>
                                                <td><?php echo $rowfc['course_Title']; ?></td>
                                                <td><?php echo $tname; ?></td>
                                                <td><?php echo $row['last_Updated_On']; ?></td>
                                                <td><?php echo $batch; ?></td>
                                            </tr>
                                            <?php
} //while course 
} //if ($executeCourses)
} //while for teacher-course

} //while for teachers
else{
    echo "string";
};
?>  
                                           </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </main>
                
        </div>
        </center>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
