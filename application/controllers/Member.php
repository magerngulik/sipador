<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->library('cart');
  
    }

    public function index()
    {
        $data['title'] = 'Menu Member';
        $data['tag'] = 'index';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $this->load->view('member/header', $data);
        $this->load->view('member/navbar_member', $data);
        $this->load->view('member/index', $data);
        $this->load->view('member/footer');
        
    }

    public function produk()
    {
        $data['title'] = 'Menu Member';
        $data['tag'] = 'produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $this->load->view('member/header', $data);
        $this->load->view('member/navbar_member', $data);
        $this->load->view('member/produk', $data);
        $this->load->view('member/footer');        
    }

    public function detailProduk($id)
    {
        $data['title'] = 'Menu Member';
        $data['tag'] = 'produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail'] = $this->db->get_where('produk', ['id_produk' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('member/header', $data);
        $this->load->view('member/navbar_member', $data);
        $this->load->view('member/detail_produk', $data);
        $this->load->view('member/footer');        
    }

    public function addToCart($id){
        $dataProduk = $this->db->get_where('produk', ['id_produk' => $id])->row_array();
        $data = array(
            'id' => $dataProduk['id_produk'],
            'qty' => 1,
            'price' => $dataProduk['harga'], 
            'name' => $dataProduk['nama_produk'], 
            'deskripsi' => $dataProduk['deskripsi'], 
            'foto_produk' => $dataProduk['foto_produk'],  
        );     
     
        $this->cart->insert($data);  
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil di masukan ke keranjang!</div>');           
        // $this->session->set_flashdata('message', '<script>alert("Berhasil di masukan ke keranjang!")</script>');           
        redirect('member/produk');    
    }

    public function addItem($id){
        $item = $this->cart->get_item($id);
        $qty = $item['qty'];

        $last_qty = $qty + 1;
        
        $data = array(
            'rowid'  =>  $item['rowid'],
            'qty'    => $last_qty,          
        );
        $this->cart->update($data);
        redirect('member/card');
    }

    public function removeItem($id){
        $item = $this->cart->get_item($id);
        $qty = $item['qty'];
        var_dump($item['qty']);
        $last_qty;
        if ($qty < 1) {
            $last_qty = 0;
        }else {
            $last_qty = $qty -1;
        }
           
        $data = array(
            'rowid'  =>  $item['rowid'],
            'qty'    => $last_qty,          
        );
        $this->cart->update($data);
        redirect('member/card');
    }

    public function history()
    {
        $this->load->model('Produk_model', 'produk');
        $data['title'] = 'Menu Member';
        $data['tag'] = 'history';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $userID = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['history'] = $this->produk->getHistory($userID['id']);
        $this->load->view('member/header', $data);
        $this->load->view('member/navbar_member', $data);
        $this->load->view('member/user_history', $data);
        $this->load->view('member/footer');
        
    }

    public function detailHistory($id){
        $this->load->model('Produk_model', 'produk');
        $data['title'] = 'Detail History';
        $data['tag'] = '';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $data['history'] = $this->produk->getSingleHistory($id);
        $data['detail'] = $this->produk->getDetailHistory($id);
        $this->load->view('member/header', $data);
        $this->load->view('member/navbar_member', $data);
        $this->load->view('member/user_detail_history', $data);
        $this->load->view('member/footer');
    }



    public function card()
    {
        $data['title'] = 'Menu Member';
        $data['tag'] = 'card';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $data['cart'] = $this->cart->contents(); 
        $this->load->model('Produk_model', 'produk');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required',array(
            'required' => 'Pesan harus di isi.'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',array(
            'required' => 'Alamat harus di isi.'));        
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required',array(
                    'required' => 'Tanggal harus di isi.'));           
          
        if ($this->form_validation->run() == false) { 
            $this->load->view('member/header', $data);
            $this->load->view('member/navbar_member', $data);
            $this->load->view('member/user_card', $data);
            $this->load->view('member/footer');
        }else{       
           $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

           $bayar = $this->input->post('pembayaran');
           
         
           $data = [
               'id' => $user['id'], 
               'pesan' => $this->input->post('pesan'),
               'tanggal_penyewaan' => date('Y-m-d'),
               'tanggal_pengembalian' => $this->input->post('tanggal'),
               'status' => 1,
           ];

           $this->session->set_userdata('payment', $data);

    
            redirect('member/payment');                 
        }
    }


    public function payment(){
        $data['title'] = 'Payment Methi';
        $data['tag'] = 'card';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $data['cart'] = $this->cart->contents(); 
        $this->load->model('Produk_model', 'produk');
        $data['payment'] = $this->session->userdata('payment');
        $payment = $this->session->userdata('payment');
        $tanggal_awal =  $payment['tanggal_penyewaan'];
        $tanggal_akhir = $payment['tanggal_pengembalian'];
        $selisih = strtotime($tanggal_akhir) - strtotime($tanggal_awal);
        $tahun = floor($selisih / (365*60*60*24));
        $bulan = floor(($selisih - $tahun * 365*60*60*24) / (30*60*60*24));
        $hari = floor(($selisih - $tahun * 365*60*60*24 - $bulan*30*60*60*24) / (60*60*24)); 
        $data['hari'] = $hari;
        
        
        $this->form_validation->set_rules('pembayaran', 'pembayaran', 'required',array(
                    'required' => 'Pembayaran harus di isi.'));              
        if ($this->form_validation->run() == false) { 
            $this->load->view('member/header', $data);
            $this->load->view('member/navbar_member', $data);
            $this->load->view('member/user_payment', $data);
            $this->load->view('member/footer');
        }else{       

            $pembayaran;
            $bayar =$this->input->post('pembayaran');
            if ($bayar ==1) {
             $pembayaran = "COD";
             
            }elseif ($bayar ==2) {
             $pembayaran = "DANA";
            
            }elseif ($bayar ==3) {
             $pembayaran = "DANA";
            }
            else {
             $pembayaran = "Transfer Bank";
            }

            $data = [
                'id' => $payment['id'], 
                'pesan' => $payment['pesan'],
                'tanggal_penyewaan' => date('Y-m-d'),
                'tanggal_pengembalian' => $payment['tanggal_pengembalian'],
                'pembayaran'=> $pembayaran, 
                'status' => 1,
            ];
            $this->db->insert('penyewaan', $data);
            $last_data = $this->produk->getLastData();
            $cart_data = $this->cart->contents(); 
            //cek kalau hari nya 0 di anggap 1 hari
            if ($hari ==0) {
                $hari =1;
            }
           foreach ($cart_data as $c) {
             $detailPenyewaan = [
                 "id_penyewaan" => $last_data['id_penyewaan'],
                 "id_produk" => $c['id'],
                 "date_create" => date('Y/m/d'),
                 "jumlah_pinjam" => $c['qty'],
                 "lama_penyewaan" => $hari          
                ];
                
            $this->db->insert('detail_penyewaan', $detailPenyewaan);
            };
            $this->cart->destroy();   
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan berhasil silahkan check riwayat!</div>');
            redirect('member/history');  
        }
    }



 


    public function user()
    {
        $data['title'] = 'Menu Member';
        $data['tag'] = 'user';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required',array(
            'required' => 'Nama harus diisi.'));
        $this->form_validation->set_rules('email', 'Email', 'required',array(
            'required' => 'Email wajib di isi'));
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required',array(
            'required' => 'Alamat wajib di isi'));
        $this->form_validation->set_rules('notelp', 'Nomor Telpon', 'required',array(
            'required' => 'Nomor Telpon wajib di isi'));
        if ($this->form_validation->run() == false) {
            $this->load->view('member/header', $data);
            $this->load->view('member/navbar_member', $data);
            $this->load->view('member/user_member', $data);
            $this->load->view('member/footer');;
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

           $this->db->set(
            ['name' => $this->input->post('name'),
             'email' => $this->input->post('email'),
             'alamat' => $this->input->post('alamat'),
             'notelp' => $this->input->post('notelp')
             ]            
            );
             $this->db->where('id', $this->input->post('id'));
             $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil di tambahkan!</div>');
            redirect('member');
        }


        
        
    }
    public function about()
    {
        $data['title'] = 'Menu Member';
        $data['tag'] = 'about';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $this->load->view('member/header', $data);
        $this->load->view('member/navbar_member', $data);
        $this->load->view('member/user_about', $data);
        $this->load->view('member/footer');
    }

}


