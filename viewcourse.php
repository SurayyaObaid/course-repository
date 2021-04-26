<?php
include 'header.php';
include 'config.php';
$servername = "localhost";
$user ="root";
$pass = "";
$dbname = "course-repository";
$mysqli = new mysqli($servername, $user, $pass, $dbname);

//$query= "select * from plant where Plant_ID='".$Plant_ID."'";
$courseID = $_GET['course_Code'];
$query = "select * from course where course_Code='".$courseID."'";
//`course_Code`, `course_Title`, `course_Outline`, `course_LOs`, `creadit_Hours`, `recommended_Books`, `weekly_Breakup_theory`, `weekly_Breakup_lab`, `pre-requisites`, `NCEAC Doc`
$query_run= mysqli_query($mysqli,$query);
            
while ($row= mysqli_fetch_assoc($query_run)) {
	$courseID = $row['course_ID'];
    $code = $row['course_Code'];
    $title = $row['course_Title'];
    $credit = $row['creadit_Hours'];
    $books = $row['recommended_Books'];
    $clostring = $row['course_LOs'];
    $lengthclo = strlen($clostring);
    $cloarray = explode("%", $clostring);
    $clo1 = $cloarray[0];
    $clo2 = $cloarray[1];
    $clo3 = $cloarray[2];
    $clo4 = $cloarray[3];
    $clo5 = $cloarray[4];

    $clo1array = explode("&", $clo1);
    $clo2array = explode("&", $clo2);
    $clo3array = explode("&", $clo3);
    $clo4array = explode("&", $clo4);
    $clo5array = explode("&", $clo5);
    /*
	$s[] =  ["abdcho","nuoip","jioih","niujhoij" ];
		$s1 = "anjnjkl,joijc,nciuhcuo";
		$arr = explode(",", $s1);


		for ($x = 0; $x < count($arr); $x++) {
		     echo nl2br($arr[$x]."\n");}

    */

	  $outlinestring = $row['course_Outline'];
    $lengthout = strlen($outlinestring);
    $outarray = explode("%", $outlinestring);	

    $weeklylab = $row['weekly_Breakup_lab'];
    $weeklytheory = $row['weekly_Breakup_theory']   ;
    $prereqs = $row['pre-requisites'];
    $nceac = $row['NCEAC Doc'];
?>

<hr class="m-4" style="width: 90%; margin-top: 100px;">
  <div class="container col-lg-11 m-3 ml-4">

    <h3>Course Information</h3>
  <table class="table table-striped">
    <tr>
    <td style="width: 15%;">Course Title</td>
    <td><?php echo $title;?></td>
</tr>
<tr>
    <td style="width: 8%;">Course Code</td>
    <td><?php echo $code; ?></td>
  </tr>
    <td style="width: 8%;">Credit Hours</td>
 	<td><?php echo $credit; ?></td>
<tr>
    <td style="width: 15%;">Recommended Books</td>
    <td><?php echo $books; ?></td></tr>
  <tr>
    <td style="width: 10%;">Weekly Breakup (Theory)</td>
    <td><a href="downloadtheory.php?course_ID=<?php echo $code; ?>"><?php echo $weeklytheory; ?></a></td></tr>
 <tr> 
    <td style="width: 10%;">weekly Breakup (Lab)</td>
    <td><a href="downloadlab.php?course_ID=<?php echo $code; ?>"><?php echo $weeklylab; ?></a></td></tr>

<tr> 
    <td style="width: 10%;">NCEAC Document</td>
    <td><a href="downloadnceac.php?course_ID=<?php echo $code; ?>"><?php echo $nceac; ?></a></td></tr>    
<tr>  
    <td style="width: 22%;">Course Objectives</td>
    <td><?php for ($x = 0; $x < count($outarray); $x++) {
		     echo nl2br($outarray[$x]."\n");} ?></td></tr>
 <tr>
    <td style="width: 22%;">Course Learning Outcomes</td>
  <td>
  	<table>
  		<tr>
  		<th><center>S. No.</center></th>
      <th><center>CLO</center></th>
  		<th><center>Domain</center></th>
  		<th><center>BT Level</center></th>
  		
  		</tr>
  		<tr>
  			<td><?php echo $clo1array[0]; ?></td>
        <td><?php echo $clo1array[3]; ?></td>
  			<td><?php echo $clo1array[1]; ?></td>
  			<td><?php echo $clo1array[2]; ?></td>
  			
  		</tr>
  		<tr>
  			<td><?php echo $clo2array[0]; ?></td>
        <td><?php echo $clo2array[3]; ?></td>
  			<td><?php echo $clo2array[1]; ?></td>
  			<td><?php echo $clo2array[2]; ?></td>
  		</tr>
  		<tr>
  			<td><?php echo $clo3array[0]; ?></td>
        <td><?php echo $clo3array[3]; ?></td>
  			<td><?php echo $clo3array[1]; ?></td>
  			<td><?php echo $clo3array[2]; ?></td>
  			
  		</tr>
  		<tr>
  			<td><?php echo $clo4array[0]; ?></td>
        <td><?php echo $clo4array[3]; ?></td>
  			<td><?php echo $clo4array[1]; ?></td>
  			<td><?php echo $clo4array[2]; ?></td>

  		</tr>
  		<tr>
  			<td><?php echo $clo5array[0]; ?></td>
        <td><?php echo $clo5array[3]; ?></td>
  			<td><?php echo $clo5array[1]; ?></td>
  			<td><?php echo $clo5array[2]; ?></td>
  		</tr>
  		
  	</table>
  </td>
  </table>
<a class="btn btn-dark justify-content-right col-lg-12" style="float: right;" href="editcourse.php?course_Code=<?php echo $code; ?>">Update Course Info</a>
  </div>
<?php
}



?>
</body>
</html> 