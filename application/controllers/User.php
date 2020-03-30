<?php
// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class User extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_user');
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->model('m_profil');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage User';
        $data['user'] = $this->m_user->display();
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    function arsip()
    {
        $data['judul'] = 'Arsip User';
        $data['user'] = $this->m_user->arsip();
        $this->load->view('templates/header', $data);
        $this->load->view('user/arsip', $data);
        $this->load->view('templates/footer');
    }

    function insert()
    {
        $data['judul'] = 'Insert User';
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $this->load->view('templates/header', $data);
        $this->load->view('user/insert_user');
        $this->load->view('templates/footer');
    }

    function update($id_user)
    {
        $data['judul'] = 'Update User';
        $data['id_user'] = $id_user;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $data['user'] = $this->m_user->display_byID($id_user);
        $this->load->view('templates/header', $data);
        $this->load->view('user/update_user', $data);
        $this->load->view('templates/footer');
    }

    function detail($id_user)
    {
        $data['judul'] = 'Detail User';
        $data['id_user'] = $id_user;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $data['user'] = $this->m_user->display_byID($id_user);
        $data['profil'] = $this->m_profil->display_byID($id_user);
        $this->load->view('templates/header', $data);
        $this->load->view('user/detail_user', $data);
        $this->load->view('templates/footer');
    }

    function insert_user()
    {
        if ($this->input->post('password') == $this->input->post('password_confirm')) {
            $result = $this->m_user->insert_user();
            if ($result == TRUE) {
                redirect('user');
            } else {
                redirect('user/insert');
            }
        } else {
            redirect('user/insert');
        }
    }

    function update_user()
    {

        if ($this->input->post('password') == $this->input->post('password_confirm')) {
            $result = $this->m_user->update_user();
            if ($result == TRUE) {
                redirect('user');
            } else {
                redirect('user/insert');
            }
        } else {
            redirect('user/insert');
        }
    }

    function delete_user($id_user)
    {
        $id_user = $this->security->xss_clean($id_user);
        $result = $this->m_user->delete($id_user);
        if ($result == TRUE) {
            redirect('user');
        } else {
            redirect('user');
        }
    }

    public function export()
    {
        $users = $this->m_user->export();

        $spreadsheet = new Spreadsheet;
        // Set document properties
        $spreadsheet->getProperties()->setCreator($this->session->userdata("nama"))
            ->setLastModifiedBy($this->session->userdata("nama"))
            ->setTitle('Laporan Akun User')
            ->setSubject('Laporan Akun User')
            ->setDescription('Dokumen laporan berisi detail akun user')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID User')
            ->setCellValue('C1', 'Username')
            ->setCellValue('D1', 'Email Address')
            ->setCellValue('E1', 'Level')
            ->setCellValue('F1', 'Status')
            ->setCellValue('G1', 'Insert By')
            ->setCellValue('H1', 'Insert Date')
            ->setCellValue('I1', 'Last Update');


        $kolom = 2;
        $nomor = 1;
        foreach ($users as $user) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $user->id_user)
                ->setCellValue('C' . $kolom, $user->username)
                ->setCellValue('D' . $kolom, $user->emailaddress)
                ->setCellValue('E' . $kolom, $user->level)
                ->setCellValue('F' . $kolom, $user->status)
                ->setCellValue('G' . $kolom, $user->insert_by)
                ->setCellValue('H' . $kolom, $user->insert_date)
                ->setCellValue('I' . $kolom, $user->last_update);

            $kolom++;
            $nomor++;
        }
        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Akun User ' . date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan User.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}
