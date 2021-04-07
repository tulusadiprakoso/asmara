<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller{
	
	public $control = "id";
	
	function __construct() {
		parent::__construct();
		// $this->utama->login();
		$this->load->model('M_data');
	}
	
	public function index(){
		$data['title'] = "Halaman Data";
		// $data["query"] = $this->M_data->getdata();
		$data["view"]="data/view";
		$this->load->view("assets/template",$data);
	}
	public function sto(){
		$data['title'] = "Halaman Data";
		$data["query"] = $this->M_data->getdata();
		$data["view"]="data/sto/view";
		$this->load->view("assets/template",$data);
	}
	public function sto_tambah(){
		$data['title'] = "Halaman Tambah";
				$data = [
				'title' => $this->input->post('title'),
				'datel' => $this->input->post('datel'),
			];
			
			$this->M_data->sto_tambah($data);
			redirect("data/sto");
	}
		
	function sto_edit() {
        $id = $this->uri->segment(3);
        $e = $this->db->where('id', $id)->get('tbl_sto')->row();

        $kirim['id'] = $e->id;
        $kirim['title'] = $e->title;
        $kirim['datel'] = $e->datel;

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($kirim));
    }

	public function sto_doedit(){
		$data = [
			'title' => $this->input->post('title'),
			'datel' => $this->input->post('datel'),
			'time' => $this->input->post('time')
		];    
		$id =  $this->input->post('id');

		$this->M_data->sto_doedit($id,$data);
		redirect("data/sto");
		
	}
	
	public function sto_hapus(){
		if($this->uri->segment(3) == null):
			redirect(base_url($this->control));
		else:
			$id = $this->uri->segment(3);
		endif;
		
		$cari = $this->M_data->getdatabyid($id);	
		$this->M_data->hapus($id);
		redirect("data/sto");
	}
	
	public function print(){
		$data['title'] = "Halaman Print data barang";
		$data["query"] = $this->M_barang->getdata();
		$this->load->view("barang/print",$data);
	}
	
	
	
}