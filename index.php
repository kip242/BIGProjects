<?php
if (!isset($pName)) {$pName = "";}
if (!isset($pDesc)) {$pDesc = "";}
if (!isset($dDate)) {$dDate = "";}

$task_list = filter_input(INPUT_POST, 'tasklist', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($task_list === NULL){
    $task_list = array();
}

$action = filter_input(INPUT_POST, 'action');
array_push($task_list, "12/31/2017");

switch ('action'){
    case 'add':
        $new_task = filter_input(INPUT_POST, 'task');
        $task_list[] = $new_task;
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
        <?php foreach ($task_list as $task) ?>
           <?php echo htmlspecialchars($task); ?>

        <!--<input type="submit" value="Add Milestone Date">-->
        <br>
        <br>
        <input type="submit" value="Submit Project">
        <br>
        <br>
    </form>
    <form action="BEdisplay.php" method="GET">
        <input type="submit" name="submit" value="Go to Project List">
    </form>
        <br>
    <label>Add Milestone Date:</label>
    <form action="." method="POST">
        <?php foreach($task_list as $task) ?>
        <input type="hidden" name="tasklist[]"
               value="<?php echo htmlspecialchars($task);?>">
        <input type="hidden" name="action" value="add">
        <label>Date:</label>
        <input type="text" name="task"><br>
        <label>&nbsp;</label>
        <input type="submit" value="Add Date"><br>
    </form>
        <br>
</body>
</html>