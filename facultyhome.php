<?php

include 'header.php';
if($_SESSION['user']==""){
echo "<script type='text/javascript'> 
 alert('Please login to for donation'); 
 </script>";"";
 header('location:userlogin.php');
}
$servername = "localhost";
$user ="root";
$pass = "";
$dbname = "course-repository";
$mysqli = new mysqli($servername, $user, $pass, $dbname);
     
?>
<!DOCTYPE html>
  <center>

               <main style="margin-left: 220px;">
                    <div class="container-fluid justify-content-center">
                       <main>
                    <div class="container-fluid" style=" margin-left: 180px; margin-top: 80px;">
                      <h1 class="mt-4" style="float: left; margin-left: 380px;">My Courses</h1><br><br><br><br>
                        
                       <div class="row">
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Courses Assigned
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                               <th>Last Modified</th>
                                               <th class="justify-content-center"><center>Actions</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                            <?php
                                            $count = 1;
                                            $teacherID ="";
                                             //'".$courseID."'
                                            $loggedteacher = "select * from teacher where user_Name  = '".$_SESSION['user']."' ";
                                            $executeTeacher = mysqli_query($mysqli, $loggedteacher);
                                            while ($rowt = mysqli_fetch_array($executeTeacher)) {
                                              
                                            $teacherID = $rowt['teacher_ID'];
                                            $assignedCourses = "select * from `teacher-course` where teacher_ID ='".$teacherID."'";
                                            $executeCourses = mysqli_query($mysqli, $assignedCourses);
                                            //echo $assignedCourses;
                                            if ($executeCourses) {
                                            while ($row = mysqli_fetch_array($executeCourses)) {        
                                                    //'".$courseID."'
                                                    $fetchcourses = "select * from course where Course_ID = '".$row['course_ID']."'";
                                                    $executeFC = mysqli_query($mysqli, $fetchcourses);
                                                    while ($rowfc = mysqli_fetch_array($executeFC)) {
                                                    ?>
                                                <td><?php echo $count; $count++; ?></td>
                                                <td><?php echo $rowfc['course_Code']; ?></td>
                                                <td><?php echo $rowfc['course_Title']; ?></td>
                                                <td><?php echo $row['last_Updated_On']; ?></td>
                                                <td><a href="display-course.php?Course_ID=<?php echo $row['course_ID'];?>">View Course</a> &nbsp &nbsp
                                                <a href="edit-assigned-course.php?course_Code=<?php echo $rowfc['course_Code'];?>">Edit Course</a></td>
                                            </tr>
                                           
                                    <?php
} //while course 
} //if ($executeCourses)
} //while for teacher-course
else{
    echo "string";
};
} //while for teachers
?>
</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </main>
        </div></center>
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