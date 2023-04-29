<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengaturanModel;

class Pengaturan extends BaseController
{
    private $pengaturan;

    public function __construct()
    {
        $this->pengaturan = new PengaturanModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Pengaturan',
            'pengaturan' => $this->pengaturan->first()
        ];
        if ($this->request->getPost()) {
            $this->_simpanPengaturan($_POST);
            return redirect()->to('pengaturan')->with('pesan', 'Pengaturan berhasil disimpan');
        }
        echo view('pengaturan', $data);
    }

    private function _simpanPengaturan($post)
    {
        $data = [
            'nama_toko' => filter_var($post['nama_toko']),
            'no_telp'   => filter_var($post['no_telp']),
            'alamat'    => filter_var($post['alamat']),
        ];
        $this->pengaturan->update(1, $data);
    }
}
