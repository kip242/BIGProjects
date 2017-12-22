<?php
if (!isset($pName)) {$pName = "";}
if (!isset($pDesc)) {$pDesc = "";}
if (!isset($dDate)) {$dDate = "";}

include('connect.php');


?>
<!DOCTYPE html>
<html>
<head>
<title>Backend Form</title>
</head>
<body>
<h1>New Project Entry Information</h1>
    <form action="insert.php" method="get"><!--TODO change to POST -->
        <label>Project Owner:</label>
        <input type="text" name="pName"
		    value="<?php echo htmlspecialchars($pName);?>">
            <br>
            <br>
        <label>Project Description:</label>
        <textarea name="pDesc" maxlength="1000" rows="4" cols="50"><?php echo $pDesc?></textarea>
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
<form action="insert.php">
    <input type="submit" name="submit" value="Go to Project List">
</form>

</body>
</html>