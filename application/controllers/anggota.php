<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Anggota extends HSM_Conttroller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('anggota_model');
    }

    public function index(){
        $data['title'] = 'Management Anggota';
        $data['content'] = 'page/anggota/list_anggota_view';
        $data['list_anggota'] = $this->anggota_model->get_all_anggota();
        $data['page_js'] = 'page/anggota/page_js';
        $this->load->view('wrapper', $data);
    }

    public function detail_anggota($id){
        $data['title'] = 'Detail Anggota';
        $data['content'] = 'page/anggota/detail_anggota_view';
        $data['d_anggota'] = $this->anggota_model->get_anggota_by_id($id);
        $data['page_js'] = 'page/anggota/page_js';
        $this->load->view('wrapper', $data);
    }

    public function hapus_anggota_ajax($id){
        if ($this->anggota_model->delete_anggota($id)) {
            $data['pesan'] = 'Anggota berhasil di hapus';
        }else {
            $data['pesan'] = 'Anggota gagal di hapus';
        }

        echo json_encode($data);
    }

    public function download_anggota(){
        $this->load->library('excel');
        $inputFileName = FCPATH.'template/download_anggota.xlsx';
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
        die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . 
            $e->getMessage());
        }
        $objPHPExcel->setActiveSheetIndex(0);

        $anggota = $this->anggota_model->get_all_anggota();
       // print_r($anggota); exit;
        $number = 2;
        
        foreach($anggota as $value) {

            $objPHPExcel->getActiveSheet()->setCellValue('A'.$number, $number-1);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$number, $value->nama_lengkap);
            //$objPHPExcel->getActiveSheet()->setCellValue('D'.$number, $key->comapny_name);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$number, $value->email);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$number, $value->no_hp);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$number, $value->domisili);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$number, $value->username);
            $number++;
        }

        $filename = 'data_anggota_';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

}