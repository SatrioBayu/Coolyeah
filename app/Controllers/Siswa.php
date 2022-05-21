<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswa;

    public function __construct()
    {
        $this->siswa = new SiswaModel();
    }

    public function index()
    {
        return view('Siswa/login');
    }
    public function verifikasi(){
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $this->siswa->getDataByEmail($email);
        if($data){
            $pw = $data['password'];
            if($pw == $password){
                session()->set([
                    'email' => $email
                ]);
                return redirect()->to('Home');
            } else{
                session()->setFlashdata('gagal',"Password anda salah");
                return redirect()->to('/');
            }
        } else{
            session()->setFlashdata('gagal', "Email tidak terdaftar");
            return redirect()->to('/');
        }
    }

    public function registrasi(){
        return view('Siswa/regis');
    }
    public function addUser(){
        $email = $this->request->getVar('email');
        $nama = $this->request->getVar('nama');
        $password = $this->request->getVar('password');
        $data = $this->siswa->getDataByEmail($email);
        if($data){
            session()->setFlashdata('gagalRegis',"Email telah digunakan");
            return redirect()->to('/');
        } else{
            $data = [
                'email_siswa' => $email,
                'nama' => $nama,
                'password' => $password
            ];
            $this->siswa->insert($data);
            return redirect()->to('/');
        }
    }
    
    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }

    public function biodata(){
        if(empty(session()->get('email'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/');
        }
        $siswa = $this->siswa->getDataByEmail(session()->get('email'));
        $data = [
            'judul' => 'Biodata',
            'siswa' => $siswa
        ];
        return view('Siswa/biodata',$data);
    }

    public function edit(){
        if(empty(session()->get('email'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/');
        }
        $data = [
            'email' => $this->request->getVar('email'),
            'nama' => $this->request->getVar('nama'),
            'password' => $this->request->getVar('password')
        ];
        $this->siswa->updateByEmail(session()->get('email'),$data['email'],$data['nama'],$data['password']);
        session()->setFlashData('update', "Data berhasil di perbarui");
        return redirect()->to('/Siswa/biodata');
    }
}
