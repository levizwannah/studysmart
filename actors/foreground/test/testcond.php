<?php
	#code... 

	use DataStructure\SqlCF;
	use Zas\ZasHelper;

	require('setup.php');

	$cf = new SqlCF();

	$cf->equal("first", "firstVal")
		->equal("second", "secondVal")
		->not("third", "thirdVal")
		->and()
		->equal("day", "Monday")
		->not("James", "?")
		->in("salary", [1, 2, 3, 4, 5])
		->notIn("joinDate", ["firstDate", "SecondDate", "ThirdDate"])
		->between("available", 1, 2)
		->notBetween("started", 0, 1)
		->or();

	ZasHelper::log($cf->output());
?>