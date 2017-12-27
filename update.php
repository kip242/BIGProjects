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

$pNameUpdate = filter_input(INPUT_GET, 'pName');
$pDescUpdate = filter_input(INPUT_GET, 'pDesc');
$dDateUpdate = filter_input(INPUT_GET, 'dDate');

if(isset($_GET['submit'])){
echo $pDescUpdate;
$sql = "UPDATE projecttable 
        SET pName = '$pNameUpdate',
        pDesc = 'pDesc',
        dDate = '$dDateUpdate'
        WHERE userid = 'userid'";
$stmt = $conn->prepare($sql);
$stmt->execute();
}
echo $userid;

?>


<!DOCTYPE html>
<html>
<head>
<title>Update Form</title>
</head>
<body>
<h1>New Project Entry Information</h1>
    <form action="BEdisplay.php" method="GET"><!--TODO change to POST -->
        <label>Project Owner:</label>
        <input type="hidden" name="pNameUpdate" value="<?php echo $pNameUpdate; ?>">
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
        <form action="<?php $_PHP_SELF ?>" method="GET">
        <input type="submit" name="submit" value="Submit Update">
        </form>
            <br>
            <br>
    </form>


</body>
</html>