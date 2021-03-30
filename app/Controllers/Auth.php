<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $authModel;
    public function __construct()
    {
        $this->authModel = new AuthModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Login | SemangatePoor'
        ];
        return view('auth/login', $data);
    }

    public function register()
    {

        $data = [
            'title' => 'Buat Akun | SemangatePoor',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function save_register()
    {
        // validasi input
        if ($this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi!',
                    'is_unique' => 'Username sudah terdaftar.'
                ]
            ],
            // 'sampul' => [
            //     'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png,image/svg]', //'uploaded[sampul]| taruh dpn kalau mau ada error dan tdk pakai if(apakah tidak ada gambar) 
            //     'errors' => [
            //         //'uploaded' => 'pilih gambar dahulu',
            //         'max_size' => 'ukuran gambar terlalu besar',
            //         'is_image' => 'yg anda pilih bukan gambar',
            //         'mime_in' => 'yg anda pilih bukan gambar'
            //     ]
            // ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/sampah/create')->withInput()->with('valdation', $validation);

            return redirect()->to('/register')->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        //apakah tidak ada gambar yg diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'profil.svg';
        } else {
            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            //pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        $nama = $this->request->getVar('nama');
        $this->authModel->save([
            'nama' => $nama,
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'rt' => $this->request->getVar('rt'),
            'rw' => $this->request->getVar('rw'),
            'sampul' => $namaSampul,
            'level' => 'user',
            'saldo' => '0',
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/login');
    }


    public function login()
    {
        $table = 'users';
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $row = $this->authModel->get_data_login($username, $table);
        // var_dump($row);
        if ($row == NULL) {
            session()->setFlashdata('error', 'Username Salah!');
            return redirect()->to('/login');
        }
        if (password_verify($password, $row->password)) {
            $data = array(
                'log' => TRUE,
                'id' => $row->id,
                'nama' => $row->nama,
                'username' => $row->username,
                'rt' => $row->rt,
                'rw' => $row->rw,
                'sampul' => $row->sampul,
                'level' => $row->level,
                'saldo' => $row->saldo,
            );
            session()->set($data);
            session()->setFlashdata('pesan', 'Berhasil Login');
            return redirect()->to('/user');
            // return redirect()->to('/backend');
        }
        session()->setFlashdata('error', 'Password Salah');
        return redirect()->to('/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('pesan', 'Berhasil Logout');
        return redirect()->to('/');
    }


    // public function edit($nama)
    // {
    //     $data = [
    //         'title' => 'Form Ubah Data Akun',
    //         'validation' => \Config\Services::validation(),
    //         'auth' => $this->authModel->getakun($nama)
    //     ];

    //     return view('user/edit_user', $data);
    // }

    // public function update($id)
    // {
    //     //cek jenis
    //     $namalama = $this->authModel->getakun($this->request->getVar('nama'));
    //     if ($namalama['nama'] == $this->request->getVar('nama')) {
    //         $rule_nama = 'required';
    //     } else {
    //         $rule_nama = 'required|is_unique[users.nama]';
    //     }

    //     if (!$this->validate([
    //         'jenis' => [
    //             'rules' => $rule_nama,
    //             'errors' => [
    //                 'required' => '{field} Nama harus diisi!',
    //                 'is_unique' => '{field} Nama sudah terdaftar.'
    //             ]
    //         ],
    //         'sampul' => [
    //             'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png,image/svg]', //'uploaded[sampul]| taruh dpn kalau mau ada error dan tdk pakai if(apakah tidak ada gambar) 
    //             'errors' => [
    //                 //'uploaded' => 'pilih gambar dahulu',
    //                 'max_size' => 'ukuran gambar terlalu besar',
    //                 'is_image' => 'yg anda pilih bukan gambar',
    //                 'mime_in' => 'yg anda pilih bukan gambar'
    //             ]
    //         ]
    //     ])) {

    //         return redirect()->to('/user/edit_user/' . $this->request->getVar('nama'))->withInput();
    //     }


    //     $fileSampul = $this->request->getFile('sampul');
    //     $def = $this->request->getVar('sampulLama');
    //     if ($fileSampul->getError() == 4) {
    //         $namaSampul = $this->request->getVar('sampulLama');
    //     } else if ($def == 'profil.svg') {
    //         $namaSampul = $this->request->getVar('sampulLama');
    //         $namaSampul = $fileSampul->getRandomName();
    //         //pindahkan gambar
    //         $fileSampul->move('img', $namaSampul);
    //     } else {
    //         //generate nama file random
    //         $namaSampul = $fileSampul->getRandomName();
    //         //pindahkan gambar
    //         $fileSampul->move('img', $namaSampul);
    //         //hapus file lama
    //         unlink('img/' . $this->request->getVar('sampulLama'));
    //     }
    //     // $no = $this->authModel->find($id);
    //     // $nama = $this->request->getVar('nama');
    //     $this->authModel->save([
    //         'id' => $id,
    //         'nama' => $this->request->getVar('nama'),
    //         'username' => $this->request->getVar('username'),
    //         'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
    //         'rt' => $this->request->getVar('rt'),
    //         'rw' => $this->request->getVar('rw'),
    //         'sampul' => $namaSampul
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil diupdate.');

    //     return redirect()->to('/akun');
    // }
}
