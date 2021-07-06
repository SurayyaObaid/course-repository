
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/register.css">
<?php
include 'header.php';
include 'config.php';
$name = "";
if(isset($_POST['reg_user'])){
    $error = NULL;
    $usercount = 0;
    $name = $_POST['username'];
    $designation = $_POST['designation'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    
    //checking existing email
        $checkuser = "select user_Name from teacher where user_Name = '$name'";
        $result = mysqli_query($mysqli, $checkuser);
        $numOfRows = mysqli_num_rows($result);
        if($numOfRows > 0){
          echo "<center>User already exists in database. Try another one</center>";
        }
        else{}
    
    if($name== "" || $password== "" || $designation=="" || $cpassword == ""){
        echo "<center>all fields are required</center>";
    }
    if(strlen($name) <= 4){
        $error = "<center>Username must be of at least 5 characters</center>";
        echo $error;
    }
    elseif(strlen($password)<8){
        $error = "<center>password should be at least 8 character</center>";
        echo $error;
    }
    elseif($cpassword != $password){
        $error = "<center>passwords don't match</center>";
        echo $error;
    }
    elseif($usercount>0){
        echo 'Email already exists. Login';
    }
    
    else{
       
            
        $username = $mysqli->real_escape_string($name);    
        $designation = $mysqli->real_escape_string($designation);
        $password = $mysqli->real_escape_string($password);
        $cpassword = $mysqli->real_escape_string($cpassword);
        $vkey = md5(time().$username);
        
        $insert = $mysqli->query("INSERT INTO teacher (User_name, password, teacher_Designation) values ('$username','$password', '$designation')");
        if($insert){
          
           header('location:userlogin.php');
           
        }
        else{
            echo $mysqli->error;
        }
    }
}


?>
<head>
  <title>Registration system PHP and MySQL</title>
  <!--<link rel="stylesheet" type="text/css" href="css/register.css">-->
</head>
<body style="margin-top: 100px">
  <div class="header bg-dark">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="userregistration.php">
  	
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="" pattern="{a-z}" maxlength="20">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="cpassword">
    </div>
    <div class="input-group">
      <label>Designation</label>
     </div>
      <select class="bg-light border border-dark col-lg-11 p4 mb-4 rounded" name="designation" id="designation">
        
        <option value="Professor">Professor</option>
        <option value="Assistant Professor">Assistant Professor</option>
        <option value="Lecturer">Lecturer</option>
        <option value="Lab Instructor">Lab Instructor</option>
      </select>
      
    </div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn btn-dark" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="userlogin.php">Sign in</a>
  	</p>
  </form>
</body>
</html>