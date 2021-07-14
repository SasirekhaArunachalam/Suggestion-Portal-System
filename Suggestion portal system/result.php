<?Php

require "config.php";

$qst_id=$_POST['qst_id']; 
$count=$dbo->prepare("select qst from poll where qst_id=:qst_id");
$count->bindParam(":qst_id",$qst_id,PDO::PARAM_INT,3);
echo"<center><h1 style='color:#4CAF50;font-family:lucida handwriting;'>RESULT</h1></center>";
if($count->execute()){
//echo " Success <br>";
$row = $count->fetch(PDO::FETCH_OBJ);
}else{
echo "Database Problem";
}
$count=$dbo->prepare("select ans_id from response where qst_id=:qst_id");
$count->bindParam(":qst_id",$qst_id,PDO::PARAM_INT,3);
$count->execute();
$rt=$count->rowCount();
echo " <b><h2>TOTAL NUMBER OF VOTES<b> = ".$rt; 
echo "<h2 style='color:#4CAF50;'> VOTES </h2>";
/* Find out the answers and display the graph */
$sql="select count(*) as no,qst,response.opt from poll,response  where poll.qst_id=response.qst_id and poll.qst_id='$qst_id' group by opt";

foreach ($dbo->query($sql) as $noticia) {
 echo "<br><font size='3' face='Verdana' color='darkslategray'>$noticia[opt]</font>     ";
$noticia['no']=sprintf("%d",$noticia['no']); 
$ct=($noticia['no']/$rt)*100;
$ct=sprintf ("%01.2f", $ct);

echo " <font size='3' face='Verdana' color='#4CAF50'>$ct %</font><br>";
 }
echo "</font>";
?>
