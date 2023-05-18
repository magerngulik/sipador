<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    public function getLastData(){
        $this->db->select('*');
        $this->db->from('penyewaan');
        $this->db->order_by('id_penyewaan', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row_array();
        
    }

    public function postPenyewa($data){
        $this->db->insert('penyewaan', $data);      
    }

    public function getHistory($id){
        $this->db->select('*');
        $this->db->from('penyewaan'); 
        $this->db->where('id',$id);
        return $this->db->get()->result_array();
    }   

    public function getSingleHistory($id){
        $this->db->select('*');
        $this->db->from('penyewaan'); 
        $this->db->where('id_penyewaan',$id);
        return $this->db->get()->row_array();
    }   

    public function getDetailHistory($id){
        $this->db->select('*');
        $this->db->from('detail_penyewaan a'); 
        $this->db->where('id_penyewaan',$id);
        $this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
        return $this->db->get()->result_array();
    }   


    public function getAllPenyewaan(){
        $this->db->select('*');
        $this->db->from('penyewaan a');
        $this->db->join('user b', 'a.id=b.id', 'left'); 
        return $this->db->get()->result_array();
    }

    public function getSinglePenyewaan($id){
        $this->db->select('*');
        $this->db->from('penyewaan a');
        $this->db->join('user b', 'a.id=b.id', 'left'); 
        $this->db->where('id_penyewaan',$id);
        return $this->db->get()->row_array();
    }

}
   