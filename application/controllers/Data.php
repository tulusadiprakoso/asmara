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
	public function ksto(){
		$data['title'] = "KSTO";
		$data["query"] = $this->M_data->getdata();
		$data["view"]="data/ksto/view";
		$this->load->view("assets/template",$data);
	}
	public function ksto_tambah(){
		$data['title'] = "Halaman Tambah";
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<p class="mb-0">Telah Berhasil Menginput Data </p>
	</div>');    
				$data = [
				'title' => $this->input->post('title'),
				'datel' => $this->input->post('datel'),
			];
			
			$this->M_data->ksto_dotambah($data);
			redirect("data/ksto");
	}
		
	public function ksto_edit() {
        $id = $this->uri->segment(3);
        $e = $this->db->where('id', $id)->get('tbl_ksto')->row();

        $kirim['id'] = $e->id;
        $kirim['title'] = $e->title;
        $kirim['datel'] = $e->datel;

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($kirim));
    }

	public function ksto_doedit(){
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<p class="mb-0">Telah Berhasil Mengedit Data </p>
	</div>');    
		$data = [
			'title' => $this->input->post('title'),
			'datel' => $this->input->post('datel'),
			'time' => $this->input->post('time')
		];    
		$id =  $this->input->post('id');

		$this->M_data->ksto_doedit($id,$data);
		redirect("data/ksto");
		
	}
	
	public function ksto_dohapus()
{
	$this->session->set_flashdata('msg', 
		'<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<p class="mb-0">Telah Berhasil Menghapus Data </p>
	</div>');    
	$id = $this->uri->segment(3);
	// echo $id;
	// exit();

	$proses = $this->M_data->ksto_dohapus($id);
	if (!$proses) {
		redirect(base_url('data/ksto'));
	} else {
		echo "Data Gagal dihapus";
		echo "<br>";
		echo "<a href='".base_url('data/ksto')."'>Hapus data</a>";
	}
}

	public function sto(){
		$data['title'] = "Halaman Data";
		$data["query"] = $this->M_data->getdata();
		$data["sto"] = $this->M_data->getdata_sto();
		$data["view"]="data/sto/view";
		$this->load->view("assets/template",$data);
	}
	public function sto_tambah(){
		$data['title'] = "Halaman Tambah";
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<p class="mb-0">Telah Berhasil Menginput Data </p>
	</div>');    
				$data = [
				'title' => $this->input->post('title'),
				'id_ksto' => $this->input->post('id_ksto'),
				// 'datel' => $this->input->post('datel'),
			];
			
			
			$this->M_data->sto_tambah($data);
			redirect("data/sto");
	}
		
	public function sto_edit() {
        $id = $this->uri->segment(3);
        $e = $this->db->where('id', $id)->get('tbl_sto')->row();

        $kirim['id'] = $e->id;
		$kirim['title'] = $e->title;
        $kirim['id_ksto'] = $e->id_ksto;
        // $kirim['datel'] = $e->datel;

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($kirim));
    }




	public function sto_doedit(){
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<p class="mb-0">Telah Berhasil Mengedit Data </p>
	</div>');    
		$data = [
			
			'title' => $this->input->post('title'),
			'id_ksto' => $this->input->post('id_ksto'),
			// 'datel' => $this->input->post('datel'),
			'time' => $this->input->post('time')
		];    
		$id =  $this->input->post('id');

		$this->M_data->sto_doedit($id,$data);
		redirect("data/sto");
		
	}
	
	public function sto_dohapus()
{
	$this->session->set_flashdata('msg', 
		'<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<p class="mb-0">Telah Berhasil Menghapus Data </p>
	</div>');    
	$id = $this->uri->segment(3);
	// echo $id;
	// exit();

	$proses = $this->M_data->sto_dohapus($id);
	if (!$proses) {
		redirect(base_url('data/sto'));
	} else {
		echo "Data Gagal dihapus";
		echo "<br>";
		echo "<a href='".base_url('data/sto')."'>Hapus data</a>";
	}
}
	
public function target(){
	$data['title'] = "Halaman Data Target";
	$data["query"] = $this->M_data->getdata_target();
	$data["sto"] = $this->M_data->getdata_sto();
	$data["view"]="data/target/view";
	$this->load->view("assets/template",$data);	
}

public function target_tambah(){
	$data['title'] = "Halaman Tambah"; 
	$this->session->set_flashdata('msg', 
	'<div class="alert alert-success alert-dismissable" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<p class="mb-0">Telah Berhasil Menginput Data </p>
</div>');      
	$data['query'] = $this->M_data->getdata_target();
	$data = [
		'tahun' => $this->input->post('tahun'),

	];
		
		
		$this->M_data->target_tambah($data);
		redirect("data/target");
}

public function target_edit() {
	$id = $this->uri->segment(3);
	$e = $this->db->where('id', $id)->get('tbl_target_tahun')->row();

	$kirim['id'] = $e->id;
	$kirim['tahun'] = $e->tahun;
	// $kirim['id_ksto'] = $e->id_ksto;
	// $kirim['datel'] = $e->datel;

	$this->output
			->set_content_type('application/json')
			->set_output(json_encode($kirim));
}

public function target_doedit(){
	$this->session->set_flashdata('msg', 
	'<div class="alert alert-success alert-dismissable" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<p class="mb-0">Telah Berhasil Mengedit Data </p>
</div>');    
	$data = [
		'tahun' => $this->input->post('tahun'),
		// 'datel' => $this->input->post('datel'),
		// 'time' => $this->input->post('time')
	];    
	$id =  $this->input->post('id');

	$this->M_data->target_doedit($id,$data);
	redirect("data/target");
	
}


public function target_hapus()
{
	$this->session->set_flashdata('msg', 
		'<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<p class="mb-0">Telah Berhasil Menghapus Data </p>
	</div>');    
	$id = $this->uri->segment(3);
	// echo $id;
	// exit();

	$proses = $this->M_data->target_hapus($id);
	if (!$proses) {
		redirect(base_url('data/target'));
	} else {
		echo "Data Gagal dihapus";
		echo "<br>";
		echo "<a href='".base_url('data/target')."'>Hapus data</a>";
	}
}

public function target_detail($id){
	$data['title'] = "Halaman Data Target";
	$data["query"] = $this->M_data->getdata_target_detail($id);
	$data["witel"] = $this->M_data->getdata_target_detail_witel($id);
	$data["sto"] = $this->M_data->getdata_target_sto();
	$data["dwitel"] = $this->M_data->getdata_target_witel();
	$data["view"]="data/target_detail/view";
	$this->load->view("assets/template",$data);	
}

public function update_detail(){
	// POST values
	$id = $this->input->post('id');
	$field = $this->input->post('field');
	$value = $this->input->post('value');

	// Update records
	$this->M_data->update_detail($id,$field,$value);
	$data["query"] = $this->M_data->getdata_target_dodetail($id);
	 foreach($data["query"]  as $r){
		 $total= $r['jan'] + $r['feb'] + $r['mar'] + $r['apr'] + $r['may'] + $r['jun'] + $r['jul'] + $r['aug'] + $r['sep'] + $r['okt'] + $r['nov'] + $r['des'];
	 }
	 $data['total'] =	$this->M_data->update_detail($id,'total',$total);
 

	echo 1;
	exit;
  }

public function target_detail_tambah(){
	$data['title'] = "Halaman Tambah"; 
	$this->session->set_flashdata('msg', 
	'<div class="alert alert-success alert-dismissable" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<p class="mb-0">Telah Berhasil Menginput Data </p>
</div>');      
	// $data['query'] = $this->M_data->getdata_target_detail();
	$data = [
		'id_sto' => $this->input->post('id_sto'),
		'id_tahun' => $this->input->post('id_tahun'),
		'jan' =>0,
		'feb' => 0,
		'mar' => 0,
		'apr' => 0,
		'may' => 0,
		'jun' => 0,
		'jul' => 0,
		'aug' => 0,
		'sep' => 0,
		'okt' => 0,
		'nov' => 0,
		'des' => 0,
		'total' => 0,
	];
		
		
		$this->M_data->target_detail_tambah($data);
		redirect("data/target_detail/".$data['id_tahun']);
}

public function target_detail_edit() {
	$id = $this->uri->segment(3);
	$e = $this->db->where('id', $id)->get('tbl_target_tahun')->row();

	$kirim['id'] = $e->id;
	$kirim['tahun'] = $e->tahun;
	// $kirim['id_ksto'] = $e->id_ksto;
	// $kirim['datel'] = $e->datel;

	$this->output
			->set_content_type('application/json')
			->set_output(json_encode($kirim));
}

public function target_detail_doedit(){
	$this->session->set_flashdata('msg', 
	'<div class="alert alert-success alert-dismissable" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<p class="mb-0">Telah Berhasil Mengedit Data </p>
</div>');    
	$data = [
		'tahun' => $this->input->post('tahun'),
		// 'datel' => $this->input->post('datel'),
		// 'time' => $this->input->post('time')
	];    
	$id =  $this->input->post('id');

	$this->M_data->target_detail_doedit($id,$data);
	redirect("data/target_detail");
	
}


public function target_detail_dohapus()
{
	$this->session->set_flashdata('msg', 
		'<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<p class="mb-0">Telah Berhasil Menghapus Data </p>
	</div>');    
	$id = $this->uri->segment(4);
	// echo $id;
	// exit();

	$proses = $this->M_data->target_detail_dohapus($id);
	if (!$proses) {
		redirect(base_url('data/target_detail/'.$this->uri->segment(3)));
	} else {
		echo "Data Gagal dihapus";
		echo "<br>";
		echo "<a href='".base_url('data/target_detail/'.$this->uri->segment(3))."'>Hapus data</a>";
	}
}

//=====================
// TARGET WITEL
//====================

public function update_witel_detail(){
	// POST values
	$id = $this->input->post('id');
	$field = $this->input->post('field');
	$value = $this->input->post('value');

	// Update records
	$this->M_data->update_witel_detail($id,$field,$value);
	$data["query"] = $this->M_data->getdata_target_witel_dodetail($id);
	 foreach($data["query"] as $r){
		 $total= $r['jan'] + $r['feb'] + $r['mar'] + $r['apr'] + $r['may'] + $r['jun'] + $r['jul'] + $r['aug'] + $r['sep'] + $r['okt'] + $r['nov'] + $r['des'];
	 }
	 $data['total'] =	$this->M_data->update_witel_detail($id,'total',$total);
 

	echo 1;
	exit;
  }

public function target_detail_witel_tambah(){
	$data['title'] = "Halaman Tambah"; 
	$this->session->set_flashdata('msg', 
	'<div class="alert alert-success alert-dismissable" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<p class="mb-0">Telah Berhasil Menginput Data </p>
</div>');      
	// $data['query'] = $this->M_data->getdata_target_detail();
	$data = [
		'id_witel' => $this->input->post('id_witel'),
		'id_tahun' => $this->input->post('id_tahun'),
		'jan' =>0,
		'feb' => 0,
		'mar' => 0,
		'apr' => 0,
		'may' => 0,
		'jun' => 0,
		'jul' => 0,
		'aug' => 0,
		'sep' => 0,
		'okt' => 0,
		'nov' => 0,
		'des' => 0,
		'total' => 0,
	];
		
		
		$this->M_data->target_detail_witel_tambah($data);
		redirect("data/target_detail/".$data['id_tahun']);
}

public function target_detail_witel_edit() {
	$id = $this->uri->segment(3);
	$e = $this->db->where('id', $id)->get('tbl_target_tahun')->row();

	$kirim['id'] = $e->id;
	$kirim['tahun'] = $e->tahun;
	// $kirim['id_ksto'] = $e->id_ksto;
	// $kirim['datel'] = $e->datel;

	$this->output
			->set_content_type('application/json')
			->set_output(json_encode($kirim));
}

public function target_detail_witel_doedit(){
	$this->session->set_flashdata('msg', 
	'<div class="alert alert-success alert-dismissable" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<p class="mb-0">Telah Berhasil Mengedit Data </p>
</div>');    
	$data = [
		'tahun' => $this->input->post('tahun'),
		// 'datel' => $this->input->post('datel'),
		// 'time' => $this->input->post('time')
	];    
	$id =  $this->input->post('id');

	$this->M_data->target_detail_witel_doedit($id,$data);
	redirect("data/target_detail");
	
}


public function target_detail_witel_dohapus()
{
	$this->session->set_flashdata('msg', 
		'<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<p class="mb-0">Telah Berhasil Menghapus Data </p>
	</div>');    
	$id = $this->uri->segment(4);
	// echo $id;
	// exit();

	$proses = $this->M_data->target_detail_witel_dohapus($id);
	if (!$proses) {
		redirect(base_url('data/target_detail/'.$this->uri->segment(3)));
	} else {
		echo "Data Gagal dihapus";
		echo "<br>";
		echo "<a href='".base_url('data/target_detail/'.$this->uri->segment(3))."'>Hapus data</a>";
	}
}

//=====================
// WITEL
//====================

public function witel(){
	$data['title'] = "Data Witel";
	$data["query"] = $this->M_data->getdata_witel();
	// $data["sto"] = $this->M_data->getdata_sto();
	$data["view"]="data/witel/view";
	$this->load->view("assets/template",$data);
}
public function witel_tambah(){
	$data['title'] = "Halaman Tambah";
	$this->session->set_flashdata('msg', 
	'<div class="alert alert-success alert-dismissable" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<p class="mb-0">Telah Berhasil Menginput Data </p>
</div>');    
			$data = [
			'title' => $this->input->post('title'),
			'regional' => $this->input->post('regional'),
			// 'datel' => $this->input->post('datel'),
		];
		
		
		$this->M_data->witel_tambah($data);
		redirect("data/witel");
}
	
public function witel_edit() {
	$id = $this->uri->segment(3);
	$e = $this->db->where('id', $id)->get('tbl_witel')->row();

	$kirim['id'] = $e->id;
	$kirim['title'] = $e->title;
	$kirim['regional'] = $e->regional;
	// $kirim['datel'] = $e->datel;

	$this->output
			->set_content_type('application/json')
			->set_output(json_encode($kirim));
}




public function witel_doedit(){
	$this->session->set_flashdata('msg', 
	'<div class="alert alert-success alert-dismissable" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<p class="mb-0">Telah Berhasil Mengedit Data </p>
</div>');    
	$data = [
		
		'title' => $this->input->post('title'),
			'regional' => $this->input->post('regional'),
	];    
	$id =  $this->input->post('id');

	$this->M_data->witel_doedit($id,$data);
	redirect("data/witel");
	
}

public function witel_dohapus()
{
$this->session->set_flashdata('msg', 
	'<div class="alert alert-success alert-dismissable" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<p class="mb-0">Telah Berhasil Menghapus Data </p>
</div>');    
$id = $this->uri->segment(3);
// echo $id;
// exit();

$proses = $this->M_data->witel_dohapus($id);
if (!$proses) {
	redirect(base_url('data/witel'));
} else {
	echo "Data Gagal dihapus";
	echo "<br>";
	echo "<a href='".base_url('data/witel')."'>Hapus data</a>";
}
}
}