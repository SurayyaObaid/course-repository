
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



</body>
