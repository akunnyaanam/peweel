<?php
class Order_model{
	private $table = 'tborder';
	private $db;
	public function __construct(){
		$this->db = new Database();
	}
	public function addOrder($data){            
		session_start();
   		//simpan ke tborder
		$idMember=$data["idMember"];
		$telp=$data["telp"];
		$jenisByr=$data["cbJnsByr"];
		$bank=$data["bank"];
		$norek=$data["norek"];
		$jenisKirim=$data["cbKirim"];
		$biayaKirim=$data["biayaKirim"];
		$sql="SELECT if(max(id)is null,1,max(id)+1) as maks_id FROM " . $this->table;
		$this->db->query($sql);
		$data=$this->db->resultSet();
		foreach ($data as $rec){
		  $id=$rec["maks_id"];
		}			
        $tgl=date("Y-m-d");
		$status="0";
		$totalByr=0;
		$pembelian=0;
		$sql="INSERT INTO tborder (id, idmember,tgl,jenisByr,bank,norek,biayaKirim,pembelian,totalByr,jenisKirim,status) VALUES ($id, $idMember,'$tgl','$jenisByr','$bank','$norek','$biayaKirim','$pembelian','$totalByr','$jenisKirim','$status')";
		$this->db->query($sql);
		$hasil1=$this->db->execute();
		
		//OrderDetail
		$max=sizeof($_SESSION['cart']['arrCart']);
		$totbyr=0;
		for ($i=0;$i<$max;$i++){
			foreach($_SESSION['cart']['arrCart'][$i] as $key => $val){
				if ($key=='id')
					$idbrg=$val;
				if ($key=='jml')
					$jml=$val;
				if ($key=='hrg')
					$hrg=$val;							
			}
			$byr=$jml*$hrg;
			$totbyr+=$byr;		
			//simpan Ke tbOrderDetail
            $sql="insert into tborderdetail (idBarang,idorder,jml,hrg) values ('$idbrg','$id','$jml','$hrg')";
			//echo $sql;
			$this->db->query($sql);
		    $this->db->execute();
		}
	session_destroy();

	}
}