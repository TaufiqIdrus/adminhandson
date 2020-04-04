<?php
// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Kursus extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_kursus');
        $this->load->model('m_dokterkursus');
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->model('m_dokter');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage Kursus';
        $data['kursus'] = $this->m_kursus->display();
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/index', $data);
        $this->load->view('templates/footer');
    }

    function arsip()
    {
        $data['judul'] = 'Arsip Kursus';
        $data['kursus'] = $this->m_kursus->arsip();
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/arsip', $data);
        $this->load->view('templates/footer');
    }

    function insert()
    {
        $data['judul'] = 'Insert Kursus';
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $data['dokter'] = $this->m_dokter->display();
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/insert_kursus');
        $this->load->view('templates/footer');
    }

    function update($id_kursus)
    {
        $data['judul'] = 'Update Kursus';
        $data['id_kursus'] = $id_kursus;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $data['kursus'] = $this->m_kursus->display_byID($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/update_kursus', $data);
        $this->load->view('templates/footer');
    }

    function detail($id_kursus)
    {
        $data['judul'] = 'Detail Kursus';
        $data['id_kursus'] = $id_kursus;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $data['kursus'] = $this->m_kursus->display_byID($id_kursus);
        $data['dokterkursus'] = $this->m_dokterkursus->displayiddokter($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/detail_kursus', $data);
        $this->load->view('templates/footer');
    }

    function insert_kursus()
    {
        $result = $this->m_kursus->insert_kursus();
        if ($result == TRUE) {
            redirect('kursus');
        } else {
            redirect('kursus/insert');
        }
    }

    function update_kursus()
    {
        $result = $this->m_kursus->update_kursus();
        if ($result == TRUE) {
            redirect('kursus');
        } else {
            redirect('kursus/update');
        }
    }

    function delete_kursus($id_kursus)
    {
        $id_kursus = $this->security->xss_clean($id_kursus);
        $result = $this->m_kursus->delete($id_kursus);
        if ($result == TRUE) {
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('kursus');
        } else {
            redirect('kursus');
        }
    }

    public function export()
    {
        $Kursus = $this->m_kursus->export();

        $spreadsheet = new Spreadsheet;
        // Set document properties
        $spreadsheet->getProperties()->setCreator($this->session->userdata("nama"))
            ->setLastModifiedBy($this->session->userdata("nama"))
            ->setTitle('Laporan Kursus')
            ->setSubject('Laporan Kursus')
            ->setDescription('Dokumen laporan berisi detail akun user')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Kursus')
            ->setCellValue('C1', 'Judul')
            ->setCellValue('D1', 'Deskripsi Singkat')
            ->setCellValue('E1', 'Deskripsi Full')
            ->setCellValue('F1', 'Harga')
            ->setCellValue('G1', 'Harga Diskon')
            ->setCellValue('H1', 'Persentase Diskon')
            ->setCellValue('I1', 'Rating')
            ->setCellValue('J1', 'Durasi')
            ->setCellValue('K1', 'Persyaratan')
            ->setCellValue('L1', 'Gambar')
            ->setCellValue('M1', 'Status')
            ->setCellValue('N1', 'Kategori')
            ->setCellValue('O1', 'Bahasa')
            ->setCellValue('P1', 'Subtitle')
            ->setCellValue('Q1', 'Insert By')
            ->setCellValue('R1', 'Insert Date')
            ->setCellValue('S1', 'Last Update');


        $kolom = 2;
        $nomor = 1;
        foreach ($Kursus as $kursus) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $kursus->id_kursus)
                ->setCellValue('C' . $kolom, $kursus->kursus)
                ->setCellValue('D' . $kolom, $kursus->deskripsi_singkat)
                ->setCellValue('E' . $kolom, $kursus->deskripsi_full)
                ->setCellValue('F' . $kolom, 'Rp. ' . number_format($kursus->harga, 0, ",", "."))
                ->setCellValue('G' . $kolom, 'Rp. ' . number_format($kursus->harga_diskon, 0, ",", "."))
                ->setCellValue('H' . $kolom, $kursus->jumlahdiskon . ' %')
                ->setCellValue('I' . $kolom, $kursus->rating)
                ->setCellValue('J' . $kolom, $kursus->durasi . ' hari')
                ->setCellValue('K' . $kolom, $kursus->persyaratan)
                ->setCellValue('L' . $kolom, $kursus->gambar)
                ->setCellValue('M' . $kolom, $kursus->status)
                ->setCellValue('N' . $kolom, $this->m_kategori->display_byID($kursus->id_kategori)[0]->kategori)
                ->setCellValue('O' . $kolom, $this->m_bahasa->display_byID($kursus->id_bahasa)[0]->bahasa)
                ->setCellValue('P' . $kolom, $this->m_bahasa->display_byID($kursus->id_subtitle)[0]->bahasa)
                ->setCellValue('Q' . $kolom, $kursus->insert_by)
                ->setCellValue('R' . $kolom, $kursus->insert_date)
                ->setCellValue('S' . $kolom, $kursus->last_update);

            $kolom++;
            $nomor++;
        }
        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Kursus ' . date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Kursus.xlsx"');
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
