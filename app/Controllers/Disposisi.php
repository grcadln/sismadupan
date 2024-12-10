<?php

namespace App\Controllers;

use App\Models\DisposisiModel;
use App\Models\PenggunaModel;

class Disposisi extends BaseController
{
    protected $disposisiModel;
    protected $penggunaModel;

    public function __construct()
    {
        $this->disposisiModel = new DisposisiModel();
        $this->penggunaModel = new PenggunaModel();
    }
    public function index(): string
    {
        $data = [
            'tbdisposisi' => $this->disposisiModel->getDetailDisposisi(),
            'title' => 'SISMADU PAN||Disposisi',
            'judul' => 'Data Disposisi'

        ];
        return view('admin/disposisi/index', $data);
    }
    public function create(): string
    {
        $data = [
            'tbdisposisi' => $this->disposisiModel->findAll(),
            'title' => 'SISMADU PAN||Disposisi',
            'judul' => 'Data Disposisi'
        ];
        return view('admin/disposisi/create', $data);
    }
    public function store()
    {
        $data = [
            'tgl_disposisi' => $this->request->getPost('tgl_disposisi'),
            'instruksi' => $this->request->getPost('instruksi'),
            'id_suratmasuk' => $this->request->getPost('id_suratmasuk'),
            'id_departemen' => $this->request->getPost('id_departemen'),
            'status' => 'completed', // Menambahkan status 'completed' setelah disposisi disimpan
        ];
        // Simpan data disposisi ke dalam database
        $this->disposisiModel->save($data);

        // Redirect ke halaman Surat Masuk setelah berhasil menyimpan disposisi
        return redirect()->to('smasuk');
    }
    public function edit($id)
    {
        $disposisi = $this->disposisiModel->find($id);
        if (!$disposisi) {
            return redirect()->to('/disposisi')->with('error', 'Data disposisi tidak ditemukan.');
        }
        $data = [
            'tbdisposisi' => $disposisi,
            'title' => 'Edit Disposisi',
            'judul' => 'Edit Data Disposisi',
        ];

        return view('admin/disposisi/index', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'disposisi' => 'required|max_length[100]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $disposisi = $this->disposisiModel->find($id);
        if (!$disposisi) {
            return redirect()->to('/disposisi')->with('error', 'Data disposisi tidak ditemukan.');
        }
        $data = [
            'id_disposisi' => $id,
            'tgl_disposisi' => $this->request->getPost('tgl_disposisi'),
            'instruksi' => $this->request->getPost('instruksi'),
        ];

        if ($this->disposisiModel->save($data)) {
            return redirect()->to('/smasuk')->with('success', 'Data disposisi berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data disposisi.');
        }
    }
    public function delete($id)
    {
        $this->disposisiModel->delete($id); // Delete the user by ID
        return redirect()->to('disposisi'); // Redirect to the user list page
    }
}
