<?php
class Perencanaan_Model extends MY_Model{
	
	function __construct(){
		parent::__construct();
		$this->extTable = 'perencanaan';
                $this->viewTable = 'view_perencanaan';
	}
	
	function get_AllData($start = null, $limit = null, $searchTextFilter = null){
		$query = 'SELECT id, kd_lokasi, kd_brg,
                            kode_unor, kode_unker, nama_unker, nama_unor,tahun_angaran, nama, 
                            kebutuhan, keterangan, satuan, quantity, 
                            harga_satuan, harga_total, is_realisasi, image_url, document_url FROM ' . $this->viewTable;
                
                
                
                
                
                if($start !=null && $limit != null)
                {
                    $query = "SELECT id, kd_lokasi, kd_brg,
                            kode_unor, kode_unker, nama_unker, nama_unor,tahun_angaran, nama, 
                            kebutuhan, keterangan, satuan, quantity, 
                            harga_satuan, harga_total, is_realisasi, image_url, document_url FROM $this->viewTable LIMIT $start, $limit";
                    if($searchTextFilter != null)
                    {
                        $query = "SELECT id, kd_lokasi, kd_brg,
                            kode_unor, kode_unker, nama_unker, nama_unor,tahun_angaran, nama, 
                            kebutuhan, keterangan, satuan, quantity, 
                            harga_satuan, harga_total, is_realisasi, image_url, document_url FROM $this->viewTable
                        where CONCAT(kd_brg,kd_lokasi,no_aset) = '$searchTextFilter' 
                        LIMIT $start, $limit";
                    }
                }
                else
                {
                    $query = "SELECT id, kd_lokasi, kd_brg,
                            kode_unor, kode_unker, nama_unker, nama_unor,tahun_angaran, nama, 
                            kebutuhan, keterangan, satuan, quantity, 
                            harga_satuan, harga_total, is_realisasi, image_url, document_url FROM $this->viewTable";
                    if($searchTextFilter != null)
                    {
                        $query = "SELECT id, kd_lokasi, kd_brg,
                            kode_unor, kode_unker, nama_unker, nama_unor,tahun_angaran, nama, 
                            kebutuhan, keterangan, satuan, quantity, 
                            harga_satuan, harga_total, is_realisasi, image_url, document_url FROM $this->viewTable
                        where CONCAT(kd_brg,kd_lokasi,no_aset) = '$searchTextFilter' 
                        ";
                    }
                }
                
		return $this->Get_By_Query($query);	
	}
	
	function get_ByID($id)
	{
		$query = "SELECT id, kd_lokasi, kd_brg, no_aset, 
                            kode_unor, kode_unker, nama_unker,nama_unor,tahun_angaran, nama, 
                            kebutuhan, keterangan, satuan, quantity, 
                            harga_satuan, harga_total, is_realisasi, image_url, document_url FROM $this->viewTable
							where id = $id";

		return $this->Get_By_Query($query);
	}
	
	
}
?>
