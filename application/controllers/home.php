<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends MY_Controller{
    protected $access = array('Pemesan');
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		echo validation_errors();
	}

	//membuat fungsi home
	public function index()
	{
		//$data['filmkategori'] = $this->home_model->get_filmkategori();
    
		//$this->load->view('penjualan/home', $data);
		
		$data['list_barang'] = $this->db->get('barang')->result();
		$data['view'] = 'frontend/home';
				
		$this->load->view('frontend/template', $data);
	}
	
	public function detail($id_barang){
		$data['barang'] = $this->db->get_where('barang', array('id_barang'=>$id_barang))->row();
		$data['view'] = 'frontend/detail';
	
		$this->load->view('frontend/template', $data);		
	}
	
	public function transaksi() 
    { $data = array(
		'buttonn' => 'Create',
		'actionn' => site_url('home/create_action'),
	'id_pembayaran' => set_value('id_pembayaran'),
	'id_pemesan' => set_value('id_pemesan'),
	'id_barang' => set_value('id_barang'),
	'M' => set_value('M'),
	'L' => set_value('L'),
	'XL' => set_value('XL'),
	'XXL' => set_value('XXL'),
	'XXXL' => set_value('XXXL'),
	'tgl_pemesanan' => set_value('tgl_pemesanan'),
	'total_harga' => set_value('total_harga'),
);
	redirect(site_url('home/transaksi', $data));
}

public function create_action($id_barang) 
{  
    
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pemesan' => $this->input->post('id_pemesan',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
        'M' => $this->input->post('M',TRUE),
        'L' => $this->input->post('L',TRUE),
        'XL' => $this->input->post('XL',TRUE),
        'XXL' => $this->input->post('XXL',TRUE),
        'XXXL' => $this->input->post('XXXL',TRUE),
        'tgl_pemesanan' => date('y-m-d'),
		'total_harga' => $this->input->post('total_harga',TRUE),
        );
        $data2 = array(
            'M'=>$this->input->post('M'),
            'L'=>$this->input->post('L'),
            'XL'=>$this->input->post('XL'),
            'XXL'=>$this->input->post('XXL'),
            'XXXL'=>$this->input->post('XXXL'),
            'id_barang'=>$this->input->post('id_barang')
        );

        
        $this->home_model->insert($data,$data2);
die(print_r($data));
           $this->session->set_flashdata('message', 'Create Record Success');
         
         redirect(site_url('home/transaksi'));
        }
    }

	public function order(){
		$quantity = $this->input->post('QUANTITY');
		$quantity1 = $this->input->post('QUANTITY1');
		$quantity2 = $this->input->post('QUANTITY2');
		$quantity3 = $this->input->post('QUANTITY3');
		$quantity4 = $this->input->post('QUANTITY4');
		$id_barang = $this->input->post('ID_BARANG');
		$id_pemesan = $this->input->post('ID_PEMESAN');
		$tot = $this->input->post('tot');
		$tgl_pemesanan = $this->input->post('tgl_pemesanan');

		$data = array('id_pemesan'=>$id_pemesan,'id_barang'=>$id_barang, 'quantity'=>$quantity, 'quantity1'=>$quantity1, 'quantity2'=>$quantity2, 'quantity3'=>$quantity3, 'quantity4'=>$quantity4, 'tgl_pemesanan'=>$tgl_pemesanan);
		$this->db->insert('pembayaran', $data);
		
		$barang = $this->db->get_where('barang', array('id_barang'=>$id_barang))->row();		
		$total = $tot * ($quantity + $quantity1 + $quantity2 + $quantity3 + $quantity4);
		?> Nama Jaket : <?php echo $barang->nama_barang;?> -> M : <?php	echo $quantity;?>-> L : <?php	echo $quantity1;?>
				   -> XL : <?php	echo $quantity2; ?>
				   -> XXL	: <?php	echo $quantity3;?>
				   -> XXXL	: <?php	echo $quantity4;?>
				  -> Harga	: Rp.<?php 	echo $total;?>
				   <?php

		
	}

	

public function _rules() 
{
$this->form_validation->set_rules('id_pemesan', 'id pemesan', 'trim|required');
$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
/*$this->form_validation->set_rules('tgl_pemesanan', 'tgl pemesanan', 'trim|required');*/
$this->form_validation->set_rules('total_harga', 'total harga', 'trim|required');

$this->form_validation->set_rules('id_pembayaran', 'id_pembayaran', 'trim');
$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

}