<?php

	/**
	 * Copyright (c) korneltth. All rights reserved.
	 *
	 * Developed By Ark Crew
	 * Software Company
	 * https://www.ark-crew.com
	*/

	$conn = mysqli_connect("localhost", "root", "", "mgtproduct");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>