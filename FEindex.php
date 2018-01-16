<?php

include('connect.php');
try {
    //SQL SELECT statement
    $result = $conn->prepare("SELECT pId, pName, pDesc, dDate FROM projecttable");
    $result->execute();
    // assign returned array elements to variables
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Front End Display</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
<br>
<h1>Project Dashboard</h1>
<?php
$today = date('Y-m-d');
echo $today;
foreach ($rows as $row) {
    $pName = $row['pName'];
    $pDesc = $row['pDesc'];
    $dDate = $row['dDate'];

    if ($dDate > $today){
        ?>
        <div class="FEproject-container">
        <label>Project Owner:</label>
        <span><?php echo $pName; ?></span><br>
    <label>Project Description:</label>
    <span><?php echo $pDesc; ?> </span><br>
    <label>Project Due Date:</label>
    <span><?php echo $dDate; ?> </span><br><br>

    </div>
    </div>
    </div><br><br><?php }else{ ?>

<div class="FEproject-container">
    <label>Project Owner:</label>
    <span><?php echo $pName; ?></span><br>
    <label>Project Description:</label>
    <span><?php echo $pDesc; ?> </span><br>
    <label>Project Due Date:</label>
    <span><?php echo $dDate; ?> </span><br><br>
    <h1>Project behind schedule!</h1>
</div>
<?php }}?>
</body>
</html>
