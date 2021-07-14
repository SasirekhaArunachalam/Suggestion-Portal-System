<?php
include  'db.php';
  if(isset($_POST['submit'])) {
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $sql = "select * from user where user_name='$username' and password ='$password'";
    $result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1) {
            echo"<script>alert('Your details are successfully login');window.location.href='category.html'</script>";    
      }
      else {
           echo"<script>alert('Failed');</script>";
           
            echo"<script>alert('login');window.location.href='loginpage.php';</script>";    
      }
    }
?>