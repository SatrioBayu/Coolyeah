<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\MateriModel;
use App\Models\TugasModel;
use App\Models\TugasSiswa;

class Kelas extends BaseController
{

    protected $kelas;
    protected $tugas;
    protected $tugasSiswa;

    public function __construct()
    {
        $this->kelas = new KelasModel();
        $this->tugas = new TugasModel();
        $this->tugasSiswa = new TugasSiswa();
    }

    public function index()
    {
        if(empty(session()->get('email'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/');
        }
        $daftarKelas = $this->kelas->getData();
        $data = [
            'judul' => 'Daftar Kelas',
            'kelas' => $daftarKelas
        ];
        return view('/Siswa/daftarKelas',$data);
    }
    
    public function cari(){
        if(empty(session()->get('email'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/');
        }
        $keyword = $this->request->getVar('keyword');
        if(empty($keyword)){
            return redirect()->to('/Kelas');
        }
        $kelas = $this->kelas->getKelasByKeyword($keyword);
        $data = [
            'judul' => "Daftar Kelas",
            'kelas' => $kelas
        ];
        return view('/Siswa/daftarKelas',$data);
    }

    public function tambahKelas(){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $data = [
            'judul' => 'Buat Kelas'
        ];
        return view('Guru/buatKelas',$data);
    }

    public function tambah(){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $data = [
            'email_guru' => session()->get('emailGuru'),
            'nama_kelas' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ];
        $this->kelas->insert($data);
        return redirect()->to('/Guru/dashboard');
    }

    public function tambahTugas($id){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $kelas = $this->kelas->getDataById($id);
        $data = [
            'judul' => 'Buat Tugas',
            'kelas' => $kelas
        ];
        return view('/Guru/tambahTugas',$data);
    }

    public function addTugas($id){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $data = [
            'id_kelas' => $id,
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'batas_waktu' => $this->request->getVar('batas')
        ];
        $this->tugas->insert($data);
        return redirect()->to("/Kelas/detailKelasGuru/$id");
    }

    public function editTugas($id_kelas, $id){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $tugas = $this->tugas->getTugasById($id);
        $kelas = $this->kelas->getDataById($id_kelas);
        $data = [
            'judul' => 'Edit Tugas',
            'tugas' => $tugas,
            'kelas' => $kelas
        ];
        // dd($materi);
        return view('/Guru/editTugas',$data);
    }

    public function editTug($id_kelas,$id){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $data = [
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ];
        $this->tugas->updateTugasById($id,$data['judul'],$data['deskripsi']);
        return redirect()->to("/Kelas/detailKelasGuru/$id_kelas");
    }

    public function tugasGuru($id_kelas,$id){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $tugas = $this->tugas->getTugasById($id);
        $kelas = $this->kelas->getDataById($id_kelas);
        $tugasSiswa = $this->tugasSiswa->getDataById($id);
        $data = [
            'judul' => $tugas['judul'],
            'tugas' => $tugas,
            'kelas' => $kelas,
            'siswa' => $tugasSiswa
        ];
        // dd($tugasSiswa);
        return view('/Guru/tugas',$data);
    }
    public function tugas($id_kelas,$id){
        if(empty(session()->get('email'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/');
        }
        $tugas = $this->tugas->getTugasById($id);
        $kelas = $this->kelas->getDataById($id_kelas);
        $tugasSiswa = $this->tugasSiswa->getDataByEmail(session()->get('email'),$id);
        $data = [
            'judul' => $tugas['judul'],
            'tugas' => $tugas,
            'kelas' => $kelas,
            'jawaban' => $tugasSiswa
        ];
        return view('/Siswa/tugas',$data);
    }

    public function kumpul($id, $id_kelas){
        $cek = $this->request->getVar('jawaban');
        if(str_contains($cek,'.jpg') || str_contains($cek,'.jpeg') || str_contains($cek,'.png')){
            $data = [
                'email_siswa' => session()->get('email'),
                'id' => $id,
                'jawaban' => $this->request->getVar('jawaban')
            ];
            $this->tugasSiswa->insert($data);
            session()->setFlashData("upload", "File berhasil di upload");
            return redirect()->to("/Kelas/tugas/$id_kelas/$id");
        } else{
            session()->setFlashData("upload", "File yang anda upload tidak bertipe image");
            return redirect()->to("/Kelas/tugas/$id_kelas/$id");
        }
    }

    public function detail($id){
        if(empty(session()->get('email'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/');
        }
        $kelas = $this->kelas->getDataById($id);
        $tugas = $this->tugas->getTugas($id);   
        $tugas_reverse = array_reverse($tugas);
        // dd($this->tugasSiswa->cek(session()->get('email'),$id));    
        $data = [
            'judul' => $kelas['nama_kelas'],
            'kelas' => $kelas,
            'tugas' => $tugas_reverse
        ];
        return view('/Siswa/detailKelas',$data);
    }

    public function anggota($id){
        if(empty(session()->get('email'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/');
        } 
        // if(empty(session()->get('emailGuru'))){
        //     session()->setFlashData('login',"Anda belum login");
        //     return redirect()->to('/LoginGuru');
        // }
        $guru = $this->kelas->getDataById($id);
        $siswa = $this->kelas->getSiswaByIdKelas($id);
        $data = [
            'judul' => "Anggota Kelas ".$guru['nama_kelas'],
            'guru' => $guru,
            'siswa' => $siswa
        ];
        return view('/Siswa/anggotaKelas',$data);
    }

    public function anggotaGuru($id){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        } 
        $guru = $this->kelas->getDataById($id);
        $siswa = $this->kelas->getSiswaByIdKelas($id);
        $data = [
            'judul' => "Anggota Kelas ".$guru['nama_kelas'],
            'guru' => $guru,
            'siswa' => $siswa
        ];
        return view('/Guru/anggotaKelas',$data);
    }
    
    public function detailKelasGuru($id){
        if(empty(session()->get('emailGuru'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/LoginGuru');
        }
        $kelas = $this->kelas->getDataById($id);
        $tugas = $this->tugas->getTugas($id);
        $tugas_reverse = array_reverse($tugas);
        $data = [
            'judul' => $kelas['nama_kelas'],
            'kelas' => $kelas,
            'tugas' => $tugas_reverse
        ];
        return view('/Guru/detailKelasGuru',$data);
    }
}
