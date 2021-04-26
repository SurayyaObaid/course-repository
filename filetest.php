<?php
$servername = "localhost";
$user ="root";
$pass = "";
$dbname = "course-repository";
$mysqli = new mysqli($servername, $user, $pass, $dbname);
if (isset($_POST['submit'])) {
	$lname = $_POST['lname'];
	$tname = $_POST['tname'];
	$ldoc = $_FILES['ldoc']['name'];
	$tdoc = $_FILES['tdoc']['name'];
	$insert = "insert into resources(lfilename, ldocname, tfilename, tdocname) values ('$lname', '$ldoc','$tname', '$tdoc')";
	$execute  = mysqli_query($mysqli, $insert);
	if ($execute) {
		move_uploaded_file($_FILES['ldoc']['tmp_name'], "resources/$ldoc");
		move_uploaded_file($_FILES['tdoc']['tmp_name'], "resources/$tdoc");
		echo "<script>alert('Image Uploaded')</script>";
	}
	else{
		echo mysqli_error($mysqli) 	;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD FILES</title>
</head>
<body>
<form method="post" action="filetest.php" enctype="multipart/form-data">
	<label>Enter File Name</label>
	<input type="text" name="lname">
	<br>
	<label>
		Select File
	</label>
	<br>
	<input type="File" name="ldoc" accept=".docx">
	<br>
	

	<label>Enter File Name</label>
	<input type="text" name="tname">
	<br>
	<label>
		Select File
	</label>
	<br>
	<input type="File" name="tdoc" accept=".docx">
	<br>
	<input type="submit" name="submit" value="Upload File">
	
</form>
</body>
</html>