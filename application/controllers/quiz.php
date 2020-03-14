<?php

class Quiz extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_quiz');
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage Quiz';
        $data['kursus'] = $this->m_quiz->display_kursus();
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/index', $data);
        $this->load->view('templates/footer');
    }

    function manage($id_kursus)
    {
        $data['judul'] = 'Manage Soal Quiz';
        $data['id_kursus'] = $id_kursus;
        $data['kursus'] = $this->m_quiz->display_kursus();
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/manage_soal', $data);
        $this->load->view('templates/footer');
    }

    function list($id_kursus)
    {
        $data['judul'] = 'List Soal';
        $data['id_kursus'] = $id_kursus;
        $data['kursus'] = $this->m_quiz->display_kursus();
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/list_soal', $data);
        $this->load->view('templates/footer');
    }
    
    function insert($id_kursus)
    {
        $data['judul'] = 'Insert Soal Quiz';
        $data['id_kursus'] = $id_kursus;
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/insert_soal');
        $this->load->view('templates/footer');
    }

    function insert_soal()
    {
        $jumlah_pilihan = $this->input->post('quiz');
        $data = array(
            'id_kursus' => $this->input->post('id_kursus'),
            'soal_quiz' => $this->input->post('soal_quiz'),
            
            


            'insert_by' => $this->session->userdata("nama")

        );
        $data = $this->security->xss_clean($data);
        $result = $this->m_quiz->insert($data);
        if ($result == TRUE) {
            redirect('quiz');
        } else {
            redirect('quiz/insert');
        }
    }





















    function update($id_quiz)
    {
        $data['judul'] = 'Update Quiz';
        $data['id_quiz'] = $id_quiz;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa']=$this->m_bahasa->display();
        $data['quiz'] = $this->m_quiz->display_byID($id_quiz);
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/update_quiz', $data);
        $this->load->view('templates/footer');
    }

    function detail($id_quiz)
    {
        $data['judul'] = 'Update Quiz';
        $data['id_quiz'] = $id_quiz;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa']=$this->m_bahasa->display();
        $data['quiz'] = $this->m_quiz->display_byID($id_quiz);
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/detail_quiz', $data);
        $this->load->view('templates/footer');
    }



    function update_quiz()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'quiz' => $this->input->post('quiz'),
            'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
            'deskripsi_full' => $this->input->post('deskripsi_full'),
            'harga' => $this->input->post('harga'),
            'persyaratan' => $this->input->post('persyaratan'),
            'dokter' => $this->input->post('dokter'),
            'gambar' => $this->input->post('gambar'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_bahasa' => $this->input->post('id_bahasa'),
            'id_subtitle' => $this->input->post('id_subtitle'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time)
        );
        $id_quiz = $this->input->post('id_quiz');
        $data = $this->security->xss_clean($data);
        $result = $this->m_quiz->update($id_quiz, $data);
        if ($result == TRUE) {
            redirect('quiz');
        } else {
            redirect('quiz/update');
        }
    }

    function delete_quiz($id_quiz)
    {
        $id_quiz = $this->security->xss_clean($id_quiz);
        $result = $this->m_quiz->delete($id_quiz);
        if ($result == TRUE) {
            redirect('quiz');
        } else {
            redirect('quiz');
        }
    }
}
