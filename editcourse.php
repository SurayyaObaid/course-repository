<?php
include 'header.php';
include 'config.php';
if($_SESSION['user']==""){
echo "<script type='text/javascript'> 
 alert('Please login to for donation'); 
 </script>";"";
 header('location:userlogin.php');
}

//for update
$user = $_SESSION['user'];
$id = $_GET['course_Code'];
$retrieve = "select * from course where course_Code='".$id."'";
$query_run= mysqli_query($mysqli,$retrieve);
            
while ($row= mysqli_fetch_assoc($query_run)) {
  $courseID = $row['Course_ID'];
    $code = $row['course_Code'];
    $title = $row['course_Title'];
    $credit = $row['creadit_Hours'];
    $books = $row['recommended_Books'];
    $clostring = $row['course_LOs'];
    $lengthclo = strlen($clostring);
    $cloarray = explode("%", $clostring);
    $courseactualoutline = $row['course_Outline'];
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


    $outlinestring = $row['course_Objectives'];
    $lengthout = strlen($outlinestring);
    $outarray = explode("%", $outlinestring); 
    $out1 = explode(".", $outarray[0]);
    $out2 = explode(".", $outarray[1]);
    $out3 = explode(".", $outarray[2]);
    $out4 = explode(".", $outarray[3]);
    $out5 = explode(".", $outarray[4]);
    $weeklylab = $row['weekly_Breakup_lab'];
    $weeklytheory = $row['weekly_Breakup_theory']   ;
    $prereqs = $row['pre-requisites'];
    $nceac = $row['NCEAC Doc'];




//for insertion    
if(isset($_POST['add_course'])){
      $a = $_POST['outline1'];
      $b = $_POST['outline2'];
      $c = $_POST['outline3'];
      $d = $_POST['outline4'];
      $e = $_POST['outline5'];
      $outlinetext = $_POST['outlinetext'];
      $objarray  = array($a, $b, $c, $d, $e );
      $obj ='1. '. $objarray[0].'%'. '2. ' . $objarray[1].'%'. '3. '. $objarray[2].'%'.'4. '. $objarray[3].'%'.'5. '. $objarray[4];
      //echo $obj;
      $n1arrr=explode(',', $obj);


      $domain1 = $_POST['domain1'];
              $domain2 = $_POST['domain2'];
              $domain3 = $_POST['domain3'];
              $domain4 = $_POST['domain4'];
              $domain5 = $_POST['domain5'];

              $btlevel1 = $_POST['btlevel1'];
              $btlevel2 = $_POST['btlevel2'];
              $btlevel3 = $_POST['btlevel3'];
              $btlevel4 = $_POST['btlevel4'];
              $btlevel5 = $_POST['btlevel5'];

              $clo1 = $_POST['clo1'];
              $clo2 = $_POST['clo2'];
              $clo3 = $_POST['clo3'];
              $clo4 = $_POST['clo4'];
              $clo5 = $_POST['clo5'];

              $cloarray  = array($domain1, $btlevel1, $clo1, $domain2, $btlevel2, $clo2, $domain3, $btlevel3, $clo3,
              $domain4, $btlevel4, $clo4, $domain5, $btlevel5, $clo5 );
              $clo = '1'.'&'. $cloarray[0].'&'. $cloarray[1].'&'. $cloarray[2].'%'
                    .'2'.'&'.  $cloarray[3].'&'. $cloarray[4].'&'.$cloarray[5].'%'
                    .'3'.'&'.  $cloarray[6].'&'. $cloarray[7].'&'.$cloarray[8].'%'
                    .'4'.'&'.  $cloarray[9].'&'. $cloarray[10].'&'.$cloarray[11].'%'
                    .'5'.'&'.  $cloarray[12].'&'. $cloarray[13].'&'.$cloarray[14]
                    ;
              $n2arrr=explode(',', $clo);
             

              $title = $_POST['title'];
              $code_in_lower = $_POST['code'];
              $code = strtoupper($code_in_lower);
              $credit = $_POST['credit'];
              $books = $_POST['books'];
              //$name = $_POST['name'];
              $tdoc = $_FILES['wb_theory']['name'];
              $ldoc = $_FILES['wb_lab']['name'];
              $nceac = $_FILES['nceac_doc']['name'];
              $prereqs = $_POST['prereqs'];
              $twb_new = $code . '_Weekly_Breakup_Theory'. '.docx';
              $lwb_new = $code . '_Weekly_Breakup_Lab'. '.docx';
              $nceac_new = $code . '_NCEAC_Document'.'.docx';
            
              /*

              $updateprodQuery = $mysqli->query("UPDATE `plant` SET `Local_name` = '". $lname."',`Botanical_name` = '". $bname."', `Flowering_time`= '". $ftime."', `family` ='".  $family."',
              `spread_in_metres(in)` ='".  $spread."', `Known_hazards` = '". $hazards."', `Habitat` ='".  $habitat."', `Soil` = '". $soil."', `Temperature` ='". $temperature."', 
              `price(PKR)` ='".  $price."'
              WHERE `Plant_ID`='".$Plant_ID."'");   

              */
              
              $insert = "update `course` set 
              `course_Code` ='$code',
              `course_Title`= '$title', 
              `course_Outline` ='$courseactualoutline', 
              `course_LOs` ='$clo', 
              `creadit_Hours`  ='$credit', 
              `recommended_Books` ='$books', 
              `weekly_Breakup_theory` ='$twb_new', 
              `weekly_Breakup_lab` ='$lwb_new', 
              `pre-requisites` ='$prereqs', 
              `NCEAC Doc` ='$nceac_new', 
              `added_By`  ='$user',
              `course_Objectives` = '$obj'
              where `Course_ID`= '".$courseID."'";
             // $insert = "update `course` set `course_Title` = '$title' where Course_ID ='".$courseID."'";
             $execute  = mysqli_query($mysqli, $insert);
              //echo $insert;

              if ($execute) {
                  move_uploaded_file($_FILES['wb_theory']['tmp_name'], "resources/".$twb_new);
                  move_uploaded_file($_FILES['wb_lab']['tmp_name'], "resources/".$lwb_new);
                  move_uploaded_file($_FILES['nceac_doc']['tmp_name'], "resources/".$nceac_new);
                  echo "<script>alert('Record updated')</script>";
                }
                else{
                  echo mysqli_error($mysqli)  ;
                }
              
              
}

?>


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Add Course</title>
  <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body style="margin-top:80px;">

  <div class="header w-50 bg-dark" style="margin-top: 100px;">
    <h2 >Add Course</h2>
  </div>
   
  <form method="post" class="w-50" enctype="multipart/form-data" action="editcourse.php?course_Code=<?php echo $code; ?>">
    
    <div class="input-group">
      <label>Course Code</label>
      <input name="code" type="text" pattern="\(?(\w{3})\)?+[-]+(\d{4})" required="required" value="<?php echo $code; ?>">
    </div>
    <div class="input-group">
      <label>Course Title</label>
      <input name="title" type="text" required="required" value="<?php echo $title; ?>">
    </div>
    <!--<div class="input-group">
      <label>Credit Hours</label>
      <input type="text" name="credit" required="required">
    </div>-->
    <div class="input-group">
      <label>Credit Hours</label>
     </div>
      <select class="bg-light border border-dark col-lg-11 rounded" name="credit" id="credit" > 
        <option value="<?php echo $credit; ?>"><?php echo $credit; ?></option>
        <option value="2+1">2+1</option>
        <option value="3">3</option>
        <option value="3+1">3+1</option>
      </select>
      
    </div>
    <div class="input-group">
      <label>Recommended Books</label>
      <input type="text" class ="h-25" name="books" required="required" value="<?php echo $books; ?>">
    </div>

    <div class="input-group">
      <label>Outline</label>
      <input type="text" style="height: 100px;" name="outlinetext" required="required" value="<?php echo $courseactualoutline; ?>">
    </div>
    <div class="input-group">
      <label>Weekly Breakup (Theory)</label><br><br>
      
      <input type="file" class="pb-4 mb-2" value="<?php echo $weeklytheory; ?>" 
       id="avatar" name="wb_theory"
       accept=".docx">
       <a href="downloadtheory.php?Course_ID=<?php echo $row['course_Code'];; ?>"><?php echo $row['weekly_Breakup_theory'];?></a>
    </div>
    <div class="input-group">
      <label>Weekly Breakup (Lab)</label><br><br>
      
      
      <input type="file" class="pb-4 mb-2" value="<?php echo $weeklylab; ?>"  
       id="avatar" name="wb_lab"
       accept=".docx">
       <a href="downloadlab.php?Course_ID=<?php echo $row['course_Code'];; ?>"><?php echo $row['weekly_Breakup_lab'];?></a>
    </div>
    <div class="input-group">
      <label>NCEAC Document</label><br><br>
      
      <input type="file" class="pb-4 mb-2" value="<?php echo $nceac_new; ?>" 
       id="avatar" name="nceac_doc"
       accept=".docx">
       <a href="downloadnceac.php?Course_ID=<?php echo $row['course_Code'];; ?>"><?php echo $row['NCEAC Doc'];?></a>
    </div>
    <div class="input-group">

    <div class="input-group">
      <label>Prerequisites</label>
      <input name="prereqs" type="text" required="required" value="<?php echo $row['pre-requisites']; ?>">
    </div>
      
    <table border="2" class="table table-striped">
             <label>Course Objectives</label>
             <tr >
            <td style="width: 15%;">1</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" value="<?php echo $out1[1]; ?>" name="outline1" placeholder="Objective" /></td></tr>

            <tr >

            <td style="width: 15%;">2</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" value="<?php echo $out2[1]; ?>" name="outline2" placeholder="Objective" /></td></tr>

            <tr>

            <td style="width: 15%;">3</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" value="<?php echo $out3[1]; ?>" name="outline3" placeholder="Objective" /></td></tr>

            <tr>
            <td style="width: 15%;">4</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" value="<?php echo $out4[1]; ?>" name="outline4" placeholder="Objective" /></td></tr>

            <tr>

            <td style="width: 15%;">5</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" value="<?php echo $out5[1]; ?>" name="outline5" placeholder="Objective" /></td></tr>


          </tr>
        </table>
      </div>
    

        <div class="input-group">
    <table border="2" class="table table-striped">
      <tr>
        <th><center>Serial No.</center></th>
        <th><center>Domain</center></th>
        <th><center>BT Level</center></th>
        <th><center>CLO</center></th>
      </tr>
             <label>Course Learning Outcomes</label>
             <tr >
              <td style="width: 5%;">1</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" name="domain1" maxlength="1" pattern="[A-Za-z]{1}" placeholder="Domain" value="<?php echo $clo1array[1] ?>" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" name="btlevel1" value="<?php echo$clo1array[2] ?>">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" name="clo1" value="<?php echo $clo1array[3] ?>" placeholder="CLO here" />
              </td>
            </tr>

            <tr >
              <td style="width: 5%;">2</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" value="<?php echo $clo2array[1] ?>" name="domain2" pattern="[A-Za-z]{1}" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" value="<?php echo $clo2array[2] ?>" name="btlevel2">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" name="clo2" value="<?php echo $clo2array[3] ?>" placeholder="CLO here" />
              </td>
            </tr>

            <tr >
              <td style="width: 5%;">3</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" name="domain3" value="<?php echo $clo3array[1] ?>" pattern="[A-Za-z]{1}" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" <?php echo $clo3array[2] ?> name="btlevel3">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" value="<?php echo $clo4array[3] ?>"  name="clo3" placeholder="CLO here" />
              </td>
            </tr>

            <tr >
              <td style="width: 5%;">4</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" value="<?php echo $clo4array[1] ?>" name="domain4" pattern="[A-Za-z]{1}" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" value="<?php echo $clo4array[2] ?>" name="btlevel4">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" value="<?php echo $clo4array[3] ?>" name="clo4" placeholder="CLO here" />
              </td>
            </tr>

            <tr >
              <td style="width: 5%;">5</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" value="<?php echo $clo5array[1] ?>" pattern="[A-Za-z]{1}" name="domain5" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" value="<?php echo $clo5array[2] ?>" name="btlevel5">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" name="clo5" value="<?php echo $clo5array[3] ?>" placeholder="CLO here" />
              </td>
            </tr>


          </tr>
        </table>
      </div>
    <div class="input-group justify-content-center">
      
      <a href="editcourse.php?course_Code=<?php echo $code; ?>"><input type="submit" class="btn btn-dark bg-dark" name="add_course" value="Edit Course"></a>
    </div>    
    <br>
    
  </form>
<?php
}
?>


  </div>

</body>
</html> 