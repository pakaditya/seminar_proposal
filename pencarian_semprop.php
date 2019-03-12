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
  		<title>M-Skripsi | Seminar Proposal</title>
  		<link rel="stylesheet" href="gaya_semprop.css" type="text/css">
	</head>

<body>


	<div id="header">
    	<h1>Seminar Proposal</h1>
    	
	</div>

 

 	<div id="menu">
    	<ul>
     		 <li><a href="#">Registrasi Metopen</a></li>
   	    </ul>
 	</div>


    			<form name="pencarian" method="POST" action = "pencarian_semprop.php">	
					<div align="center">
			
						<table id="tabel" >
							
                <tr>Pencarian : 	
                    <input type="text" placeholder="masukan nim" name="nim" title ="masukan nim">	 
                    <input type="submit" id="submit" name="submit" value="cari">  
                </tr>

          </form> <tr> <td> <br><br> 
  


  <?php
  
  if(isset($_POST['submit'])){


      $nim = $_POST['nim'];
                  echo "
                  <h3> HASIL PENCARIAN </h3>
        <form action='hasil_input_semprop.php' method='POST'>

        
                  ";
                

      foreach ($akses->cari($nim) as $key) {
        
        echo"
        
        <tr><td>NIM : <input name='nim' value='$key[nim]' type='text' readonly></td></tr>
        <tr><td>NAMA             : <input name='nama' value='$key[nama_mhs]' type='text' readonly></td></tr>
        <tr><td>PEMBIMBING       : <input name='pembimbing' value='$key[nama_dsn]' type='text' readonly></td></tr>
        <input name='key' value='$key[id_penguji]' hidden>
        ";


                    
        echo "
        <tr><td>ID DOSEN PENGUJI : <input name='penguji' value='$key[id_penguji]' type='text' readonly></td></tr>
        <tr><td>NILAI UJIAN      : <input type='text' name='nilai'> <td> </tr>
      
        <tr><td>STATUS           : <select name='status'> 
                                        <option value='lulus'> lulus </option> 
                                        <option value='tidak_lulus'> tidak lulus </option>
                                   </select> </td> </tr>
        
        <tr><td>   <input type='submit' name='simpan' value='simpan'> </td> </tr>       
        

        </form>
        ";


      }
    }
      ?>
   	
    

</body>
</html>

