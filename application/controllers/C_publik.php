<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_public extends CI_Controller
{
    // public function getBarbuk()
    // {
    //     if (!empty($this->input->post('cari'))) {
    //         header('Content-type: application/json');

    //         $where['reg_barbuk'] = $this->input->post('cari');
    //         $dataBarbuk = $this->app->get_where_barbuk($where)->row();

    //         if ($dataBarbuk != null) {
    //             $data = array(
    //                 'status' => true,
    //                 'message' => 'data ditemukan',
    //                 'data' => $dataBarbuk
    //             );
    //         } else {
    //             $data = array(
    //                 'status' => false,
    //                 'message' => 'data tidak ditemukan'
    //             );
    //         }

    //         echo json_encode($data);
    //     } else {
    //         $data = array(
    //         'status' => false,
    //         'message' => 'data tidak ditemukan'
    //     );
    // echo json_encode($data);
    //     }
    // }

    public function getPosyanduuLike()
    {
        header('Content-type: application/json');
        if (!empty($this->input->post('cari'))) {

            $keyword = $this->input->post('cari');
            $dataPosyanduu = $this->app->get_like($keyword)->result();

            if ($dataPosyanduu != null) {
                $data = array(
                    'status' => true,
                    'message' => 'data ditemukan',
                    'data' => $dataPosyanduu
                );
            } else {
                $data = array(
                    'status' => false,
                    'message' => 'data tidak ditemukan'
                );
            }

            echo json_encode($data);
        } else {
            $data = array(
                'status' => false,
                'message' => 'null value'
            );
            echo json_encode($data);
        }
    }
}
