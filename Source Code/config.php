<?php



$host = "db"; /* Host name */
$user = "suclzhqo"; /* User */
$password = "gG5:3BbO87]bxI"; /* Password */
$dbname = "suclzhqo"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}