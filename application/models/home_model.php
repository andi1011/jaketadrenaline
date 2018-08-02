<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_model {

	public function __construct()
	{
		$this->load->database();
    }
    
   
    // insert data
    function insert($data,$data2)
    {     
  
    $this->db->insert('pembayaran', $data['id_pemesan']);
    
    
    $this->db->where('id_barang', $data2['id_barang']);
    $cari = $this->db->get('barang')->row();

    $pengurangan = array(
        'M' => $cari->M - $data2['M'],
        'L' => $cari->L - $data2['L'],
        'XL' => $cari->XL - $data2['XL'],
        'XXL' => $cari->XXL - $data2['XXL'],
        'XXXL' => $cari->XXXL - $data2['XXXL']

     );
    $this->db->where('id_barang',$data['id_barang']);
    $this->db->update('barang',$pengurangan);
    die(print_r($cari));
    }



}

