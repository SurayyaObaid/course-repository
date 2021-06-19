 <?php
//pattern="\(?(\w{3})\)?+[-]+(\d{4})"  for email (\w\.?)+@[\w\.-]+\.\w{2,4}
include 'header.php';
include 'config.php';
session_start();
if($_SESSION['user']==""){
echo "<script type='text/javascript'> 
 alert('Please login to for donation'); 
 </script>";"";
 header('location:userlogin.php');
}
if(isset($_POST['add_course'])){
      $a = $_POST['outline1'];
      $b = $_POST['outline2'];
      $c = $_POST['outline3'];
      $d = $_POST['outline4'];
      $e = $_POST['outline5'];
      $objarray  = array($a, $b, $c, $d, $e );
      $obj ='1. '. $objarray[0].'%'. '2. ' . $objarray[1].'%'. '3. '. $objarray[2].'%'.'4. '. $objarray[3].'%'.'5. '. $objarray[4];
      echo $obj;
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
              $courseoutline = $_POST['courseoutline'];
              $tdoc = $_FILES['wb_theory']['name'];
              $ldoc = $_FILES['wb_lab']['name'];
              $nceac = $_FILES['nceac_doc']['name'];
              $prereqs = $_POST['prereqs'];
              $twb_new = $code . '_Weekly_Breakup_Theory'. '.docx';
              $lwb_new = $code . '_Weekly_Breakup_Lab'. '.docx';
              $nceac_new = $code . '_NCEAC_Document'.'.docx';
             // $twbfilename = $code + 'theory_weekly_breakup';
             // $lwbfilename = $code + 'lab_weekly_breakup';
             // $nceacfilename = $code + 'nceac_doc';
              $added_By = $_SESSION['user'];

              $insert = "INSERT INTO `course`(`course_Code`, `course_Title`, `course_Outline`, `course_LOs`, `creadit_Hours`, `recommended_Books`, `weekly_Breakup_theory`, `weekly_Breakup_lab`, `pre-requisites`, `NCEAC Doc`, `added_By`, `course_Objectives`) VALUES ('$code', '$title', '$courseoutline', '$clo', '$credit', '$books', '$twb_new', '$lwb_new', '$prereqs', '$nceac_new' ,'$added_By', '$obj')";
              $execute  = mysqli_query($mysqli, $insert);

              if ($execute) {
                  move_uploaded_file($_FILES['wb_theory']['tmp_name'], "resources/".$twb_new);
                  move_uploaded_file($_FILES['wb_lab']['tmp_name'], "resources/".$lwb_new);
                  move_uploaded_file($_FILES['nceac_doc']['tmp_name'], "resources/".$nceac_new);
                  echo "<script>alert('Course Inserted')</script>";
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
<body style="margin-top:20px;">

  <div class="header w-50 bg-dark" style="margin-top: 100px;">
    <h2 >Add Course</h2>
  </div>
   
  <form method="post" class="w-50" enctype="multipart/form-data" action="addcourse.php">
    
    <div class="input-group">
      <label>Course Code</label>
      <input name="code" placeholder="XXX 0000" type="text" pattern="(?(\w{3})\)?+[ ]+(\d{4})" maxlength="8"required="required">
    </div>
    <div class="input-group">
      <label>Course Title</label>
      <input name="title" type="text" required="required">
    </div> 
    <!--<div class="input-group">
      <label>Credit Hours</label>
      <input type="text" name="credit" required="required">
    </div>-->
    <div class="input-group">
      <label>Credit Hours</label>
     </div>
      <select class="bg-light border border-dark col-lg-11 rounded" required="required" name="credit" id="credit">
        <option value="2+0">2+0</option>
        <option value="2+1">2+1</option>
        <option value="3+0">3+0</option>
        <option value="3+1">3+1</option>
      </select>
      
    </div>
    <div class="input-group">
      <label>Recommended Books</label>
      <input type="text" class ="h-25" name="books" required="required">
    </div>
    <div class="input-group">
      <label>Weekly Breakup (Theory)</label>
      <input type="file" class="pb-4 mb-2" 
       id="avatar" name="wb_theory"
       accept=".docx">
    </div>
    <div class="input-group">
      <label>Weekly Breakup (Lab)</label>
      <input type="file" class="pb-4 mb-2" 
       id="avatar" name="wb_lab"
       accept=".docx">
    </div>
    <div class="input-group">
      <label>NCEAC Document</label>
      <input type="file" class="pb-4 mb-2" 
       id="avatar" name="nceac_doc"
       accept=".docx">
    </div>
    <div class="input-group">
      <label>Course Outline</label>
      <input type="text" class ="h-25" name="courseoutline" required="required">
    </div>
    <div class="input-group">
      <label>Prerequisites</label>
      <input name="prereqs" type="text" required="required">
    </div>
      
    <table border="2" class="table table-striped">
             <label>Course Objectives</label>
             <tr >
            <td style="width: 15%;">1</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" required="required" name="outline1" placeholder="Objective" /></td></tr>

            <tr >

            <td style="width: 15%;">2</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" required="required" name="outline2" placeholder="Objective" /></td></tr>

            <tr>

            <td style="width: 15%;">3</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" required="required" name="outline3" placeholder="Objective" /></td></tr>

            <tr>
            <td style="width: 15%;">4</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" required="required" name="outline4" placeholder="Objective" /></td></tr>

            <tr>

            <td style="width: 15%;">5</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" required="required" name="outline5" placeholder="Objective" /></td></tr>


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
              <td style="width: 20%;"><input style="width: 85%;"  required="required" maxlength="1" type="text" name="domain1" maxlength="1" pattern="[A-Za-z]{1}" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" required="required" name="btlevel1">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text"  required="required" name="clo1" placeholder="CLO here" />
              </td>
            </tr>

            <tr >
              <td style="width: 5%;">2</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" maxlength="1" required="required" name="domain2" pattern="[A-Za-z]{1}" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" required="required" name="btlevel2">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" name="clo2" required="required" placeholder="CLO here" />
              </td>
            </tr>

            <tr >
              <td style="width: 5%;">3</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" maxlength="1" name="domain3" pattern="[A-Za-z]{1}" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" name="btlevel3">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" name="clo3" placeholder="CLO here" />
              </td>
            </tr>

            <tr >
              <td style="width: 5%;">4</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" maxlength="1" name="domain4" pattern="[A-Za-z]{1}" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" name="btlevel4">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" name="clo4" placeholder="CLO here" />
              </td>
            </tr>

            <tr >
              <td style="width: 5%;">5</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" maxlength="1" pattern="[A-Za-z]{1}" name="domain5" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" name="btlevel5">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" name="clo5" placeholder="CLO here" />
              </td>
            </tr>


          </tr>
        </table>
      </div>
    <div class="input-group justify-content-center">
      <input type="submit" class="btn btn-dark bg-dark" name="add_course" value="Add Course">
    </div>    
    <br>
    
  </form>
<!--
<hr class="m-4" style="width: 90%;">
  <div class="container col-lg-11 m-3 ml-4">

    <h3>Course Information</h3>
  <table class="table table-striped">
    <tr>
    <th style="width: 15%;">Course Title</th>
    <th style="width: 8%;">Course Code</th>
    <th style="width: 8%;">Credit Hours</th>
    <th style="width: 15%;">Recommended Books</th>
    <th style="width: 10%;">Weekly Breakup (Theory)</th>
    <th style="width: 10%;">weekly Breakup (Lab)</th>
    <th style="width: 22%;">Course Objectives</th>
    <th style="width: 22%;">Course Learning Outcomes</th>
    <th style="width: 22%;">Prerequisites</th>
    </tr>

<tr>
  <td><?php echo $title;?></td>
  <td><?php echo $code; ?></td>
  <td><?php echo $credit; ?></td>
  <td><?php echo $books; ?></td>
  <td><?php echo $ldoc; ?></td>
  <td><?php echo $tdoc; echo " ".$wb_new; ?></td>
  <td><?php echo $obj; ?></td>
  <td><?php echo $clo; ?></td>
  <td><?php echo $prereqs; ?></td>

</tr>

  </table>-->
  </div>
<?php

?>
</body>
</html> 