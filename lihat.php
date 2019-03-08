<?php
echo "<head><title>Data Mahasiswa</title></head>";
$fp = fopen("data.txt","r");
echo "<table border=0>";
while ($isi = fgets($fp,80))
{
$pisah = explode("|",$isi);
echo "<tr><td>Nim </td><td>: $pisah[0]</td></tr>";
echo "<tr><td>Nama </td><td>: $pisah[1]</td></tr>";
echo "<tr><td>Jenis Kelamin </td><td>: $pisah[2]</td></tr>";  
echo "<tr><td>Alamat </td><td>: $pisah[3]</td></tr>";
echo "<tr><td>No.hp </td><td>: $pisah[4]</td></tr>
<tr><td>&nbsp;<hr></td><td>&nbsp;<hr></td></tr>";
}
echo "</table>";
echo "<a href=form.html> Klik Disini </a>Untuk mendata mahasiswa";
?>