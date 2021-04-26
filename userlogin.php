<?php
include 'header.php';
if(isset($_POST['login_user'])){
     $error = NULL;
    $usercount = 0;
    $username = $_POST['username'];
    $password = $_POST['password'];
     if($username== "" || $password== ""){
        echo "<center>all fields are required</center>";
    }
    else{
            //checking email
        $servername = "localhost";
        $user ="root";
        $pass = "";
        $dbname = "course-repository";
        $database = new mysqli($servername, $user, $pass, $dbname);
      
        $checkuser = "select * from teacher where user_Name = '$username'";
        $result = mysqli_query($database, $checkuser);
        $numOfRows = mysqli_num_rows($result);
        if($numOfRows > 0){
            while ($row= mysqli_fetch_array($result)) {
                $enpass = md5($password);
            if($username== $row['user_Name'] && $enpass==$row['password']){
            echo $row['user_Name'];
            echo $row['Password'];
            echo "there you go!";
            session_start();
            $_SESSION['user'] = $row['user_Name'];
            $_SESSION['teacherid'] = $row['teacher_ID'];
            $_SESSION['tname'] = $row['user_Name'];
            header('location:adminhome.php');
        

            }
            }
        }
        else{
            echo "<center>No record found. Please Register</<center>";
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Welcome</title>
  <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body style="margin-top:100px;">
  <div class="header bg-dark" style="margin-top: 200px;">
    <h2>Login</h2>
  </div>
   
  <form method="post" action="userlogin.php">
    
    <div class="input-group">
      <label>Username</label>
      <input name="username" type="text" required="required">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" required="required">
    </div>
    <div class="input-group">
      <button type="submit"  class="btn btn-dark bg-dark" name="login_user" value="login-btn">Login</button>
    </div>
    <p>
      Not yet a member? <a href="userregistration.php">Sign up</a>
    </p>
    <br>
    
  </form>

</body>
</html> 