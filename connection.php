<?php
$con= mysqli_connect("localhost","root","","employee_system");
if(!$con)
{
    die("failed to connect to the database");
}