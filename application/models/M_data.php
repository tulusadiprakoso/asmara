<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Data extends CI_Model
{
    private $table_sto = "tbl_sto";
    private $pk_ksto = "id";
    
    private $table = "tbl_ksto";
    private $pk = "id";
    
    private $table_target = "tbl_target_tahun";
    private $pk_target = "id";

    private $table_detail = "tbl_target";
    private $pk_detail = "id";

    private $table_detail_witel = "tbl_target_witel";
    private $pk_detail_witel = "id";

    private $table_witel = "tbl_witel";
    private $pk_witel = "id";
    
    public function getdata_sto(){
        $this->db->select('tbl_ksto.title as tksto, tbl_ksto.datel as dksto, tbl_sto.title as tsto, tbl_sto.id');
        $this->db->from('tbl_ksto');
        $this->db->join('tbl_sto','tbl_ksto.id = tbl_sto.id_ksto' );
        $query = $this->db->get();      
        return $query->result_array();
    }
    
    
    public function getdatabyid($id){
        $this->db->where($this->pk_ksto,$id);
        $query = $this->db->get($this->table_sto);
        return $query->row_array();
    }
    
    
    public function ksto_dotambah($data){
        $table_sto="tbl_ksto";
        $this->db->insert($table_sto,$data);
        
    }
    
    public function ksto_doedit($id,$data){
        $table_sto="tbl_ksto";
        
        $this->db->where($this->pk_ksto,$id);
        $this->db->update($table_sto,$data);
    }
    
    
    
    
    public function ksto_dohapus($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('tbl_ksto');
    }
    
    
    public function getdata(){
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    
    
    public function sto_tambah($data){
        $table="tbl_sto";
        $this->db->insert($table,$data);
        
        
        
    }
    
    public function sto_doedit($id,$data){
        $table="tbl_sto";
        $this->db->where($this->pk,$id);
        $this->db->update($table,$data);
    }
    
    
    
    public function sto_dohapus($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('tbl_sto');
    }
    
    public function getdata_target(){
        $query = $this->db->get($this->table_target);
        return $query->result_array();
    }

    public function getdata_target_dodetail($id){
        $this->db->where(id,$id);
        $query = $this->db->get($this->table_detail);
        return $query->result_array();
    }


    public function target_tambah($data){
        $this->db->insert($this->table_target,$data);
    }
    

    public function target_doedit($id,$data){
        $table_target="tbl_target_tahun";
        $this->db->where($this->pk_target,$id);
        $this->db->update($table_target,$data);
    }

    public function target_hapus($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('tbl_target_tahun');
    }

    // =====================
    // TARGET WITEL
    // =====================
    
  

    public function getdata_target_detail($id){
        $this->db->select('tbl_sto.title as tsto, tbl_sto.id, tbl_target.*, tbl_target.id as idtarget, tbl_target_tahun.tahun, tbl_target_tahun.id');
        // $this->db->from('');
        $this->db->join('tbl_sto','tbl_target.id_sto = tbl_sto.id' );
        $this->db->join('tbl_target_tahun','tbl_target.id_tahun = tbl_target_tahun.id' );
        $this->db->where('id_tahun', $id);
        $query = $this->db->get('tbl_target');
        return $query->result_array();
    }
     public function getdata_target_detail_witel($id){
        $this->db->select('tbl_witel.title as twitel, tbl_witel.id, tbl_target_witel.*, tbl_target_witel.id as idtarget, tbl_target_tahun.tahun, tbl_target_tahun.id');
        // $this->db->from('');
        $this->db->join('tbl_witel','tbl_target_witel.id_witel = tbl_witel.id' );
        $this->db->join('tbl_target_tahun','tbl_target_witel.id_tahun = tbl_target_tahun.id' );
        $this->db->where('id_tahun', $id);
        $query = $this->db->get('tbl_target_witel');
        return $query->result_array();
    }
    public function getdata_target_witel_dodetail($id){
        $this->db->where('id',$id);
        $query = $this->db->get($this->table_detail_witel);
        return $query->result_array();
    }

    // Update record
    function update_witel_detail($id,$field,$value){

        // Update
        $data=array($field => $value);
        $this->db->where('id',$id);
        $this->db->update('tbl_target_witel',$data);
    }

    // Update record
    function update_detail($id,$field,$value){

        // Update
        $data=array($field => $value);
        $this->db->where('id',$id);
        $this->db->update('tbl_target',$data);
    }

    public function getdata_target_sto(){
        $this->db->select('*');
        // $this->db->from('');
        $this->db->where('id NOT IN(SELECT id_sto FROM tbl_target)');

        //$this->db->where('tbl_sto.id !=','tbl_target.id_sto');
        // $this->db->select('*');
        $query = $this->db->get($this->table_sto);
       
        return $query->result_array();
    }
    public function getdata_target_witel(){
        $this->db->select('*');
        // $this->db->from('');
        $this->db->where('id NOT IN(SELECT id_witel FROM tbl_target_witel)');

        //$this->db->where('tbl_sto.id !=','tbl_target.id_sto');
        // $this->db->select('*');
        $query = $this->db->get($this->table_witel);
       
        return $query->result_array();
    }
    public function target_detail_tambah($data){
        $this->db->insert($this->table_detail,$data);
    }
    public function target_detail_witel_tambah($data){
        $this->db->insert($this->table_detail_witel,$data);
    }
    

    public function target_detail_doedit($id,$data){
        $table_target="tbl_target";
        $this->db->where($this->pk_detail,$id);
        $this->db->update($table_detail,$data);
    }

    public function target_detail_dohapus($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('tbl_target');
    }


    //============================================
    //                WITEL
    //============================================

    public function getdata_witel(){
        $query = $this->db->get($this->table_witel);
        return $query->result_array();
    }
    
    
    public function witel_tambah($data){
        $table_witel="tbl_witel";
        $this->db->insert($table_witel,$data);
        
        
        
    }
    
    public function witel_doedit($id,$data){
        $table_witel="tbl_witel";
        $this->db->where($this->pk_witel,$id);
        $this->db->update($table_witel,$data);
    }
    
    
    
    public function witel_dohapus($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('tbl_witel');
    }
     
   
}