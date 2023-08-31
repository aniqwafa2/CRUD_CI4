<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Builder\Function_;

class TugasModel extends Model
{
    protected $table      = 'tugas';

    protected $allowedFields = ['tugas_judul', 'tugas_status'];

    public function ajaxGetData($start, $length)
    {
        $result = $this->orderBy('tugas_judul','asc')
        ->findAll($start, $length);
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        $result = $this->like('tugas_judul', $search)
        ->findAll($start, $length);

        return $result;
    }

    public function ajaxGetTotal()
    {
        $result = $this->countAll();

        if(isset($result)) {
            return $result;
        }

        return 0;
    }

    public function ajaxGetTotalSearch($search)
    {
        $result = $this->like('tugas_judul',$search)
        ->countAllResults();

        return $result;
    }

}