<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 2/5/2018
 * Time: 11:57 AM
 */

include('connect.php');
try {
    //SQL SELECT statement
    $result = $conn->prepare("SELECT pId, cdiv, pName, pDesc, dDate FROM projecttable WHERE cdiv = 'ith'");
    $result->execute();
    // assign returned array elements to variables
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    $rcount = $result->rowCount();

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Information Technology Hardware Projects</title>
    <link rel="stylesheet" type="text/css" href="FEform.css">
</head>
<body>
<br>
<h1>Information Technology Hardware Projects</h1>
<button class="link" onclick="location.href='index.php'">Home</button>
<button class="link" onclick="location.href='bipage.php'">Business Intelligence</button>
<button class="link" onclick="location.href='itpage.php'">Information Technology</button>
<div>
    <form action="adminLogin.php">
        <button class="adminButton">Admin Login</button>
    </form>
</div>

<?php

//get today's date
$today = date('Y-m-d');
//format today's date
$todayd = date('F d Y');
?>

<h2>Hello today is <?php echo $todayd ?></h2>

<?php

if($rcount == 0){
    echo "There are currently no projects on tap for Information Technology Hardware!";
    }

foreach ($rows as $row) {
    $pId = $row['pId'];
    $cdiv =$row['cdiv'];
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
        <div id="Home">
        <div class="project-container">
            <label>Project Number:</label>
            <span><?php echo $pId; ?></span><br>
            <label>Division:</label>
            <span><?php echo $cdiv; ?></span><br>
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
            <label>Division:</label>
            <span><?php echo $cdiv; ?></span><br>
            <label>Project Owner:</label>
            <span><?php echo $pName; ?></span><br>
            <label>Project Description:</label>
            <span><?php echo $pDesc; ?> </span><br>
            <label>Project Due Date:</label>
            <span><?php echo $dDate; ?> </span><br><br>
            <h1>Project behind schedule!</h1>
        </div>
        <br>
        </div>
    <?php }
} ?>
</body>
</html>