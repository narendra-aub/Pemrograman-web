<?php
abstract class Peminjaman {
 public $db;
 public function __construct()
 {
 try {

 $this->db =
 new PDO("mysql:host=localhost;dbname=dbstock", "root", "");
 } catch (PDOException $e) {
 die ("Error " . $e->getMessage());
 }
 }

 abstract public function setid($id);  
 abstract public function setIdKaset($idkaset);  
 abstract public function setnama($name);  
 abstract public function settanggal($tanggal);  

 abstract public function tampil();
 abstract public function simpan($id, $idkaset, $name, $tanggal);
 abstract public function delete($id);
 abstract public function edit($id);
 abstract public function update($id, $idkaset, $name, $tanggal);

 }

class Stock {
	public $db;
 public function __construct()
 {
 try {

 $this->db =
 new PDO("mysql:host=localhost;dbname=dbstock", "root", "");
 } catch (PDOException $e) {
 die ("Error " . $e->getMessage());
 }
 }
	
	public function tampilStock($id)
{
    $sql = "SELECT * FROM tb_kaset";
    $stmt = $this->db->prepare($sql);
   
    $stmt->execute();
   
    $data = [];
    while ($rows = $stmt->fetch()) {
    $data[] = $rows;
    }
    return $data;
    }
}
class Pinjam extends Peminjaman {

    
public function setid($id) {
    return $id;
}	

public function setIdKaset($idkaset) {
    return $idkaset;
}	

public function setnama($name) {
    return $name;
}	

public function settanggal($tanggal) {
    return $tanggal;
}

public function tampil()
{
    $sql = "SELECT * FROM tb_peminjaman";
    $stmt = $this->db->prepare($sql);
	
    $stmt->execute();
   
    $data = [];
    while ($rows = $stmt->fetch()) {
    $data[] = $rows;

	// $data[] = tampilStock($data[2]);
    }
    return $data;
    }


public function simpan($id, $idkaset, $name, $tanggal)
	{
		try{
			$sql = "INSERT INTO tb_peminjaman VALUES('".$id."', '".$idkaset."', '".$name."', '".$tanggal."')";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			echo "$sql berhasil di simpan";
		} catch (Exception $e) {
		 die ("Maaf Error, " . $e->getMessage());

		}
	}

    public function delete($id){
		$sql = "DELETE FROM `tb_peminjaman` WHERE `tb_peminjaman`.`id_pinjam` = $id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
			echo "$sql berhasil di hapus";
	}
    

    public function edit($id){
		$sql = "SELECT * FROM tb_peminjaman WHERE `tb_peminjaman`.`id_pinjam` =$id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($rows = $stmt->fetch()) {
		$data[] = $rows;
		}
		return $data;
	}
    public function update($id, $idkaset, $name, $tanggal){
		$sql = "UPDATE tb_peminjaman SET 'id_kaset' = '$idkaset' ,'nama_peminjam'='$name', 'tanggal'='$tanggal' WHERE `tb_peminjaman`.'id_pinjam'='$id', ";
		$stmt = $this->db->query($sql);
		$stmt->execute();
	}

 }
 
