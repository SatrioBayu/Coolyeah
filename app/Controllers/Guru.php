<?php

namespace App\Controllers;

use App\Models\GuruModel;

class Guru extends BaseController
{

    protected $guru;
    public function __construct()
    {
        $this->guru = new GuruModel();
    }

    public function index()
    {
        return view('Guru/login');
    }

    public function verifikasi(){
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $this->guru->getDataByEmail($email);
        if($data){
            $pw = $data['password'];
            if($pw == $password){
                session()->set([
                    'emailGuru' => $email
                ]);
                return redirect()->to('/Guru/dashboard');
                // dd($this->guru->getKelas($email));
            } else{
                session()->setFlashdata('gagal',"Password anda salah");
                return redirect()->to('/LoginGuru');
            }
        } else{
            session()->setFlashdata('gagal', "Email tidak terdaftar");
            return redirect()->to('/LoginGuru');
        }
    }

    public function biodata(){
        //Cek Login
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $guru = $this->guru->getDataByEmail(session()->get('emailGuru'));
        $data = [
            'judul' => 'Biodata Guru',
            'guru' => $guru
        ];
        return view('/Guru/biodata',$data);
    }
    
    public function edit(){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $data = [
            'email' => $this->request->getVar('email'),
            'nama' => $this->request->getVar('nama'),
            'password' => $this->request->getVar('password')
        ];
        $this->guru->updateByEmail(session()->get('email'),$data['email'],$data['nama'],$data['password']);
        session()->setFlashData('update', "Data berhasil di perbarui");
        return redirect()->to('/Guru/biodata');
    }

    public function dashboard(){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $kelas = $this->guru->getKelas(session()->get('emailGuru'));
        $data = [
            'judul' => "Dashboard Guru",
            'kelas' => $kelas,
        ];
        return view('Guru/dashboard',$data);
    }

    public function registrasi(){
        return view('Guru/regis');
    }
    public function addUser(){
        $email = $this->request->getVar('email');
        $nama = $this->request->getVar('nama');
        $password = $this->request->getVar('password');
        $data = $this->guru->getDataByEmail($email);
        if($data){
            session()->setFlashdata('gagalRegis',"Email telah digunakan");
            return redirect()->to('/LoginGuru');
        } else{
            $data = [
                'email_guru' => $email,
                'nama' => $nama,
                'password' => $password
            ];
            $this->guru->insert($data);
            return redirect()->to('/LoginGuru');
        }
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/LoginGuru');
    }
}
