<?php

include('connect.php');
try {
    //SQL SELECT statement
    $result = $conn->prepare("SELECT userid, pName, pDesc, dDate FROM test");
    $result->execute();
    // assign returned array elements to variables
    for($i=0; $row=$result->fetch(); $i++){
       $pName = $row['pName'];
       $pDesc = $row['pDesc'];
       $dDate = $row['dDate'];
    }
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
<body>


<h1>Project Dashboard</h1>
<div class="project-container">
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
</div>


</body>
</html>
