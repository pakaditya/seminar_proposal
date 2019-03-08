<?php
	$connect = new mysqli("localhost", "root", "", "manajemen_skripsi");

	if($connect) echo " ";
	else echo "Gagal";

?>