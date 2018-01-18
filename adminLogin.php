<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 1/17/2018
 * Time: 1:10 PM
 */

session_start();
include('connect.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Log In Page</title>
    <link rel="stylesheet" type="text/css" href="FEform.css">
</head>
<body>
<header>
    <h1 align="center">Log In Page</h1>
</header>

    <div class="loginContainer">
    <form action="#" method="GET">
        <br>
        <br>
        <input type="text" class="form-control" name="username" placeholder="username">
        <br>
        <br>
        <input type="password" class="form-control" name="password" placeholder="password">
        <br>
        <br>
        <input id ="button" class = "button" type="submit"  name="submit" value ="Log In">
        <br>
        <br>
        <input type ="checkbox" id ="RememberMe" value = "Remember Me"><label for="RememberMe"> Remember Me</label><br>
    </form>
    </div>

</body>
</html>

<?php

//compare username and password to table

function Login(){
    global $conn;
    $username = $_GET['username'];
    $password = $_GET['password'];

    $sql = "SELECT * FROM users 
            WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $row = $stmt->fetchAll();
    if($row)
    {
        header('Location: BEdisplay.php');
    }elseif (!$row) {
        echo "Please provide valid username/password.";
    }
    //$stmt->closeCursor();
}

/*if(isset($_GET['submit'])){
    require_once 'connect.php';
    $username = $_GET['username'];
    echo $username;
    $password = $_GET['password'];
    echo $password;
    if(Login($username, $password)==true){
        echo "Login Successful";
    }else{
        echo "Please provide valid username/password";
    }
}*/

if (isset($_GET['submit'])){
    Login();
}

