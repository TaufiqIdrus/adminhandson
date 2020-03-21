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
        $data['soal'] = $this->m_quiz->display_soal($id_kursus);
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

    function pilihan($id_kursus)
    {
        $data['judul'] = 'Insert Soal Quiz';
        $data['id_kursus'] = $id_kursus;
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/pilihan');
        $this->load->view('templates/footer');
    }

    function insert($id_kursus)
    {
        $data['judul'] = 'Insert Jawaban Quiz';
        $data['jumlahpilihan'] = $this->input->get('jumlahpilihan');
        $data['id_soal'] = $this->input->get('id_soal');
        $data['id_kursus'] = $this->input->post('id_kursus');
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/insert_soal3', $data);
        $this->load->view('templates/footer');
    }



    function pilihanbenar($id_soal)
    {
        $data['judul'] = 'Insert Jawaban Benar';
        $data['id_soal'] = $id_soal;
        $data['pilihan'] = $this->m_quiz->pilihan($id_soal);
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/jawabanbenar', $data);
        $this->load->view('templates/footer');
    }

    function insert_soal()
    {
        $id_kursus = $this->input->post('id_kursus');
        $id_soal = $this->input->post('id_soal');
        $jumlahpilihan = $this->input->post('jumlahpilihan');
        $data = array(
            'id_kursus' => $id_kursus,
            'id_soal' => $id_soal,
            'soal_quiz' => $this->input->post('soal_quiz'),
            'insert_by' => $this->session->userdata("nama")

        );
        $data = $this->security->xss_clean($data);
        $result = $this->m_quiz->insert_soal($data);

        if ($result == TRUE) {
            redirect('quiz/insert/' . $id_kursus . '?jumlahpilihan=' . $jumlahpilihan . '&id_soal=' . $id_soal);
        } else {
            redirect('quiz/manage' . $id_kursus);
        }
    }

    function insert_jawaban()
    {
        for ($i = 0; $i < $this->input->post('jumlahpilihan'); $i++) {
            $data[$i] = array(
                'id_jawaban' => $this->input->post('id_jawaban' . $i),
                'id_soal' => $this->input->post('id_soal'),
                'jawaban_quiz' => $this->input->post('jawaban_quiz' . $i),
                'insert_by' => $this->session->userdata("nama")
            );
        }

        $data = $this->security->xss_clean($data);
        $result = $this->m_quiz->insert_jawaban($data);
        if ($result == TRUE) {
            redirect('quiz/pilihanbenar/' . $this->input->post('id_soal'));
        } else {
            redirect('quiz');
        }
    }

    function insert_benar()
    {
        $id_soal = $this->input->post('id_soal');
        $data = array(
            'id_jawaban' => $this->input->post('id_jawaban')
        );


        $data = $this->security->xss_clean($data);
        $result = $this->m_quiz->insert_benar($this->input->post('id_soal'), $data);
        if ($result == TRUE) {
            redirect('quiz');
        } else {
            redirect('quiz');
        }
    }

    function update_soal()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $id_soal = $this->input->post('id_soal');

        $data = array(
            'soal_quiz' => $this->input->post('soal_quiz'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time)
        );
        $data = $this->security->xss_clean($data);
        $result = $this->m_quiz->update_soal($id_soal, $data);

        if ($result == TRUE) {
            redirect('quiz');
        } else {
            redirect('quiz');
        }
    }


    function gantijawaban($id_soal)
    {
        $data['judul'] = 'Ganti Jawaban soal';
        $data['id_soal'] = $id_soal;
        $data['pilihan'] = $this->m_quiz->pilihan($id_soal);
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/gantijawaban', $data);
        $this->load->view('templates/footer');
    }

    function updatesoal($id_soal)
    {
        $data['judul'] = 'Update Soal Quiz';
        $data['id_soal'] = $id_soal;
        $data['soal'] = $this->m_quiz->display_teks($id_soal);
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/update_soal', $data);
        $this->load->view('templates/footer');
    }

    function updatepilihan($id_soal)
    {
        $data['judul'] = 'Update Pilihan Jawaban Soal Quiz';
        $data['id_soal'] = $id_soal;
        $data['pilihan'] = $this->m_quiz->display_pilihan($id_soal);
        $this->load->view('templates/header', $data);
        $this->load->view('quiz/update_pilihan', $data);
        $this->load->view('templates/footer');
    }

    function update_jawaban()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        for ($i = 0; $i < $this->input->post('jumlahpilihan'); $i++) {
            
            $data[$i] = array(

                'jawaban_quiz' => $this->input->post('jawaban_quiz' . $i),
                'last_update' => mdate($datestring, $time),
                'insert_by' => $this->session->userdata("nama")
            );
            $data[$i] = $this->security->xss_clean($data[$i]);
            $result = $this->m_quiz->update_jawaban($this->input->post('id_jawaban' . $i),$data[$i]);
        }


        if ($result == TRUE) {
            redirect('quiz');
        } else {
            redirect('quiz');
        }
    }

    function delete_soal($id_soal)
    {
        $id_soal = $this->security->xss_clean($id_soal);
        $result = $this->m_quiz->delete_soal($id_soal);
        if ($result == TRUE) {
            redirect('quiz');
        } else {
            redirect('quiz');
        }
    }

    function delete_jawaban($id_quiz)
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
