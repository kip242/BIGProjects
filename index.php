<?php
if (!isset($pName)) {$pName = "";}
if (!isset($pDesc)) {$pDesc = "";}
if (!isset($dDate)) {$dDate = "";}

$milestone_date = filter_input(INPUT_GET, 'tasklist', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($milestone_date === NULL){
    $milestone_date = array();
}

$action = filter_input(INPUT_GET, 'action');

switch ($action){
    case 'add':
        $new_date = filter_input(INPUT_GET, 'task');
        $milestone_date[] = $new_date;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Backend Form</title>
</head>
<body>
<h1>New Project Entry Information</h1>
<form action="insert.php" method="GET"><!--TODO change to POST -->
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
    <label>Project Milestone Dates:</label>
    <?php foreach ($milestone_date as $date) : ?>
        <?php echo htmlspecialchars($date); ?>
    <?php endforeach; ?>
    <br>
</form>
    <h2>Add Milestone Date:</h2>
    <form action="." method="GET" >
        <?php foreach( $milestone_date as $date ) :  ?>
            <input type="hidden" name="tasklist[]"
                   value="<?php echo htmlspecialchars($date);?>">
        <?php endforeach;?>
        <input type="hidden" name="action" value="add">
        <label>Add Date:</label>
        <input type="date" name="task" ><br><br>
        <button class="buttonUpdate" type="submit">Add Date</button><br>
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