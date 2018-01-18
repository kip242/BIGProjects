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
    <script>
        function charCount(field, count, max){
            count.value = max - field.value.length;
        }
    </script>
</head>
<body>
<h1>B.I.G. Project Entry Information</h1>
<form action="insert.php" method="GET">
    <div id="fields">
    <h4>Project Number:</h4>
    <span><input type="text" id="beinput" name="pId"
                        value="<?php echo htmlspecialchars($pId); ?>"></span>
    </div>
    <br>
    <br>
    <div id="fields">
        <h4>Project Owner:</h4>
        <span><input type="text" id="beinput" name="pName"
           value="<?php echo htmlspecialchars($pName); ?>"></span>
    </div>
    <br>
    <br>
    <div id="fields">
        <h4>Project Description:</h4>
            <span><textarea name="pDesc" id="beinput" maxlength="1000" rows="12" cols="100"
                            onKeydown="charCount(this, 1000);"
                            onKeyup="charCount(this, left, 1000);"
                            ><?php echo htmlspecialchars($pDesc); ?></textarea>
                            <input id="textCounter" readonly type="text" name="left" size=4 maxlength=4
                                   value="1000"></span>
    </div>
    <br>
    <br>
    <div id="fields">
        <h4>Project Due Date:</h4>
        <span><input type="date" id="beinput" name="dDate"
           value="<?php echo htmlspecialchars($dDate); ?>"></span>
    </div>
    <br>
    <br>

    <h4>Milestone Dates:</h4>
    <input type="date" id="beinput" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" id="beinput" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" id="beinput" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" id="beinput" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" id="beinput" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" id="beinput" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" id="beinput" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" id="beinput" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" id="beinput" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <input type="date" id="beinput" name="mDate[]" value="<?php echo htmlspecialchars($mDate);?>">
    <br>
    <br>

    <input class="buttonIndex" type="submit" value="Submit Project">
</form>
<br>
<form action="BEdisplay.php" method="GET">
    <input class="buttonIndex" type="submit" name="submit" value="Go to Project List">
</form>
</body>
</html>