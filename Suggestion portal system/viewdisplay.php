<?php

//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************
session_start();
$s_id=session_id();
require "config.php";
$user_id=$_POST['user_id'];
$opt=$_POST['opt'];
$qst_id=$_POST['qst_id'];
if(!isset($opt)){echo "<font face='Verdana' size='2' color=red>Please select one option and then submit</font>";}
else{

$sql=$dbo->prepare("insert into response(s_id,user_id,qst_id,opt)  values(:s_id,:user_id,:qst_id,:opt)");
$sql->bindParam(':s_id',$s_id,PDO::PARAM_STR, 100);
$sql->bindParam(':user_id',$user_id,PDO::PARAM_INT,5);
$sql->bindParam(':qst_id',$qst_id,PDO::PARAM_INT,6);
$sql->bindParam(':opt',$opt,PDO::PARAM_STR,2);
if($sql->execute()){
//$mem_id=$dbo->lastInsertId(); 
echo "<h1 style='color:#4CAF50;font-family:lucida handwriting;'><b>Thanks for voting........Your vote is successfully recorded</b></h2> ";
}
else{
echo " Not able to add data please contact Admin ";
}

//$qt=mysql_query("insert into response(s_id,user_id,qst_id,opt) values('$s_id','$user_id',$qst_id,'$opt')");
//echo mysql_error();
}

?>
<html>
<head>
<style>
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
</style>
</head>
<body>

<form action="result.php" method="POST">
<label><h1>Enter the question id to see the number of votes and result</h1></label>
<input type="text" name="qst_id">
<center>
<button type="submit" class="registerbtn"><b>VIEW POLLS</b></button><center>
</form>
</body>
</html>
