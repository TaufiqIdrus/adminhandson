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

    function managesoal($id_kursus)
    {
        $data['judul'] = 'Manage Soal Quiz';
        $data['id_kursus'] = $id_kursus;
        $data['soal'] = $this->m_quiz->display_soal($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/manage_soal', $data);
        $this->load->view('templates/footer');
    }

    function arsip_soal($id_kursus)
    {
        $data['judul'] = 'Arsip Soal Quiz';
        $data['id_kursus'] = $id_kursus;
        $data['soal'] = $this->m_quiz->arsip_soal($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/arsip_soal', $data);
        $this->load->view('templates/footer');
    }

    function arsip_pilihan($id_soal)
    {
        $data['judul'] = 'Arsip Pilihan Jawaban';
        $data['id_soal'] = $id_soal;
        $data['jawaban'] = $this->m_quiz->arsip_jawaban($id_soal);
        $data['id_kursus'] = $this->input->get('id_kursus');
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/arsip_pilihan', $data);
        $this->load->view('templates/footer');
    }
    function insertsoal($id_kursus)
    {
        $data['judul'] = 'Insert Soal Quiz';
        $data['id_kursus'] = $id_kursus;
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/insertsoal');
        $this->load->view('templates/footer');
    }

    function insert_soal()
    {
        $id_kursus = $this->input->post('id_kursus');
        $result = $this->m_quiz->insert_soal();
        if ($result == TRUE) {
            redirect('quiz/managesoal/' . $id_kursus);
        } else {
            redirect('quiz/insertsoal/' . $id_kursus);
        }
    }

    function updatesoal($id_soal)
    {
        $data['judul'] = 'Update Soal Quiz';
        $data['id_soal'] = $id_soal;
        $data['id_kursus'] = $this->input->get('id_kursus');
        $data['soal'] = $this->m_quiz->display_teks($id_soal);
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/update_soal', $data);
        $this->load->view('templates/footer');
    }

    function update_soal()
    {
        $id_kursus = $this->input->post('id_kursus');
        $result = $this->m_quiz->update_soal();
        if ($result == TRUE) {
            redirect('quiz/managesoal/' . $id_kursus);
        } else {
            redirect('quiz/updatesoal/' . $id_kursus);
        }
    }

    function delete_soal($id_soal)
    {
        $id_kursus = $this->input->get('id_kursus');
        $id_soal = $this->security->xss_clean($id_soal);
        $result = $this->m_quiz->delete_soal($id_soal);
        if ($result == TRUE) {
            redirect('quiz/managesoal/' . $id_kursus);
        }
    }

    function gantijawaban($id_soal)
    {
        $data['judul'] = 'Ganti Jawaban soal';
        $data['id_soal'] = $id_soal;
        $data['id_kursus'] = $this->input->get('id_kursus');
        $data['pilihan'] = $this->m_quiz->pilihan($id_soal);
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/gantijawaban', $data);
        $this->load->view('templates/footer');
    }

    function ganti_jawaban()
    {
        $id_soal = $this->input->post('id_soal');
        $id_kursus = $this->input->post('id_kursus');
        $data = array(
            'id_jawaban' => $this->input->post('id_jawaban')
        );

        $data = $this->security->xss_clean($data);
        $result = $this->m_quiz->ganti_jawaban($this->input->post('id_soal'), $data);
        if ($result == TRUE) {
            redirect('quiz/managesoal/' . $id_kursus);
        } else {
            redirect('quiz/gantijawaban/' . $id_kursus);
        }
    }

    function managepilihan($id_soal)
    {
        $data['judul'] = 'Manage Pilihan Jawaban';
        $data['id_soal'] = $id_soal;
        $data['jawaban'] = $this->m_quiz->displayjawaban($id_soal);
        $data['id_kursus'] = $this->input->get('id_kursus');
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/manage_pilihan', $data);
        $this->load->view('templates/footer');
    }

    function insertjawaban($id_soal)
    {
        $data['judul'] = 'Insert Jawaban Quiz';
        $data['id_soal'] = $id_soal;
        $data['id_kursus'] = $this->input->get('id_kursus');
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/insertjawaban', $data);
        $this->load->view('templates/footer');
    }

    function insert_jawaban()
    {
        $id_soal = $this->input->post('id_soal');
        $id_kursus = $this->input->post('id_kursus');
        $result = $this->m_quiz->insert_jawaban();
        if ($result == TRUE) {
            redirect('quiz/managepilihan/' . $id_soal . '?id_kursus=' . $id_kursus);
        } else {
            redirect('quiz/insertjawaban/' . $id_soal . '?id_kursus=' . $id_kursus);
        }
    }

    function delete_jawaban($id_pilihan)
    {
        $id_soal = $this->input->get('id_soal');
        $id_kursus = $this->input->get('id_kursus');
        $id_pilihan = $this->security->xss_clean($id_pilihan);
        $result = $this->m_quiz->delete_jawaban($id_pilihan);
        if ($result == TRUE) {
            redirect('quiz/managepilihan/' . $id_soal . '?id_kursus=' . $id_kursus);
        }
    }

    function updatejawaban($id_jawaban)
    {
        $data['judul'] = 'Insert Jawaban Quiz';
        $data['id_jawaban'] = $id_jawaban;
        $data['id_soal'] = $this->input->get('id_soal');
        $data['id_kursus'] = $this->input->get('id_kursus');
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/updatejawaban', $data);
        $this->load->view('templates/footer');
    }


    function update_jawaban()
    {
        $id_soal = $this->input->post('id_soal');
        $id_kursus = $this->input->post('id_kursus');

        $result = $this->m_quiz->update_jawaban();

        if ($result == TRUE) {
            redirect('quiz/managepilihan/' . $id_soal . '?id_kursus=' . $id_kursus);
        } else {
            redirect('quiz/updatejawaban/' . $id_soal . '?id_kursus=' . $id_kursus);
        }
    }
}
