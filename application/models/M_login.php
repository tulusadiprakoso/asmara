<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model
{
    private $table = "tbl_pengguna";
    private $pk = "username";

    public function cek($username,$password){
    	$this->db->where($this->pk,$username);
    	$this->db->where('password',$password);
    	$query = $this->db->get($this->table);
    	return $query->num_rows();
    }

    public function getdatabyid($username,$password){
    	$this->db->where($this->pk,$username);
    	$this->db->where('password',$password);
    	$query = $this->db->get($this->table);
    	return $query->row_array();
    }
 }