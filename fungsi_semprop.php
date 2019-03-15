<?php 

//Author : Aditya A.R
//Date   : 10/03/2019 , 11:00 PM


	//class untuk data-data yang diperlukan pada fitur seminar proposal
	class Seminar_Proposal{

		//variaber yang diperlukan
		public $host, $user, $pass, $db, $hasil, $konek, $cari, $nilai, $status; 

		//konstruktor
		function __construct(){
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->db   = "prpl";
		}

		//fungsi untuk mengkoneksikan ke database
		public function koneksi(){
			$this->konek = mysqli_connect($this->host,$this->user,$this->pass,$this->db);

				//mengecek apakah database sudah terkoneksi
				if(!$this->konek){
					return die('Maaf koneksi belum tersambung'.mysqli_connect_error());
				}
		}

		//fungsi untuk mengeksekusi query
		public function eksekusi($query){
			$this->hasil = mysqli_query($this->konek, $query);
		}

		//fungsi untuk searching mahasiswa berdasarkan nim
		public function cari($nim){
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as 		id_penguji FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on 					mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal and mahasiswa_metopen.	nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;
		}
		
		// fungsi untuk memasukan nilai seminar proposal mahassiwa
		public function input_nilai_semprop($id_seminar,$nilai,$status,$nim){
			$query = "INSERT INTO seminar_proposal VALUES ('$id_seminar','$nilai','$status','$nim')";
			mysqli_query($this->konek, $query);
		}

		//lihat nilai
		public function lihat_data_tersimpan($nim){
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai, seminar_proposal.	  status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim and mahasiswa_metopen.nim=$nim";
			$this->eksekusi($query);
			return $this->hasil;
		}
		// public function tampilin_nama_dosen_penguji($nim)
		// {
		// 	$query = "SELECT dosen.nama as namdos from dosen join dosen_penguji on dosen.niy=dosen_penguji.niy_dosen_penguji join penguji on dosen_penguji.niy_dosen_penguji=penguji.id_penguji join mahasiswa_metopen on dosen.niy = mahasiswa_metopen.dosen on mahasiswa_metopen.nim = $nim ";
		// 	$this->eksekusi($query);
		// 	return $this->hasil;
		// }

	}


 ?>