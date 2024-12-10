<?php

namespace App\Controllers;
use App\Models\PenggunaModel;
use PhpParser\Node\Expr\FuncCall;

class Pengguna extends BaseController
{
    protected $penggunaModel;

    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }
    public function index(): string
    {
        $data = [
            'tbpengguna' => $this->penggunaModel->findAll(),
            'title'=> 'SISMADU PAN||Pengguna',
            'judul'=> 'Data Pengguna'

        ];
        return view('admin/pengguna/index',$data);
    }

   

    public function store(){

        $data =[
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'kata_sandi' => $this->request->getPost('kata_sandi'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'peran' => $this->request->getPost('peran'),
        ];
        $this->penggunaModel->save($data);
        return redirect()->to('pengguna');

    }

    public function edit($id)
    {
        $pengguna = $this->penggunaModel->find($id);
    
        if (!$pengguna) {
            return redirect()->to('/pengguna')->with('error', 'Data pengguna tidak ditemukan.');
        }
    
        $data = [
            'tbpengguna' => $pengguna,
            'title' => 'Edit Pengguna',
            'judul' => 'Edit Data Pengguna',
        ];
    
        return view('admin/pengguna/index', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'pengguna' => 'required|max_length[100]',
            'nama_pengguna' => 'required|max_length[100]',
            'nama_lengkap' => 'required|max_length[100]',
            'email' => 'required|max_length[100]',
            'peran' => 'required|max_length[100]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $pengguna = $this->penggunaModel->find($id);
        if (!$pengguna) {
            return redirect()->to('/pengguna')->with('error', 'Data pengguna tidak ditemukan.');
        }
    
        $data = [
            'id_pengguna' => $id,
            'nama_pengguna' => $this->request->getPost('nama_pengguna'), 
            'kata_sandi' => $this->request->getPost('kata_sandi'), 
            'email' => $this->request->getPost('email'), 
            'peran' => $this->request->getPost('peran'), 
        ];
    
        if ($this->penggunaModel->save($data)) {
            return redirect()->to('/pengguna surat')->with('success', 'Data pengguna surat berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data pengguna surat.');
        }
    }

    public function delete($id)
{
   
    $this->penggunaModel->delete($id); // Delete the user by ID
    return redirect()->to('pengguna'); // Redirect to the user list page
}
}