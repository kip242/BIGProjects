<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/24/2017
 * Time: 10:45 PM
 */

include('connect.php');

$userid = $_GET['userid'];
$pName = $_GET['pName'];
$pDesc = $_GET['pDesc'];
$dDate = $_GET['dDate'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Backend Form</title>
</head>
<body>
<h1>New Project Entry Information</h1>
    <form action="updateSQL.php" method="GET"><!--TODO change to POST -->
        <input type="hidden" name="userid" value="<?php echo $userid; ?>">
        <label>Project Owner:</label>
        <input type="text" name="pName"
		    value="<?php echo htmlspecialchars($pName);?>">
            <br>
            <br>
        <label>Project Description:</label>
        <textarea name="pDesc" maxlength="1000" rows="4" cols="50"><?php echo htmlspecialchars($pDesc)?></textarea>
<br>
<br>
<label>Project Due Date:</label>
<input type="date" name="dDate"
       value="<?php echo htmlspecialchars($dDate)?>">
<br>
<br>
<input type="submit" value="Submit Project">
<br>
<br>
</form>
<form action="BEdisplay.php" method="GET">
    <input type="submit" name="submit" value="Go to Project List">
</form>

</body>
</html>



