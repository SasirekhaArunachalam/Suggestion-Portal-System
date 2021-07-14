<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "<h1 style='color:#4CAF50;font-family:lucida handwriting;'><center>QUESTION LISTS <center></h1>";
$sql = "SELECT qst_id, qst FROM poll";
$result = $conn->query($sql);
echo"<table>
<tr>
<th>Question ID</th>
<th>QUESTION</th></tr>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $qi=$row["qst_id"];
  $qn=$row["qst"];
    echo'<tr><td>'.$qi.'</td> <td>' .$qn.'</td></tr>';
  }

} else {
  echo "0 results";
}
$conn->close();

?>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

* {
  box-sizing: border-box;
box-position:center;
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
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>
<form action="view.php" method="POST">
<label><b><h2 style="color:#4CAF50;">Enter the question id to vote </h2></b></label>
<input type="text" name="qid" placeholder="Question ID"required><br><br>
<center><button type="submit" class="registerbtn"><b>VIEW</b></button><center><br><br><br>

</form>
</body>
</head>
</html>
