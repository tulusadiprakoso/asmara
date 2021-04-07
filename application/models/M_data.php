<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Data extends CI_Model
{
    private $table = "tbl_sto";
    private $pk = "id";


    public function getdata(){
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getdatabyid($id){
        $this->db->where($this->pk,$id);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    public function tambah($data){
        $this->db->insert($this->table,$data);
    }
    public function sto_tambah($data){
        $table="tbl_sto";
        $this->db->insert($table,$data);
        
    }

    public function sto_edit($id,$data){
        $table="tbl_sto";

        $this->db->where($this->pk,$id);
        $this->db->update($table,$data);
    }

    public function sto_hapus($id){
        $table="tbl_sto";
        
        $this->db->where($this->pk,$id);
        $this->db->delete($this->table);
    }


   

  

  public function kode(){

        $field = $this->pk;
        $table = $this->table;
        $karakter = "B";
        $long = 6;
         $this->db->select('RIGHT('.$table.'.'.$field.','.$long.') as '.$field, FALSE);
    
        $this->db->order_by($field,'DESC');    
        $this->db->limit(1);    
        $query = $this->db->get($table);
            if($query->num_rows() <> 0){      
                 $data = $query->row();
                 $kode = intval($data->$field) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, $long, "0", STR_PAD_LEFT);    
        $kodetampil = $karakter.$batas;
        return $kodetampil;  
    }


   
}