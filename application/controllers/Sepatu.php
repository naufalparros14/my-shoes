<?php
class Sepatu extends CI_Controller
{

    
   

    //Manajemen Sepatu
    public function index()
    {
        $data['judul'] = 'Data Sepatu';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['sepatu'] = $this->ModelSepatu->getSepatu()->result_array();
        $data['kategori'] = $this->ModelSepatu->getKategori()->result_array();
        $this->form_validation->set_rules(
            'nama_sepatu',
            'Nama Sepatu',
            'required|min_length[3]', [
            'required' => 'Nama Sepatu harus diisi',
            'min_length' => 'Nama sepatu terlalu pendek'
        ]);
       
        $this->form_validation->set_rules(
            'merk',
            'Nama Merk',
            'required|min_length[1]', [
            'required' => 'Nama Merk harus diisi',
            'min_length' => 'Nama Merk terlalu pendek'
        ]);
        $this->form_validation->set_rules(
            'jenis',
            'Nama Jenis',
            'required|min_length[3]', [
            'required' => 'Nama jenis harus diisi',
            'min_length' => 'Nama Jenis terlalu pendek'
        ]
    );

        $this->form_validation->set_rules(
            'ukuran',
            'Ukuran',
            'required|min_length[3]', [
            'required' => 'Ukuran harus diisi',
            'min_length' => 'Ukuran Sepatu Tidak Normal'
            ]
            
        
        );
       

        $this->form_validation->set_rules(
            'stok',
            'Jumlah Stok',
            'required|numeric',
            [
                'required' => 'Stok harus diisi',
                'numeric' => 'Yang anda masukan bukan angka'
            ]
        );

        $this->form_validation->set_rules(
            'harga',
            'Harga Sepatu',
            'required|min_length[3]|numeric',
            [
                'required' => 'Harga Sepatu harus diisi',
                'min_length' => 'Harga Sepatu Terlalu Murah',
                'numeric' => 'Yang anda masukan bukan angka'
            ]
        );
        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sepatu/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }
            $data = [
                'nama_sepatu' => $this->input->post('nama_sepatu',true),
                // 'id_kategori' => $this->input->post('id_kategori',true),
                'merk' => $this->input->post('merk', true),
                'jenis' => $this->input->post('jenis', true),
                'ukuran' => $this->input->post('ukuran', true),
                'stok' => $this->input->post('stok', true),
                'harga' => $this->input->post('harga', true),
                'image' => $gambar
            ];
            $this->ModelSepatu->simpanSepatu($data);
            redirect('sepatu');
        }
    }

    public function hapusSepatu()
 {
 $where = ['id' => $this->uri->segment(3)];
 $this->ModelSepatu->hapusSepatu($where);
 redirect('sepatu');
 }

    public function ubahSepatu()
    {
        $data['judul'] = 'Ubah Data Sepatu';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['sepatu'] = $this->ModelSepatu->sepatuWhere(['id' => $this->uri->segment(3)])->result_array();
        $kategori = $this->ModelSepatu->joinKategoriSepatu(['sepatu.id' => $this->uri->segment(3)])->result_array();
        foreach ($kategori as $k) {
            $data['id'] = $k['id_kategori'];
            $data['k'] = $k['kategori'];
        }
        $data['kategori'] = $this->ModelSepatu->getKategori()->result_array();

        $this->form_validation->set_rules(
            'nama_sepatu',
            'Nama Sepatu',
            'required|min_length[3]', [
            'required' => 'Nama Sepatu harus diisi',
            'min_length' => 'Nama sepatu terlalu pendek'
        ]);

        $this->form_validation->set_rules(
                'merk',
                'Nama Merk',
                'required|min_length[1]', [
                'required' => 'Nama Merk harus diisi',
                'min_length' => 'Nama Merk terlalu pendek'
            ]
        );

        $this->form_validation->set_rules(
            'jenis',
            'Nama Jenis',
            'required|min_length[3]', [
            'required' => 'Nama jenis harus diisi',
            'min_length' => 'Nama Jenis terlalu pendek'
        ]
        );

        $this->form_validation->set_rules(
            'ukuran',
            'Ukuran',
            'required|min_length[3], ', [
            'required' => 'Ukuran harus diisi',
            'min_length' => 'Ukuran Sepatu Tidak Normal'
            ]
        );

        $this->form_validation->set_rules(
            'stok',
             'Jumlah Stok',
             'required|numeric',
             [
                 'required' => 'Stok harus diisi',
                 'numeric' => 'Yang anda masukan bukan angka'
             ]
         );

        $this->form_validation->set_rules(
            'harga',
            'Harga Sepatu',
            'required|min_length[3]|numeric',
            [
                'required' => 'Harga Sepatu harus diisi',
                'min_length' => 'Harga Sepatu Terlalu Murah',
                'numeric' => 'Yang anda masukan bukan angka'
            ]
        );

       

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        //memuat atau memanggil library upload
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sepatu/ubah_sepatu', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $data = [
                'nama_sepatu' => $this->input->post('nama_sepatu', true),
                'merk' => $this->input->post('merk', true),
                'jenis' => $this->input->post('jenis', true),
                'ukuran' => $this->input->post('ukuran', true),
                'harga' => $this->input->post('harga', true),
                // 'id_kategori' => $this->input->post('id_kategori', true),
                
                'stok' => $this->input->post('stok', true),
                'image' => $gambar
            ];
            $this->ModelSepatu->updateSepatu($data, ['id' => $this->input->post('id')]);
            redirect('sepatu');
        }
    }
}