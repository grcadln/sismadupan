<?php

namespace App\Controllers;

use App\Models\PenggunaModel; // Model untuk tabel pengguna
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        // Tampilkan form login
        return view('auth/login');
    }

    public function processLogin()
    {
        $session = session();
        $model = new PenggunaModel();

        // Validasi input form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_pengguna' => 'required',
            'kata_sandi'    => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $nama_pengguna = $this->request->getPost('nama_pengguna');
        $kata_sandi = $this->request->getPost('kata_sandi');

        // Cari user berdasarkan nama_pengguna
        $pengguna = $model->where('nama_pengguna', $nama_pengguna)->first();

        if ($pengguna) {
            // Verifikasi kata sandi
            if (password_verify($kata_sandi, $pengguna['kata_sandi'])) {
                $session->set([
                    'id_pengguna'   => $pengguna['id_pengguna'],
                    'nama_pengguna' => $pengguna['nama_pengguna'],
                    'nama_lengkap'  => $pengguna['nama_lengkap'],
                    'email'         => $pengguna['email'],
                    'peran'         => $pengguna['peran'],
                    'logged_in'     => true,
                ]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Kata sandi salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Nama pengguna tidak ditemukan.');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
