<?php

include('connect.php');
try {
    //SQL SELECT statement
    $result = $conn->prepare("SELECT userid, pName, pDesc, dDate FROM projecttable");
    $result->execute();
    // assign returned array elements to variables
    $rows= $result->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Front End Display</title>
<link rel="stylesheet" type="text/css" href="form.css">
</head>
<br>
<h1>Project Dashboard</h1>
<?php
foreach($rows as $row){
    $pName = $row['pName'];
    $pDesc = $row['pDesc'];
    $dDate = $row['dDate'];
?><div class="project-container">
 	<label>Project Owner:</label>
	<span><?php echo $pName; ?></span><br>
	<label>Project Description:</label>
	<span><?php echo $pDesc; ?> </span><br>
	<label>Project Due Date:</label>
	<span><?php echo $dDate; ?> </span><br>
	 	<div class="progress-bar">
	 		<div id="myBar" class="container purple" style="height:24px;width:25%">
	 	</div>
	 </div>
</div><br><br><?php } ?>
</body>
</html>
