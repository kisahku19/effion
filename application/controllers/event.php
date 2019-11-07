<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class event extends HSM_Conttroller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('event_model');
        $this->load->model('kategori_model');
        $this->load->model('forum_model');
    }

    public function index(){
        $data['title'] = 'Management event';
        $data['content'] = 'page/event/list_event_view';
        $data['list_event'] = $this->event_model->get_all_event();
        $data['page_js'] = 'page/event/page_js';
        $this->load->view('wrapper', $data);
    }

    public function detail_event($id){
        $data['title'] = 'Detail event';
        $data['content'] = 'page/event/detail_event_view';
        $data['d_event'] = $this->event_model->get_event_by_id($id);
        $data['page_js'] = 'page/event/page_js';
        $this->load->view('wrapper', $data);
    }

    function simpan_event($id=null){
        $config['upload_path']          = './foto_event/';
        $config['allowed_types']        = 'gif|jpg|png';
       

        $this->load->library('upload', $config);
        $data_arr = array(
            'id_admin' => $_SESSION['id_admin'],
            'nama_event' => $this->input->post('nama_event'),
            'isi_event' => $this->input->post('isi_event'),
            'id_kategori' => $this->input->post('id_kategori'),
            'tanggal' => $this->input->post('tanggal')
        );

        $data_forum = array(
            'nama' => $this->input->post('nama_event'),
            'judul_forum' => $this->input->post('nama_event'),
            'tanggal' => date('Y-m-d'),
            'isi_forum' => $this->input->post('isi_event')
        );

        if (!empty($id)) {
            if ($this->upload->do_upload('gambar')) {
                $data_arr['gambar'] = $this->upload->data('file_name');
                if ($this->event_model->update_event($id, $data_arr)) {
                    $this->session->set_flashdata('pesan', 'Event berhasil disimpan');
                    redirect('event', 'refresh');
                }else {
                   $this->session->set_flashdata('pesan', 'Event gagal disimpan');
                }
            }else{
                if ($this->event_model->update_event($id, $data_arr)) {
                    $this->session->set_flashdata('pesan', 'Event berhasil disimpan');
                    redirect('event', 'refresh');
                }else {
                   $this->session->set_flashdata('pesan', 'Event gagal disimpan');
                }
            }
        }else{
            if ($this->upload->do_upload('gambar')) {
                $data_arr['gambar'] = $this->upload->data('file_name');
                if ($this->event_model->insert_event($data_arr)) {
                    $id_event = $this->db->insert_id();
                    //create forum for comment
                    $data_forum['gambar'] = $data_arr['gambar'];
                    $this->forum_model->insert_forum($data_forum);
                    $id_forum = $this->db->insert_id();
                    //end create forum for comment

                    //update add forum_id to event table
                    $data_update = array('id_forum'=>$id_forum);
                    $this->event_model->update_event($id_event, $data_update);
                    //end update add forum_id to event table
                    $this->session->set_flashdata('pesan', 'Event berhsail di tambahkan');
                    redirect('event', 'refresh');
                }else {
                    $this->session->set_flashdata('pesan', 'Event gagal di tambahkan');
                    redirect('event', 'refresh');
                }
            }else{
                if ($this->event_model->insert_event($data_arr)) {
                    $id_event = $this->db->insert_id();
                    //create forum for comment
                    $this->forum_model->insert_forum($data_forum);
                    $id_forum = $this->db->insert_id();
                    //end create forum for comment

                    //update add forum_id to event table
                    $data_update = array('id_forum'=>$id_forum);
                    $this->event_model->update_event($id_event, $data_update);
                    //end update add forum_id to event table

                    $this->session->set_flashdata('pesan', 'Event berhasil di tambahkan');
                    redirect('event', 'refresh');
                }else {
                    $this->session->set_flashdata('pesan', 'Event gagal di tambahkan');
                    redirect('event', 'refresh');
                }
            }
        }
    }

    function form_event($id=null){
        
        $data['kategori'] = $this->kategori_model->get_all_kategori();

        if (!empty($id)) {
            $data['title'] = 'Edit Event';
            $data['detail_event'] = $this->event_model->get_event_by_id($id);
        }else {
            $data['title'] = 'Tambah Event';
            $data['detail_event'] = '';
        }
        $data['content'] = 'page/event/form_event_view';
        $data['page_js'] = 'page/event/page_js';
        $this->load->view('wrapper', $data);
    }

    public function hapus_event_ajax($id){
        if ($this->event_model->delete_event($id)) {
            $data['pesan'] = 'event berhasil di hapus';
        }else {
            $data['pesan'] = 'event gagal di hapus';
        }

        echo json_encode($data);
    }

    public function download_event(){
        $this->load->library('excel');
        $objPHPExcel = $this->excel;
        $objPHPExcel->setActiveSheetIndex(0);

        $anggota = $this->event_model->get_all_event();
       // print_r($anggota); exit;
        $number = 2;
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'ADMIN');
        //$objPHPExcel->getActiveSheet()->setCellValue('D'.$number, $key->comapny_name);
        $objPHPExcel->getActiveSheet()->setCellValue('C1','EVENT');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'AGENDA EVENT');
        $objPHPExcel->getActiveSheet()->setCellValue('E1','KATEGORI EVENT');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'TANGGAL');
        
        foreach($anggota as $value) {

            $objPHPExcel->getActiveSheet()->setCellValue('A'.$number, $number-1);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$number, $value->nama_admin);
            //$objPHPExcel->getActiveSheet()->setCellValue('D'.$number, $key->comapny_name);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$number, $value->nama_event);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$number, $value->isi_event);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$number, $value->nama_kategori);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$number, $value->tanggal);
            $number++;
        }

        $filename = 'data_event_'.date('Y-m-d H:i:S');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}