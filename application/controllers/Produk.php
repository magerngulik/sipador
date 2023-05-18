<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
   
    }

    public function index()
    {
        $data['title'] = 'Menu Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();


        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function addProduct(){

        $data['title'] = 'Tambah Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required',array(
            'required' => 'Nama produk harus diisi.'));
        $this->form_validation->set_rules('harga', 'Harga', 'required',array(
            'required' => 'Harga wajib di isi'));
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required',array(
            'required' => 'Jumlah wajib di isi'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required',array(
            'required' => 'Deskripsi wajib di isi'));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/tambah_produk', $data);
            $this->load->view('templates/footer');
        } else {
            $new_image =  "box.png";
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/produk/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/produk/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    
                } else {
                    echo $this->upload->dispay_errors();
                }
            }


            $this->db->insert('produk', 
            [
                'nama_produk' => $this->input->post('nama_produk'),
                'foto_produk' => $new_image,
                'harga' => $this->input->post('harga'),
                'jumlah' => $this->input->post('jumlah'),
                'deskripsi' => $this->input->post('deskripsi'),
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil di tambahkan!</div>');
            redirect('produk');
        }

    }

    
    public function editProduk($id){
        $data['title'] = 'Edit Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $this->load->model('Menu_model', 'menu');

        $namaTabel= "produk";
        $idTabel = "id_produk"; 

        $data['singleProduk'] = $this->menu->getTabelSingle($id,$namaTabel,$idTabel);

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required',array(
            'required' => 'Nama produk harus diisi.'));
 
        $this->form_validation->set_rules('harga', 'Harga', 'required',array(
            'required' => 'Harga wajib di isi'));

        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required',array(
            'required' => 'Jumlah wajib di isi'));

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required',array(
            'required' => 'Deskripsi wajib di isi'));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/edit_produk', $data);
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/produk/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/produk/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_produk', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

           $this->db->set(
            ['nama_produk' => $this->input->post('nama_produk'),
             'harga' => $this->input->post('harga'),
             'jumlah' => $this->input->post('jumlah'),
             'deskripsi' => $this->input->post('deskripsi'),
            
            ]);
             $this->db->where('id_produk',$id);
             $this->db->update('produk');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil di tambahkan!</div>');
            redirect('produk');
        }

    }

    public function deleteProduk($id){
        $this->db->where("id_produk",$id);
        $this->db->delete("produk");
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil di hapus!</div>');
        redirect('produk/');
    }


    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            // Jika upload gagal, tampilkan pesan error
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
        } else {
            // Jika upload berhasil, simpan informasi gambar ke database
            $data = $this->upload->data();
            $this->model_gambar->insert($data['file_name']);
            $this->session->set_flashdata('success', 'Gambar berhasil diupload.');
        }

        redirect('upload');
    }


    public function penyewaan(){
        $this->load->model('Produk_model', 'produk');
        $data['title'] = 'Menu Penyewaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $data['penyewaan'] = $this->produk->getAllPenyewaan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('produk/penyewaan', $data);
        $this->load->view('templates/footer');
    }

    public function detailPenyewaan($id){

        $this->load->model('Produk_model', 'produk');
        $data['title'] = 'Detail Penyewaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $data['sPenyewaan'] = $this->produk->getSinglePenyewaan($id);
        $data['detail'] = $this->produk->getDetailHistory($id);
        $data['dataid'] = $id;

        $this->form_validation->set_rules('status', 'Status', 'required',array(
            'required' => 'Status wajib di isi'));

        if ($this->form_validation->run() == false) {
           
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/detail_penyewaan', $data);
            $this->load->view('templates/footer');

        } else {
            $this->db->set(['status' => $this->input->post('status'),]);
            $this->db->where('id_penyewaan',$id);
            $this->db->update('penyewaan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil di update!</div>');
            redirect('produk/penyewaan');
        }



    }

   
}
