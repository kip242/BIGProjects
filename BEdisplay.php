<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/22/2017
 * Time: 10:08 AM
 */
include('connect.php');
try {
    //SQL SELECT statement
    $result = $conn->prepare("SELECT * FROM projecttable");
    $result->execute();

    // assign returned array elements to variables
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Table Retrieval Failed: " . $e->getMessage();
}

//this function checks to see which milestone date boxes are checked
function IsChecked($chkname, $dateId)
{
    if (!empty($_GET[$chkname])) {
        foreach ($_GET[$chkname] as $chkval) {
            if ($chkval == $dateId) {
                return true;
            }
        }
    }
    return false;
}

//if 1-3 milestone boxes are checked delete from datetable
if(isset($_GET['milestone'])) {
    $aDates = $_GET['dateId'];

        if (IsChecked('mDate', '1')) {
            $dateId = $aDates[0];
            $sql = "DELETE FROM datetable 
                    WHERE dateId  = :dateId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':dateId', $dateId);
            $stmt->execute();
            $stmt->closeCursor();
        }
        if (IsChecked('mDate', '2')) {
            $dateId = $aDates[1];
            $sql = "DELETE FROM datetable 
                    WHERE dateId  = :dateId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':dateId', $dateId);
            $stmt->execute();
            $stmt->closeCursor();
        }
        if (IsChecked('mDate', '3')) {
            $dateId = $aDates[2];
            $sql = "DELETE FROM datetable 
                    WHERE dateId  = :dateId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':dateId', $dateId);
            $stmt->execute();
            $stmt->closeCursor();
        }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>List of Current Projects</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
<div class="top-menu" id="myHeader">
<h1>Project Dashboard</h1>
<form action="process.php" method="GET">
    <button class="buttonIndex" type="submit" name="action" value="add">Add Project</button>
    <button class="buttonHome" type="submit" name="action" value="home">Home</button><br><br>
</form>
</div>


<?php
$fdiv = "";
foreach ($rows as $row) {
    $pId = $row['pId'];
    $pName = $row['pName'];
    $pDesc = $row['pDesc'];
    $dDate = $row['dDate'];
    $div = $row['cdiv'];

    if($div === 'bi'){$fdiv = "Business Intelligence";}
    if($div === 'it'){$fdiv = "Information Technology";}
    if($div === 'ith'){$fdiv = "Information Technology Hardware";}
    ?>

    <div class="project-container">
        <label class="boldLabel">Project ID:</label>
        <span><?php echo $pId; ?></span><br>
        <label class="boldLabel">Division:</label>
        <span><?php echo $fdiv; ?></span><br>
        <label class="boldLabel">Project Owner:</label>
        <span><?php echo $pName; ?></span><br>
        <label class="boldLabel">Project Description:</label>
        <span><?php echo $pDesc; ?> </span><br><br>
        <label class="boldLabel">Project Due Date:</label>
        <span><?php echo $dDate; ?> </span><br>
        <input type="hidden" name="pId" value="<?php echo $pId; ?>">
        <TABLE BORDER="0">
            <tr>
                <td>
                    <form action="process.php" method="GET">
                        <input type="hidden" name="pId" value="<?php echo $pId; ?>">
                        <input type="hidden" name="action" value="delete">
                        <input class="buttonDelete" type="submit" value="Delete">
                    </form>
                </td>
                <td>
                    <form action="process.php" method="GET">
                        <input type="hidden" name="pId" value="<?php echo $pId; ?>">
                        <input type="hidden" name="pName" value="<?php echo $pName; ?>">
                        <input type="hidden" name="pDesc" value="<?php echo $pDesc; ?>">
                        <input type="hidden" name="dDate" value="<?php echo $dDate; ?>">
                        <input type="hidden" name="fdiv" value="<?php echo $fdiv; ?>">
                        <input type="hidden" name="action" value="update">
                        <input class="buttonUpdate" type="submit" value="Update">
                    </form>
                </td>
            </tr>
        </TABLE>
    </div>


    <div class="milestone-container">
        <form action="#" method="GET">
            <label class="boldLabel">Project Milestone Dates:</label><br>

                <?php
                //select and display all milestone dates
                $result2 = $conn->prepare("SELECT * FROM datetable WHERE pId = '$pId' AND mDate <> '0000-00-00'");
                $result2->execute();
                $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);
                $count = 0;

                foreach ($rows2 as $row2) {
                    $count++;
                    $pId = $row2['pId'];
                    $dateId = $row2['dateId'];
                    $mDate = $row2['mDate'];
                    $mDesc = $row2['mDesc'];

                    ?>
                    <table>
                        <tr>
                    <input type="hidden" name="pId" value="<?php echo $pId; ?>">
                    <input  type="hidden" name="mDate[]" value="<?php echo $mDate; ?>">
                    <td><input type="checkbox" name="mDate[]" value="<?php echo $count; ?>"><?php echo "<strong>$mDate</strong>" ;?></td>
                        </tr>
                        <tr>
                    <td><?php echo $mDesc; ?></td>
                    <input type="hidden" name="dateId[]" value="<?php echo $dateId; ?>">
                        </tr>
                    </table>
                <?php } ?>
                <br><br>
                <button type="submit" class="buttonDelete" name="milestone">Delete</button>
        </form>
    </div>
<?php } ?>
<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
</body>
</html>


