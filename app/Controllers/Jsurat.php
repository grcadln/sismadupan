<?php

namespace App\Controllers;
use App\Models\JsuratModel;
class Jsurat extends BaseController
{
    protected $jsuratModel;

    public function __construct()
    {
        $this->jsuratModel = new JsuratModel();
    }
    public function index(): string
    {
        $data = [
            'tbjenissurat' => $this->jsuratModel->findAll(),
            'title'=> 'SISMADU PAN||Jenis Surat',
            'judul'=> 'Data Jenis Surat'

        ];
        return view('admin/jsurat/index',$data);
    }
    
    public function store(){

        $data =[
            'jenis_surat' => $this->request->getPost('jenis_surat'),
            
        ];
        $this->jsuratModel->save($data);
        return redirect()->to('jsurat');

    }

    public function edit($id)
{
    $jsurat = $this->jsuratModel->find($id);

    if (!$jsurat) {
        return redirect()->to('/jenis surat')->with('error', 'Data jenis surat tidak ditemukan.');
    }

    $data = [
        'tbjenissurat' => $jsurat,
        'title' => 'Edit Jenis Surat',
        'judul' => 'Edit Data Jenis Surat',
    ];

    return view('admin/jsurat/index', $data);
}
public function update($id)
{
    if (!$this->validate([
        'jenis_surat' => 'required|max_length[100]',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $jsurat = $this->jsuratModel->find($id);
    if (!$jsurat) {
        return redirect()->to('/jsurat')->with('error', 'Data jenis surat tidak ditemukan.');
    }

    $data = [
        'id_jenissurat' => $id,
        'jenis_surat' => $this->request->getPost('jenis_surat'),
    ];

    if ($this->jsuratModel->save($data)) {
        return redirect()->to('/jsurat')->with('success', 'Data jenis surat berhasil diperbarui.');
    } else {
        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data jenis surat.');
    }
}
    public function delete($id)
    {
       
        $this->jsuratModel->delete($id); 
        return redirect()->to('jsurat'); 
    }
}