<?php

include 'header.php';
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
   
<div style="height: 100px;"></div>
<div class="container col-lg-8 mt-4">
<div class="container col-lg-8">

<table border="2" class="table table-striped">
             <label>Course Objectives</label>
             <tr >
            <td style="width: 15%;">1</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" name="outline1" placeholder="Objective" /></td></tr>

            <tr >

            <td style="width: 15%;">2</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" name="outline2" placeholder="Objective" /></td></tr>

            <tr>

            <td style="width: 15%;">3</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" name="outline3" placeholder="Objective" /></td></tr>

            <tr>
            <td style="width: 15%;">4</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" name="outline4" placeholder="Objective" /></td></tr>

            <tr>

            <td style="width: 15%;">5</td>
            <td style="width: 85%;"><input style="width: 85%;" type="text" name="outline5" placeholder="Objective" /></td></tr>


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
             <label>Course Learning Outcome</label>
             <tr >
              <td style="width: 5%;">1</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" name="domain1" maxlength="1" pattern="[A-Z]{1}" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" name="btlevel1">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" name="clo1" placeholder="CLO here" />
              </td>
            </tr>

            <tr >
              <td style="width: 5%;">2</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" name="domain2" pattern="[A-Z]{1}" placeholder="Domain" /></td>
              <td><select class="bg-light border border-dark col-lg-11 rounded" name="btlevel2">Domain 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>

              </td>
              <td style="width: 45%;"><input style="width: 90%;" type="text" name="clo2" placeholder="CLO here" />
              </td>
            </tr>

            <tr >
              <td style="width: 5%;">3</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" name="domain3" pattern="[A-Z]{1}" placeholder="Domain" /></td>
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
              <td style="width: 20%;"><input style="width: 85%;" type="text" name="domain4" pattern="[A-Z]{1}" placeholder="Domain" /></td>
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
              <td style="width: 5%;">1</td>
              <td style="width: 20%;"><input style="width: 85%;" type="text" name="domain5" placeholder="Domain" /></td>
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
    </div>  
    <br>
    
  </form>
  </div>

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
  <td><?php echo $tdoc; ?></td>
  <td><?php echo $obj; ?></td>
  <td><?php echo $clo; ?></td>
  <td><?php echo $prereqs; ?></td>

</tr>

  </table>
  </div>
<?php

?>
</body>
</html> 