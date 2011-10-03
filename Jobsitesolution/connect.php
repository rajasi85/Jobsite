<?php
$connect = mysqli_connect("localhost","root","") or die("Connection Failed!");
$database = mysqli_select_db($connect,"jobsdb") or die(mysqli_error($connect));
?>