<?php

namespace App\Controllers;

use App\Models\SmasukModel;
use App\Models\JsuratModel;
use App\Models\DisposisiModel;

class Smasuk extends BaseController
{
    protected $smasukModel;
    protected $jsuratModel;
    protected $disposisiModel;

    public function __construct()
    {
        $this->smasukModel = new SmasukModel();
        $this->jsuratModel = new JsuratModel();
        $this->disposisiModel = new DisposisiModel();
    }
    public function index(): string
    {
        // Ambil data surat masuk, jenis surat, dan disposisi
        $data = [
            'tbsmasuk' => $this->smasukModel->getSuratMasuk(),
            'tbjsurat' => $this->jsuratModel->findAll(),
            'tbdepartemen' => $this->disposisiModel->getDisposisi(),
            'title' => 'SISMADU PAN||Surat Masuk',
            'judul' => 'Data Surat Masuk'
        ];

        // Mengambil data surat masuk dari $data['tbsmasuk']
        $tbsmasuk = $data['tbsmasuk'];

        // Iterasi melalui setiap surat masuk untuk menambahkan status disposisi
        foreach ($tbsmasuk as &$suratMasuk) {
            // Cari status disposisi berdasarkan ID surat masuk
            $disposisi = $this->disposisiModel->where('id_suratmasuk', $suratMasuk['id_suratmasuk'])->first();

            // Jika disposisi ada, ambil statusnya, jika tidak set 'pending'
            $suratMasuk['status_disposisi'] = $disposisi ? $disposisi['status'] : 'pending';
        }

        // Mengirimkan data ke view
        return view('admin/smasuk/index', $data);
    }


    public function store()
    {

        $data = [
            'no_surat' => $this->request->getPost('no_surat'),
            'tgl_terima' => $this->request->getPost('tgl_terima'),
            'pengirim' => $this->request->getPost('pengirim'),
            'isi_surat' => $this->request->getPost('isi_surat'),
            'id_jenissurat' => $this->request->getPost('id_jenissurat'),

        ];
        $this->smasukModel->save($data);

        return redirect()->to('smasuk');
    }

    public function edit($id)
    {
        $smasuk = $this->smasukModel->find($id);

        if (!$smasuk) {
            return redirect()->to('/smasuk')->with('error', 'Data smasuk tidak ditemukan.');
        }

        $data = [
            'tbsuratmasuk' => $smasuk,
            'tbjsurat' => $this->jsuratModel->findAll(),
            'title' => 'Edit Surat Masuk',
            'judul' => 'Edit Data Surat Masuk',
        ];

        return view('admin/smasuk/index', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'no_surat' => 'required|max_length[100]',
            'tgl_terima' => 'required|max_length[100]',
            'pengirim' => 'required|max_length[100]',
            'isi_surat' => 'required|max_length[100]',
            'id_jenissurat' => 'required|max_length[100]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $smasuk = $this->smasukModel->find($id);
        if (!$smasuk) {
            return redirect()->to('/smasuk')->with('error', 'Data jenis surat tidak ditemukan.');
        }

        $data = [
            'id_suratmasuk' => $id,
            'no_surat' => $this->request->getPost('no_surat'),
            'tgl_terima' => $this->request->getPost('tgl_terima'),
            'pengirim' => $this->request->getPost('pengirim'),
            'isi_surat' => $this->request->getPost('isi_surat'),
            'id_jenissurat' => $this->request->getPost('id_jenissurat'),
        ];

        if ($this->smasukModel->save($data)) {
            return redirect()->to('/smasuk')->with('success', 'Data surat Masuk berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data surat masuk.');
        }
    }
    public function delete($id)
    {

        $this->smasukModel->delete($id); // Delete the user by ID
        return redirect()->to('skeluar'); // Redirect to the user list page
    }
}
