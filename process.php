<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 1/5/2018
 * Time: 9:31 AM
 */

include('connect.php');

$pId = filter_input(INPUT_GET, 'pId');
$pName = filter_input(INPUT_GET, 'pName');
$pDesc = filter_input(INPUT_GET, 'pDesc');
$dDate = filter_input(INPUT_GET, 'dDate');
$cdiv = filter_input(INPUT_GET, 'cdiv');



$action = filter_input(INPUT_GET, 'action');

switch ($action) {

    case 'add' :
        header("Location: newProject.php");
        break;

    case 'home' :
        header("Location: index.php");
        break;

    case 'delete' :
        echo $pId;
        $sql = "DELETE FROM projecttable 
        WHERE pId  = :pId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':pId', $pId);
        $stmt->execute();
        $stmt->closeCursor();
        header("Location: BEdisplay.php");
        break;

    case 'update' :
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="ISO-8859-1">
            <title>Update Form</title>
            <link rel="stylesheet" type="text/css" href="form.css">
        </head>
        <body>
        <h1>Update Project # <?php echo $pId ?></h1>
        <form action="updateSQL.php" method="GET">
            <input type="hidden" name="pId" value="<?php echo $pId; ?>">
            <label>Project Owner:</label>
            <input id="beinput" type="text" name="pName"
                   value="<?php echo htmlspecialchars($pName); ?>">
            <br>
            <br>
            <label>Division:</label>
            <!--This select box selected value is set when $cdiv from BEdisplay = hardcoded value-->
            <select name="divSelect">
                <option value="Business Intelligence" <?php echo (($cdiv==="Business Intelligence")?"selected":"") ?>>Business Intelligence</option>
                <option value="Information Technology" <?php echo (($cdiv==="Information Technology")?"selected":"") ?>>Information Technology</option>
                <option value="Information Technology Hardware" <?php echo (($cdiv==="Information Technology Hardware")?"selected":"") ?>>Information Technology Hardware</option>
            </select>
            <br>
            <br>
            <label>Project Description:</label>
            <textarea id="beinput" name="pDesc" maxlength="1000" rows="4" cols="50"><?php echo htmlspecialchars($pDesc) ?></textarea>
            <br>
            <br>
            <label>Project Due Date:</label>
            <input id="beinput" type="date" name="dDate"
                   value="<?php echo htmlspecialchars($dDate) ?>">
            <br>
            <br>
            <input class="buttonUpdate" type="submit" value="Submit Update">
            <br>
            <br>
        </form>
        </body>
        </html>
        <?php
        break;
    } ?>