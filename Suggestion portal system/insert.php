<?php
$user_id= $_POST['user_id'];
$user_name = $_POST['user_name'];
$dob= $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password= $_POST['password'];
if (!empty($user_id) || !empty($user_name) || !empty($dob) || !empty($gender) || !empty($email) || !empty($password) ) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "database";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT user_id From user Where user_id = ? Limit 1";
     $INSERT = "INSERT Into user (user_id,user_name,dob,gender,email,password) values(?,?,?,?,?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss",$user_id,$user_name,$dob, $gender, $email,$password);
      $stmt->execute();
      echo "<br><br><br><h1><b><center>REGISTERED SUCCESSFULLY<br><br><a href='loginpage.php'></A></center></b></h1>";
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