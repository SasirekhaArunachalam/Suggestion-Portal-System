<?php
$user_id= $_POST['user_id'];
$qst_id=$_POST['qst_id'];
$question= $_POST['question'];
$opt1 = $_POST['opt1'];
$opt2 = $_POST['opt2'];
$opt3 = $_POST['opt3'];
$opt4 = $_POST['opt4'];
if (!empty($user_id) || !empty($qst_id) || !empty($question) || !empty($opt1) || !empty($opt2) || !empty($opt3) || !empty($opt4)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "database";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT qst_id From poll Where qst_id = ? Limit 1";
     $INSERT = "INSERT Into poll (user_id,qst_id,qst,opt1,opt2,opt3,opt4) values(?,?,?,?,?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $qst_id);
     $stmt->execute();
     $stmt->bind_result($qst_id);
     $stmt->store_result();
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssss",$user_id,$qst_id,$question, $opt1, $opt2,$opt3,$opt4);
      $stmt->execute();
 echo "<br><br><br><h1><b><center>Your poll was created successfully </center></b></h1>";
      echo"<br><center><b><h3><a href='category.html'>Click here to vote</a></h3></b></center>";
     } else {
      echo "<br><br><br><h1><b><center>Someone already register using this email</br></br></br></h1></b></center>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>