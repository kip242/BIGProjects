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
if (!isset($mDate)) {$mDate = "";}

?>

<!DOCTYPE html>
<html>
<head>
    <title>B.I.G. Project Entry</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
<h1>B.I.G. Project Entry Information</h1>
<form action="insert.php" method="GET">
    <label id="label">Project Number:</label>
    <input type="text" name="pId"
           value="<?php echo htmlspecialchars($pId); ?>">
    <br>
    <br>
    <label id="label">Project Owner:</label>
    <input type="text" name="pName"
           value="<?php echo htmlspecialchars($pName); ?>">
    <br>
    <br>
    <label id="label">Project Description:</label>
    <textarea name="pDesc" maxlength="1000" rows="4" cols="50"><?php echo htmlspecialchars($pDesc); ?></textarea>
    <br>
    <br>
    <label id="label">Project Due Date:</label>
    <input type="date" name="dDate"
           value="<?php echo htmlspecialchars($dDate); ?>">
    <br>
    <br>
    <label>Project Milestone Dates:</label>
    <input type="date" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
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