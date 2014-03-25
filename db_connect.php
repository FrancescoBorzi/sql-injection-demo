<?php

	$connection = mysqli_connect("localhost", "root", "", "sqli");

	if (mysqli_connect_errno($connection))
	{
		die ("Failed to connect to MySQL: <strong>" . mysqli_connect_error() . "</strong>");
	}
?>