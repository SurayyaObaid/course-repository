<?php

include 'adminheader.php';
include 'config.php';
if($_SESSION['user']==""){
echo "<script type='text/javascript'> 
 alert('Please login to for donation'); 
 </script>";"";
 header('location:userlogin.php');
}

?>
<!DOCTYPE html>

            <div id="layoutSidenav_content ">
                <main>
                    <div class="container-fluid">
                        <!--<h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>-->


                        <main>
                    <div class="container-fluid" style=" margin-left: 60px; margin-top: 80px;">
                        
                        <h1 class="mt-4">All Courses</h1>
                        <a href="addcourse.php" class="btn btn-dark col-lg-2" name="submit" style="float: right; margin-right: 120px;">Add courses</a>
<br><br>

                        <div class="row">
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Courses in Database
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                                <th>Credit Hours</th>
                                                <th>NCEAC Document</th>
                                                <th>Added By</th>
                                                <th>Last Modified</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            
                                            <?php

                                                // fetch file to download from database
                                            $sql = "SELECT * FROM course order by Course_ID desc";
                                            $result = mysqli_query($mysqli, $sql);
                                            /*
                                            while ($row= mysqli_fetch_array($query_run)) {
                                            $plant_id = $row['Plant_ID'];
                                            */
                                            $count = 1;
                                            while ($row= mysqli_fetch_array($result)) {
                                                # code...?>
                                                 <tr>
                                                <td><?php echo $count ?></td>
                                                <td><?php echo $row['course_Code']; ?></td>
                                                <td><a href="viewcourse.php?course_Code=<?php echo $row['course_Code']; ?>"><?php echo $row['course_Title']; ?></a></td>
                                                <td><?php echo $row['creadit_Hours']; ?></td>
                                                <td><a href="downloadnceac.php?course_ID=<?php echo $row['course_Code'];; ?>"><?php echo $row['NCEAC Doc'];?></a></td>
                                                <td><?php echo $row['added_By']; ?></td>
                                                <td><?php echo $row['last_Modified']; ?></td>
                                            </tr>
                                            <?php
                                            $count++;
                                            }
                                            ?> 
                                            
                                      
                                            
                                        </tbody>
                                    </table>

                                    
                                </div>
                            </div>
                        </div>
                        </div>
                       
                        
                    </div>
                </main>


                        <!--<div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Courses</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="addcourse.php">View More</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View More</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                       
                        
                    </div>
                </main>
                
            </div>
        </div>
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