<?php

namespace App\Controllers;
use App\Models\LampiranModel;
class Lampiran extends BaseController
{
    protected $lampiranModel;

    public function __construct()
    {
        $this->lampiranModel = new LampiranModel();
    }
    public function index(): string
    {
        $data = [
            'tblampiran' => $this->lampiranModel->findAll(),
            'title'=> 'SISMADU PAN||Lampiran',
            'judul'=> 'Data Lampiran'

        ];
        return view('admin/lampiran/index',$data);
    }
    
    public function store(){

        $data =[
            'nama_file' => $this->request->getPost('nama_file'),
            'lokasi_file' => $this->request->getPost('lokasi_file'),
           
        ];
        $this->lampiranModel->save($data);
        return redirect()->to('lampiran');

    }

    public function edit($id)
    {
        $lampiran = $this->lampiranModel->find($id);
    
        if (!$lampiran) {
            return redirect()->to('/lampiran')->with('error', 'Data lampiran tidak ditemukan.');
        }
    
        $data = [
            'tblampiran' => $lampiran,
            'title' => 'Edit Lampiran',
            'judul' => 'Edit Data Lampiran',
        ];
    
        return view('admin/lampiran/index', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'lampiran' => 'required|max_length[100]',
            'nama_file' => 'required|max_length[100]',
            'lokasi_file' => 'required|max_length[100]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $lampiran = $this->lampiranModel->find($id);
        if (!$lampiran) {
            return redirect()->to('/lampiran')->with('error', 'Data lampiran tidak ditemukan.');
        }
    
        $data = [
            'id_lampiransurat' => $id,
            'nama_file' => $this->request->getPost('nama_file'), 
            'lokasi_file' => $this->request->getPost('lokasi_file'), 
        ];
    
        if ($this->lampiranModel->save($data)) {
            return redirect()->to('/lampiran surat')->with('success', 'Data lampiran surat berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data lampiran surat.');
        }
    }
    public function delete($id)
    {
       
        $this->lampiranModel->delete($id); // Delete the user by ID
        return redirect()->to('lampiran'); // Redirect to the user list page
    }
}