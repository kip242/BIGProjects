<?php
$pName = filter_input(INPUT_POST, 'pName');
$pDesc = filter_input(INPUT_POST, 'pDesc');
$pDesc = nl2br($pDesc, false);
$dDate = filter_input(INPUT_POST, 'dDate');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Front End Display</title>
<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
<button onclick="addContainer()">Try It</button>
<script type="text/javascript">
function addContainer(){
	var cont = document.createElement("BUTTON");
	document.body.appendChild(cont);
}
</script>

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
