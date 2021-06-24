
<head>
  <script>
  function validate(){
    var ccode = document.getElementById("ccode").value;
    var code_pattern = /^[a-zA-Z]{3}[ ]{1}[0-9]{3}+$/;
    if (ccode.match(code_pattern)) 
      {
        document.getElementById("codemessage").innerHTML="** rule followed";
      }
    else{
      document.getElementById("codemessage").innerHTML="** Code must follow this pattern: AAA 1234";
    }
  }
</script>
</head>
<body>
<form onsubmit="return validate()">
<div class="input-group">
      <label>Course Code</label>
      <input name="code" id="ccode" type="text" pattern="(?(\w{3})\)?+[-]+(\d{4})" maxlength="7" required="required">
      <span id="codemessage"></span>
    </div>
 <div class="input-group justify-content-center">
      <input type="submit" class="btn btn-dark bg-dark" name="add_course" value="Add Course">
    </div>  
</form>

<form action="CreateFolder.php" method="post">
    <h2>
        Create New Folder
    </h2>
    <input name="createfolder" type="text">
    <input type="submit" value="Create Folder">
</form>







<?php
$servername = "localhost";
$user ="root";
$pass = "";
$dbname = "course-repository";
$mysqli = new mysqli($servername, $user, $pass, $dbname);
$teacherID = "16";
$assignedCourses = "select * from `teacher-course` where teacher_ID = '".$teacherID."'";
$executeCourses = mysqli_query($mysqli, $assignedCourses);

if ($executeCourses) {
  //echo "executed";
while ($row = mysqli_fetch_array($executeCourses)) {
    echo $row['teacher_ID']."<br>";
    echo $row['course_ID']."<br>";
    
  }
}
?>

</body>

