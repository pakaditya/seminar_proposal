<?php

	//membutuhkan file fungsi_semprop
	require('fungsi_semprop.php');

	//instansiasi objek class Seminar_Proposal
	$akses = new Seminar_Proposal();
	$akses->koneksi();

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 

  if(isset($_POST['simpan'])){

    $id = $_POST['nim'];
    $nilai = $_POST['nilai'];
    $status = $_POST['status'];

      $akses->input_nilai_semprop($id,$nilai,$status,$id);

     
      foreach ($akses->lihat_data_tersimpan($id) as $key) {
      	
        echo"
        
        <h3> DATA TERSIMPAN </h3>
        <tr> 
        <td><td>NIM        : $key[nim]</td></tr> <br>
        <tr><td>NAMA       : $key[nama_mhs]</td> </tr> <br>
        <tr><td>NILAI      : $key[nilai] </td> </tr> <br>
        <tr><td>STATUS     : $key[status] </td> </tr> <br>
  
        ";
      }
    }

      ?>
   	

</body>
</html>
