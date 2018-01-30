<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 1/23/2018
 * Time: 2:15 PM
 */

//$servername = "compassbimysqlsvr.mysql.database.azure.com";
//$username = "kiplogin@compassbimysqlsvr";
//$password = "Sku11crush3r";

$servername = getenv('REMOTE_ADDR');
$username = getenv('USERNAME');
$password = getenv('PASSWORD');

//connect to database
$conn = new PDO("mysql:host=$servername;dbname=compassbiprojecttracer", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
