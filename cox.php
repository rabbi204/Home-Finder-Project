<?php
$con = new mysqli("localhost","root","root","soft");

if($con->connect_error)
{
	die("Could not connect to the database!".$con->connect_error);
}

  ?>