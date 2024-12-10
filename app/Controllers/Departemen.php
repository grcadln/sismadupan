<?php

namespace App\Controllers;

use App\Models\DepartemenModel;
// use App\Models\PenggunaModel;

class Departemen extends BaseController
{
    protected $departemenModel;
    // protected $penggunaModel;

    public function __construct()
    {
        $this->departemenModel = new DepartemenModel();
        // $this->penggunaModel = new PenggunaModel();
    }
    public function index(): string
    {
        $data = [
            'tbdepartemen' => $this->departemenModel->getDepartemen(),
            // 'tb_pengguna' => $this->penggunaModel->findAll(),
            'title' => 'SISMADU PAN||Departemen',
            'judul' => 'Data Departemen'

        ];
        return view('admin/departemen/index', $data);
    }

    // public function create()
    // {
    //     $data = [
    //         'tb_departeman' => $this->departemenModel->findAll(),
    //         'tb_pengguna' => $this->penggunaModel->findAll(),
    //         'title' => 'SISMADU PAN||Departemen',
    //         'judul' => 'Data Departemen'

    //     ];
    //     return view('admin/departemen/index', $data);
    // }

    public function store()
    {

        $data = [
            'nama_departemen' => $this->request->getPost('nama_departemen'),
        ];
        $this->departemenModel->save($data);
        return redirect()->to('departemen');
    }
    public function delete($id)
    {

        $this->departemenModel->delete($id); // Delete the user by ID
        return redirect()->to('departemen'); // Redirect to the user list page
    }

    public function edit($id)
    {
        $departemen = $this->departemenModel->find($id);

        if (!$departemen) {
            return redirect()->to('/departemen')->with('error', 'Data departemen tidak ditemukan.');
        }

        $data = [
            'tbdepartemen' => $departemen,
            'title' => 'Edit Departemen',
            'judul' => 'Edit Data Departemen',
        ];

        return view('admin/departemen/index', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nama_departemen' => 'required|max_length[100]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $departemen = $this->departemenModel->find($id);
        if (!$departemen) {
            return redirect()->to('/departemen')->with('error', 'Data departemen tidak ditemukan.');
        }

        $data = [
            'id_departemen' => $id,
            'nama_departemen' => $this->request->getPost('nama_departemen'),
        ];

        // var_dump($data);
        // exit;
        if ($this->departemenModel->save($data)) {
            return redirect()->to('/departemen')->with('success', 'Data departemen berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data departemen.');
        }
    }

    
}
