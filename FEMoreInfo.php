<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/27/2017
 * Time: 6:48 AM
 */

$pName = $_GET['pName'];
$pDesc = $_GET['pDesc'];
$dDate = $_GET['dDate'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Front End Display</title>
<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>

<div class="project-container">
 	<label>Project Owner:</label>
	<span><?php echo $pName; ?></span><br>
<label>Project Description:</label>
<span><?php echo $pDesc; ?> </span><br>
<label>Project Due Date:</label>
<span><?php echo $dDate; ?> </span><br><br>
</div>
</body>
</html>