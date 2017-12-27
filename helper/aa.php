<?PHP
	// Normal

	function jenkel($x) {
		if($x = "L") {
			$tampil = "Laki-laki";
		} else if ($x = "P") {
			$tampil = "Perempuan";
		} else {
			$tampil = "Lainnya";
		}
		return $tampil;
	}
	
	function minmax($nilai){
		foreach ($nilai as $n){
			if(isset($min)){
				if($min > $n){
					$min = $n;
				}
			} else {
				$min = $n;
			}
			if(isset($max)){
				if($max < $n){
					$max = $n;
				}
			} else {
				$max = $n;
			}
		}
		$keluar = array("min"=>$min,"max"=>$max);
		return $keluar;
	}
	
	// database
	
	// numrows
	function banyakdatatabel($namatabel,$namafield = "",$isifield = "",$like = TRUE){
		include("script/koneksi.php");
		
		$kueri = "SELECT * FROM ".$namatabel;
		if(is_array($namafield)){
			$kueri .= " WHERE ";
			$banyakfield = count($namafield);
			$x = 0;
			while($x < $banyakfield){
				if($like){
					if($x == 0){
						$kueri .= $namafield[$x] . " LIKE '%". $isifield[$x] ."%' ";
					} else {
						$kueri .= "AND ".$namafield[$x] . " LIKE '%". $isifield[$x] ."%' ";
					}
				} else {
					if($x == 0){
						$kueri .= $namafield[$x] . " LIKE '". $isifield[$x] ."' ";
					} else {
						$kueri .= "AND ".$namafield[$x] . " LIKE '". $isifield[$x] ."' ";
					}
				}
				$x++;
			}
		} else {
			if($namafield != "" and $isifield != ""){
				$kueri .= " WHERE ";
				if($like){
					$kueri .= $namafield . " LIKE '%". $isifield ."%' ";
				} else {
					$kueri .= $namafield . " LIKE '". $isifield ."' ";
				}
			}
		}
		
		$kueri = mysqli_query($koneksi,$kueri);
		
		return mysqli_num_rows($kueri);
	}
	
	// insert into
	function isitabel($namatabel,$namafield = array(""),$isifield = array("")){
		include("script/koneksi.php");
		
		$sqlkueri = "INSERT INTO ".$namatabel."(";
		$banyakfield = count($namafield);
		$x = 0;
		while($x < $banyakfield){
			if($x == 0){
				$sqlkueri .= $namafield[$x];
			} else {
				$sqlkueri .= ", ".$namafield[$x];
			}
			$x++;
		}
		$sqlkueri .= ") VALUES (";
		$y = 0;
		while($y < $banyakfield){
			if($y == 0){
				$sqlkueri .= "'".$isifield[$y]."'";
			} else {
				$sqlkueri .= ", '".$isifield[$y]."'";
			}
			$y++;
		}
		$sqlkueri .= ")";
		
		return mysqli_query($koneksi,$sqlkueri);
	}
	
	// update
	function ubahtabel($namatabel,$namafield,$isifield,$fieldid,$namaid){
		include("script/koneksi.php");
		
		$kueri = "UPDATE ".$namatabel." SET ";
		$banyakfield = count($namafield);
		$x = 0;
		while($x < $banyakfield){
			if($x == 0){
				$kueri .= $namafield[$x] ." = '".$isifield[$x]."' ";
			} else {
				$kueri .= ", ".$namafield[$x] ." = '".$isifield[$x]."' ";
			}
			$x++;
		}
		$kueri .= " WHERE ".$fieldid." = '".$namaid."'";
		
		return mysqli_query($koneksi,$kueri);
	}
	
	// delete
	function hapustabel($namatabel,$namafield,$isifield,$and = TRUE){
		include("script/koneksi.php");
		
		$kueri = "DELETE FROM ".$namatabel." WHERE ";
		
		if(is_array($namafield)){
			$banyakfield = count($namafield);
			$x = 0;
			while($x < banyakfield){
				if($x == 0){
					$kueri .= $namafield ." = '".$isifield."'";
				} else {
					if($and) {
						$kueri .= " AND " .$namafield ." = '".$isifield."'";
					} else {
						$kueri .= " OR " .$namafield ." = '".$isifield."'";
					}
				}
			}
		} else {
			$kueri .= $namafield ." = '".$isifield."'";
		}
		
		return mysqli_query($koneksi,$kueri);
	}
	
	// select
	function ambildata($namatabel,$namafield = "",$isifield = "",$kembali = FALSE,$like = FALSE,$order = FALSE,$idorder = "",$tipeorder = "DESC"){
		include("script/koneksi.php");
		
		$kueri = "SELECT * FROM ".$namatabel;
		if(is_array($namafield)){
			$kueri .= " WHERE ";
			$banyakfield = count($namafield);
			$x = 0;
			while($x < $banyakfield){
				if($like){
					if($x == 0){
						$kueri .= $namafield[$x] . " LIKE '%". $isifield[$x] ."%' ";
					} else {
						$kueri .= "AND ".$namafield[$x] . " LIKE '%". $isifield[$x] ."%' ";
					}
				} else {
					if($x == 0){
						$kueri .= $namafield[$x] . " LIKE '". $isifield[$x] ."' ";
					} else {
						$kueri .= "AND ".$namafield[$x] . " LIKE '". $isifield[$x] ."' ";
					}
				}
				$x++;
			}
		} else {
			if($namafield != "" and $isifield != ""){
				$kueri .= " WHERE ";
				if($like){
					$kueri .= $namafield . " LIKE '%". $isifield ."%' ";
				} else {
					$kueri .= $namafield . " LIKE '". $isifield ."' ";
				}
			}
		}
		if($order){
			$kueri .= " ORDER BY ".$idorder. " ".$tipeorder; 
		}
		
		$kuerisql = mysqli_query($koneksi,$kueri);
		if($kembali) {
			return mysqli_fetch_array($kuerisql);
		} else {
			return $kuerisql;
		}
	}
	
	function ambilsatudata($namatabel,$namafieldyangdiambil,$id_field,$isi_field){
		include("script/koneksi.php");
		
		$sql = "SELECT * FROM ".$namatabel." WHERE ".$id_field." = '".$isi_field."'";
		$kueri = mysqli_query($koneksi,$sql);
		$data = mysqli_fetch_array($kueri);
		return $data[$namafieldyangdiambil];
	}
	
	// distinct
	function isitabelyangbeda($namatabel,$namafield,$orderby = ""){
		include("script/koneksi.php");
		
		if($orderby == "ASC"){
			$kueri = "SELECT DISTINCT ".$namafield." FROM ".$namatabel." ORDER BY ".$namafield." ASC";
		} else if($orderby == "DESC") {
			$kueri = "SELECT DISTINCT ".$namafield." FROM ".$namatabel." ORDER BY ".$namafield." DESC";
		} else {
			$kueri = "SELECT DISTINCT ".$namafield." FROM ".$namatabel;
		}
		
		$sql = mysqli_query($koneksi,$kueri);
		return $sql;
	}
?>