<?php
include 'header.php';
echo $_SESSION['user'];
?>
<body>

	<center>
	<section  class="page-section bg-white mb- mt-4" id="device">
            <div class="container" style="margin-top: 100px;">
                <div class="row justify-content-left">
                    <div class="col-lg-2 text-center bg-dark" >
                                <center><h2 class="text-light pt-4 ">Dashboard</h2></center>
                                
                                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="orderconfirmation.php"><solid style="color: white;">Profile</solid></a></li>
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="manageusers.php"><solid style="color: white;">Courses</solid></a></li>
                                
                                
                            </ul>
                    </div>
<div class="col-lg-8 ml-4 justify-content-center " >
    <div class=" text-light font-weight-bold bg-dark" style=" height: 100px; margin-right: 20px; margin-left: 20px; padding-top: 35px;">
		<h4><center>Profile</center></h4>
	</div>
    <div class="row m-4 bg-light">
        <div class="col-lg-12">
            <div class="card" style="border-radius: 5px; border-color: black;">
              <div class="card-body">
                <h5 class="card-title float-left">Courses</h5>
                
                <a href="addcourse.php" class="btn btn-dark m-3 float-right">Add New</a>
                
              </div>
            </div>
        </div> 
                        
            </div>
            </div>
        </div>
    </section>
</center>
</body>