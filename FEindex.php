<?php

include('connect.php');
try {
    //SQL SELECT statement
    $result = $conn->prepare("SELECT pId, pName, pDesc, dDate FROM projecttable");
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
<body>
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
	<span><?php echo $dDate; ?> </span><br><br>
    <form action="FEMoreInfo.php" method="GET">
        <input type="hidden" name="pName" value="<?php echo $pName; ?>">
        <input type="hidden" name="pDesc" value="<?php echo $pDesc; ?>">
        <input type="hidden" name="dDate" value="<?php echo $dDate; ?>">
	 	<button class="buttonMoreInfo" name="moreInfo">More Information</button>
    </form>
	 	</div>
	 </div>
</div><br><br><?php } ?>
</body>
</html>
