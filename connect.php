<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/27/2017
 * Time: 2:09 PM
 */

$servername = "compassbimysqlsvr.mysql.database.azure.com";
$username = "kiplogin@compassbimysqlsvr";
$password = "Sku11crush3r";
//connect to database
$conn = new PDO("mysql:host=$servername;dbname=compassbiprojecttracer", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully.  ";