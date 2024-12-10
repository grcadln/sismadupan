<?php

namespace App\Controllers;
use App\Models\SkeluarModel;
class Skeluar extends BaseController
{
    protected $skeluarModel;

    public function __construct()
    {
        $this->skeluarModel = new SkeluarModel();
    }
    public function index(): string
    {
        $data = [
            'tbskeluar' => $this->skeluarModel->findAll(),
            'title'=> 'SISMADU PAN||Surat Keluar',
            'judul'=> 'Data Surat Keluar'

        ];
        return view('admin/skeluar/index',$data);
    }
    
    public function store(){

        $data =[
            'no_surat' => $this->request->getPost('no_surat'),
            'tgl_keluar' => $this->request->getPost('tgl_keluar'),
            'penerima' => $this->request->getPost('penerima'),
            'perihal' => $this->request->getPost('perihal'),
            'isi_surat' => $this->request->getPost('isi_surat'),
        ];
        $this->skeluarModel->save($data);
        return redirect()->to('skeluar');
    }
        public function edit($id){
    $skeluar = $this->skeluarModel->find($id);

    if (!$skeluar) {
        return redirect()->to('/surat keluar')->with('error', 'Data surat keluar tidak ditemukan.');
    }

    $data = [
        'tbsuratkeluar' => $skeluar,
        'title' => 'Edit Surat Keluar',
        'judul' => 'Edit Data Surat Keluar',
    ];

    return view('admin/skeluar/index', $data);
}
public function update($id)
{
    if (!$this->validate([
        'surat_keluar' => 'required|max_length[100]',
        'no_surat' => 'required|max_length[100]',
        'tgl_keluar' => 'required|max_length[100]',
        'penerima' => 'required|max_length[100]',
        'perihal' => 'required|max_length[100]',
        'isi_surat' => 'required|max_length[100]',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $skeluar = $this->skeluarModel->find($id);
    if (!$skeluar) {
        return redirect()->to('/skeluar')->with('error', 'Data surat keluar tidak ditemukan.');
    }

    $data = [
        'id_suratkeluar' => $id,
        'no_surat' => $this->request->getPost('no_surat'),
        'tgl_keluar' => $this->request->getPost('tgl_keluar'),
        'penerima' => $this->request->getPost('penerima'),
        'perihal' => $this->request->getPost('perihal'),
        'isi_surat' => $this->request->getPost('isi_surat'),
    ];

    if ($this->skeluarModel->save($data)) {
        return redirect()->to('/skeluar')->with('success', 'Data surat keluar berhasil diperbarui.');
    } else {
        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data surat keluar.');
    }
}

    
    public function delete($id)
    {
       
        $this->skeluarModel->delete($id); // Delete the user by ID
        return redirect()->to('skeluar'); // Redirect to the user list page
    }
}