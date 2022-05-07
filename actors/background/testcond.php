<?php
	require("setup.php");

	use DataStructure\SqlCF;
	use Zas\ZasHelper;

	$cf = new SqlCF();

	/**
	 * username = 'levi' AND password = '12345678' AND salary BETWEEN 120000 AND 240000
	 * OR NID IN (1, 2, 3, 4, 5)
	 */

	 $cf->equal("username", "?")->equal("password", "?");
	 $cf->and();
	 $cf->notBetween("salary", "?", "?")->and();
	 $cf->in("nid", ["?", "?", "?"])->or();

	 ZasHelper::log($cf->output());
?>