<?php 
    if (!isset($pName)) {$pName = "";}
    if (!isset($pDesc)) {$pDesc = "";}
    if (!isset($dDate)) {$dDate = "";}
    $project_list = filter_input(INPUT_POST, 'projectlist', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
?>
<!DOCTYPE html>
<html>
<head>
<title>Backend Form</title>
</head>
<body>
<h1>New Project Entry Information</h1>
<form action="FEindex.php" method="post">
<label>Project Owner:</label>
<input type="text" name="pName"
		value="<?php echo htmlspecialchars($pName);?>">
<br>
<br>	
<label>Project Description:</label>
<textarea name="pDesc" rows="4" cols="50"><?php echo $pDesc?></textarea>
<br>
<br>
<label>Project Due Date:</label>
<input type="date" name="dDate"
		value="<?php echo htmlspecialchars($dDate)?>">
<br>	
<br>	
<input type="submit" value="Submit Project">
<br>
</form>

</body>
</html>