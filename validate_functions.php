<?php require('connection.php');?>
<script>
  function validateUsername(){
  var username=$("#username").val();
  if (username.length < 3) {
    $("#username").css({"border": "2px solid red"});
	  $("#username_warning").css({"color": "red"});
    $("#username_warning").html("Username should contain atleast 3 letters");
    return false;
  }
$.ajax({
  url: "validate.php",
  type: 'POST',
  data:{'username': username,
		'email':null
		}
}).done(function(response) {
  if(Number(response)){
	$("#username").css({"border": "2px solid red"});
	$("#username_warning").css({"color": "red"});
    $("#username_warning").html("Username exists");
  }
  else{
    $("#username").css({"border": "2px solid green"});
    $("#username_warning").html("");
  }
});
}
function validateEmail(){
	var email=$("#email").val();
$.ajax({
  url: "validate.php",
  type: 'POST',
  data:{'email':email,
	'username':null
		}
}).done(function(response) {
  if(Number(response)){
  $("#email_warning").css({"color": "red"});
  $("#email").css({"border": "2px solid red"});
    $("#email_warning").html("email exists");
  }
  else
  {
    $("#email").css({"color": "green"});
    $("#email_warning").html("");
    $("#email").css({"border": "2px solid green"});
  }
});
}
function validatePassword() {
  var p = document.getElementById('psw').value;
  var p1 = document.getElementById('psw1').value;
  var errors = [];
      
  if (p.length < 8) {
      errors.push("must be at least 8 characters,");
  }
  if (p.search(/[a-z]/i) < 0) {
      errors.push("must contain at least one letter,"); 
  }
  if (p.search(/[0-9]/) < 0) {
      errors.push("must contain at least one digit,");
  }
  if (p.search(/[!#$%&?@ ]/) < 0) {
      errors.push("must contain at least one special character.");
  }
  if (errors.length > 0) {
    <?php array_push($errors, "1");?>
    document.getElementById("psw").style.borderColor = "red";
    document.getElementById("password_warning").style.color="red";
    document.getElementById("password_warning").innerHTML= "Your password "+errors.join("\n");
      return false;
  }
  else{
    <?php array_pop($errors);?>
    document.getElementById("psw").style.borderColor = "green";
    document.getElementById("password_warning").style.color="green";
    document.getElementById("password_warning").innerHTML= "password accepted"; 
  }
  return true;
}
function passwordmatch(){
  var p = document.getElementById('psw').value;
  var p1 = document.getElementById('psw1').value;
  if(p.localeCompare(p1))
  {
    <?php array_push($errors, "1");?>
  document.getElementById("psw").style.borderColor = "red";
  document.getElementById("psw1").style.borderColor = "red";
    document.getElementById("password_warning").style.color="red";
    document.getElementById("password_warning").innerHTML= "passwords don't match";
    return false;
  }
  <?php array_pop($errors);?>
  document.getElementById("psw").style.borderColor = "green";
  document.getElementById("psw1").style.borderColor = "green";
    document.getElementById("password_warning").style.color="green";
    document.getElementById("password_warning").innerHTML= "passwords accepted";
  return true;
}
</script>