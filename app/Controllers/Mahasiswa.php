<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswa;

    public function __construct() {
        $this->mahasiswa = new MahasiswaModel;
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');

        if($keyword) {
            $ListMahasiswa = $this->mahasiswa->search($keyword);
        } else {
            $ListMahasiswa = $this->mahasiswa;
        }

        $currentPage = $this->request->getVar('page_mahasiswa') ?? 1;

        $data = [
            'title' => 'Daftar Mahasiswa',
            'mahasiswa' => $ListMahasiswa->paginate(10, 'mahasiswa'),
            'pager' => $this->mahasiswa->pager,
            'currentPage' => $currentPage,
        ];

        return view('mahasiswa/index', $data);
    }
}
