<?php

namespace App\Controllers;

use App\Models\TugasModel;

class Home extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TugasModel();
    }
    public function index(): string
    {
        $data = [
            'content' => 'home'
        ];
        return view('Layouts/template', $data);
    }

    public function ajaxList()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->model->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total
        ];

        if($search !== "") 
        {
            $list = $this->model->ajaxGetTotalSearch($search,$start,$length);
        }else{
            $list = $this->model->ajaxGetData($start,$length);
        }

        if($search !== "")
        {
            $total_search = $this->model->ajaxGetTotalSearch($search);
            $output = [
                'recordsTotal' => $total_search,
                'recordsFiltered' => $total_search
            ];
        }

        $data = [];
        $no = $start +1;
        foreach ($list as $temp)
        {
            $row = [];
            $row[] = $no;
            $row[] = $temp['tugas_judul'];
            $row[] = $temp['tugas_status'];

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }
}
