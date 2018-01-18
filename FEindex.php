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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>B.I.G Projects</title>
    <link rel="stylesheet" type="text/css" href="FEform.css">
</head>
<body>
<br>
<h1>B.I.G. Project Dashboard</h1>
<div>
    <form action="adminLogin">
    <button class="adminButton">Admin Login</button>
    </form>
</div>
<?php

//get today's date
$today = date('Y-m-d');
$todayd = date('F d Y');
?>

<h2>Hello today is <?php echo $todayd ?></h2>


<?php

foreach ($rows as $row) {
    $pId = $row['pId'];
    $pName = $row['pName'];
    $pDesc = $row['pDesc'];
    $dDate = $row['dDate'];

    //get milestone dates from datetable for each project based on pId
    $result2 = $conn->prepare("SELECT mDate FROM datetable WHERE pId = '$pId' LIMIT 1");
    $result2->execute();
    $rows2 = $result2->fetch(PDO::FETCH_ASSOC);
    $date = $rows2['mDate'];

    if (($dDate > $today) && ($date >= $today)) {
        ?>
        <div class="project-container">
            <label>Project Number:</label>
            <span><?php echo $pId; ?></span><br>
            <label>Project Owner:</label>
            <span><?php echo $pName; ?></span><br>
            <label>Project Description:</label>
            <span><?php echo $pDesc; ?> </span><br>
            <label>Project Due Date:</label>
            <span><?php echo $dDate; ?> </span><br>
        </div>
        <br>

    <?php } else { ?>
        <div class="FEproject-container-behind">
            <label>Project Number:</label>
            <span><?php echo $pId; ?></span><br>
            <label>Project Owner:</label>
            <span><?php echo $pName; ?></span><br>
            <label>Project Description:</label>
            <span><?php echo $pDesc; ?> </span><br>
            <label>Project Due Date:</label>
            <span><?php echo $dDate; ?> </span><br><br>
            <h1>Project behind schedule!</h1>
        </div>
        <br>

    <?php }
} ?>
</body>
</html>
