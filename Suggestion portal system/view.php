<?Php

session_start();
$s_id=session_id();
require "config.php";

$count=$dbo->prepare("select s_id from response where s_id='$s_id'");
$count->execute();
$no=$count->rowCount();
$qst_id=$_POST['qid'];
$count=$dbo->prepare("select * from poll where qst_id=:qst_id");
$count->bindParam(":qst_id",$qst_id,PDO::PARAM_INT,1);
if($count->execute()){
//echo " Success <br>";
$query = $count->fetch(PDO::FETCH_OBJ);
}
echo "

<form method=post action=viewdisplay.php>
<div class='container'>
<center><h1 style='color:#4CAF50;font-family:lucida handwriting;'>POLL</center><br><br><b>
<label for='user_id'>USER_ID</label><br><br>
<input type='text' name='user_id' required><br><br>
<label for='qst_id'>QUESTION ID</label><br><br>
<input type='text' name='qst_id' value='$query->qst_id'><br><br>
   <font face='Verdana' size='4' >$query->qst</font><br><br>
       <input type='radio' value='$query->opt1'  name='opt'>
       <font face='Verdana' size='3' >$query->opt1</font><br>
      <input type='radio' value='$query->opt2'  name='opt'>
        <font face='Verdana' size='3' >$query->opt2</font><br>
      <input type='radio' value='$query->opt3'  name='opt'>
       <font face='Verdana' size='3' >$query->opt3</font><br>
<input type='radio' value='$query->opt4'  name='opt'>
<font face='Verdana' size='3' >$query->opt4</font><br>
</b><br><br><center>
<button type='submit' class='registerbtn'><b>SUBMIT</b><center></div></form>
";
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
box-position:center;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25%;
  opacity: 0.9;
  font-size:20px;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
</html>

