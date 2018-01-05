<?php
if (!isset($pId)){
    $pId = "";
}
if (!isset($pName)) {
    $pName = "";
}
if (!isset($pDesc)) {
    $pDesc = "";
}
if (!isset($dDate)) {
    $dDate = "";
}
if (!isset($date1)) {$date1 = "";}
if (!isset($date2)) {$date2 = "";}
if (!isset($date3)) {$date3 = "";}
if (!isset($date4)) {$date4 = "";}
if (!isset($date5)) {$date5 = "";}
if (!isset($date6)) {$date6 = "";}
if (!isset($date7)) {$date7 = "";}
if (!isset($date8)) {$date8 = "";}
if (!isset($date9)) {$date9 = "";}
if (!isset($date10)) {$date10 = "";}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Backend Form</title>
</head>
<body>
<h1>New Project Entry Information</h1>
<form action="insert.php" method="GET"><!--TODO change to POST -->
    <label>Project Number:</label>
    <input type="text" name="pId"
           value="<?php echo htmlspecialchars($pId); ?>">
    <br>
    <br>
    <label>Project Owner:</label>
    <input type="text" name="pName"
           value="<?php echo htmlspecialchars($pName); ?>">
    <br>
    <br>
    <label>Project Description:</label>
    <textarea name="pDesc" maxlength="1000" rows="4" cols="50"><?php echo htmlspecialchars($pDesc); ?></textarea>
    <br>
    <br>

    <label>Project Due Date:</label>
    <input type="date" name="dDate"
           value="<?php echo htmlspecialchars($dDate); ?>">
    <br>
    <br>
    <label>Project Milestone Dates:</label>
    <input type="date" name="date[]" value="<?php echo htmlspecialchars($date1);?>">
    <input type="date" name="date[]" value="<?php echo htmlspecialchars($date2);?>">
    <input type="date" name="date[]" value="<?php echo htmlspecialchars($date3);?>">
    <input type="date" name="date[]" value="<?php echo htmlspecialchars($date4);?>">
    <input type="date" name="date[]" value="<?php echo htmlspecialchars($date5);?>">
    <input type="date" name="date[]" value="<?php echo htmlspecialchars($date6);?>">
    <input type="date" name="date[]" value="<?php echo htmlspecialchars($date7);?>">
    <input type="date" name="date[]" value="<?php echo htmlspecialchars($date8);?>">
    <input type="date" name="date[]" value="<?php echo htmlspecialchars($date9);?>">
    <input type="date" name="date[]" value="<?php echo htmlspecialchars($date10);?>">
    <br>
    <br>
    <input type="submit" value="Submit Project">
</form>
<br>
<form action="BEdisplay.php" method="GET">
    <input type="submit" name="submit" value="Go to Project List">
</form>
</body>
</html>